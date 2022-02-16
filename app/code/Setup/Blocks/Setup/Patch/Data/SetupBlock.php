<?php

namespace Setup\Blocks\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;

/**
 * Class SetupBlock
 */

class SetupBlock implements DataPatchInterface, PatchVersionInterface

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
     * AddAccessViolationPageAndAssignB2CCustomers constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PageFactory $blockFactory
     */

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory
    ) {

        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;

    }

    /**
     * {@inheritdoc}
     */

    public function apply()
    {
        $loremIpsum = [
            'title' => 'Footer Lorem Ipsum',
            'identifier' => 'footer-lorem-ipsum',
            'content' => ' <div class="footer-lorem-ipsum footer-link-block">
                                <p class="tittle">Lorem Ipsum</p>
                                 <ul class="product-range footer-links-wrapper">
                                    <li class="link-item">
                                        <a href="#" class="footer-link">Dolor sit</a>
                                    </li>
                                    <li class="link-item">
                                        <a href="#" class="footer-link">Consectetur</a>
                                    </li>
                                    <li class="link-item">
                                        <a href="#" class="footer-link">Adipiscing elit</a>
                                    </li>
                                    <li class="link-item">
                                        <a href="#" class="footer-link">Sit amet</a>
                                    </li>
                                </ul>
                            </div>',
            'is_active' => 1,
            'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
        ];

        $productRange = [
            'title' => 'Product Range',
            'identifier' => 'footer-product-range',
            'content' => '<div class="footer-product-range footer-link-block">
                            <p class="tittle">Product Range</p>
                            <ul class="product-range footer-links-wrapper">
                                <li class="link-item">
                                    <a href="#" class="footer-link">For Him</a>
                                </li>
                                <li class="link-item">
                                    <a href="#" class="footer-link">For Her</a>
                                </li>
                                <li class="link-item">
                                    <a href="#" class="footer-link">For Kids</a>
                                </li>
                                <li class="link-item">
                                    <a href="#" class="footer-link">Bags</a>
                                </li>
                            </ul>
                        </div>',
            'is_active' => 1,
            'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
        ];

        $footerAboutUs = [
            'title' => 'About Us',
            'identifier' => 'footer-about-us',
            'content' => ' <div class="footer-about-us footer-link-block">
                                <p class="tittle">About us</p>
                                <ul class="about-us footer-links-wrapper">
                                    <li class="link-item">
                                        <a href="#" class="footer-link">About Us</a>
                                    </li>
                                    <li class="link-item">
                                        <a href="#" class="footer-link">Delivery and Returns</a>
                                    </li>
                                    <li class="link-item">
                                        <a href="#" class="footer-link">Our Brands</a>
                                    </li>
                                    <li class="link-item">
                                        <a href="#" class="footer-link">Blog</a>
                                    </li>
                                    <li class="link-item">
                                        <a href="#" class="footer-link">News</a>
                                    </li>
                                </ul>
                            </div>',

            'is_active' => 1,
            'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
        ];

        $FooterCta = [
            'title' => 'Footer Cta Block',
            'identifier' => 'footer-cta',
            'content' => '<div class="footer-cta">
                                <ul class="social-links">
                                    <li class="social-item">
                                    <a class="linkendin" src="#"><i class="zmdi zmdi-linkedin"></i></a>
                                    </li>
                                    <li class="social-item">
                                    <a class="facebook" src="#"><i class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li class="social-item">
                                    <a class="twitter" src="#"><i class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li class="social-item">
                                    <a class="instagram" src="#"><i class="zmdi zmdi-instagram"></i></a>
                                    </li>
                                </ul>
                                <div class="footer-contact-us">
                                    <p class="contact-us-text">
                                        Need help? Contact us now: <span class="number">01 234 567</span>
                                    </p>
                                    <a href="tel:+01 234 567" class="call-now">Call Now</a>
                                </div>
                            </div>',

            'is_active' => 1,
            'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
        ];

        $headerCta = [
            'title' => 'Header Cta Block',
            'identifier' => 'header-cta',
            'content' => '<div class="header-cta">
                            <ul class="social-links">
                                <li class="social-item">
                                <a class="linkendin" src="#"><i class="zmdi zmdi-linkedin"></i></a>
                                </li>
                                <li class="social-item">
                                <a class="facebook" src="#"><i class="zmdi zmdi-facebook"></i></a>
                                </li>
                                <li class="social-item">
                                <a class="twitter" src="#"><i class="zmdi zmdi-twitter"></i></a>
                                </li>
                                <li class="social-item">
                                <a class="instagram" src="#"><i class="zmdi zmdi-instagram"></i></a>
                                </li>
                            </ul>
                            <div class="header-contact-us">
                                <p class="contact-us-text">
                                    Need help? Contact us now: <span class="number">01 234 567</span>
                                    <a href="tel:+01 234 567" class="call-now"><i class="zmdi zmdi-phone"></i></a>
                                </p>
                            </div>
                        </div>',

            'is_active' => 1,
            'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
        ];

        $this->moduleDataSetup->startSetup();

        /** @var \Magento\Cms\Model\Block $block */
        $block = $this->blockFactory->create();
        $block->setData($loremIpsum)->save();
        $block->setData($productRange)->save();
        $block->setData($footerAboutUs)->save();
        $block->setData($FooterCta)->save();
        $block->setData($headerCta)->save();

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

    public static function getVersion()
    {
        return '2.0.0';
    }

    /**
     * {@inheritdoc}
     */

    public function getAliases()
    {
        return [];
    }

}
