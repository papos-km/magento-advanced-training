<?php

declare(strict_types = 1);

namespace Traning\Setup\Setup\Patch\Data;

use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\ResourceModel\Category;
use Magento\Framework\Event\ManagerInterface;

use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Framework\Setup\Patch\DataPatchInterface;

use Magento\Store\Model\GroupFactory;
use Magento\Store\Model\ResourceModel\Group;

use Magento\Store\Model\ResourceModel\Store;
use Magento\Store\Model\ResourceModel\Website;

use Magento\Store\Model\StoreFactory;
use Magento\Store\Model\WebsiteFactory;

class CreateNewStore implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var WebsiteFactory
     */
    private $websiteFactory;
    /**
     * @var Website
     */
    private $websiteResourceModel;
    /**
     * @var Store
     */
    private $storeViewResourceModel;
    /**
     * @var Group
     */
    private $groupResourceModel;
    /**
     * @var StoreFactory
     */
    private $storeViewFactory;
    /**
     * @var GroupFactory
     */
    private $groupFactory;
    /**
     * @var ManagerInterface
     */
    private $eventManager;
    /**
     * @var CategoryFactory
     */
    private $categoryFactory;
    /**
     * @var Category
     */
    private $categoryResourceModel;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param WebsiteFactory $websiteFactory
     * @param Website $websiteResourceModel
     * @param Store $storeViewResourceModel
     * @param Group $groupResourceModel
     * @param StoreFactory $storeViewFactory
     * @param GroupFactory $groupFactory
     * @param CategoryFactory $categoryFactory
     * @param Category $categoryResourceModel
     * @param ManagerInterface $eventManager
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        WebsiteFactory $websiteFactory,
        Website $websiteResourceModel,
        Store $storeViewResourceModel,
        Group $groupResourceModel,
        StoreFactory $storeViewFactory,
        GroupFactory $groupFactory,
        CategoryFactory $categoryFactory,
        Category $categoryResourceModel,
        ManagerInterface $eventManager
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->websiteFactory = $websiteFactory;
        $this->websiteResourceModel = $websiteResourceModel;
        $this->storeViewResourceModel = $storeViewResourceModel;
        $this->groupResourceModel = $groupResourceModel;
        $this->storeViewFactory = $storeViewFactory;
        $this->groupFactory = $groupFactory;
        $this->eventManager = $eventManager;
        $this->categoryFactory = $categoryFactory;
        $this->categoryResourceModel = $categoryResourceModel;
    }

    /**
     * {@inheritdoc}
     * @throws AlreadyExistsException
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $website = $this->websiteFactory->create();
        $website->load('usa_website_1');
        if (!$website->getId()) {
            $website->setCode('usa_website_1');
            $website->setName('USA Website');
            $this->websiteResourceModel->save($website);
        }

        $category = $this->categoryFactory->create();
        $category->setName("USA Catalogue");
        $category->setIsActive(true);
        $category->setUrlKey("usanow1");
        $this->categoryResourceModel->save($category);

        if ($website->getId()) {
            $group = $this->groupFactory->create();
            $group->setWebsiteId($website->getWebsiteId());
            $group->setRootCategoryId($category->getId());
            $group->setName('USA Store');
            $group->setCode("usa_store_group_1");
            $this->groupResourceModel->save($group);
            $website->setDefaultGroupId($group->getId());
            $this->websiteResourceModel->save($website);
        }

        $store = $this->storeViewFactory->create();
        $store->load('usa_store_en');
        if (!$store->getId()) {
            $store->setCode('usa_store_en_1');
            $store->setName('English');
            $store->setWebsite($website);
            $store->setIsDefault(true);
            $store->setGroupId($group->getId());
            $store->setData('is_active', '1');
            $this->storeViewResourceModel->save($store);
        }

        $this->moduleDataSetup->endSetup();
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
    public function getAliases()
    {
        return [];
    }
}
