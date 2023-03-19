<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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


?>
<section class="section-page">
	<div class="container section-page__container">
        <div class="tender_list">
            <?
                function get_lost_num($num){
                $str_num = (string)$num;
                $str_num_count = strlen($str_num) - 1;
                return $str_num[$str_num_count];
                }
            ?>
            <? foreach ($arResult['ITEMS'] as $item)
            {
                //echo '<pre>'.print_r($item, true).'</pre>';die();
                ?>
            <div class="tender_list__item">
                <div class="tender_list__item_title">
                    <a href="<?= $item['DETAIL_PAGE_URL'] ?>"><h3><?= $item['NAME'] ?></h3></a>
                    <!-- div class="tender_list__item_articul"><span>артикул: </span>TN-<?= $item['ID'] ?></div -->
                </div>
                <div class="tender_list__item_description">
                    <div class="tender_list__item_city"><span>Населенный пункт: </span><?= $item['PROPERTIES']['PLACE_FENCE']['VALUE'] ?></div>
                    <div class="tender_list__item_jstat"><?= $item['PROPERTIES']['CUSTOMER_TYPE']['VALUE'] ?></div>
                    <div class="tender_list__item_make_date"><span>Время размещения: </span>
                        <?
                            $timeInterval = time() - strtotime($item['DATE_ACTIVE_FROM']);
                            if ($timeInterval < 3600):
                                $timeInterval = floor($timeInterval / 60);
                                $timeInterval_lost_num = get_lost_num($timeInterval);
                                if ($timeInterval_lost_num == 1 and $timeInterval_lost_num != 11) {
                                    $timeDescr = 'минута';
                                }
                                elseif ($timeInterval_lost_num == 2 and $timeInterval != 12) {
                                    $timeDescr = 'минуты';
                                }
                                elseif ($timeInterval_lost_num == 3 and $timeInterval != 13) {
                                    $timeDescr = 'минуты';
                                }
                                elseif ($timeInterval_lost_num == 4 and $timeInterval != 14) {
                                    $timeDescr = 'минуты';
                                }
                                else {
                                    $timeDescr = 'минут';
                                }
                            elseif ($timeInterval < 86400):
                                $timeInterval = floor($timeInterval / (60 * 60));
                                $timeInterval_lost_num = get_lost_num($timeInterval);
                                if ($timeInterval_lost_num == 1 and $timeInterval_lost_num != 11) {
                                    $timeDescr = 'час';
                                }
                                elseif ($timeInterval_lost_num == 2 and $timeInterval != 12) {
                                    $timeDescr = 'часа';
                                }
                                elseif ($timeInterval_lost_num == 3 and $timeInterval != 13) {
                                    $timeDescr = 'часа';
                                }
                                elseif ($timeInterval_lost_num == 4 and $timeInterval != 14) {
                                    $timeDescr = 'часа';
                                }
                                else {
                                    $timeDescr = 'часов';
                                }
                            else:
                                $timeInterval = floor($timeInterval / (60 * 60 *24));
                                $timeInterval_lost_num = get_lost_num($timeInterval);
                                if ($timeInterval_lost_num == 1 and $timeInterval_lost_num != 11) {
                                    $timeDescr = 'день';
                                }
                                elseif ($timeInterval_lost_num == 2 and $timeInterval != 12) {
                                    $timeDescr = 'дня';
                                }
                                elseif ($timeInterval_lost_num == 3 and $timeInterval != 13) {
                                    $timeDescr = 'дня';
                                }
                                elseif ($timeInterval_lost_num == 4 and $timeInterval != 14) {
                                    $timeDescr = 'дня';
                                }
                                else {
                                    $timeDescr = 'дней';
                                }
                            endif;
                            echo $timeInterval . ' ' . $timeDescr;
                        ?>
                    </div>
                    <div class="tender_list__item_ten_stat"><?= $item['PROPERTIES']['STATUS']['VALUE'] ?></div>
                    <div class="tender_list__item_button">
                        <a href="<?= $item['DETAIL_PAGE_URL'] ?>">Смотреть тендер</a>
                    </div>
                </div>
            </div>

            <? } ?>
            <?/*
            if ($showBottomPager) {
                ?>
                <div data-pagination-num="<?=$navParams['NavNum']?>" class="show_more">
                    <!-- pagination-container -->
                    <?=$arResult['NAV_STRING']?>
                    <!-- pagination-container -->
                </div>
            <? } */?>
        </div>
	</div>
</section>

<!-- component-end -->