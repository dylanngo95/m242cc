<?php

declare(strict_types=1);

namespace QT\CustomProductAttribute\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Eav\Model\Entity\Attribute\Backend\Datetime;

/**
 * Class UpdateProductAttributesPatch
 */
class UpdateProductAttributesPatch implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var CategorySetupFactory
     */
    private $categorySetupFactory;

    /**
     * PatchInitial constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param CategorySetupFactory $categorySetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CategorySetupFactory $categorySetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->categorySetupFactory = $categorySetupFactory;
    }

    /**
     * Apply.
     *
     * @return void|UpdateProductAttributesPatch
     * @throws LocalizedException
     * @throws \Zend_Validate_Exception
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function apply()
    {
        /** @var CategorySetup $categorySetup */
        $categorySetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);

        $categorySetup->getDefaultAttributeSetId(Product::ENTITY);

        $categorySetup->addAttribute(
            Product::ENTITY,
            'sale_status',
            [
                'type' => 'varchar',
                'label' => 'Sale Status',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'filterable' => false,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => true,
                'used_in_product_listing' => true,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );
        $categorySetup->addAttribute(
            Product::ENTITY,
            'provider',
            [
                'type' => 'varchar',
                'label' => 'Provider',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => true,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'used_in_product_listing' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'expired_date',
            [
                'type' => 'datetime',
                'label' => 'Expired Date',
                'input' => 'date',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'backend' => Datetime::class,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => '',
                'group' => 'Product Details',
                'filterable' => false,
                'comparable' => false,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'product_level',
            [
                'type' => 'int',
                'label' => 'Product Level',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => true,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'used_in_product_listing' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'seo_keyword',
            [
                'type' => 'varchar',
                'label' => 'SEO Keyword',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => true,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'used_in_product_listing' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'product_position',
            [
                'type' => 'varchar',
                'label' => 'Product Position',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => true,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'used_in_product_listing' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'internal_category',
            [
                'type' => 'varchar',
                'label' => 'Internal Category',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => false,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'used_in_product_listing' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'import_price',
            [
                'type' => 'decimal',
                'label' => 'Import Price',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => true,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'used_in_product_listing' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'size',
            [
                'type' => 'varchar',
                'label' => 'Size',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => true,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'used_in_product_listing' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}
