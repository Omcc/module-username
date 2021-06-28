<?php
/**
 * SWe GmbH - Switzerland
 *
 * @author      Sylvain Rayé <support at SWe.com>
 * @category    SWe
 * @package     SWe_Username
 * @copyright   Copyright (c) 2011-2016 SWe (http://www.SWe.com)
 */

namespace SWe\Username\Setup;

use Magento\Customer\Model\Customer;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Eav\Setup\EavSetup;

/**
 * Class Uninstall
 */
class Uninstall implements \Magento\Framework\Setup\UninstallInterface
{
    /**
     * @var EavSetup
     */
    private $eavSetup;

    /**
     * InstallSchema constructor.
     */
    public function __construct(
        EavSetup $eavSetup
    ){
        $this->eavSetup = $eavSetup;
    }

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $this->eavSetup->removeAttribute(Customer::ENTITY, 'username');

        $setup->getConnection()->dropColumn($setup->getTable('customer_grid_flat'), 'username');
        $setup->getConnection()->dropColumn($setup->getTable('quote'), 'customer_username');
        $setup->getConnection()->dropColumn($setup->getTable('sales_order'), 'customer_username');

        $setup->endSetup();
    }
}