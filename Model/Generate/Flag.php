<?php
/**
 * SWe GmbH
 *
 * @category    SWe
 * @package     SWe_Username
 * @author      Sylvain Rayé <support@SWe.com>
 * @copyright   Copyright (c) 2008-2015 SWe GmbH - Switzerland (http://www.SWe.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace SWe\Username\Model\Generate;

/**
 * Class Flag
 * @package SWe\Username\Model\Generate
 */
class Flag extends \Magento\Framework\Flag
{
    /**
     * There was no generation
     */
    const STATE_INACTIVE    = 0;
    /**
     * Generation process is active
     */
    const STATE_RUNNING     = 1;
    /**
     * Generation is finished
     */
    const STATE_FINISHED    = 2;
    /**
     * Generation finished and notify message was formed
     */
    const STATE_NOTIFIED    = 3;

    /**
     * Generation flag code
     *
     * @var string
     */
    protected $_flagCode    = 'username_generate';
}
