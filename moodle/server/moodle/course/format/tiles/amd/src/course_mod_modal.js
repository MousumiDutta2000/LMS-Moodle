// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/* eslint space-before-function-paren: 0 */

/**
 * Javascript Module to handle rendering of course modules (e.g. resource/PDF, resource/html, page) in modal windows
 *
 * When the user clicks a PDF course module subtile or old style resource
 * if we are using modals for it (e.g. PDF) , create, populate, launch and size the modal
 *
 * @module      format_tiles/course_mod_modal
 * @copyright   2018 David Watson {@link http://evolutioncode.uk}
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since       Moodle 3.3
 */

define(["jquery", "core/modal_factory", "core/config", "core/templates", "core/notification", "core/ajax"],
    function ($, modalFactory, config, Templates, Notification, ajax) {
        "use strict";

        /**
         * Keep references for all modals we have already added to the page,
         * so that we can relaunch then if needed
         * @type {{}}
         */
        var modalStore = {};
        var loadingIconHtml;
        const win = $(window);
        var courseId;

        const Selector = {
            completioncheckbox: ".completioncheckbox",
            completionAuto: ".completion-auto",
            modal: ".modal",
            modalDialog: ".modal-dialog",
            modalBody: ".modal-body",
            sectionMain: ".section.main",
            pageContent: "#page-content",
            regionMain: "#region-main",
            completionState: "#completion-check-",
            cmModalClose: ".embed_cm_modal .close",
            cmModal: ".embed_cm_modal",
            moodleMediaPlayer: ".mediaplugin_videojs",
            urlModalLoadWarning: "#embed-url-error-msg-",
            closeBtn: "button.close",
            ACTIVITY: "li.activity",
            URLACTIVITYPOPUPLINK: ".activity.modtype_url.urlpopup a",
            newWindowButton: ".button_expand",
            modalHeader: ".modal-header",
            embedModuleButtons: ".embed-module-buttons",
            iframe: "iframe"
        };

        const CLASS = {
            COMPLETION_ENABLED: "completion-enabled",
            COMPLETION_MANUAL: "completion-manual",
            COMPLETION_AUTO: "completion-auto", // E.g. grade based.
            COMPLETION_VIEW: "completion-view",
            COMPLETION_CHECK_BOX: "completioncheckbox"
        };

        const LaunchModalDataActions = {
            launchResourceModal: "launch-tiles-resource-modal",
            launchModuleModal: "launch-tiles-module-modal",
            launchUrlModal: "launch-tiles-url-modal"
        };

        const COMPLETION_TOGGLE_TYPES = {
            MANUAL_NOT_DONE : "manual:mark-done",
            MANUAL_DONE : "manual:undo"
        };

        const TOGGLE_MANUAL_COMPLETION = 'toggle-manual-completion';

        var modalMinWidth = function () {
            return Math.min(win.width(), 1100);
        };

        /**
         * Some modals contain videos in iframes or objects, which need to stop playing when dismissed.
         * @param {object} modal the modal which contains the video.
         */
        var stopAllVideosOnDismiss = function(modal) {
            var iframes = modal.find(Selector.iframe);
            if (iframes.length > 0) {
                modal.find(Selector.closeBtn).click(function(e) {
                    $(e.currentTarget).closest(Selector.cmModal).find(Selector.iframe).each(function (index, iframe) {
                        iframe = $(iframe);
                        iframe.attr('src', iframe.attr("src"));
                    });
                });
            }
            var objects = modal.find("object");
            if (objects.length > 0) {
                // In this case resetting the URL does not seem to work so we clear it and clear modal from storage.
                modal.find(Selector.closeBtn).click(function(e) {
                    var modal = $(e.currentTarget).closest(Selector.cmModal);
                    modal.find("object").each(function (index, object) {
                        object = $(object);
                        object.attr('data', "");
                    });
                    modalStore[modal.attr("data-cmid")] = undefined;
                });
            }

            var moodleMediaPlayer = modal.find(Selector.moodleMediaPlayer);
            if (moodleMediaPlayer.length > 0) {
                modal.find(Selector.closeBtn).click(function() {
                    modal.find(Selector.moodleMediaPlayer).html("");
                });
                // Ensure we create a new modal next time.
                modalStore[modal.attr("data-cmid")] = undefined;
            }
        };

        /**
         * Launch a Course Resource Modal if we have it already, or make one and launch e.g. for PDF
         * @param {object} clickedCmObject the course module object which was clicked
         * @returns {boolean} if successful or not
         */
        var launchCourseResourceModal = function (clickedCmObject) {
            var cmid = clickedCmObject.attr("data-cmid");
            modalFactory.create({
                type: modalFactory.types.DEFAULT,
                title: clickedCmObject.attr("data-title"),
                body: loadingIconHtml
            }).done(function (modal) {
                modalStore[cmid] = modal;
                modal.setLarge();
                modal.show();
                var modalRoot = $(modal.root);
                modalRoot.attr("id", "embed_mod_modal_" + cmid);
                modalRoot.attr("data-cmid", cmid);
                modalRoot.attr("data-section", clickedCmObject.closest(Selector.sectionMain).attr("data-section"));
                modalRoot.addClass("embed_cm_modal");
                const sectionNum = clickedCmObject.closest(Selector.sectionMain).attr("data-section");
                // Render the modal body and set it to the page.
                // First a blank template data object.
                var templateData = {
                    id: cmid,
                    pluginfileUrl: clickedCmObject.attr("data-url"),
                    objectType: "text/html",
                    width: "100%",
                    height: Math.round(win.height() - 60), // Embedded object height in modal - make as high as poss.
                    cmid: cmid,
                    tileid: sectionNum,
                    isediting: 0,
                    sesskey: config.sesskey,
                    activityname: clickedCmObject.attr("data-title"),
                    config: {wwwroot: config.wwwroot},
                    showDownload: 0,
                    showNewWindow: 0,
                    hascompletion: 0,
                    completionstring: ''
                };
                // If it's a PDF in this modal, change from the defaults assigned above.
                if (clickedCmObject.attr('data-modtype') === "resource_pdf") {
                    templateData.objectType = 'application/pdf';
                }

                Templates.render("format_tiles/embed_file_modal_body", templateData).done(function (html) {
                    modal.setBody(html);
                    modalRoot.find(Selector.modalBody).animate({"min-height": Math.round(win.height() - 60)}, "fast");

                    if (clickedCmObject.attr('data-modtype') === "resource_html") {
                        // HTML files only - set widths to 100% since they may contain embedded videos etc.
                        modalRoot.find(Selector.modal).animate({"max-width": "100%"}, "fast");
                        modalRoot.find(Selector.modalDialog).animate({"max-width": "100%"}, "fast");
                        modalRoot.find(Selector.modalBody).animate({"max-width": "100%"}, "fast");
                        stopAllVideosOnDismiss(modalRoot);
                    } else {
                        // Otherwise (e.g for PDF) we don't need 100% width.
                        modalRoot.find(Selector.modal).animate({"max-width": modalMinWidth()}, "fast");
                        // We do modal-dialog too since Moove theme uses it.
                        modalRoot.find(Selector.modalDialog).animate({"max-width": modalMinWidth()}, "fast");
                    }

                }).fail(Notification.exception);
                // Render the modal header / title and set it to the page.
                renderModalHeader(clickedCmObject, modalRoot, templateData.pluginfileUrl, true, true);

                return true;
            });
            return false;
        };

        /**
         * Launch an embedded URL Modal (URL displays in iframe) if we have it already, or make one and launch.
         * This is only used if the URL activity is set to Display: embed.  The reason is that most websites disallow iframes.
         * See https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options.
         * @param {object} clickedCmObject the course module object which was clicked
         * @returns {boolean} if successful or not
         */
        var launchEmbeddedUrlModal = function (clickedCmObject) {
            var cmid = clickedCmObject.attr("data-cmid");
            modalFactory.create({
                type: modalFactory.types.DEFAULT,
                title: clickedCmObject.attr("data-title"),
                body: loadingIconHtml
            }).done(function (modal) {
                modalStore[cmid] = modal;
                modal.setLarge();
                modal.show();
                var modalRoot = $(modal.root);
                modalRoot.attr("id", "embed_mod_modal_" + cmid);
                modalRoot.attr("data-cmid", cmid);
                modalRoot.attr("data-section", clickedCmObject.closest(Selector.sectionMain).attr("data-section"));
                modalRoot.addClass("embed_cm_modal");

                // Render the modal body and set it to the page.
                // First a blank template data object.

                var modalWidth = Math.round(win.width() * 0.9);
                var modalHeight = Math.round(win.height() * 0.9);
                const sectionNum = clickedCmObject.closest(Selector.sectionMain).attr("data-section");
                var templateData = {
                    id: cmid,
                    pluginfileUrl: clickedCmObject.attr("data-url"),
                    objectType: "text/html",
                    width: modalWidth - 30,
                    height: modalHeight - 30,
                    cmid: cmid,
                    tileid: sectionNum,
                    isediting: 0,
                    sesskey: config.sesskey,
                    activityname: clickedCmObject.attr("data-title"),
                    config: {wwwroot: config.wwwroot},
                    secondaryurl: clickedCmObject.closest(Selector.ACTIVITY).attr("data-url-secondary")
                };

                Templates.render("format_tiles/embed_url_modal_body", templateData).done(function (html) {
                    modal.setBody(html);
                    modalRoot.find(Selector.modalBody).animate({"min-height": modalHeight}, "fast");
                    modalRoot.find(Selector.modal).animate({"max-width": modalWidth}, "fast");
                    modalRoot.find(Selector.modalDialog).animate({"max-width": modalWidth}, "fast");
                    modalRoot.find(Selector.modalBody).animate({"max-width": modalWidth}, "fast");
                    stopAllVideosOnDismiss(modalRoot);
                    modalRoot.find(Selector.modalBody).addClass("text-center");
                }).fail(Notification.exception);
                // Render the modal header / title and set it to the page.
                renderModalHeader(clickedCmObject, modalRoot, templateData.pluginfileUrl, false, true);

                // Listen to see if user clicks to view the modal contents in a new window.  Dismiss modal if so.
                // Important for video which may end up playing twice otherwise.
                setTimeout(function() {
                    modalRoot.find(Selector.newWindowButton).click(function() {
                        modalStore[modalRoot.attr("data-cmid")].hide();
                        modalStore[modalRoot.attr("data-cmid")] = undefined;
                        modalRoot.remove();
                        $(".modal-backdrop").not("#window-overlay").removeClass("show").addClass("hide");
                    });
                }, 1000);

                return true;
            });
            return false;
        };

        /**
         * Resize the modal to account for its content.
         * @param {object} modalRoot
         */
        var resizeModal = function(modalRoot) {
            modalRoot.find(Selector.modal).animate({"max-width": modalMinWidth()}, "fast");

            var MODAL_MARGIN = 70;

            // If the modal contains a Moodle mediaplayer div, remove the max width css rule which Moodle applies.
            // Otherwise video will be 400px max wide.
            var mediaPlayer = $(Selector.moodleMediaPlayer);
            mediaPlayer.find("div").each(function(index, child) {
                $(child).css("max-width", "");
            });
            if (mediaPlayer.length > 0) {
                stopAllVideosOnDismiss(modalRoot);
            }

            // If the activity contains an iframe (e.g. is a page with a YouTube video in it, or H5P), ensure modal is big enough.
            // Do this for every iframe in the course module.
            modalRoot.find(Selector.iframe).each(function (index, iframe) {

                // Get the modal.
                var modal;
                // Boost calls the modal "modal dialog" so try this first.
                modal = modalRoot.find(Selector.modalDialog);

                // If no luck, try what Clean and Adaptable do instead.
                if (modal.length === 0) {
                    modal = modalRoot.find(Selector.modal);
                }

                // Now check and adjust the width of the modal.
                var iframeWidth = Math.min($(iframe).width(), win.width());
                if (iframeWidth > modal.width() - MODAL_MARGIN) {
                    modal.animate(
                        {"max-width": Math.max(iframeWidth + MODAL_MARGIN, modalMinWidth())},
                        "fast"
                    );
                    modalRoot.find(Selector.modal).animate(
                        {"max-width": Math.max(iframeWidth + MODAL_MARGIN, modalMinWidth())},
                        "fast"
                    );
                }

                // Then the height of the modal body.
                var iframeHeight = Math.min($(iframe).height(), win.height());
                var modalBody = modalRoot.find(Selector.modalBody);
                if (iframeHeight > modalBody.height() - MODAL_MARGIN) {
                    modalBody.animate({"min-height": Math.min(iframeHeight + MODAL_MARGIN, win.height()) + 1}, "fast");
                }
                stopAllVideosOnDismiss(modalRoot);
            });
        };

        /**
         * Check the modal height to see if the iframe in it is bigger.  If it is, adjust modal height up.
         * Do this a few times so that, if iframe content is loading, we can check after it's loaded.
         * @param {object} modalRoot
         * @param {number} howManyChecks
         * @param {number}duration
         * @param {number} oldHeight
         */
        const modalHeightChangeWatcher = function (modalRoot, howManyChecks, duration, oldHeight = 0) {
            const iframe = modalRoot.find(Selector.modalBody);
            if (iframe) {
                const newHeight = Math.round(iframe.height());
                if (newHeight && newHeight > oldHeight + 10) {
                    resizeModal(modalRoot);
                }
                if (howManyChecks > 0) {
                    setTimeout(() => {
                        modalHeightChangeWatcher(modalRoot, howManyChecks - 1, duration, newHeight);
                    }, duration);
                }
            }
        };

        /**
         * Handle rendering the items to go into course module modal header.
         * @param {object} clickedCmObject
         * @param {object} modalRoot
         * @param {string} pluginfileUrl
         * @param {boolean} showDownload
         * @param {boolean} showNewWindow
         */
        const renderModalHeader = function(clickedCmObject, modalRoot, pluginfileUrl, showDownload, showNewWindow) {
            const sectionNum = clickedCmObject.closest(Selector.sectionMain).attr("data-section");
            const cmid = clickedCmObject.attr("data-cmid");
            var templateData = {
                cmid: cmid,
                activityname: clickedCmObject.attr("data-title"),
                tileid: sectionNum
            };
            if (clickedCmObject.hasClass(CLASS.COMPLETION_ENABLED)) {
                templateData.istrackeduser = 1;
                templateData.hascompletion = 1;
                const oldState = clickedCmObject.attr('data-completion-state') === "1";
                templateData.overallcomplete = oldState ? 1 : 0;
                templateData.overallincomplete = oldState ? 0 : 1;
                templateData.completionIsManual = clickedCmObject.hasClass(CLASS.COMPLETION_MANUAL);
                if (templateData.completionIsManual) {
                    clickedCmObject.attr(
                        TOGGLE_MANUAL_COMPLETION,
                        templateData.overallcomplete
                            ? COMPLETION_TOGGLE_TYPES.MANUAL_DONE :  COMPLETION_TOGGLE_TYPES.MANUAL_NOT_DONE
                    );
                } else {
                    //todo get the current status as it may have changed when window launched.
                    // Auto completion has different vars for core template core_course/completion_automatic.
                    templateData.statuscomplete = templateData.overallcomplete;
                    templateData.statusincomplete = templateData.overallincomplete;
                }
                // templateData.completionstring = checkBox.attr('title');
                // todo add completion string back
                templateData.showDownload = showDownload !== undefined ? showDownload : 0;
                templateData.showNewWindow = showNewWindow !== undefined ? showNewWindow : 0;
                templateData.pluginfileUrl = pluginfileUrl;
                templateData.forModal = true;
                // Trigger event to check if other items in course have updated availability.
                if (oldState !== templateData.completionstate) {
                    require(["format_tiles/completion"], function (completion) {
                        completion.triggerCompletionChangedEvent(parseInt(sectionNum), parseInt(clickedCmObject.attr("data-cmid")));
                    });
                }
            }
            Templates.render("format_tiles/embed_module_modal_header_btns", templateData).done(function (html) {
                modalRoot.find(Selector.embedModuleButtons).remove();
                modalRoot.find($('button.close')).remove();
                modalRoot.find(Selector.modalHeader).append(html);
                modalRoot.find(Selector.closeBtn).detach().appendTo(modalRoot.find(Selector.embedModuleButtons));
                const toggleCompletionSelector = '[data-action="' + TOGGLE_MANUAL_COMPLETION + '"]';
                modalRoot.find(toggleCompletionSelector).on('click', () => {
                    require(["format_tiles/completion"], function (completion) {
                        // In this case, core will handle the request to set the new completion value in the DB.
                        // We wait a moment to allow that to get a head start.
                        // Then we trigger an event which course.js will see and update the section content to show new statuses.
                        // Use will not notice this as they are looking at the modal, but it's ready when they dismiss modal.
                        setTimeout(() => {
                            completion.triggerCompletionChangedEvent(
                                parseInt(modalRoot.attr('data-section')), parseInt(modalRoot.attr("data-cmid"))
                            );
                        }, 300);
                    });
                });
            }).fail(Notification.exception);

            // Allow a short delay before we resize the modal, and check a few times, as content may be loading.
            setTimeout(() => {
                modalHeightChangeWatcher(modalRoot, 3, 1000);
            }, 500);
        };

        // TODO refactor these to avoid repetition.
        /**
         * Launch a Course activity Modal if we have it already, or make one and launch e.g. for "Page"
         * @param {object} clickedCmObject the course module object which was clicked
         * @returns {boolean} if successful or not
         */
        var launchCourseActivityModal = function (clickedCmObject) {
            var cmid = clickedCmObject.attr("data-cmid");
            // TODO code envisages potentially adding in other web services for other mod types, but for now we have page only.
            var methodName = "format_tiles_get_mod_" + clickedCmObject.attr("data-modtype") + "_html";

            modalFactory.create({
                type: modalFactory.types.DEFAULT,
                title: clickedCmObject.attr("data-title"),
                body: loadingIconHtml
            }).done(function (modal) {
                modalStore[cmid] = modal;
                modal.setLarge();
                modal.show();
                var modalRoot = $(modal.root);
                modalRoot.attr("data-cmid", cmid);
                modalRoot.attr("data-section", clickedCmObject.closest(Selector.sectionMain).attr("data-section"));
                modalRoot.attr("id", "embed_mod_modal_" + cmid);
                modalRoot.addClass("embed_cm_modal");
                modalRoot.addClass('mod_' + clickedCmObject.attr("data-modtype"));
                stopAllVideosOnDismiss(modalRoot);
                ajax.call([{
                    methodname: methodName,
                    args: {
                        courseid: courseId,
                        cmid: cmid
                    }
                }])[0].done(function(response) {
                    renderModalHeader(clickedCmObject, modalRoot, '', false, false);
                    modal.setBody(response.html);

                    return true;
                }).fail(function(ex) {
                    if (config.developerdebug !== true) {
                        // Load the activity using PHP instead.
                        window.location = config.wwwroot + "/mod/" + clickedCmObject.attr("data-modtype") + "/view.php?id=" + cmid;
                    } else {
                        Notification.exception(ex);
                    }
                });
            });
            return false;
        };

        /**
         * If a URL activity is clicked and it's been set to open in "Pop up" then launch a browser pop up.
         * @param {object} e
         */
        var launchUrlPopUp = function (e) {
            var clickedActivity = $(e.currentTarget).closest(Selector.ACTIVITY);
            if (clickedActivity.attr("data-url") !== undefined) {
                e.stopPropagation();
                e.preventDefault();
                // Log the fact we viewed it.
                ajax.call([{
                    methodname: "format_tiles_log_mod_view", args: {
                        courseid: courseId,
                        cmid: clickedActivity.attr("data-cmid")
                    }
                }])[0].done(function () {
                    // Because we intercepted the normal event for the click, process auto completion.
                    const sectionNum = clickedActivity.closest(Selector.section).attr('data-section');
                    const cmid = clickedActivity.attr('data-cmid');
                    require(["format_tiles/completion"], function (completion) {
                        completion.triggerCompletionChangedEvent(
                            sectionNum ? parseInt(sectionNum) : 0,
                            cmid ? parseInt(cmid) : 0
                        );
                    });
                    // Then open the pop up.
                    var newWin = window.open(clickedActivity.attr("data-url"));
                    try {
                        newWin.focus();
                    } catch (e) {
                        // Blocked pop-up?
                        var popUpLink = '<div>'
                            + '<a href="' + clickedActivity.attr("data-url") + '">'
                            + clickedActivity.attr("data-url")
                            + '</a></div>';
                        require(['core/str', 'core/notification'], function(Str, Notification) {
                            var stringKeys = [
                                {key: "sectionerrortitle", component: "format_tiles"},
                                {key: "blockedpopup", component: "format_tiles"},
                                {key: "cancel", component: "moodle"}
                            ];
                            Str.get_strings(stringKeys).done(function (s) {
                                Notification.alert(
                                   s[0],
                                    s[1] + popUpLink,
                                    s[2]
                                );
                            });
                        });
                    }
                }).fail(Notification.exception);
            }
        };

        return {
            init: function (courseIdInit, isEditing) {
                courseId = courseIdInit;
                $(document).ready(function () {
                    var modalSelectors = Object.keys(LaunchModalDataActions).map(function (key) {
                        return '[data-action="' + LaunchModalDataActions[key] + '"]';
                    }).join(", ");

                    var pageContent = $(Selector.pageContent);
                    if (pageContent.length === 0) {
                        // Some themes e.g. RemUI do not have a #page-content div, so use #region-main.
                        pageContent = $(Selector.regionMain);
                    }
                    pageContent.on("click", modalSelectors, function (e) {
                        // If click is on a completion checkbox within activity, ignore here as handled elsewhere.
                        const tgt = $(e.target);
                        if (tgt.hasClass(CLASS.COMPLETION_CHECK_BOX) || tgt.parent().hasClass(CLASS.COMPLETION_CHECK_BOX)) {
                            return;
                        }
                        e.preventDefault();
                        const currTgt = $(e.currentTarget);
                        var clickedCmObject = currTgt.closest("li.activity");
                        if (clickedCmObject.hasClass('completeonview')) {
                            const sectionNum = clickedCmObject.closest(Selector.sectionMain).attr('data-section');
                            const cmid = clickedCmObject.attr('data-cmid');
                            require(["format_tiles/completion"], function (completion) {
                                completion.triggerCompletionChangedEvent(
                                    sectionNum ? parseInt(sectionNum) : 0,
                                    cmid ? parseInt(cmid) : 0
                                );
                            });
                        }
                        // If we already have this modal on the page, launch it.
                        var existingModal = modalStore[clickedCmObject.attr("data-cmid")];
                        if (typeof existingModal === "object") {
                            existingModal.show();
                        } else {
                            // Log the fact we viewed it (only do this once not every time the modal launches).
                            ajax.call([{
                                methodname: "format_tiles_log_mod_view", args: {
                                    courseid: courseId,
                                    cmid: clickedCmObject.attr("data-cmid")
                                }
                            }])[0].fail(Notification.exception);

                            // We don't already have it, so make it.
                            switch (currTgt.attr("data-action")) {
                                case LaunchModalDataActions.launchModuleModal:
                                    launchCourseActivityModal(clickedCmObject);
                                    break;
                                case LaunchModalDataActions.launchResourceModal:
                                    launchCourseResourceModal(clickedCmObject);
                                    break;
                                case LaunchModalDataActions.launchUrlModal:
                                    launchEmbeddedUrlModal(clickedCmObject);
                                    break;
                                default:
                                    throw new Error("Unknown modal type " + currTgt.attr("data-action"));
                            }
                        }
                        // If we have an auto completion toggle on this item, trigger event.
                        if (clickedCmObject.find(Selector.completionAuto).length !== 0) {
                            const sectionNum = clickedCmObject.closest(Selector.sectionMain).attr('data-section');
                            const cmid = clickedCmObject.attr('data-cmid');
                            require(["format_tiles/completion"], function (completion) {
                                completion.triggerCompletionChangedEvent(
                                    sectionNum ? parseInt(sectionNum) : 0,
                                    cmid ? parseInt(cmid) : 0
                                );
                            });
                        }
                    });

                     // Render the loading icon and append it to body so that we can use it later.
                    Templates.render("format_tiles/loading", {})
                        .catch(Notification.exception)
                        .done(function (html) {
                            loadingIconHtml = html; // TODO get this from elsewhere.
                        }).fail(Notification.exception);

                    if (!isEditing) {
                        // If a URL activity is clicked and it's been set to open in "Pop up" then launch a browser pop up.
                        pageContent.on("click", Selector.URLACTIVITYPOPUPLINK, function(e) {
                            launchUrlPopUp(e);
                        });
                    }

                    // If completion of a cm changes, remove it from store so that it can be re-rendered with correct heading.
                    $(document).on('format-tiles-completion-changed', function(e, data) {
                        if (data.cmid && modalStore[data.cmid]) {
                            modalStore[data.cmid] = undefined;
                        }
                    });
                });
            }
        };
    }
);