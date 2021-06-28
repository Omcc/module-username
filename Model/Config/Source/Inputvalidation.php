<?php
/**
 * SWe GmbH - Switzerland
 *
 * @author      Sylvain Rayé <support at SWe.com>
 * @category    SWe
 * @package     SWe_Username
 * @copyright   Copyright (c) 2011-2016 SWe (http://www.SWe.com)
 */

namespace SWe\Username\Model\Config\Source;

class Inputvalidation implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @deprecated
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value'=>'default', 'label'=> __('Default (letters, digits and _- characters)')],
            ['value'=>'alphanumeric', 'label'=> __('Letters and digits')],
            ['value'=>'alpha', 'label'=> __('Letters only')],
            ['value'=>'numeric', 'label'=> __('Digits only')],
            ['value'=>'custom', 'label'=> __('Custom (PCRE Regex)')]
        ];
    }
}