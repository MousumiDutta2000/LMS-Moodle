<?php

class __Mustache_dba463fcbb9add9012d5518beef124ff extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $this->resolveValue($context->find('header'), $context);
        $buffer .= $indent . ($value === null ? '' : $value);
        $buffer .= '
';
        $value = $context->find('hasitems');
        $buffer .= $this->sectionE5bae4a0a4f2dae1917f27f348ef8a4b($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('showmorelink');
        $buffer .= $this->sectionA63eb431a2fcfea82386d150d791b257($context, $indent, $value);

        return $buffer;
    }

    private function sectionE7e6e6ecd2f53ba078bf45fd8062155b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' id="availability-tree-{{id}}" ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' id="availability-tree-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3b0ec207322d0def2142b2c85260e73d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'd-none';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'd-none';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6f31caa3e3cff737a4f47c21a71ce564(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <span class="d-none">
                    {{> core_availability/availability_info }}
                </span><span class="d-block">...</span>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <span class="d-none">
';
                if ($partial = $this->mustache->loadPartial('core_availability/availability_info')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                    ');
                }
                $buffer .= $indent . '                </span><span class="d-block">...</span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section906ad94bfea48a5514d54da6dd13da9c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <li class="{{#hidden}}d-none{{/hidden}}">
            {{#abbreviate}}
                <span class="d-none">
                    {{> core_availability/availability_info }}
                </span><span class="d-block">...</span>
            {{/abbreviate}}
            {{^abbreviate}}
                {{> core_availability/availability_info }}
            {{/abbreviate}}
        </li>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <li class="';
                $value = $context->find('hidden');
                $buffer .= $this->section3b0ec207322d0def2142b2c85260e73d($context, $indent, $value);
                $buffer .= '">
';
                $value = $context->find('abbreviate');
                $buffer .= $this->section6f31caa3e3cff737a4f47c21a71ce564($context, $indent, $value);
                $value = $context->find('abbreviate');
                if (empty($value)) {
                    
                    if ($partial = $this->mustache->loadPartial('core_availability/availability_info')) {
                        $buffer .= $partial->renderInternal($context, $indent . '                ');
                    }
                }
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB0d65585aabe00f5af8425034e12f0d6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'showmore, availability';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'showmore, availability';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCe381cf4f9b7db47d03e40088b45a04b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <li data-action="showmore" class="d-block showmore">
            <a role="button" aria-expanded="false" aria-controls="availability-tree-{{id}}" href="#" >
                {{#str}}showmore, availability{{/str}}
            </a>
        </li>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <li data-action="showmore" class="d-block showmore">
';
                $buffer .= $indent . '            <a role="button" aria-expanded="false" aria-controls="availability-tree-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" href="#" >
';
                $buffer .= $indent . '                ';
                $value = $context->find('str');
                $buffer .= $this->sectionB0d65585aabe00f5af8425034e12f0d6($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE5bae4a0a4f2dae1917f27f348ef8a4b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<ul {{#id}} id="availability-tree-{{id}}" {{/id}} data-region="availability-multiple">
    {{#items}}
        <li class="{{#hidden}}d-none{{/hidden}}">
            {{#abbreviate}}
                <span class="d-none">
                    {{> core_availability/availability_info }}
                </span><span class="d-block">...</span>
            {{/abbreviate}}
            {{^abbreviate}}
                {{> core_availability/availability_info }}
            {{/abbreviate}}
        </li>
    {{/items}}
    {{#showmorelink}}
        <li data-action="showmore" class="d-block showmore">
            <a role="button" aria-expanded="false" aria-controls="availability-tree-{{id}}" href="#" >
                {{#str}}showmore, availability{{/str}}
            </a>
        </li>
    {{/showmorelink}}
</ul>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '<ul ';
                $value = $context->find('id');
                $buffer .= $this->sectionE7e6e6ecd2f53ba078bf45fd8062155b($context, $indent, $value);
                $buffer .= ' data-region="availability-multiple">
';
                $value = $context->find('items');
                $buffer .= $this->section906ad94bfea48a5514d54da6dd13da9c($context, $indent, $value);
                $value = $context->find('showmorelink');
                $buffer .= $this->sectionCe381cf4f9b7db47d03e40088b45a04b($context, $indent, $value);
                $buffer .= $indent . '</ul>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE6e309044de0907d5890cd08e8646313(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'core_availability/availability_more\'], function(availabilityMore) {
        availabilityMore.init();
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'core_availability/availability_more\'], function(availabilityMore) {
';
                $buffer .= $indent . '        availabilityMore.init();
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA63eb431a2fcfea82386d150d791b257(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
{{#js}}
require([\'core_availability/availability_more\'], function(availabilityMore) {
        availabilityMore.init();
});
{{/js}}
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('js');
                $buffer .= $this->sectionE6e309044de0907d5890cd08e8646313($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
