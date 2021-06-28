<?php
/**
 * SWe GmbH - Switzerland
 *
 * @author      Sylvain Rayé <support at SWe.com>
 * @category    SWe
 * @package     SWe_
 * @copyright   Copyright (c) 2011-2016 SWe (http://www.SWe.com)
 */

namespace SWe\Username\Controller\Adminhtml\Sync;


use SWe\Username\Controller\Adminhtml\Sync;
use SWe\Username\Model\Generate\Flag;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Json\Helper\Data;

/**
 * Class Status
 * @package SWe\Username\Controller\Adminhtml\Username\Sync
 */
class Status extends Sync
{
    /**
     * @var Data
     */
    private $jsonHelper;

    /**
     * Status constructor.
     */
    public function __construct(
        Context $context,
        Data $jsonHelper
    ) {
        $this->jsonHelper = $jsonHelper;
        parent::__construct($context);
    }

    public function execute()
    {
        $flag = $this->_getSyncFlag();
        if ($flag) {
            $state = $flag->getState();
            $flagData = $flag->getFlagData();

            switch ($state) {
                case Flag::STATE_RUNNING:
                    if ($flagData['total_items'] > 0) {
                        $percent = (int)($flagData['total_items_done'] * 100 / $flagData['total_items']) . '%';
                        $result['message'] = __('Generating username: %s done.', $percent);
                    } else {
                        $result ['message'] = __('Generating...');
                    }
                    break;
                case Flag::STATE_FINISHED:
                    $result ['message'] = __('Generation finished');

                    if ($flag->getHasErrors()) {
                        $result ['message'] .= __('Errors occurred while running. Please, check the log if enabled.');
                        $result ['has_errors'] = true;
                    }
                    $state = Flag::STATE_NOTIFIED;
                    break;
                case Flag::STATE_NOTIFIED:
                    break;
                default:
                    $state = Flag::STATE_INACTIVE;
                    break;
            }
        } else {
            $state = Flag::STATE_INACTIVE;
        }
        $result['state'] = $state;

        $this->getResponse()->setBody($this->jsonHelper->jsonEncode($result));
    }
}