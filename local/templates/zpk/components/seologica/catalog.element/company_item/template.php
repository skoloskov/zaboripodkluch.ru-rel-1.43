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
 * @var string $templateFolder
 */

$this->setFrameMode(true);
// $this->addExternalCss('/bitrix/css/main/bootstrap.css');

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
	'STICKER_ID' => $mainId . '_sticker',
	'BIG_SLIDER_ID' => $mainId . '_big_slider',
	'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId . '_slider_cont',
	'OLD_PRICE_ID' => $mainId . '_old_price',
	'PRICE_ID' => $mainId . '_price',
	'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
	'PRICE_TOTAL' => $mainId . '_price_total',
	'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
	'QUANTITY_ID' => $mainId . '_quantity',
	'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
	'QUANTITY_UP_ID' => $mainId . '_quant_up',
	'QUANTITY_MEASURE' => $mainId . '_quant_measure',
	'QUANTITY_LIMIT' => $mainId . '_quant_limit',
	'BUY_LINK' => $mainId . '_buy_link',
	'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
	'COMPARE_LINK' => $mainId . '_compare_link',
	'TREE_ID' => $mainId . '_skudiv',
	'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
	'OFFER_GROUP' => $mainId . '_set_group_',
	'BASKET_PROP_DIV' => $mainId . '_basket_prop',
	'SUBSCRIBE_LINK' => $mainId . '_subscribe',
	'TABS_ID' => $mainId . '_tabs',
	'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
	'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers) {
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer) {
		if ($offer['MORE_PHOTO_COUNT'] > 1) {
			$showSliderControls = true;
			break;
		}
	}
} else {
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}
//  echo "<pre>" . print_r($arResult, true) . "</pre>";
//  die();
?>

<section class="company-page">
	<div class="container company-page__container">
		<h1 class="main__title company-page-content__title"><?= $arResult["NAME"] ?></h1>
		<div class="company-page-content">
			<div class="company-page-content__left">
				<!-- Шапка контента -->
				<div class="company-page-content__header">
					<div class="company-page-content__block-logo">
						<?
						$logoFile = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width' => 190, 'height' => 160), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$stars = ceil(($arResult['SHOW_COUNTER']/$arResult['MAX_SHOW_COUNTER'])*10/2);
						?>
						<img class="company-page-content__img company-page-content__img1" src="<?=$logoFile["src"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" />
					</div>
					<div class="company-page-content__title-block">
						<div class="range-page__block">
							<span class="range-page__title">Рейтинг</span>
							
							<div class="rating" data-value="<?=$stars?>"></div>
							<span class="range__number"><?=$stars?></span>
						</div>
						<div class="company-page-content__el">
							<span class="company-page-content__title-el"><?=$APPLICATION->GetPageProperty('regionSettings')['UF_NAME'];?></span>
							<span class="company-page-content__title-el"><?=(date('Y') - $arResult['PROPERTIES']['YEARS']['VALUE'])?> лет на рынке</span>
							<span class="company-page-content__title-el"><?=$arResult['PROPERTIES']['COMPLETED']['VALUE']?> заборов</span>
						</div>
						<div class="company-page-content__btn-block">
							<button type="button" class="company-page-content__phone">
								<span class="company-page-content__phone_text">Телефон</span>
							</button>
							<a href="tel:+74872583788" class="company-page-content__phone-link">+74872583788</a>
							<button type="button" class="company-page-content__order modal-quiz">
								Предложить заказ
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="company-page-content__right">
				<div class="company-page-content__work">
					<div class="security-page__block">
						<div class="team-page">
							<span class="team-page__block">Свободных бригад:
								<span class="team-page__link"><?= $arResult["PROPERTIES"]["COMMANDS"]["VALUE"] ?></span></span>
						</div>
						<span class="security-page__el security-page__contract">Работает по договору</span>
						<span class="security-page__el security-page__guarantee">Дает гарантию</span>
					</div>

				</div>
			</div>
		</div>
		<div class="company-page-content__description">
			<?=$arResult["DETAIL_TEXT"]?>
		</div>
	</div>
</section>
<!-- Секция расценок -->
<section class="price">
	<div class="container price__container">
		<h2 class="price__title section__title">Прайс лист на заборы</h2>
		<table id="table">
			<thead class="table__header">
				<tr>
					<th>Наименование</th>
					<th>Цена забора за погонный метр *</th>
				</tr>
			</thead>
			<tbody class="table__body">
				<? foreach ($arResult['PROPERTIES']['SERVICES']['VALUE'] as $key => $value) {
				?>
					<tr>
						<td><?= $value ?></td>
						<td><?= $arResult['PROPERTIES']['SERVICES']['DESCRIPTION'][$key] ?> руб.</td>
					</tr>
				<?

				} ?>
			</tbody>
		</table>
		<span class="table__description">* В указанные цены на заборы уже включена стоимость работ по
			установке.</span>
	</div>
