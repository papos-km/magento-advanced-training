<?php


namespace Traning\Setup\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Api\BlockRepositoryInterface;

/**
 * Class CreateCmsBlocks
 * @package Traning\Setup\Setup\Patch\Data
 */
class CreateCmsBlocks implements DataPatchInterface

{
    /**
     * @var ModuleDataSetupInterface
     */

    private $moduleDataSetup;


    /**
     * @var BlockFactory
     */

    private $blockFactory;

    /**
     * @var BlockRepositoryInterface
     */

    private $blockRepository;


    /**
     * AddAccessViolationPageAndAssignB2CCustomers constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PageFactory $blockFactory
     * @param BlockRepositoryInterface $blockRepository
     */

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory             $blockFactory,
        BlockRepositoryInterface $blockRepository
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
        $this->blockRepository = $blockRepository;
    }


    /**
     * {@inheritdoc}
     */

    public function apply()
    {
        $blocks = [];
        /** @var BlockInterface $block */
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'Social link',
                'identifier' => 'social-block',
                'content' => '<div class="social-wrapper">
                                <ul class="social-list">
                                    <li>
                                        <span class="social">
                                            <a href="https://www.linkedin.com/">
                                                <span class="zmdi zmdi-linkedin"></span>
                                            </a>
                                        </span>
                                    </li>
                                     <li>
                                        <span class="social">
                                            <a href="https://www.facebook.com/">
                                                <span class="zmdi zmdi-facebook"></span>
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="social">
                                            <a href="https://www.twitter.com/">
                                                <span class="zmdi zmdi-twitter"></span>
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="social">
                                            <a href="https://www.instagram.com/">
                                               <span class="zmdi zmdi-instagram"></span>
                                            </a>
                                        </span>
                                    </li>
                                </ul>
                          </div>',
                'is_active' => 1,
                'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
            ]
        ]);
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'Top contacts',
                'identifier' => 'header-block-contact',
                'content' => '<div class="contact-phone">
                                    <span class="contact-text">{{trans "Need help? Contact us now:"}}</span>
                                    <a class="phone-number" href="{{store url="tel:123-456-7890"}}">123-456-7890 <span class="zmdi zmdi-phone"></span></a>
                                </div>',
                'is_active' => 1,
                'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
            ]
        ]);
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'Footer contact block',
                'identifier' => 'footer-block-contact',
                'content' => '<div class="footer-phone-contact">
                                <span class="footer-contact-text">{{trans "Need help? Contact us now:"}}</span>
                                <span class="contact-number">01 234 567</span>
                                    <a class="btn call-btn" href="{{store url="tel:01 234 567"}}">
                                        <span>{{trans "Call now"}}</span>
                                    </a>
                        </div>',
                'is_active' => 1,
                'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
            ]
        ]);
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'About us',
                'identifier' => 'footer-block-2',
                'content' => '<div class="footer-links-wrapper">
                                   <div class="footer-links-title">
                                        <span class="title">{{trans "About Us"}}</span>
                                   </div>
                                   <ul class="footer links">
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "About Us"}}</span>
                                                </a>
                                        </li>
                                         <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "Delivery and Returns"}}</span>
                                                </a>
                                        </li>
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "Our Brands"}}</span>
                                                </a>
                                        </li>
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "Blog"}}</span>
                                                </a>
                                        </li>
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "News"}}</span>
                                                </a>
                                        </li>
                                    </ul>
                               </div>',
                'is_active' => 1,
                'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
            ]
        ]);
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'Product range',
                'identifier' => 'footer-block-3',
                'content' => '<div class="footer-links-wrapper">
                                   <div class="footer-links-title">
                                        <span class="title">{{trans "Product range"}}</span>
                                   </div>
                                   <ul class="footer links">
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "For Him"}}</span>
                                                </a>
                                        </li>
                                         <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "For Her"}}</span>
                                                </a>
                                        </li>
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "For kids"}}</span>
                                                </a>
                                        </li>
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "Bags"}}</span>
                                                </a>
                                        </li>
                                    </ul>
                               </div>',
                'is_active' => 1,
                'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
            ]
        ]);
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'Lorem ipsum',
                'identifier' => 'footer-block-4',
                'content' => '<div class="footer-links-wrapper">
                                   <div class="footer-links-title">
                                        <span class="title">{{trans "Lorem ipsum"}}</span>
                                   </div>
                                   <ul class="footer links">
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "Dolor sit"}}</span>
                                                </a>
                                        </li>
                                         <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "Consectetur"}}</span>
                                                </a>
                                        </li>
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "Adipiscing elit"}}</span>
                                                </a>
                                        </li>
                                        <li class="nav item">
                                                <a href="{{store url="#"}}">
                                                    <span>{{trans "Sit amet"}}</span>
                                                </a>
                                        </li>
                                    </ul>
                               </div>',
                'is_active' => 1,
                'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
            ]
        ]);


        $this->moduleDataSetup->startSetup();
        foreach ($blocks as $block) {
            $this->blockRepository->save($block);
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
