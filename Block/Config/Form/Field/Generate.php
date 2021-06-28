<?php
/**
 * SWe GmbH - Switzerland
 *
 * @author      Sylvain Rayé <support at SWe.com>
 * @category    SWe
 * @package     SWe_Username
 * @copyright   Copyright (c) 2011-2016 SWe (http://www.SWe.com)
 */

namespace SWe\Username\Block\Config\Form\Field;

use Magento\Config\Block\System\Config\Form\Field;

/**
 * Class Generate
 * @package SWe\Username\Block\Config\Form\Field
 */
class Generate extends Field
{
    /**
     * @var string
     */
    protected $_template = 'SWe_Username::config/generate.phtml';

    /**
     * Remove scope label
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element
            ->unsScope()
            ->unsCanUseWebsiteValue()
            ->unsCanUseDefaultValue();

        return parent::render($element);
    }

    /**
     * Return element html
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return $this->_toHtml();
    }

    /**
     * Return ajax url for synchronize button
     *
     * @return string
     */
    public function getAjaxSyncUrl()
    {
        return $this->getUrl('username/sync/generate');
    }

    /**
     * Return ajax url for synchronize button
     *
     * @return string
     */
    public function getAjaxStatusUpdateUrl()
    {
        return $this->getUrl('username/sync/status');
    }

    /**
     * Generate generate button html
     *
     * @return string
     */
    public function getButtonHtml()
    {
        /* @var $button \Magento\Backend\Block\Widget\Button */
        $button = $this
            ->getLayout()
            ->createBlock('Magento\Backend\Block\Widget\Button')
            ->setData(array(
                'id'        => 'generate_button',
                'label'     => __('Generate'),
            ));

        return $button->toHtml();
    }
}