<?php

declare(strict_types=1);

namespace Setup\Blocks\Setup\Patch\Data;

use Magento\Catalog\Helper\DefaultCategory;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\CategoryRepository;
use Magento\Framework\App\State;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\Store;
use Magento\Store\Model\StoreManager;

/**
 * Class CustomMenu
 *
 * Create Categories
 */
class CustomMenu implements DataPatchInterface
{
    /**
     * @var StoreManager
     */
    private $storeManager;

    /**
     * @var DefaultCategory
     */
    private $defaultCategoryHelper;

    /**
     * @var CategoryFactory
     */
    private $categoryFactory;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var State
     */
    private $state;

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @param StoreManager             $storeManager
     * @param DefaultCategory          $defaultCategoryHelper
     * @param CategoryFactory          $categoryFactory
     * @param CategoryRepository       $categoryRepository
     * @param State                    $state
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        StoreManager $storeManager,
        DefaultCategory $defaultCategoryHelper,
        CategoryFactory $categoryFactory,
        CategoryRepository $categoryRepository,
        State $state,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->storeManager = $storeManager;
        $this->defaultCategoryHelper = $defaultCategoryHelper;
        $this->categoryFactory = $categoryFactory;
        $this->categoryRepository = $categoryRepository;
        $this->state = $state;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $parentId = $this->defaultCategoryHelper->getId();

        $data = [
            [
                'parent_id' => $parentId,
                'name'            => 'Home',
                'url_key'         => 'home',
                'is_active'          => 1,
                'is_anchor'       => 1,
                'include_in_menu' => 1,
                'display_mode'    => Category::DM_PAGE,
                'position'        => '1',
                'page_layout'     => '',
                'custom_layout_update' => ''
            ],

            [
                'parent_id' => $parentId,
                'name'            => 'Catalog',
                'url_key'         => 'catalog',
                'is_active'          => 1,
                'is_anchor'       => 1,
                'include_in_menu' => 1,
                'display_mode'    => Category::DM_PAGE,
                'position'        => '1',
                'page_layout'     => '',
                'custom_layout_update' => ''
            ],

            [
                'parent_id' => $parentId,
                'name'            => 'For Her',
                'url_key'         => 'for-her',
                'is_active'          => 1,
                'is_anchor'       => 1,
                'include_in_menu' => 1,
                'display_mode'    => Category::DM_PAGE,
                'position'        => '1',
                'page_layout'     => '',
                'custom_layout_update' => ''
            ],

            [
                'parent_id' => $parentId,
                'name'            => 'For Him',
                'url_key'         => 'for-him',
                'is_active'          => 1,
                'is_anchor'       => 1,
                'include_in_menu' => 1,
                'display_mode'    => Category::DM_PAGE,
                'position'        => '1',
                'page_layout'     => '',
                'custom_layout_update' => ''
            ],

            [
                'parent_id' => $parentId,
                'name'            => 'Blog',
                'url_key'         => 'blog',
                'is_active'          => 1,
                'is_anchor'       => 1,
                'include_in_menu' => 1,
                'display_mode'    => Category::DM_PAGE,
                'position'        => '1',
                'page_layout'     => '',
                'custom_layout_update' => ''
            ],


            [    'parent_id' => $parentId,
                'name'            => 'About Us',
                'url_key'         => 'about-us',
                'is_active'          => 1,
                'is_anchor'       => 1,
                'include_in_menu' => 1,
                'display_mode'    => Category::DM_PAGE,
                'position'        => '1',
                'page_layout'     => '',
                'custom_layout_update' => ''
            ]

        ];

        /** @var Category $category */
        $category = $this->categoryFactory->create();
        $this->state->setAreaCode('adminhtml');
        $store = $this->storeManager->getStore(Store::ADMIN_CODE);

        foreach ($data as $row) {
            $category = $category->loadByAttribute('url_key', $row['url_key']);

            if (!$category) {
                $this->storeManager->setCurrentStore($store->getCode());
                /** @var Category $category */
                $category = $this->categoryFactory->create();
                $category->setData($row)->setAttributeSetId($category->getDefaultAttributeSetId());
                $this->categoryRepository->save($category);
            }
        }

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getAliases(): array
    {
        return [];
    }
}
