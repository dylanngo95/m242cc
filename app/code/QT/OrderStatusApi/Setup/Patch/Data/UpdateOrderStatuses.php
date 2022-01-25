<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Sales\Setup\SalesSetupFactory;

/**
 * Class InstallOrderStatusesAndInitialSalesConfig
 * @package Magento\Sales\Setup\Patch
 */
class UpdateOrderStatuses implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private ModuleDataSetupInterface $moduleDataSetup;

    /**
     * @var SalesSetupFactory
     */
    private SalesSetupFactory $salesSetupFactory;

    /**
     * InstallOrderStatusesAndInitialSalesConfig constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param SalesSetupFactory $salesSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        SalesSetupFactory $salesSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->salesSetupFactory = $salesSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function apply()
    {
        /** @var \Magento\Sales\Setup\SalesSetup $salesSetup */
        $salesSetup = $this->salesSetupFactory->create(['setup' => $this->moduleDataSetup]);

        /**
         * Install eav entity types to the eav/entity_type table
         */
        $salesSetup->installEntities();
        /**
         * Install order statuses from config
         */
        $data = [];
        $statuses = [
            'new' => __('New'),
            'waiting_for_confirm' => __('Waiting For Confirm'),
            'checking' => __('Checking'),
            'confirmed' => __('Confirmed'),
            'out_of_stock' => __('Out Of Stock'),
            'change_store' => __('Change Store'),
            'packaging' => __('Packaging'),
            'waiting_for_pickup' => __('Waiting For Pickup'),
            'shipping' => __('Shipping'),
            'delivered' => __('Delivered'),
            'failed_to_delivered' => __('Failed To Delivered'),
            'client_cancel' => __('Client Cancel'),
            'system_cancel' => __('System Cancel'),
            'shipper_cancel' => __('Shipper Cancel'),
        ];
        foreach ($statuses as $code => $info) {
            $data[] = ['status' => $code, 'label' => $info];
        }
        $this->moduleDataSetup->getConnection()->insertArray(
            $this->moduleDataSetup->getTable('sales_order_status'),
            ['status', 'label'],
            $data
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '1.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
