<?php

class __Mustache_f8bbfb4c5b256ac12a4c28afc25ae5e3 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('maintenancefooter');
        $buffer .= $this->section3813529fa0136c62c750a908db4ddb05($context, $indent, $value);
        $value = $context->find('maintenancefooter');
        if (empty($value)) {
            
            $buffer .= $indent . '    <footer id="page-footer" class="footer-block">
';
            $buffer .= $indent . '        <div id="footer">
';
            $value = $context->find('blockarrange');
            $buffer .= $this->section7b5f029f4412d86256232d32cef0c9f1($context, $indent, $value);
            $value = $context->find('copyright');
            $buffer .= $this->section67668157102158432a5f16527485d368($context, $indent, $value);
            $buffer .= $indent . '        </div>
';
            $buffer .= $indent . '        <div data-region="footer-container-popover">
';
            $buffer .= $indent . '            <button class="btn btn-icon bg-secondary icon-no-margin btn-footer-popover" data-action="footer-popover" aria-label="';
            $value = $context->find('str');
            $buffer .= $this->section5a5198f26dc6ad191d1a18c314235d65($context, $indent, $value);
            $buffer .= '">
';
            $buffer .= $indent . '                ';
            $value = $context->find('pix');
            $buffer .= $this->section46f926dcc61094038ebb3542556c1993($context, $indent, $value);
            $buffer .= '
';
            $buffer .= $indent . '            </button>
';
            $buffer .= $indent . '        </div>
';
            $buffer .= $indent . '        <div class="footer-content-popover container" data-region="footer-content-popover">
';
            $value = $context->findDot('output.has_popover_links');
            $buffer .= $this->sectionA043d0990d3881b1c0f4fdd51aa140ce($context, $indent, $value);
            $buffer .= $indent . '            <div class="footer-section p-3 border-bottom">
';
            $buffer .= $indent . '                <div class="logininfo">
';
            $buffer .= $indent . '                    ';
            $value = $this->resolveValue($context->findDot('output.login_info'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
            $buffer .= $indent . '                </div>
';
            $buffer .= $indent . '                <div class="tool_usertours-resettourcontainer">
';
            $buffer .= $indent . '                </div>
';
            $buffer .= $indent . '
';
            $buffer .= $indent . '                ';
            $value = $this->resolveValue($context->findDot('output.standard_footer_html'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
            $buffer .= $indent . '                ';
            $value = $this->resolveValue($context->findDot('output.standard_end_of_body_html'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
            $buffer .= $indent . '            </div>
';
            $buffer .= $indent . '            <div class="footer-section p-3">
';
            $buffer .= $indent . '                <div>';
            $value = $context->find('str');
            $buffer .= $this->section3cef0c729bd31199c0f96ce94b38f287($context, $indent, $value);
            $buffer .= '</div>
';
            $value = $context->findDot('output.moodle_release');
            $buffer .= $this->sectionB49b84bde94828f292e94a93fac2af1a($context, $indent, $value);
            $buffer .= $indent . '            </div>
';
            $buffer .= $indent . '        </div>
';
            $buffer .= $indent . '
';
            $buffer .= $indent . '        <div class="footer-content-debugging footer-dark bg-dark text-light">
';
            $buffer .= $indent . '            <div class="container-fluid footer-dark-inner">
';
            $buffer .= $indent . '                ';
            $value = $this->resolveValue($context->findDot('output.debug_footer_html'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
            $buffer .= $indent . '            </div>
';
            $buffer .= $indent . '        </div>
';
            $buffer .= $indent . '    </footer>
';
        }
        $value = $context->find('js');
        $buffer .= $this->section44cca7cb7eae6e808ea785e5453e43c0($context, $indent, $value);

        return $buffer;
    }

    private function section4fb267db574a5346cd226f0f734191a5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
          <p>{{{copyright_footer}}}</p>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '          <p>';
                $value = $this->resolveValue($context->find('copyright_footer'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3813529fa0136c62c750a908db4ddb05(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<footer id="page-footer" class=" footer-popover footer-dark bg-dark text-light">
    <div id="footer">
      <div class="footer-bootom">
        {{# copyright_footer}}
          <p>{{{copyright_footer}}}</p>
        {{/ copyright_footer}}
      </div>
    </div>
</footer>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '<footer id="page-footer" class=" footer-popover footer-dark bg-dark text-light">
';
                $buffer .= $indent . '    <div id="footer">
';
                $buffer .= $indent . '      <div class="footer-bootom">
';
                $value = $context->find('copyright_footer');
                $buffer .= $this->section4fb267db574a5346cd226f0f734191a5($context, $indent, $value);
                $buffer .= $indent . '      </div>
';
                $buffer .= $indent . '    </div>
';
                $buffer .= $indent . '</footer>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAa32d32c79801a5b6a4c51c0ac148fb4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    <div class="logo-footer">
                                        <a href="{{{ config.wwwroot }}}/?redirect=0">
                                            <img src="{{logourl}}" width="183" height="67" alt="Eguru">
                                        </a>
                                    </div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                    <div class="logo-footer">
';
                $buffer .= $indent . '                                        <a href="';
                $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '/?redirect=0">
';
                $buffer .= $indent . '                                            <img src="';
                $value = $this->resolveValue($context->find('logourl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" width="183" height="67" alt="Eguru">
';
                $buffer .= $indent . '                                        </a>
';
                $buffer .= $indent . '                                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8a6a8cfe1bd5ee428d27e36f62d57882(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div class="{{colclass}}">
                                <div class="footer-desc">
                                    {{#footerlogo}}
                                    <div class="logo-footer">
                                        <a href="{{{ config.wwwroot }}}/?redirect=0">
                                            <img src="{{logourl}}" width="183" height="67" alt="Eguru">
                                        </a>
                                    </div>
                                    {{/footerlogo}}
                                    <p>{{footnote}}</p>
                                </div>
                            </div>
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <div class="';
                $value = $this->resolveValue($context->find('colclass'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                                <div class="footer-desc">
';
                $value = $context->find('footerlogo');
                $buffer .= $this->sectionAa32d32c79801a5b6a4c51c0ac148fb4($context, $indent, $value);
                $buffer .= $indent . '                                    <p>';
                $value = $this->resolveValue($context->find('footnote'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</p>
';
                $buffer .= $indent . '                                </div>
';
                $buffer .= $indent . '                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4def5305bc81aaf4a92a3ba7f080e0df(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div class="{{colclass}}">
                                <div class="footer-nav">
                                    <h4>{{footerbtitle2}}</h4>
                                    <ul>
                                    {{{footerlinks}}}
                                    </ul>
                                </div>
                            </div>
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <div class="';
                $value = $this->resolveValue($context->find('colclass'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                                <div class="footer-nav">
';
                $buffer .= $indent . '                                    <h4>';
                $value = $this->resolveValue($context->find('footerbtitle2'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</h4>
';
                $buffer .= $indent . '                                    <ul>
';
                $buffer .= $indent . '                                    ';
                $value = $this->resolveValue($context->find('footerlinks'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                    </ul>
';
                $buffer .= $indent . '                                </div>
';
                $buffer .= $indent . '                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0beea3946cb3c0c16d24b31a30bfe58a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <li class="smedia-01">
                                            <a href="{{fburl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-facebook"></i>
                                                </span>
                                                <span class="media-name">{{fbn}}</span>
                                            </a>
                                        </li>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <li class="smedia-01">
';
                $buffer .= $indent . '                                            <a href="';
                $value = $this->resolveValue($context->find('fburl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" target="_blank">
';
                $buffer .= $indent . '                                                <span class="media-icon">
';
                $buffer .= $indent . '                                                <i class="fa fa-facebook"></i>
';
                $buffer .= $indent . '                                                </span>
';
                $buffer .= $indent . '                                                <span class="media-name">';
                $value = $this->resolveValue($context->find('fbn'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</span>
';
                $buffer .= $indent . '                                            </a>
';
                $buffer .= $indent . '                                        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section05bb37832f19158a8bf77aca30de0cd9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <li class="smedia-02">
                                            <a href="{{twurl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-twitter"></i>
                                                </span>
                                                <span class="media-name">{{twn}}</span>
                                            </a>
                                        </li>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <li class="smedia-02">
';
                $buffer .= $indent . '                                            <a href="';
                $value = $this->resolveValue($context->find('twurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" target="_blank">
';
                $buffer .= $indent . '                                                <span class="media-icon">
';
                $buffer .= $indent . '                                                <i class="fa fa-twitter"></i>
';
                $buffer .= $indent . '                                                </span>
';
                $buffer .= $indent . '                                                <span class="media-name">';
                $value = $this->resolveValue($context->find('twn'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</span>
';
                $buffer .= $indent . '                                            </a>
';
                $buffer .= $indent . '                                        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1e02d5268cb38d1200a2c68decf40d7d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <li class="smedia-03">
                                            <a href="{{gpurl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-google-plus"></i>
                                                </span>
                                                <span class="media-name">{{gpn}}</span>
                                            </a>
                                        </li>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <li class="smedia-03">
';
                $buffer .= $indent . '                                            <a href="';
                $value = $this->resolveValue($context->find('gpurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" target="_blank">
';
                $buffer .= $indent . '                                                <span class="media-icon">
';
                $buffer .= $indent . '                                                <i class="fa fa-google-plus"></i>
';
                $buffer .= $indent . '                                                </span>
';
                $buffer .= $indent . '                                                <span class="media-name">';
                $value = $this->resolveValue($context->find('gpn'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</span>
';
                $buffer .= $indent . '                                            </a>
';
                $buffer .= $indent . '                                        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1b38868aafb84233731370a8c1c50d4d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <li class="smedia-04">
                                            <a href="{{pinurl}}" target="_blank">
                                            <span class="media-icon">
                                            <i class="fa fa-pinterest-p"></i>
                                            </span>
                                            <span class="media-name">{{pin}}</span>
                                            </a>
                                        </li>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <li class="smedia-04">
';
                $buffer .= $indent . '                                            <a href="';
                $value = $this->resolveValue($context->find('pinurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" target="_blank">
';
                $buffer .= $indent . '                                            <span class="media-icon">
';
                $buffer .= $indent . '                                            <i class="fa fa-pinterest-p"></i>
';
                $buffer .= $indent . '                                            </span>
';
                $buffer .= $indent . '                                            <span class="media-name">';
                $value = $this->resolveValue($context->find('pin'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</span>
';
                $buffer .= $indent . '                                            </a>
';
                $buffer .= $indent . '                                        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section930cf8a5a23e825988354d9dc7bdb805(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div class="{{colclass}}">
                                <div class="social-media">
                                    <h4>{{footerbtitle3}}</h4>
                                    <ul>
                                        {{# fburl}}
                                        <li class="smedia-01">
                                            <a href="{{fburl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-facebook"></i>
                                                </span>
                                                <span class="media-name">{{fbn}}</span>
                                            </a>
                                        </li>
                                        {{/ fburl}}

                                        {{# twurl}}
                                        <li class="smedia-02">
                                            <a href="{{twurl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-twitter"></i>
                                                </span>
                                                <span class="media-name">{{twn}}</span>
                                            </a>
                                        </li>
                                        {{/ twurl}}

                                        {{# gpurl}}
                                        <li class="smedia-03">
                                            <a href="{{gpurl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-google-plus"></i>
                                                </span>
                                                <span class="media-name">{{gpn}}</span>
                                            </a>
                                        </li>
                                        {{/ gpurl}}

                                        {{# pinurl}}
                                        <li class="smedia-04">
                                            <a href="{{pinurl}}" target="_blank">
                                            <span class="media-icon">
                                            <i class="fa fa-pinterest-p"></i>
                                            </span>
                                            <span class="media-name">{{pin}}</span>
                                            </a>
                                        </li>
                                        {{/ pinurl}}
                                    </ul>
                                </div>
                            </div>
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <div class="';
                $value = $this->resolveValue($context->find('colclass'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                                <div class="social-media">
';
                $buffer .= $indent . '                                    <h4>';
                $value = $this->resolveValue($context->find('footerbtitle3'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</h4>
';
                $buffer .= $indent . '                                    <ul>
';
                $value = $context->find('fburl');
                $buffer .= $this->section0beea3946cb3c0c16d24b31a30bfe58a($context, $indent, $value);
                $buffer .= $indent . '
';
                $value = $context->find('twurl');
                $buffer .= $this->section05bb37832f19158a8bf77aca30de0cd9($context, $indent, $value);
                $buffer .= $indent . '
';
                $value = $context->find('gpurl');
                $buffer .= $this->section1e02d5268cb38d1200a2c68decf40d7d($context, $indent, $value);
                $buffer .= $indent . '
';
                $value = $context->find('pinurl');
                $buffer .= $this->section1b38868aafb84233731370a8c1c50d4d($context, $indent, $value);
                $buffer .= $indent . '                                    </ul>
';
                $buffer .= $indent . '                                </div>
';
                $buffer .= $indent . '                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD4dac3017de06b38621cba31b40da87f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <p><i class="fa fa-phone-square"></i>{{phone}}: {{phoneno}}</p>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <p><i class="fa fa-phone-square"></i>';
                $value = $this->resolveValue($context->find('phone'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ': ';
                $value = $this->resolveValue($context->find('phoneno'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA64c008ad010b433df2f1ea70aa80d0b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <p><i class="fa fa-envelope"></i>
                                        {{mail}} <a class="mail-link" href="mailto:{{emailid}}">{{emailid}}</a>
                                        </p>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <p><i class="fa fa-envelope"></i>
';
                $buffer .= $indent . '                                        ';
                $value = $this->resolveValue($context->find('mail'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ' <a class="mail-link" href="mailto:';
                $value = $this->resolveValue($context->find('emailid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $value = $this->resolveValue($context->find('emailid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</a>
';
                $buffer .= $indent . '                                        </p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC9da65dc72fd404451f6fac5cbed242d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div class="{{colclass}}">
                                <div class="footer-contact">
                                    <h4>{{footerbtitle4}}</h4>
                                    <p>{{address}}</p>
                                    {{# phoneno}}
                                        <p><i class="fa fa-phone-square"></i>{{phone}}: {{phoneno}}</p>
                                    {{/ phoneno}}

                                    {{# emailid}}
                                        <p><i class="fa fa-envelope"></i>
                                        {{mail}} <a class="mail-link" href="mailto:{{emailid}}">{{emailid}}</a>
                                        </p>
                                    {{/ emailid}}

                                </div>
                            </div>
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <div class="';
                $value = $this->resolveValue($context->find('colclass'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                                <div class="footer-contact">
';
                $buffer .= $indent . '                                    <h4>';
                $value = $this->resolveValue($context->find('footerbtitle4'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</h4>
';
                $buffer .= $indent . '                                    <p>';
                $value = $this->resolveValue($context->find('address'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</p>
';
                $value = $context->find('phoneno');
                $buffer .= $this->sectionD4dac3017de06b38621cba31b40da87f($context, $indent, $value);
                $buffer .= $indent . '
';
                $value = $context->find('emailid');
                $buffer .= $this->sectionA64c008ad010b433df2f1ea70aa80d0b($context, $indent, $value);
                $buffer .= $indent . '
';
                $buffer .= $indent . '                                </div>
';
                $buffer .= $indent . '                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7b5f029f4412d86256232d32cef0c9f1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="footer-main">
                    <div class="container-fluid">
                        <div class="row">
                            {{#block1}}
                            <div class="{{colclass}}">
                                <div class="footer-desc">
                                    {{#footerlogo}}
                                    <div class="logo-footer">
                                        <a href="{{{ config.wwwroot }}}/?redirect=0">
                                            <img src="{{logourl}}" width="183" height="67" alt="Eguru">
                                        </a>
                                    </div>
                                    {{/footerlogo}}
                                    <p>{{footnote}}</p>
                                </div>
                            </div>
                            {{/block1}}
                            {{#block2}}
                            <div class="{{colclass}}">
                                <div class="footer-nav">
                                    <h4>{{footerbtitle2}}</h4>
                                    <ul>
                                    {{{footerlinks}}}
                                    </ul>
                                </div>
                            </div>
                            {{/block2}}
                            {{# block3}}
                            <div class="{{colclass}}">
                                <div class="social-media">
                                    <h4>{{footerbtitle3}}</h4>
                                    <ul>
                                        {{# fburl}}
                                        <li class="smedia-01">
                                            <a href="{{fburl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-facebook"></i>
                                                </span>
                                                <span class="media-name">{{fbn}}</span>
                                            </a>
                                        </li>
                                        {{/ fburl}}

                                        {{# twurl}}
                                        <li class="smedia-02">
                                            <a href="{{twurl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-twitter"></i>
                                                </span>
                                                <span class="media-name">{{twn}}</span>
                                            </a>
                                        </li>
                                        {{/ twurl}}

                                        {{# gpurl}}
                                        <li class="smedia-03">
                                            <a href="{{gpurl}}" target="_blank">
                                                <span class="media-icon">
                                                <i class="fa fa-google-plus"></i>
                                                </span>
                                                <span class="media-name">{{gpn}}</span>
                                            </a>
                                        </li>
                                        {{/ gpurl}}

                                        {{# pinurl}}
                                        <li class="smedia-04">
                                            <a href="{{pinurl}}" target="_blank">
                                            <span class="media-icon">
                                            <i class="fa fa-pinterest-p"></i>
                                            </span>
                                            <span class="media-name">{{pin}}</span>
                                            </a>
                                        </li>
                                        {{/ pinurl}}
                                    </ul>
                                </div>
                            </div>
                            {{/ block3}}
                            {{#block4}}
                            <div class="{{colclass}}">
                                <div class="footer-contact">
                                    <h4>{{footerbtitle4}}</h4>
                                    <p>{{address}}</p>
                                    {{# phoneno}}
                                        <p><i class="fa fa-phone-square"></i>{{phone}}: {{phoneno}}</p>
                                    {{/ phoneno}}

                                    {{# emailid}}
                                        <p><i class="fa fa-envelope"></i>
                                        {{mail}} <a class="mail-link" href="mailto:{{emailid}}">{{emailid}}</a>
                                        </p>
                                    {{/ emailid}}

                                </div>
                            </div>
                            {{/block4}}
                        </div>
                    </div>
                </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="footer-main">
';
                $buffer .= $indent . '                    <div class="container-fluid">
';
                $buffer .= $indent . '                        <div class="row">
';
                $value = $context->find('block1');
                $buffer .= $this->section8a6a8cfe1bd5ee428d27e36f62d57882($context, $indent, $value);
                $value = $context->find('block2');
                $buffer .= $this->section4def5305bc81aaf4a92a3ba7f080e0df($context, $indent, $value);
                $value = $context->find('block3');
                $buffer .= $this->section930cf8a5a23e825988354d9dc7bdb805($context, $indent, $value);
                $value = $context->find('block4');
                $buffer .= $this->sectionC9da65dc72fd404451f6fac5cbed242d($context, $indent, $value);
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section67668157102158432a5f16527485d368(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="footer-foot">
                <div class="container">{{{copyright}}}</div>
            </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="footer-foot">
';
                $buffer .= $indent . '                <div class="container">';
                $value = $this->resolveValue($context->find('copyright'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5a5198f26dc6ad191d1a18c314235d65(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'showfooter, theme_boost';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'showfooter, theme_boost';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section46f926dcc61094038ebb3542556c1993(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'e/question, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'e/question, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section02ed278fb880b463f0eaffbff2b85bfe(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div>{{{ output.page_doc_link }}}</div>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <div>';
                $value = $this->resolveValue($context->findDot('output.page_doc_link'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionDde70124b66601d3380b3d256b313a69(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div>{{{ output.services_support_link }}}</div>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <div>';
                $value = $this->resolveValue($context->findDot('output.services_support_link'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA9e0e52407597205021e26c2effc17a8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div>{{{ output.supportemail }}}</div>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <div>';
                $value = $this->resolveValue($context->findDot('output.supportemail'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA043d0990d3881b1c0f4fdd51aa140ce(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="footer-section p-3 border-bottom">
                    {{# output.page_doc_link }}
                        <div>{{{ output.page_doc_link }}}</div>
                    {{/ output.page_doc_link }}

                    {{# output.services_support_link }}
                        <div>{{{ output.services_support_link }}}</div>
                    {{/ output.services_support_link }}

                    {{# output.supportemail }}
                        <div>{{{ output.supportemail }}}</div>
                    {{/ output.supportemail }}
                </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="footer-section p-3 border-bottom">
';
                $value = $context->findDot('output.page_doc_link');
                $buffer .= $this->section02ed278fb880b463f0eaffbff2b85bfe($context, $indent, $value);
                $buffer .= $indent . '
';
                $value = $context->findDot('output.services_support_link');
                $buffer .= $this->sectionDde70124b66601d3380b3d256b313a69($context, $indent, $value);
                $buffer .= $indent . '
';
                $value = $context->findDot('output.supportemail');
                $buffer .= $this->sectionA9e0e52407597205021e26c2effc17a8($context, $indent, $value);
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3cef0c729bd31199c0f96ce94b38f287(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'poweredbymoodle, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'poweredbymoodle, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEbadd554e70ec7af082056d50928f237(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'version, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'version, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB49b84bde94828f292e94a93fac2af1a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <div>
                        {{#str}}version, core{{/str}} {{{ output.moodle_release }}}
                    </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <div>
';
                $buffer .= $indent . '                        ';
                $value = $context->find('str');
                $buffer .= $this->sectionEbadd554e70ec7af082056d50928f237($context, $indent, $value);
                $buffer .= ' ';
                $value = $this->resolveValue($context->findDot('output.moodle_release'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section44cca7cb7eae6e808ea785e5453e43c0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'theme_boost/footer-popover\'], function(FooterPopover) {
    FooterPopover.init();
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'theme_boost/footer-popover\'], function(FooterPopover) {
';
                $buffer .= $indent . '    FooterPopover.init();
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
