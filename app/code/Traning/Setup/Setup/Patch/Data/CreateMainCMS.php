<?php

namespace Traning\Setup\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Store\Model\Store;

/**
 * Class CreateMainCMS
 * @package Traning\Setup\Setup\Patch\Data
 */
class CreateMainCMS implements DataPatchInterface
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
     * @var Store
     */
    private $store;
    /**
     * AddAccessViolationPageAndAssignB2CCustomers constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PageFactory $blockFactory
     * @param BlockRepositoryInterface $blockRepository
     * @param Store $store
     */

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory             $blockFactory,
        BlockRepositoryInterface $blockRepository,
        Store $store
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
        $this->blockRepository = $blockRepository;
        $this->store = $store;
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
                'title' => 'Main banner',
                'identifier' => 'main-banner',
                'content' => '<style>#html-body [data-pb-style=G5FKIC2]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=GUYR36Y],#html-body [data-pb-style=H6A6QFA]{min-height:300px}#html-body [data-pb-style=U8BX9VA]{background-position:center top;background-size:cover;background-repeat:no-repeat;min-height:300px}#html-body [data-pb-style=GU6D9WR]{background-color:transparent}#html-body [data-pb-style=AF7OU6U]{opacity:1;visibility:visible}#html-body [data-pb-style=ST4GWHG]{min-height:300px}#html-body [data-pb-style=GMLHA3P]{background-position:center top;background-size:cover;background-repeat:no-repeat;min-height:300px}#html-body [data-pb-style=Q6CVBGG]{background-color:transparent}#html-body [data-pb-style=PO0ML7I]{opacity:1;visibility:visible}#html-body [data-pb-style=IQ8CJI1]{min-height:300px}#html-body [data-pb-style=N31SU8Q]{background-position:center top;background-size:cover;background-repeat:no-repeat;min-height:300px}#html-body [data-pb-style=P52OYB9]{background-color:transparent}#html-body [data-pb-style=C38QCR8]{opacity:1;visibility:visible}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="G5FKIC2"><div class="pagebuilder-slider" data-content-type="slider" data-appearance="default" data-autoplay="false" data-autoplay-speed="4000" data-fade="false" data-infinite-loop="false" data-show-arrows="false" data-show-dots="true" data-element="main" data-pb-style="GUYR36Y"><div data-content-type="slide" data-slide-name="" data-appearance="collage-left" data-show-button="always" data-show-overlay="never" data-element="main" data-pb-style="H6A6QFA"><div data-element="empty_link"><div class="pagebuilder-slide-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/bg.jpg}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/mob-bg.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="U8BX9VA"><div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay" data-pb-style="GU6D9WR"><div class="pagebuilder-collage-content"><div data-element="content"><h4>spring / summer 2021</h4><h1>Sale 30%</h1><h1>Off everything</h1><p>Lorem ipsum dolor sit amet consectetuer adipiscing elit aenean commodo ligula eget dolor.</p></div><button type="button" class="pagebuilder-slide-button pagebuilder-button-primary" data-element="button" data-pb-style="AF7OU6U">shop now</button></div></div></div></div></div><div data-content-type="slide" data-slide-name="" data-appearance="collage-left" data-show-button="always" data-show-overlay="never" data-element="main" data-pb-style="ST4GWHG"><div data-element="empty_link"><div class="pagebuilder-slide-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/bg.jpg}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/mob-bg.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="GMLHA3P"><div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay" data-pb-style="Q6CVBGG"><div class="pagebuilder-collage-content"><div data-element="content"><h4>spring / summer 2021</h4><h1>Sale 30%</h1><h1>Off everything</h1><p>Lorem ipsum dolor sit amet consectetuer adipiscing elit aenean commodo ligula eget dolor.</p></div><button type="button" class="pagebuilder-slide-button pagebuilder-button-primary" data-element="button" data-pb-style="PO0ML7I">shop now</button></div></div></div></div></div><div data-content-type="slide" data-slide-name="" data-appearance="collage-left" data-show-button="always" data-show-overlay="never" data-element="main" data-pb-style="IQ8CJI1"><div data-element="empty_link"><div class="pagebuilder-slide-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/bg.jpg}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/mob-bg.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="N31SU8Q"><div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay" data-pb-style="P52OYB9"><div class="pagebuilder-collage-content"><div data-element="content"><h4>spring / summer 2021</h4><h1>Sale 30%</h1><h1>Off everything</h1><p>Lorem ipsum dolor sit amet consectetuer adipiscing elit aenean commodo ligula eget dolor.</p></div><button type="button" class="pagebuilder-slide-button pagebuilder-button-primary" data-element="button" data-pb-style="C38QCR8">shop now</button></div></div></div></div></div></div></div></div>',
                'is_active' => 1,
                'stores' => Store::DEFAULT_STORE_ID
            ]
        ]);
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'Subscribe block',
                'identifier' => 'subscribe-block',
                'content' => '<style>#html-body [data-pb-style=HPTDFU8]{justify-content:center;display:flex;flex-direction:column;background-position:center top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}</style><div class="subscribe-row" data-content-type="row" data-appearance="full-width" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="main" data-pb-style="HPTDFU8"><div class="row-full-width-inner" data-element="inner"><div data-content-type="html" data-appearance="default" data-element="main"><div class="subscribe-info"><h2 class="title"><span class="special">{{trans "Subscribe"}}</span>{{trans " for our newsletter"}}</h2><span class="subscribe-text">{{trans "Subscribe to the email newsletter and stay up to date with all our latest news"}}</span></div></div></div></div>',
                'is_active' => 1,
                'stores' => Store::DEFAULT_STORE_ID
            ]
        ]);
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'Advances block',
                'identifier' => 'advances-block',
                'is_active' => 1,
                'content' => '<style>#html-body [data-pb-style=GAR41FB]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="GAR41FB"><div data-content-type="html" data-appearance="default" data-element="main"><div class="advances-wrapper"><div class="advance-item"><div class="advance-icon-wrapper"><span class="advance-icon icon-vector"></span></div><div class="advance-text-wrapper"><span class="advance-title">{{trans "Free Delivery"}}</span><span class="advance-condition">{{trans "For all order over €200"}}</span></div></div><div class="advance-item"><div class="advance-icon-wrapper"><span class="advance-icon icon-wallet"></span></div><div class="advance-text-wrapper"><span class="advance-title">{{trans "30 Days Return"}}</span><span class="advance-condition">{{trans "If goods have problems"}}</span></div></div><div class="advance-item"><div class="advance-icon-wrapper"><span class="advance-icon icon-finance"></span></div><div class="advance-text-wrapper"><span class="advance-title">{{trans "Secure Payment"}}</span><span class="advance-condition">{{trans "Payment upon receipt after verification"}}</span></div></div><div class="advance-item"><div class="advance-icon-wrapper"><span class="advance-icon icon-group"></span></div><div class="advance-text-wrapper"><span class="advance-title">{{trans "24/7 Support"}}</span><span class="advance-condition">{{trans "Delicated support"}}</span></div></div></div></div></div></div>',
                'stores' => Store::DEFAULT_STORE_ID
            ]
        ]);
        $blocks[] = $this->blockFactory->create([
            'data' => [
                'title' => 'Promo block',
                'identifier' => 'promo-block',
                'is_active' => 1,
                'content' => '<style>#html-body [data-pb-style=MCC59GR]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=Q18V29O],#html-body [data-pb-style=TSIYI5B]{justify-content:center;display:flex;flex-direction:column;background-position:center top;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=Q18V29O]{background-color:rgba(176,127,255,.8);background-size:cover}#html-body [data-pb-style=TSIYI5B]{background-size:contain}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="MCC59GR"><div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="12" data-element="main"><div class="pagebuilder-column promo-column promo-column-1" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="Q18V29O"><div data-content-type="html" data-appearance="default" data-element="main">&lt;a class="promo-item promo-link-1" href="#"&gt;&lt;div class="promo-item-wrapper"&gt;&lt;/div&gt;&lt;div class="promo-text-wrapper"&gt;&lt;span class="promo-text"&gt;{{trans "up to"}}&lt;/span&gt;&lt;span class="promo-text promo-text-special"&gt;{{trans " 30% off"}}&lt;/span&gt;&lt;span class="promo-text"&gt;{{trans " in everything"}}&lt;/span&gt;&lt;/div&gt;&lt;/a&gt;</div></div><div class="pagebuilder-column promo-column promo-column-2" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="TSIYI5B"><div data-content-type="html" data-appearance="default" data-element="main">&lt;div class="promo-items-wrapper"&gt;&lt;a class="promo-item promo-link-2" href="#"&gt;&lt;div class="promo-item-wrapper"&gt;&lt;/div&gt;&lt;div class="promo-text-wrapper"&gt;&lt;span class="promo-text"&gt;{{trans "many"}}&lt;/span&gt;&lt;span class="promo-text promo-text-special"&gt;{{trans " products"}}&lt;/span&gt;&lt;span class="promo-text"&gt;{{trans " for mens"}}&lt;/span&gt;&lt;/div&gt;&lt;/a&gt;&lt;a  class="promo-item promo-link-3" href="#"&gt;&lt;div class="promo-item-wrapper"&gt;&lt;/div&gt;&lt;div class="promo-text-wrapper"&gt;&lt;span class="promo-text"&gt;{{trans "beautiful"}}&lt;/span&gt;&lt;span class="promo-text promo-text-special"&gt;{{trans " women dress"}}&lt;/span&gt;&lt;span class="promo-text"&gt;{{trans " collection"}}&lt;/span&gt;&lt;/div&gt;&lt;/a&gt;</div></div></div></div></div>',
                'stores' => Store::DEFAULT_STORE_ID
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
