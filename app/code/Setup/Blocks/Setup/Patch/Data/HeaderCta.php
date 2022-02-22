<?php

namespace Setup\Blocks\Setup\Patch\Data;



use Magento\Framework\Setup\Patch\DataPatchInterface;

use Magento\Framework\Setup\Patch\PatchVersionInterface;

use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Cms\Model\BlockFactory;

/**

 * Class HeaderCta

 */

class HeaderCta implements DataPatchInterface, PatchVersionInterface

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