</section>
<!-- Секция territory -->
<?
if ($USER->isAdmin()){
	//echo '<pre>'.print_r($arResult['PROPERTIES']['SECTIONS'], true).'<pre>';
}
if (isset($arResult['PROPERTIES']['OBJECTS']) && count($arResult['PROPERTIES']['OBJECTS'])>0)
{?>
<section class="territory">
	<div class="container territory__container">
		<a name="zabor_list"></a>
		
		<h2 class="territory__title section__title">Фото готовых заборов</h2>
		<select name="zabory" id="type_select" class="territory__select" onchange="select_change(this);">
			<option value="">Все заборы</option>
			<?foreach($arResult['PROPERTIES']['SECTIONS'] as $section){?>
				<option value="<?=$section['ID']?>" <?=(isset($_REQUEST['section'])&&$_REQUEST['section']==$section['ID'])?'selected':'';?>><?=str_repeat('&nbsp;&nbsp;',$section['DEPTH_LEVEL'])?><?=$section['NAME']?> (<?=(int)$arResult['SECTIONS_COUNT'][$section['ID']]?>)</option>
			<?}?>
			
		</select>
		
		<ul class="territory__list">
			<?foreach ($arResult['PROPERTIES']['OBJECTS'] as $object){
				//echo '<pre>'.print_r($object, true).'</pre>';die();
				if (!isset($_REQUEST['section']) || $_REQUEST['section']==$object['IBLOCK_SECTION_ID'])
				{
					$objPhoto = CFile::ResizeImageGet($object["PROPERTIES"]['PHOTO']['VALUE'][0], array('width' => 800, 'height' => 600), BX_RESIZE_IMAGE_EXACT, true);
					?>
					<li class="territory__item">
						<a class="territory__link " href="<?=$object['DETAIL_PAGE_URL']?>" style="background-image:url(<?=$objPhoto['src']?>)">
							<!-- cards 1 -->
							<div class="territory__item-content">
								<div class="territory__item-header">
									<div class="territory__item-date"><?=date('d.m.y',$object['DATE_CREATE_UNIX'])?></div>
									<div class="territory__item-range">
										<span class="range__el"></span>
										<span class="range__el"></span>
										<span class="range__el"></span>
										<span class="range__el"></span>
										<span class="range__el"></span>
									</div>
									<span class="range__text">рейтинг: <?=(int)$object['SHOW_COUNTER']?></span>
								</div>
								<div class="territory__item-title">
									<?=$object['NAME']?>
								</div>
								<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
								<div class="territory__item-desc">
									<div class="territory__desc-content">
										<div class="territory__el_height">Высота</div>
										<div class="territory__el_value">1,8 метра</div>
									</div>
									<div class="territory__desc-content">
										<div class="territory__el_color">Длина</div>
										<div class="territory__el_rgb">150 метров</div>
									</div>
									<div class="territory__desc-content">
										<div class="territory__el_price">Стоимость</div>
										<div class="territory__el_number"><?=$object['PROPERTIES']['PRICE']['VALUE']?> р</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<?
				}
			}?>
			<?/*
			<li class="territory__item">
				<a class="territory__link bg__img1" href="">
					<!-- cards 1 -->
					<div class="territory__item-content">
						<div class="territory__item-header">
							<div class="territory__item-date">10.10.20</div>
							<div class="territory__item-range">
								<span class="range__el"></span>
								<span class="range__el"></span>
								<span class="range__el"></span>
								<span class="range__el"></span>
								<span class="range__el"></span>
							</div>
							<span class="range__text">рейтинг: 2015</span>
						</div>
						<div class="territory__item-title">
							Забор из штакетника, Огуднево
						</div>
						<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
						<div class="territory__item-desc">
							<div class="territory__desc-content">
								<div class="territory__el_height">Высота</div>
								<div class="territory__el_value">1,8 метра</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_color">Длина</div>
								<div class="territory__el_rgb">150 метров</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_price">Стоимость</div>
								<div class="territory__el_number">350 000 р</div>
							</div>
						</div>
					</div>
				</a>
			</li>
			<li class="territory__item">
				<a class="territory__link bg__img2" href="">
					<!-- cards 2 -->
					<div class="territory__item-content">
						<div class="territory__item-date">9 октября 2020 года</div>
						<div class="territory__item-title">
							Забор из металлического штакетника, Боровский р-н, Киселево
						</div>
						<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
						<div class="territory__item-desc">
							<div class="territory__desc-content">
								<div class="territory__el_height">Высота</div>
								<div class="territory__el_value">1,8 метра</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_color">Длина</div>
								<div class="territory__el_rgb">150 метров</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_price">Стоимость</div>
								<div class="territory__el_number">350 000 р</div>
							</div>
						</div>
					</div>
				</a>
			</li>
			<li class="territory__item">
				<a class="territory__link bg__img3" href="">
					<!-- cards 3 -->
					<div class="territory__item-content">
						<div class="territory__item-date">6 октября 2020 года</div>
						<div class="territory__item-title">
							Фото забора из металлического штакетника, Щелковский район,
							Масальское
						</div>
						<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
						<div class="territory__item-desc">
							<div class="territory__desc-content">
								<div class="territory__el_height">Высота</div>
								<div class="territory__el_value">1,8 метра</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_color">Длина</div>
								<div class="territory__el_rgb">150 метров</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_price">Стоимость</div>
								<div class="territory__el_number">350 000 р</div>
							</div>
						</div>
					</div>
				</a>
			</li>
			<li class="territory__item">
				<a class="territory__link bg__img4" href="">
					<!-- cards 4 -->
					<div class="territory__item-content">
						<div class="territory__item-date">4 октября 2020 года</div>
						<div class="territory__item-title">
							Забор из штакетника, Калужская обл, д. Макарово
						</div>
						<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
						<div class="territory__item-desc">
							<div class="territory__desc-content">
								<div class="territory__el_height">Высота</div>
								<div class="territory__el_value">1,8 метра</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_color">Длина</div>
								<div class="territory__el_rgb">150 метров</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_price">Стоимость</div>
								<div class="territory__el_number">350 000 р</div>
							</div>
						</div>
					</div>
				</a>
			</li>
			<li class="territory__item">
				<a class="territory__link bg__img5" href="">
					<!-- cards 5 -->
					<div class="territory__item-content">
						<div class="territory__item-date">1 октября 2020 года</div>
						<div class="territory__item-title">
							Забор из металлического штакетника, с. Пирочи
						</div>
						<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
						<div class="territory__item-desc">
							<div class="territory__desc-content">
								<div class="territory__el_height">Высота</div>
								<div class="territory__el_value">1,8 метра</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_color">Длина</div>
								<div class="territory__el_rgb">150 метров</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_price">Стоимость</div>
								<div class="territory__el_number">350 000 р</div>
							</div>
						</div>
					</div>
				</a>
			</li>
			<li class="territory__item">
				<a class="territory__link bg__img6" href="">
					<!-- cards 6 -->
					<div class="territory__item-content">
						<div class="territory__item-date">18 сентября 2020 года</div>
						<div class="territory__item-title">
							Забор из металлического штакетника, д. Киселевка
						</div>
						<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
						<div class="territory__item-desc">
							<div class="territory__desc-content">
								<div class="territory__el_height">Высота</div>
								<div class="territory__el_value">1,8 метра</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_color">Длина</div>
								<div class="territory__el_rgb">150 метров</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_price">Стоимость</div>
								<div class="territory__el_number">350 000 р</div>
							</div>
						</div>
					</div>
				</a>
			</li>
			<li class="territory__item">
				<a class="territory__link bg__img7" href="">
					<!-- cards 7 -->
					<div class="territory__item-content">
						<div class="territory__item-date">15 сентября 2020 года</div>
						<div class="territory__item-title">
							Забор из металлического штакетника, КП Истра Парк
						</div>
						<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
						<div class="territory__item-desc">
							<div class="territory__desc-content">
								<div class="territory__el_height">Высота</div>
								<div class="territory__el_value">1,8 метра</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_color">Длина</div>
								<div class="territory__el_rgb">Золотой дуб</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_price">Стоимость</div>
								<div class="territory__el_number">350 000 р</div>
							</div>
						</div>
					</div>
				</a>
			</li>
			<li class="territory__item">
				<a class="territory__link bg__img8" href="">
					<!-- cards 8 -->
					<div class="territory__item-content">
						<div class="territory__item-date">10 сентября 2020 года</div>
						<div class="territory__item-title">
							Забор из металлического штакетника, КП Балтия
						</div>
						<button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
						<div class="territory__item-desc">
							<div class="territory__desc-content">
								<div class="territory__el_height">Высота</div>
								<div class="territory__el_value">2,0 метра</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_color">Длина</div>
								<div class="territory__el_rgb">150 метров</div>
							</div>
							<div class="territory__desc-content">
								<div class="territory__el_price">Стоимость</div>
								<div class="territory__el_number">350 000 р</div>
							</div>
						</div>
					</div>
				</a>
			</li>*/?>
		</ul>
		<?/*<div class="territory__all-block">
			<button type="button" class="territory__all-btn">Показать следующие 30 товары</button>
		</div>*/?>
		<!-- <div class="territory-pagination">
            <a class="territory-pagination__link link__back">Назад</a>
            <a class="territory-pagination__link territory-pagination__link_active">1</a>
            <a class="territory-pagination__link">2</a>
            <a class="territory-pagination__link">3</a>
            <a class="territory-pagination__link link__invisible">4</a>
            <span class="link__none">...</span>
            <a class="territory-pagination__link">13</a>
            <a class="territory-pagination__link link__next">Далее</a>
        </div> -->
	</div>
</section>
<?}?>
<!-- Секция с отзывами -->
<?
if (isset($arResult['PROPERTIES']['REVIEWS']) && count($arResult['PROPERTIES']['REVIEWS'])>0)
{?>
<section class="recall">
	<div class="container recall__container">
		<h2 class="recall__title section__title">Отзывы о компании</h2>

		<h3 class="recall__subtitle"><?=count($arResult['PROPERTIES']['REVIEWS'])?> отзыва</h3>
		<div class="recall__to-write">
			<span class="recall__to-write_text">Вы сотрудничали с этим исполнителем? Оставьте отзыв о его работе</span>
			<button type="button" class="recall__btn">
				<span class="recall__btn_text">Написать отзыв</span>
			</button>
		</div>
		<ul class="recall__list">
			<!-- Отзыв 1 -->
			<?
			foreach ($arResult['PROPERTIES']['REVIEWS'] as $review){
				?>
				<li class="recall__item">
					<div class="recall__header">
						<img src="<?=SITE_TEMPLATE_PATH;?>/img/user_img.png" alt="" class="recall__user" />
						<div class="recall__block">
							<span class="recall__name"><?=$review['NAME']?></span>
							
							<div class="recall__el">
								<div class="rating" data-value="<?=(int)$review['PROPERTIES']['RATING']['VALUE']?>"></div>
								<?/*<div class="recall__range-page">
									<span class="range-page__star"></span>
									<span class="range-page__star_none"></span>
									<span class="range-page__star_none"></span>
									<span class="range-page__star_none"></span>
									<span class="range-page__star_none"></span>
								</div>*/?>
								<div class="recall__date"><?=date('d.m.Y', strtotime($review['PROPERTIES']['DATE']['VALUE']))?></div>
							</div>
						</div>
					</div>
					<div class="recall__desc">
						<?=$review['DETAIL_TEXT']?>
					</div>
					<!-- Изображения -->
					<?if (count($review['PROPERTIES']['PHOTO']['VALUE'])>0){
						?>
						<div class="recall__slider">
						<?
						foreach($review['PROPERTIES']['PHOTO']['VALUE'] as $photoId){
							$photo = CFile::ResizeImageGet($photoId, array('width' => 800, 'height' => 600), BX_RESIZE_IMAGE_EXACT, true);
							?>
							<div class="slider__item">
								<img class="slide__img" src="<?= $photo['src'] ?>" />
							</div>
							<?
						}?>
						</div>
					<?}?>
				</li>
				<?
			}
			?>
			<?/*<li class="recall__item">
				<div class="recall__header">
					<img src="img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Ольга О.</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star_none"></span>
								<span class="range-page__star_none"></span>
								<span class="range-page__star_none"></span>
								<span class="range-page__star_none"></span>
							</div>
							<div class="recall__date">26.12.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
					possimus ipsa molestias voluptates, nisi commodi modi debitis
					unde laudantium animi, quaerat, tenetur consectetur corporis in
					id perspiciatis consequuntur eius. Quaerat? Lorem ipsum dolor
					sit amet consectetur adipisicing elit. Voluptate, eaque maxime!
					Architecto exercitationem iure, provident quo debitis
					reprehenderit mollitia necessitatibus aspernatur, quis nemo,
					eligendi minima fugit doloremque veritatis ut laboriosam?
				</div>
			</li>
			<!-- Отзыв 2 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">СЕРГЕЙ Г.</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
							</div>
							<div class="recall__date">24.12.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit.
				</div>
			</li>
			<!-- Отзыв 3 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Олег Ч.</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
							</div>
							<div class="recall__date">04.12.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
					possimus ipsa molestias voluptates, nisi commodi modi debitis.
				</div>
			</li>
			<!-- Отзыв 4 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Алан А.</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
							</div>
							<div class="recall__date">26.11.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
					possimus ipsa molestias voluptates, nisi commodi modi debitis
					unde laudantium animi, quaerat, tenetur consectetur corporis in
					id perspiciatis consequuntur eius.
				</div>
				<!-- Изображения -->
				<div class="recall__slider">
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
					</div>
				</div>
			</li>
			<!-- Отзыв 5 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Юлия С.</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
							</div>
							<div class="recall__date">05.11.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit.
				</div>
			</li>
			<!-- Отзыв 6 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Владимир Корягин</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
							</div>
							<div class="recall__date">23.09.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
					possimus ipsa molestias voluptates, nisi commodi modi debitis
					unde laudantium animi, quaerat, tenetur consectetur corporis in
					id perspiciatis consequuntur eius. Quaerat? Lorem ipsum dolor
					sit amet consectetur adipisicing elit. Voluptate, eaque maxime!
					Architecto exercitationem iure, provident quo debitis
					reprehenderit mollitia necessitatibus aspernatur, quis nemo,
					eligendi minima fugit doloremque veritatis ut laboriosam?
				</div>
			</li>
			<!-- Отзыв 7 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Иван</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
							</div>
							<div class="recall__date">23.09.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
					possimus ipsa molestias voluptates, nisi commodi modi debitis
					unde laudantium animi, quaerat, tenetur consectetur corporis in
					id perspiciatis consequuntur eius.
				</div>
				<!-- Изображения -->
				<div class="recall__slider">
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
					</div>
					<div class="slider__item">
						<img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
					</div>
				</div>
			</li>
			<!-- Отзыв 8 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Наталья Е.</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
							</div>
							<div class="recall__date">29.08.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
					possimus ipsa molestias voluptates, nisi commodi modi debitis
					unde laudantium animi, quaerat, tenetur consectetur corporis in
					id perspiciatis consequuntur eius.
				</div>
			</li>
			<!-- Отзыв 9 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Игорь Климович</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
							</div>
							<div class="recall__date">16.08.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
					possimus ipsa molestias voluptates, nisi commodi modi debitis
					unde laudantium animi, quaerat, tenetur consectetur corporis in
					id perspiciatis consequuntur eius.
				</div>
			</li>
			<!-- Отзыв 10 -->
			<li class="recall__item">
				<div class="recall__header">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
					<div class="recall__block">
						<span class="recall__name">Алексей</span>
						<div class="recall__el">
							<div class="recall__range-page">
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star"></span>
								<span class="range-page__star_none"></span>
							</div>
							<div class="recall__date">04.08.2020</div>
						</div>
					</div>
				</div>
				<div class="recall__desc">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
					possimus ipsa molestias voluptates, nisi commodi modi debitis
					unde laudantium animi, quaerat, tenetur consectetur corporis in
					id perspiciatis consequuntur eius. Quaerat? Lorem ipsum dolor
					sit amet consectetur adipisicing elit. Voluptate, eaque maxime!
					Architecto exercitationem iure, provident quo debitis
					reprehenderit mollitia necessitatibus aspernatur, quis nemo,
					eligendi minima fugit doloremque veritatis ut laboriosam?
				</div>
			</li>*/?>
		</ul>
		<?/*<div class="recall__pagination">
			<a class="pagination__link pagination__link_active">1</a>
			<a class="pagination__link">2</a>
			<a class="pagination__link">3</a>
			<a class="pagination__link">4</a>
			<a class="pagination__link">5</a>
			<a class="pagination__link">Далее</a>
		</div>*/?>
	</div>
</section>
<?
}
?>

