<?php

namespace Setup\Blocks\Setup\Patch\Data;



use Magento\Framework\Setup\Patch\DataPatchInterface;

use Magento\Framework\Setup\Patch\PatchVersionInterface;

use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Cms\Model\BlockFactory;

/**

 * Class ProductRange

 */

class ProductRange implements DataPatchInterface, PatchVersionInterface

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

            'title' => 'Product Range',

            'identifier' => 'footer-product-range',

            'content' => '<div class="footer-product-range">
                            <p class="tittle">Product Range</p>
                            <ul class="product-range links-wrapper">
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
