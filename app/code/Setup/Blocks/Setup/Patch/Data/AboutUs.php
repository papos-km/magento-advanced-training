<?php

namespace Setup\Blocks\Setup\Patch\Data;



use Magento\Framework\Setup\Patch\DataPatchInterface;

use Magento\Framework\Setup\Patch\PatchVersionInterface;

use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Cms\Model\BlockFactory;

/**

 * Class AboutUs

 */

class AboutUs implements DataPatchInterface, PatchVersionInterface

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

        $newCmsStaticBlock = [

            'title' => 'About Us',

            'identifier' => 'footer-about-us',

            'content' => ' <div class="footer-about-us">
                                <p class="tittle">About us</p>
                                <ul class="about-us links-wrapper">
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



        $this->moduleDataSetup->startSetup();



        /** @var \Magento\Cms\Model\Block $block */

        $block = $this->blockFactory->create();

        $block->setData($newCmsStaticBlock)->save();



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
