<?php

declare(strict_types=1);

namespace QT\CustomProductAttribute\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

/**
 * Class UpdateProductAttributes
 */
class UpdateProductAttributes implements DataPatchInterface, PatchVersionInterface
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
     * @return UpdateProductAttributes|void
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Zend_Validate_Exception
     */
    public function apply()
    {
        /** @var CategorySetup $categorySetup */
        $categorySetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);

        $categorySetup->getDefaultAttributeSetId(Product::ENTITY);
        $this->addProductAttribute($categorySetup);
        $this->addGuaranteeGroup($categorySetup);
    }

    /**
     * AddProductAttribute.
     *
     * @param CategorySetup $categorySetup
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Zend_Validate_Exception
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function addProductAttribute(CategorySetup $categorySetup): void
    {
        $categorySetup->addAttribute(
            Product::ENTITY,
            'other_name',
            [
                'type' => 'varchar',
                'label' => 'Other Name',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'searchable' => false,
                'filterable' => false,
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
            'parent_sku',
            [
                'type' => 'varchar',
                'label' => 'Parent SKU',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'visible' => true,
                'used_in_product_listing' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'brand',
            [
                'type' => 'varchar',
                'label' => 'Brand',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'visible' => true,
                'searchable' => false,
                'used_in_product_listing' => false,
                'visible_in_advanced_search' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'trademark',
            [
                'type' => 'varchar',
                'label' => 'Trademark',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Product Details',
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'visible' => true,
                'searchable' => false,
                'used_in_product_listing' => false,
                'visible_in_advanced_search' => false,
                'apply_to' => '',
                'backend' => '',
                'frontend' => ''
            ]
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'barcode',
            [
                'type' => 'varchar',
                'label' => 'Barcode',
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
            'wholesale_price',
            [
                'type' => 'decimal',
                'label' => 'Wholesale Price',
                'input' => 'price',
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
            'old_price',
            [
                'type' => 'decimal',
                'label' => 'Old Price',
                'input' => 'price',
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
            'unit',
            [
                'type' => 'varchar',
                'label' => 'Unit',
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
            'vat',
            [
                'type' => 'decimal',
                'label' => 'Vat',
                'input' => 'price',
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
     * AddGuaranteeGroup.
     *
     * @param CategorySetup $categorySetup
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Zend_Validate_Exception
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function addGuaranteeGroup(CategorySetup $categorySetup): void
    {
        $attributeSetId = $categorySetup->getDefaultAttributeSetId(Product::ENTITY);

        // Guarantee Group
        $categorySetup->addAttributeGroup(
            Product::ENTITY,
            $attributeSetId,
            'Guarantee',
            20
        );

        $categorySetup->addAttribute(
            Product::ENTITY,
            'origin',
            [
                'type' => 'varchar',
                'label' => 'Origin',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Guarantee',
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
            'warranty_address',
            [
                'type' => 'varchar',
                'label' => 'Warranty Address',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Guarantee',
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
            'warranty_phone_number',
            [
                'type' => 'varchar',
                'label' => 'Warranty Phone Number',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Guarantee',
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
            'remaining_warranty_month',
            [
                'type' => 'int',
                'label' => 'Remaining Warranty Month',
                'input' => 'text',
                'required' => false,
                'unique' => false,
                'sort_order' => 100,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Guarantee',
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
            'warranty_comment',
            [
                'type' => 'varchar',
                'label' => 'Warranty Comment',
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
