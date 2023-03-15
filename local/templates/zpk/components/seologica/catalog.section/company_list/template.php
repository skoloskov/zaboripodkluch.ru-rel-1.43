<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);
//$this->addExternalCss('/bitrix/css/main/bootstrap.css');

if (!empty($arResult['NAV_RESULT']))
{
    $navParams =  array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
}
else
{
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
    $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
    $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
    $showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
    {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
    }
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
    {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
    }
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
    'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
    'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
    'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
    'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
    'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
    'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
    'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
    'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
    'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
    'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
    'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
    'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
    'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
    'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
    'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
    'COMPARE_PATH' => $arParams['COMPARE_PATH'],
    'COMPARE_NAME' => $arParams['COMPARE_NAME'],
    'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
    'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
    'LABEL_POSITION_CLASS' => $labelPositionClass,
    'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
    'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
    'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
    '~BASKET_URL' => $arParams['~BASKET_URL'],
    '~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
    '~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
    '~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
    '~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
    'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
    'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
    'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
    'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
    'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
    'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
    'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
    'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

if ($showTopPager)
{
    ?>
    <div data-pagination-num="<?=$navParams['NavNum']?>">
        <!-- pagination-container -->
        <?=$arResult['NAV_STRING']?>
        <!-- pagination-container -->
    </div>
    <?php
}

if ($arParams['HIDE_SECTION_DESCRIPTION'] !== 'Y')
{
    ?>
    <div class="bx-section-desc bx-<?=$arParams['TEMPLATE_THEME']?>">
        <p class="bx-section-desc-post"><?=$arResult['DESCRIPTION']?></p>
    </div>
    <?php
}
?>
<?php
//echo '<pre>'.print_r($arResult['ITEMS'][0], true).'</pre>';die();
?>
<ul class="company__list">
    <?php

    foreach ($arResult['ITEMS'] as $key=>$item)
    {
        //echo '<pre>'.print_r($arResult['MAX_SHOW_COUNTER'], true).'</pre>'; die();
        $uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
        $areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
        $this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
        $this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);
        $logo=CFile::ResizeImageGet($item['DETAIL_PICTURE']['ID'], array('width'=>200, 'height'=>130), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $phone = $item['PROPERTIES']['PHONE']['VALUE'];
        ?>
        <li class="company__item company-content">
            <div class="company-content__left">
                <!-- Шапка контента -->
                <div class="company-content__header">
                    <div class="company-content__block-logo">
                        <a href="<?=$item['DETAIL_PAGE_URL']?>">
                            <img
                                    class="company-content__img company-content__img1 lazyload"
                                    data-src="<?=$logo['src']?>"
                                    alt="<?=$item['NAME']?>"
                                    title="<?=$item['NAME']?>"
                            /></a>
                    </div>
                    <div class="company-content__title-block">
                        <a href="<?=$item['DETAIL_PAGE_URL']?>">
                            <h2 class="company-content__title section__title"><?=$item['NAME']?>
                            </h2></a>
                        <div class="company-content__el">
                            <span class="company-content__title-el"><?=$APPLICATION->GetPageProperty('regionSettings')['UF_NAME'];?></span>
                            <span class="company-content__title-el"
                            ><?=(date('Y') - $item['PROPERTIES']['YEARS']['VALUE'])?> лет на рынке</span
                            >
                            <span class="company-content__title-el"
                            ><?=$item['PROPERTIES']['COMPLETED']['VALUE']?> заборов</span
                            >
                        </div>
                        <div class="company-content__btn-block">
                            <button type="button" class="company-content__phone">
                                <span class="company-content__phone_text">Телефон</span>
                            </button>
                            <a href="tel:<?= str_replace([' ', '-', '(', ')'], '', $phone); ?>" class="company-content__phone-link"><?= str_replace([' ', '-', '(', ')'], '', $phone); ?></a>
                            <button type="button" class="company-content__order modal-order-company">
                                Предложить заказ
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Описание контента -->
                <?php
                $t=strip_tags($item['DETAIL_TEXT']);
                if (mb_strlen($t)>0){
                    $anons = 400;
                    $start = mb_substr($t,0,$anons);
                    $end = mb_substr($t, $anons);

                    ?>
                    <div class="company-content__desc">
                        <p class="company__description">
                            <?=$start?>
                            <a href="<?=$item['DETAIL_PAGE_URL']?>">...</a>
                        </p>
                    </div>
                <?php
                }?>
                <!-- Удобное время для связи -->
                <span class="company__time">
                    <strong>Удобное время для связи:</strong> <?=$item['PROPERTIES']['WORK_TIME']['VALUE']!='' ? $item['PROPERTIES']['WORK_TIME']['VALUE'] : 'с 10.00 до 19.00'?>
                </span>
            </div>
            <!-- Рейтинг и прайс компании -->
            <div class="company-content__right">
                <?php if ($arResult['MAX_SHOW_COUNTER']>0){
                    $stars = ceil(($item['SHOW_COUNTER']/$arResult['MAX_SHOW_COUNTER'])*10/2);

                    ?>
                    <span class="range__title">Рейтинг компании</span>
                    <div class="range__block">
                        <span class="range__number"><?=$stars?></span>
                        <div class="rating" data-value="<?=$stars?>"></div>
                        <?php if (count($item['PROPERTIES']['REVIEWS'])>0){?>
                            <span class="range__comment"><?=count($item['PROPERTIES']['REVIEWS'])?> отзыва</span>
                        <?php
                        }?>
                    </div>
                <?php
                }?>
                <div class="company-content__work">
                    <div class="security__block">
                    <span class="security__el security__contract">Работает по договору</span>
                        <span class="security__el security__guarantee">Дает гарантию</span>
                    </div>
                    <div class="team">
                    <span class="team__block">Свободных бригад:
                      <a class="team__link" href=""><?=$item['PROPERTIES']['COMMANDS']['VALUE']?></a></span>
                    </div>
                </div>

                <div class="company-comment__subtitle">Цены</div>
                <ul class="company-comment__list">
                    <?php
                    $price_count=0;
                    ?>
                    <?php foreach ($item['PROPERTIES']['SERVICES']['VALUE'] as $key=> $value){
                        ?>
                        <li class="company-comment__item">
							<span class="company-comment__el company-comment__desc"><?=$value?></span>
                            <span class="company-comment__el company-comment__price"><?=$item['PROPERTIES']['SERVICES']['DESCRIPTION'][$key]?> руб.</span>
                        </li>
                        <?php
                        $price_count++;
                        if ($price_count>=5)
                            break;

                    }?>

                </ul>
            </div>
            <div class="company-content__bottom">

                <?php if (isset($item['PROPERTIES']['OBJECTS']) && count($item['PROPERTIES']['OBJECTS'])>0) { ?>
                    <div class="company__subtitle">Примеры работ</div>
                    <!-- Slider работ -->
                    <div class="company__photo">
                        <?php //echo '<pre>' . print_r($item['PROPERTIES']['OBJECTS'], true) . '</pre>'; die; ?>
                        <?php $item['PROPERTIES']['OBJECTS'] = array_slice($item['PROPERTIES']['OBJECTS'], 0, 4);  ?>
                        <?php foreach ($item['PROPERTIES']['OBJECTS'] as $object){
                            $img = CFile::ResizeImageGet($object['PROPERTIES']['PHOTO']['VALUE'][0], array('width'=>200, 'height'=>150), BX_RESIZE_IMAGE_EXACT , true);
                            ?>
                            <div class="company__photo_item">
                                <a href="<?=$object['DETAIL_PAGE_URL']?>">
                                    <img class="photo_item__img" src="<?=$img['src']?>" alt="" title="<?=$object['NAME']?>" width="200px" height="150px"/>
                                    <span class="photo_item__desc"><?=$object['NAME']?></span>
                                    <span class="photo_item__price"><?=$object['PROPERTIES']['PRICE']['VALUE']?></span>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </li>
        <?php

    }
    ?>
</ul>

<!-- component-end -->