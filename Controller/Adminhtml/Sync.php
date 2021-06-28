<?php
/**
 * SWe GmbH - Switzerland
 *
 * @author      Sylvain Rayé <support at SWe.com>
 * @category    SWe
 * @package     SWe_
 * @copyright   Copyright (c) 2011-2016 SWe (http://www.SWe.com)
 */

namespace SWe\Username\Controller\Adminhtml;

abstract class Sync extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_USERNAME_RESOURCE = 'SWe_Username::config_username';

    /**
     * Return file storage singleton
     *
     * @return \SWe\Username\Model\Generate\Flag
     */
    protected function _getSyncSingleton()
    {
        return $this->_objectManager->get('SWe\Username\Model\Generate\Flag');
    }

    /**
     * Return synchronize process status flag
     *
     * @return \SWe\Username\Model\Generate\Flag
     */
    protected function _getSyncFlag()
    {
        return $this->_getSyncSingleton()->loadSelf();
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_USERNAME_RESOURCE);
    }
}