<?/*div class="bx-catalog-element bx-<?=$arParams['TEMPLATE_THEME']?>" id="<?=$itemIds['ID']?>"
	itemscope itemtype="http://schema.org/Product">
	<div class="container-fluid">
		<?
		if ($arParams['DISPLAY_NAME'] === 'Y')
		{
			?>
			<div class="row">
				<div class="col-xs-12">
					<h1 class="bx-title"><?=$name?></h1>
				</div>
			</div>
			<?
		}
		?>
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="product-item-detail-slider-container" id="<?=$itemIds['BIG_SLIDER_ID']?>">
					<span class="product-item-detail-slider-close" data-entity="close-popup"></span>
					<div class="product-item-detail-slider-block
						<?=($arParams['IMAGE_RESOLUTION'] === '1by1' ? 'product-item-detail-slider-block-square' : '')?>"
						data-entity="images-slider-block">
						<span class="product-item-detail-slider-left" data-entity="slider-control-left" style="display: none;"></span>
						<span class="product-item-detail-slider-right" data-entity="slider-control-right" style="display: none;"></span>
						<div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>"
							<?=(!$arResult['LABEL'] ? 'style="display: none;"' : '' )?>>
							<?
							if ($arResult['LABEL'] && !empty($arResult['LABEL_ARRAY_VALUE']))
							{
								foreach ($arResult['LABEL_ARRAY_VALUE'] as $code => $value)
								{
									?>
									<div<?=(!isset($arParams['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
										<span title="<?=$value?>"><?=$value?></span>
									</div>
									<?
								}
							}
							?>
						</div>
						<?
						if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
						{
							if ($haveOffers)
							{
								?>
								<div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
									style="display: none;">
								</div>
								<?
							}
							else
							{
								if ($price['DISCOUNT'] > 0)
								{
									?>
									<div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
										title="<?=-$price['PERCENT']?>%">
										<span><?=-$price['PERCENT']?>%</span>
									</div>
									<?
								}
							}
						}
						?>
						<div class="product-item-detail-slider-images-container" data-entity="images-container">
							<?
							if (!empty($actualItem['MORE_PHOTO']))
							{
								foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
								{
									?>
									<div class="product-item-detail-slider-image<?=($key == 0 ? ' active' : '')?>" data-entity="image" data-id="<?=$photo['ID']?>">
										<img src="<?=$photo['SRC']?>" alt="<?=$alt?>" title="<?=$title?>"<?=($key == 0 ? ' itemprop="image"' : '')?>>
									</div>
									<?
								}
							}

							if ($arParams['SLIDER_PROGRESS'] === 'Y')
							{
								?>
								<div class="product-item-detail-slider-progress-bar" data-entity="slider-progress-bar" style="width: 0;"></div>
								<?
							}
							?>
						</div>
					</div>
					<?
					if ($showSliderControls)
					{
						if ($haveOffers)
						{
							foreach ($arResult['OFFERS'] as $keyOffer => $offer)
							{
								if (!isset($offer['MORE_PHOTO_COUNT']) || $offer['MORE_PHOTO_COUNT'] <= 0)
									continue;

								$strVisible = $arResult['OFFERS_SELECTED'] == $keyOffer ? '' : 'none';
								?>
								<div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_OF_ID'].$offer['ID']?>" style="display: <?=$strVisible?>;">
									<?
									foreach ($offer['MORE_PHOTO'] as $keyPhoto => $photo)
									{
										?>
										<div class="product-item-detail-slider-controls-image<?=($keyPhoto == 0 ? ' active' : '')?>"
											data-entity="slider-control" data-value="<?=$offer['ID'].'_'.$photo['ID']?>">
											<img src="<?=$photo['SRC']?>">
										</div>
										<?
									}
									?>
								</div>
								<?
							}
						}
						else
						{
							?>
							<div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_ID']?>">
								<?
								if (!empty($actualItem['MORE_PHOTO']))
								{
									foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
									{
										?>
										<div class="product-item-detail-slider-controls-image<?=($key == 0 ? ' active' : '')?>"
											data-entity="slider-control" data-value="<?=$photo['ID']?>">
											<img src="<?=$photo['SRC']?>">
										</div>
										<?
									}
								}
								?>
							</div>
							<?
						}
					}
					?>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="row">
					<div class="col-sm-6">
						<div class="product-item-detail-info-section">
							<?
							foreach ($arParams['PRODUCT_INFO_BLOCK_ORDER'] as $blockName)
							{
								switch ($blockName)
								{
									case 'sku':
										if ($haveOffers && !empty($arResult['OFFERS_PROP']))
										{
											?>
											<div id="<?=$itemIds['TREE_ID']?>">
												<?
												foreach ($arResult['SKU_PROPS'] as $skuProperty)
												{
													if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
														continue;

													$propertyId = $skuProperty['ID'];
													$skuProps[] = array(
														'ID' => $propertyId,
														'SHOW_MODE' => $skuProperty['SHOW_MODE'],
														'VALUES' => $skuProperty['VALUES'],
														'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
													);
													?>
													<div class="product-item-detail-info-container" data-entity="sku-line-block">
														<div class="product-item-detail-info-container-title"><?=htmlspecialcharsEx($skuProperty['NAME'])?></div>
														<div class="product-item-scu-container">
															<div class="product-item-scu-block">
																<div class="product-item-scu-list">
																	<ul class="product-item-scu-item-list">
																		<?
																		foreach ($skuProperty['VALUES'] as &$value)
																		{
																			$value['NAME'] = htmlspecialcharsbx($value['NAME']);

																			if ($skuProperty['SHOW_MODE'] === 'PICT')
																			{
																				?>
																				<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
																					data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
																					data-onevalue="<?=$value['ID']?>">
																					<div class="product-item-scu-item-color-block">
																						<div class="product-item-scu-item-color" title="<?=$value['NAME']?>"
																							style="background-image: url('<?=$value['PICT']['SRC']?>');">
																						</div>
																					</div>
																				</li>
																				<?
																			}
																			else
																			{
																				?>
																				<li class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
																					data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
																					data-onevalue="<?=$value['ID']?>">
																					<div class="product-item-scu-item-text-block">
																						<div class="product-item-scu-item-text"><?=$value['NAME']?></div>
																					</div>
																				</li>
																				<?
																			}
																		}
																		?>
																	</ul>
																	<div style="clear: both;"></div>
																</div>
															</div>
														</div>
													</div>
													<?
												}
												?>
											</div>
											<?
										}

										break;

									case 'props':
										if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
										{
											?>
											<div class="product-item-detail-info-container">
												<?
												if (!empty($arResult['DISPLAY_PROPERTIES']))
												{
													?>
													<dl class="product-item-detail-properties">
														<?
														foreach ($arResult['DISPLAY_PROPERTIES'] as $property)
														{
															if (isset($arParams['MAIN_BLOCK_PROPERTY_CODE'][$property['CODE']]))
															{
																?>
																<dt><?=$property['NAME']?></dt>
																<dd><?=(is_array($property['DISPLAY_VALUE'])
																		? implode(' / ', $property['DISPLAY_VALUE'])
																		: $property['DISPLAY_VALUE'])?>
																</dd>
																<?
															}
														}
														unset($property);
														?>
													</dl>
													<?
												}

												if ($arResult['SHOW_OFFERS_PROPS'])
												{
													?>
													<dl class="product-item-detail-properties" id="<?=$itemIds['DISPLAY_MAIN_PROP_DIV']?>"></dl>
													<?
												}
												?>
											</div>
											<?
										}

										break;
								}
							}
							?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="product-item-detail-pay-block">
							<?
							foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName)
							{
								switch ($blockName)
								{
									case 'rating':
										if ($arParams['USE_VOTE_RATING'] === 'Y')
										{
											?>
											<div class="product-item-detail-info-container">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:iblock.vote',
													'stars',
													array(
														'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
														'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
														'IBLOCK_ID' => $arParams['IBLOCK_ID'],
														'ELEMENT_ID' => $arResult['ID'],
														'ELEMENT_CODE' => '',
														'MAX_VOTE' => '5',
														'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
														'SET_STATUS_404' => 'N',
														'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
														'CACHE_TYPE' => $arParams['CACHE_TYPE'],
														'CACHE_TIME' => $arParams['CACHE_TIME']
													),
													$component,
													array('HIDE_ICONS' => 'Y')
												);
												?>
											</div>
											<?
										}

										break;

									case 'price':
										?>
										<div class="product-item-detail-info-container">
											<?
											if ($arParams['SHOW_OLD_PRICE'] === 'Y')
											{
												?>
												<div class="product-item-detail-price-old" id="<?=$itemIds['OLD_PRICE_ID']?>"
													style="display: <?=($showDiscount ? '' : 'none')?>;">
													<?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
												</div>
												<?
											}
											?>
											<div class="product-item-detail-price-current" id="<?=$itemIds['PRICE_ID']?>">
												<?=$price['PRINT_RATIO_PRICE']?>
											</div>
											<?
											if ($arParams['SHOW_OLD_PRICE'] === 'Y')
											{
												?>
												<div class="item_economy_price" id="<?=$itemIds['DISCOUNT_PRICE_ID']?>"
													style="display: <?=($showDiscount ? '' : 'none')?>;">
													<?
													if ($showDiscount)
													{
														echo Loc::getMessage('CT_BCE_CATALOG_ECONOMY_INFO2', array('#ECONOMY#' => $price['PRINT_RATIO_DISCOUNT']));
													}
													?>
												</div>
												<?
											}
											?>
										</div>
										<?
										break;

									case 'priceRanges':
										if ($arParams['USE_PRICE_COUNT'])
										{
											$showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
											$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
											?>
											<div class="product-item-detail-info-container"
												<?=$showRanges ? '' : 'style="display: none;"'?>
												data-entity="price-ranges-block">
												<div class="product-item-detail-info-container-title">
													<?=$arParams['MESS_PRICE_RANGES_TITLE']?>
													<span data-entity="price-ranges-ratio-header">
														(<?=(Loc::getMessage(
															'CT_BCE_CATALOG_RATIO_PRICE',
															array('#RATIO#' => ($useRatio ? $measureRatio : '1').' '.$actualItem['ITEM_MEASURE']['TITLE'])
														))?>)
													</span>
												</div>
												<dl class="product-item-detail-properties" data-entity="price-ranges-body">
													<?
													if ($showRanges)
													{
														foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
														{
															if ($range['HASH'] !== 'ZERO-INF')
															{
																$itemPrice = false;

																foreach ($arResult['ITEM_PRICES'] as $itemPrice)
																{
																	if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
																	{
																		break;
																	}
																}

																if ($itemPrice)
																{
																	?>
																	<dt>
																		<?
																		echo Loc::getMessage(
																				'CT_BCE_CATALOG_RANGE_FROM',
																				array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																			).' ';

																		if (is_infinite($range['SORT_TO']))
																		{
																			echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
																		}
																		else
																		{
																			echo Loc::getMessage(
																				'CT_BCE_CATALOG_RANGE_TO',
																				array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																			);
																		}
																		?>
																	</dt>
																	<dd><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></dd>
																	<?
																}
															}
														}
													}
													?>
												</dl>
											</div>
											<?
											unset($showRanges, $useRatio, $itemPrice, $range);
										}

										break;

									case 'quantityLimit':
										if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
										{
											if ($haveOffers)
											{
												?>
												<div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>" style="display: none;">
													<div class="product-item-detail-info-container-title">
														<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
														<span class="product-item-quantity" data-entity="quantity-limit-value"></span>
													</div>
												</div>
												<?
											}
											else
											{
												if (
													$measureRatio
													&& (float)$actualItem['PRODUCT']['QUANTITY'] > 0
													&& $actualItem['CHECK_QUANTITY']
												)
												{
													?>
													<div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>">
														<div class="product-item-detail-info-container-title">
															<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
															<span class="product-item-quantity" data-entity="quantity-limit-value">
																<?
																if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
																{
																	if ((float)$actualItem['PRODUCT']['QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
																	{
																		echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
																	}
																	else
																	{
																		echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
																	}
																}
																else
																{
																	echo $actualItem['PRODUCT']['QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
																}
																?>
															</span>
														</div>
													</div>
													<?
												}
											}
										}

										break;

									case 'quantity':
										if ($arParams['USE_PRODUCT_QUANTITY'])
										{
											?>
											<div class="product-item-detail-info-container" style="<?=(!$actualItem['CAN_BUY'] ? 'display: none;' : '')?>"
												data-entity="quantity-block">
												<div class="product-item-detail-info-container-title"><?=Loc::getMessage('CATALOG_QUANTITY')?></div>
												<div class="product-item-amount">
													<div class="product-item-amount-field-container">
														<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN_ID']?>"></span>
														<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY_ID']?>" type="number"
															value="<?=$price['MIN_QUANTITY']?>">
														<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP_ID']?>"></span>
														<span class="product-item-amount-description-container">
															<span id="<?=$itemIds['QUANTITY_MEASURE']?>">
																<?=$actualItem['ITEM_MEASURE']['TITLE']?>
															</span>
															<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
														</span>
													</div>
												</div>
											</div>
											<?
										}

										break;

									case 'buttons':
										?>
										<div data-entity="main-button-container">
											<div id="<?=$itemIds['BASKET_ACTIONS_ID']?>" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;">
												<?
												if ($showAddBtn)
												{
													?>
													<div class="product-item-detail-info-container">
														<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['ADD_BASKET_LINK']?>"
															href="javascript:void(0);">
															<span><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></span>
														</a>
													</div>
													<?
												}

												if ($showBuyBtn)
												{
													?>
													<div class="product-item-detail-info-container">
														<a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['BUY_LINK']?>"
															href="javascript:void(0);">
															<span><?=$arParams['MESS_BTN_BUY']?></span>
														</a>
													</div>
													<?
												}
												?>
											</div>
											<?
											if ($showSubscribe)
											{
												?>
												<div class="product-item-detail-info-container">
													<?
													$APPLICATION->IncludeComponent(
														'bitrix:catalog.product.subscribe',
														'',
														array(
															'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
															'PRODUCT_ID' => $arResult['ID'],
															'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
															'BUTTON_CLASS' => 'btn btn-default product-item-detail-buy-button',
															'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
															'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
														),
														$component,
														array('HIDE_ICONS' => 'Y')
													);
													?>
												</div>
												<?
											}
											?>
											<div class="product-item-detail-info-container">
												<a class="btn btn-link product-item-detail-buy-button" id="<?=$itemIds['NOT_AVAILABLE_MESS']?>"
													href="javascript:void(0)"
													rel="nofollow" style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;">
													<?=$arParams['MESS_NOT_AVAILABLE']?>
												</a>
											</div>
										</div>
										<?
										break;
								}
							}

							if ($arParams['DISPLAY_COMPARE'])
							{
								?>
								<div class="product-item-detail-compare-container">
									<div class="product-item-detail-compare">
										<div class="checkbox">
											<label id="<?=$itemIds['COMPARE_LINK']?>">
												<input type="checkbox" data-entity="compare-checkbox">
												<span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
											</label>
										</div>
									</div>
								</div>
								<?
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?
				if ($haveOffers)
				{
					if ($arResult['OFFER_GROUP'])
					{
						foreach ($arResult['OFFER_GROUP_VALUES'] as $offerId)
						{
							?>
							<span id="<?=$itemIds['OFFER_GROUP'].$offerId?>" style="display: none;">
								<?
								$APPLICATION->IncludeComponent(
									'bitrix:catalog.set.constructor',
									'.default',
									array(
										'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
										'IBLOCK_ID' => $arResult['OFFERS_IBLOCK'],
										'ELEMENT_ID' => $offerId,
										'PRICE_CODE' => $arParams['PRICE_CODE'],
										'BASKET_URL' => $arParams['BASKET_URL'],
										'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
										'CACHE_TYPE' => $arParams['CACHE_TYPE'],
										'CACHE_TIME' => $arParams['CACHE_TIME'],
										'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
										'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
										'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
										'CURRENCY_ID' => $arParams['CURRENCY_ID']
									),
									$component,
									array('HIDE_ICONS' => 'Y')
								);
								?>
							</span>
							<?
						}
					}
				}
				else
				{
					if ($arResult['MODULES']['catalog'] && $arResult['OFFER_GROUP'])
					{
						$APPLICATION->IncludeComponent(
							'bitrix:catalog.set.constructor',
							'.default',
							array(
								'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'ELEMENT_ID' => $arResult['ID'],
								'PRICE_CODE' => $arParams['PRICE_CODE'],
								'BASKET_URL' => $arParams['BASKET_URL'],
								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'CURRENCY_ID' => $arParams['CURRENCY_ID']
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
					}
				}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<div class="row" id="<?=$itemIds['TABS_ID']?>">
					<div class="col-xs-12">
						<div class="product-item-detail-tabs-container">
							<ul class="product-item-detail-tabs-list">
								<?
								if ($showDescription)
								{
									?>
									<li class="product-item-detail-tab active" data-entity="tab" data-value="description">
										<a href="javascript:void(0);" class="product-item-detail-tab-link">
											<span><?=$arParams['MESS_DESCRIPTION_TAB']?></span>
										</a>
									</li>
									<?
								}

								if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
								{
									?>
									<li class="product-item-detail-tab" data-entity="tab" data-value="properties">
										<a href="javascript:void(0);" class="product-item-detail-tab-link">
											<span><?=$arParams['MESS_PROPERTIES_TAB']?></span>
										</a>
									</li>
									<?
								}

								if ($arParams['USE_COMMENTS'] === 'Y')
								{
									?>
									<li class="product-item-detail-tab" data-entity="tab" data-value="comments">
										<a href="javascript:void(0);" class="product-item-detail-tab-link">
											<span><?=$arParams['MESS_COMMENTS_TAB']?></span>
										</a>
									</li>
									<?
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="row" id="<?=$itemIds['TAB_CONTAINERS_ID']?>">
					<div class="col-xs-12">
						<?
						if ($showDescription)
						{
							?>
							<div class="product-item-detail-tab-content active" data-entity="tab-container" data-value="description"
								itemprop="description">
								<?
								if (
									$arResult['PREVIEW_TEXT'] != ''
									&& (
										$arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'S'
										|| ($arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'E' && $arResult['DETAIL_TEXT'] == '')
									)
								)
								{
									echo $arResult['PREVIEW_TEXT_TYPE'] === 'html' ? $arResult['PREVIEW_TEXT'] : '<p>'.$arResult['PREVIEW_TEXT'].'</p>';
								}

								if ($arResult['DETAIL_TEXT'] != '')
								{
									echo $arResult['DETAIL_TEXT_TYPE'] === 'html' ? $arResult['DETAIL_TEXT'] : '<p>'.$arResult['DETAIL_TEXT'].'</p>';
								}
								?>
							</div>
							<?
						}

						if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
						{
							?>
							<div class="product-item-detail-tab-content" data-entity="tab-container" data-value="properties">
								<?
								if (!empty($arResult['DISPLAY_PROPERTIES']))
								{
									?>
									<dl class="product-item-detail-properties">
										<?
										foreach ($arResult['DISPLAY_PROPERTIES'] as $property)
										{
											?>
											<dt><?=$property['NAME']?></dt>
											<dd><?=(
												is_array($property['DISPLAY_VALUE'])
													? implode(' / ', $property['DISPLAY_VALUE'])
													: $property['DISPLAY_VALUE']
												)?>
											</dd>
											<?
										}
										unset($property);
										?>
									</dl>
									<?
								}

								if ($arResult['SHOW_OFFERS_PROPS'])
								{
									?>
									<dl class="product-item-detail-properties" id="<?=$itemIds['DISPLAY_PROP_DIV']?>"></dl>
									<?
								}
								?>
							</div>
							<?
						}

						if ($arParams['USE_COMMENTS'] === 'Y')
						{
							?>
							<div class="product-item-detail-tab-content" data-entity="tab-container" data-value="comments" style="display: none;">
								<?
								$componentCommentsParams = array(
									'ELEMENT_ID' => $arResult['ID'],
									'ELEMENT_CODE' => '',
									'IBLOCK_ID' => $arParams['IBLOCK_ID'],
									'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
									'URL_TO_COMMENT' => '',
									'WIDTH' => '',
									'COMMENTS_COUNT' => '5',
									'BLOG_USE' => $arParams['BLOG_USE'],
									'FB_USE' => $arParams['FB_USE'],
									'FB_APP_ID' => $arParams['FB_APP_ID'],
									'VK_USE' => $arParams['VK_USE'],
									'VK_API_ID' => $arParams['VK_API_ID'],
									'CACHE_TYPE' => $arParams['CACHE_TYPE'],
									'CACHE_TIME' => $arParams['CACHE_TIME'],
									'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
									'BLOG_TITLE' => '',
									'BLOG_URL' => $arParams['BLOG_URL'],
									'PATH_TO_SMILE' => '',
									'EMAIL_NOTIFY' => $arParams['BLOG_EMAIL_NOTIFY'],
									'AJAX_POST' => 'Y',
									'SHOW_SPAM' => 'Y',
									'SHOW_RATING' => 'N',
									'FB_TITLE' => '',
									'FB_USER_ADMIN_ID' => '',
									'FB_COLORSCHEME' => 'light',
									'FB_ORDER_BY' => 'reverse_time',
									'VK_TITLE' => '',
									'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME']
								);
								if(isset($arParams["USER_CONSENT"]))
									$componentCommentsParams["USER_CONSENT"] = $arParams["USER_CONSENT"];
								if(isset($arParams["USER_CONSENT_ID"]))
									$componentCommentsParams["USER_CONSENT_ID"] = $arParams["USER_CONSENT_ID"];
								if(isset($arParams["USER_CONSENT_IS_CHECKED"]))
									$componentCommentsParams["USER_CONSENT_IS_CHECKED"] = $arParams["USER_CONSENT_IS_CHECKED"];
								if(isset($arParams["USER_CONSENT_IS_LOADED"]))
									$componentCommentsParams["USER_CONSENT_IS_LOADED"] = $arParams["USER_CONSENT_IS_LOADED"];
								$APPLICATION->IncludeComponent(
									'bitrix:catalog.comments',
									'',
									$componentCommentsParams,
									$component,
									array('HIDE_ICONS' => 'Y')
								);
								?>
							</div>
							<?
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-3">
				<div>
					<?
					if ($arParams['BRAND_USE'] === 'Y')
					{
						$APPLICATION->IncludeComponent(
							'bitrix:catalog.brandblock',
							'.default',
							array(
								'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'ELEMENT_ID' => $arResult['ID'],
								'ELEMENT_CODE' => '',
								'PROP_CODE' => $arParams['BRAND_PROP_CODE'],
								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'WIDTH' => '',
								'HEIGHT' => ''
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
					}
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?
				if ($arResult['CATALOG'] && $actualItem['CAN_BUY'] && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
				{
					$APPLICATION->IncludeComponent(
						'bitrix:sale.prediction.product.detail',
						'.default',
						array(
							'BUTTON_ID' => $showBuyBtn ? $itemIds['BUY_LINK'] : $itemIds['ADD_BASKET_LINK'],
							'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
							'POTENTIAL_PRODUCT_TO_BUY' => array(
								'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
								'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
								'PRODUCT_PROVIDER_CLASS' => isset($arResult['~PRODUCT_PROVIDER_CLASS']) ? $arResult['~PRODUCT_PROVIDER_CLASS'] : '\Bitrix\Catalog\Product\CatalogProvider',
								'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
								'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,

								'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][0]['ID']) ? $arResult['OFFERS'][0]['ID'] : null,
								'SECTION' => array(
									'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
									'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
									'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
									'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
								),
							)
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
				}

				if ($arResult['CATALOG'] && $arParams['USE_GIFTS_DETAIL'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
				{
					?>
					<div data-entity="parent-container">
						<?
						if (!isset($arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y')
						{
							?>
							<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
								<?=($arParams['GIFTS_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFT_BLOCK_TITLE_DEFAULT'))?>
							</div>
							<?
						}

						CBitrixComponent::includeComponentClass('bitrix:sale.products.gift');
						$APPLICATION->IncludeComponent(
							'bitrix:sale.products.gift',
							'.default',
							array(
								'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
								'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
								'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],

								'PRODUCT_ROW_VARIANTS' => "",
								'PAGE_ELEMENT_COUNT' => 0,
								'DEFERRED_PRODUCT_ROW_VARIANTS' => \Bitrix\Main\Web\Json::encode(
									SaleProductsGiftComponent::predictRowVariants(
										$arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
										$arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT']
									)
								),
								'DEFERRED_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],

								'SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
								'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
								'SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
								'PRODUCT_DISPLAY_MODE' => 'Y',
								'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],
								'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
								'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
								'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',

								'TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],

								'LABEL_PROP_'.$arParams['IBLOCK_ID'] => array(),
								'LABEL_PROP_MOBILE_'.$arParams['IBLOCK_ID'] => array(),
								'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],

								'ADD_TO_BASKET_ACTION' => (isset($arParams['ADD_TO_BASKET_ACTION']) ? $arParams['ADD_TO_BASKET_ACTION'] : ''),
								'MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
								'MESS_BTN_ADD_TO_BASKET' => $arParams['~GIFTS_MESS_BTN_BUY'],
								'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
								'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],

								'SHOW_PRODUCTS_'.$arParams['IBLOCK_ID'] => 'Y',
								'PROPERTY_CODE_'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE'],
								'PROPERTY_CODE_MOBILE'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE_MOBILE'],
								'PROPERTY_CODE_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
								'OFFER_TREE_PROPS_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
								'CART_PROPERTIES_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFERS_CART_PROPERTIES'],
								'ADDITIONAL_PICT_PROP_'.$arParams['IBLOCK_ID'] => (isset($arParams['ADD_PICT_PROP']) ? $arParams['ADD_PICT_PROP'] : ''),
								'ADDITIONAL_PICT_PROP_'.$arResult['OFFERS_IBLOCK'] => (isset($arParams['OFFER_ADD_PICT_PROP']) ? $arParams['OFFER_ADD_PICT_PROP'] : ''),

								'HIDE_NOT_AVAILABLE' => 'Y',
								'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
								'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
								'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
								'PRICE_CODE' => $arParams['PRICE_CODE'],
								'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
								'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'BASKET_URL' => $arParams['BASKET_URL'],
								'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
								'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
								'PARTIAL_PRODUCT_PROPERTIES' => $arParams['PARTIAL_PRODUCT_PROPERTIES'],
								'USE_PRODUCT_QUANTITY' => 'N',
								'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'POTENTIAL_PRODUCT_TO_BUY' => array(
									'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
									'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
									'PRODUCT_PROVIDER_CLASS' => isset($arResult['~PRODUCT_PROVIDER_CLASS']) ? $arResult['~PRODUCT_PROVIDER_CLASS'] : '\Bitrix\Catalog\Product\CatalogProvider',
									'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
									'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,

									'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'])
										? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID']
										: null,
									'SECTION' => array(
										'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
										'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
										'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
										'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
									),
								),

								'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
								'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
								'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
						?>
					</div>
					<?
				}

				if ($arResult['CATALOG'] && $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
				{
					?>
					<div data-entity="parent-container">
						<?
						if (!isset($arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y')
						{
							?>
							<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
								<?=($arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFTS_MAIN_BLOCK_TITLE_DEFAULT'))?>
							</div>
							<?
						}

						$APPLICATION->IncludeComponent(
							'bitrix:sale.gift.main.products',
							'.default',
							array(
								'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
								'PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
								'LINE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
								'HIDE_BLOCK_TITLE' => 'Y',
								'BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],

								'OFFERS_FIELD_CODE' => $arParams['OFFERS_FIELD_CODE'],
								'OFFERS_PROPERTY_CODE' => $arParams['OFFERS_PROPERTY_CODE'],

								'AJAX_MODE' => $arParams['AJAX_MODE'],
								'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],

								'ELEMENT_SORT_FIELD' => 'ID',
								'ELEMENT_SORT_ORDER' => 'DESC',
								//'ELEMENT_SORT_FIELD2' => $arParams['ELEMENT_SORT_FIELD2'],
								//'ELEMENT_SORT_ORDER2' => $arParams['ELEMENT_SORT_ORDER2'],
								'FILTER_NAME' => 'searchFilter',
								'SECTION_URL' => $arParams['SECTION_URL'],
								'DETAIL_URL' => $arParams['DETAIL_URL'],
								'BASKET_URL' => $arParams['BASKET_URL'],
								'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
								'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
								'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],

								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],

								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'SET_TITLE' => $arParams['SET_TITLE'],
								'PROPERTY_CODE' => $arParams['PROPERTY_CODE'],
								'PRICE_CODE' => $arParams['PRICE_CODE'],
								'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
								'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],

								'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'CURRENCY_ID' => $arParams['CURRENCY_ID'],
								'HIDE_NOT_AVAILABLE' => 'Y',
								'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
								'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
								'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],

								'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
								'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
								'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',

								'ADD_PICT_PROP' => (isset($arParams['ADD_PICT_PROP']) ? $arParams['ADD_PICT_PROP'] : ''),
								'LABEL_PROP' => (isset($arParams['LABEL_PROP']) ? $arParams['LABEL_PROP'] : ''),
								'LABEL_PROP_MOBILE' => (isset($arParams['LABEL_PROP_MOBILE']) ? $arParams['LABEL_PROP_MOBILE'] : ''),
								'LABEL_PROP_POSITION' => (isset($arParams['LABEL_PROP_POSITION']) ? $arParams['LABEL_PROP_POSITION'] : ''),
								'OFFER_ADD_PICT_PROP' => (isset($arParams['OFFER_ADD_PICT_PROP']) ? $arParams['OFFER_ADD_PICT_PROP'] : ''),
								'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : ''),
								'SHOW_DISCOUNT_PERCENT' => (isset($arParams['SHOW_DISCOUNT_PERCENT']) ? $arParams['SHOW_DISCOUNT_PERCENT'] : ''),
								'DISCOUNT_PERCENT_POSITION' => (isset($arParams['DISCOUNT_PERCENT_POSITION']) ? $arParams['DISCOUNT_PERCENT_POSITION'] : ''),
								'SHOW_OLD_PRICE' => (isset($arParams['SHOW_OLD_PRICE']) ? $arParams['SHOW_OLD_PRICE'] : ''),
								'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
								'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
								'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
								'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
								'ADD_TO_BASKET_ACTION' => (isset($arParams['ADD_TO_BASKET_ACTION']) ? $arParams['ADD_TO_BASKET_ACTION'] : ''),
								'SHOW_CLOSE_POPUP' => (isset($arParams['SHOW_CLOSE_POPUP']) ? $arParams['SHOW_CLOSE_POPUP'] : ''),
								'DISPLAY_COMPARE' => (isset($arParams['DISPLAY_COMPARE']) ? $arParams['DISPLAY_COMPARE'] : ''),
								'COMPARE_PATH' => (isset($arParams['COMPARE_PATH']) ? $arParams['COMPARE_PATH'] : ''),
							)
							+ array(
								'OFFER_ID' => empty($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'])
									? $arResult['ID']
									: $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'],
								'SECTION_ID' => $arResult['SECTION']['ID'],
								'ELEMENT_ID' => $arResult['ID'],

								'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
								'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
								'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
						?>
					</div>
					<?
				}
				?>
			</div>
		</div>
	</div>
	<!--Small Card-->
	<div class="product-item-detail-short-card-fixed hidden-xs" id="<?=$itemIds['SMALL_CARD_PANEL_ID']?>">
		<div class="product-item-detail-short-card-content-container">
			<table>
				<tr>
					<td rowspan="2" class="product-item-detail-short-card-image">
						<img src="" data-entity="panel-picture">
					</td>
					<td class="product-item-detail-short-title-container" data-entity="panel-title">
						<span class="product-item-detail-short-title-text"><?=$name?></span>
					</td>
					<td rowspan="2" class="product-item-detail-short-card-price">
						<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
							?>
							<div class="product-item-detail-price-old" style="display: <?=($showDiscount ? '' : 'none')?>;"
								data-entity="panel-old-price">
								<?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
							</div>
							<?
						}
						?>
						<div class="product-item-detail-price-current" data-entity="panel-price">
							<?=$price['PRINT_RATIO_PRICE']?>
						</div>
					</td>
					<?
					if ($showAddBtn)
					{
						?>
						<td rowspan="2" class="product-item-detail-short-card-btn"
							style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
							data-entity="panel-add-button">
							<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button"
								id="<?=$itemIds['ADD_BASKET_LINK']?>"
								href="javascript:void(0);">
								<span><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></span>
							</a>
						</td>
						<?
					}

					if ($showBuyBtn)
					{
						?>
						<td rowspan="2" class="product-item-detail-short-card-btn"
							style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
							data-entity="panel-buy-button">
							<a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['BUY_LINK']?>"
								href="javascript:void(0);">
								<span><?=$arParams['MESS_BTN_BUY']?></span>
							</a>
						</td>
						<?
					}
					?>
					<td rowspan="2" class="product-item-detail-short-card-btn"
						style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;"
						data-entity="panel-not-available-button">
						<a class="btn btn-link product-item-detail-buy-button" href="javascript:void(0)"
							rel="nofollow">
							<?=$arParams['MESS_NOT_AVAILABLE']?>
						</a>
					</td>
				</tr>
				<?
				if ($haveOffers)
				{
					?>
					<tr>
						<td>
							<div class="product-item-selected-scu-container" data-entity="panel-sku-container">
								<?
								$i = 0;

								foreach ($arResult['SKU_PROPS'] as $skuProperty)
								{
									if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
									{
										continue;
									}

									$propertyId = $skuProperty['ID'];

									foreach ($skuProperty['VALUES'] as $value)
									{
										$value['NAME'] = htmlspecialcharsbx($value['NAME']);
										if ($skuProperty['SHOW_MODE'] === 'PICT')
										{
											?>
											<div class="product-item-selected-scu product-item-selected-scu-color selected"
												title="<?=$value['NAME']?>"
												style="background-image: url('<?=$value['PICT']['SRC']?>'); display: none;"
												data-sku-line="<?=$i?>"
												data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
												data-onevalue="<?=$value['ID']?>">
											</div>
											<?
										}
										else
										{
											?>
											<div class="product-item-selected-scu product-item-selected-scu-text selected"
												title="<?=$value['NAME']?>"
												style="display: none;"
												data-sku-line="<?=$i?>"
												data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
												data-onevalue="<?=$value['ID']?>">
												<?=$value['NAME']?>
											</div>
											<?
										}
									}

									$i++;
								}
								?>
							</div>
						</td>
					</tr>
					<?
				}
				?>
			</table>
		</div>
	</div>
	<!--Top tabs-->
	<div class="product-item-detail-tabs-container-fixed hidden-xs" id="<?=$itemIds['TABS_PANEL_ID']?>">
		<ul class="product-item-detail-tabs-list">
			<?
			if ($showDescription)
			{
				?>
				<li class="product-item-detail-tab active" data-entity="tab" data-value="description">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_DESCRIPTION_TAB']?></span>
					</a>
				</li>
				<?
			}

			if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
			{
				?>
				<li class="product-item-detail-tab" data-entity="tab" data-value="properties">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_PROPERTIES_TAB']?></span>
					</a>
				</li>
				<?
			}

			if ($arParams['USE_COMMENTS'] === 'Y')
			{
				?>
				<li class="product-item-detail-tab" data-entity="tab" data-value="comments">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_COMMENTS_TAB']?></span>
					</a>
				</li>
				<?
			}
			?>
		</ul>
	</div>

	<meta itemprop="name" content="<?=$name?>" />
	<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
	<?
	if ($haveOffers)
	{
		foreach ($arResult['JS_OFFERS'] as $offer)
		{
			$currentOffersList = array();

			if (!empty($offer['TREE']) && is_array($offer['TREE']))
			{
				foreach ($offer['TREE'] as $propName => $skuId)
				{
					$propId = (int)substr($propName, 5);

					foreach ($skuProps as $prop)
					{
						if ($prop['ID'] == $propId)
						{
							foreach ($prop['VALUES'] as $propId => $propValue)
							{
								if ($propId == $skuId)
								{
									$currentOffersList[] = $propValue['NAME'];
									break;
								}
							}
						}
					}
				}
			}

			$offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
			?>
			<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				<meta itemprop="sku" content="<?=htmlspecialcharsbx(implode('/', $currentOffersList))?>" />
				<meta itemprop="price" content="<?=$offerPrice['RATIO_PRICE']?>" />
				<meta itemprop="priceCurrency" content="<?=$offerPrice['CURRENCY']?>" />
				<link itemprop="availability" href="http://schema.org/<?=($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
			</span>
			<?
		}

		unset($offerPrice, $currentOffersList);
	}
	else
	{
		?>
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?=$price['RATIO_PRICE']?>" />
			<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
		<?
	}
	?>
</div*/ ?>