<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $templateData
 * @var string $templateFolder
 * @var CatalogSectionComponent $component
 */

global $APPLICATION;

if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateFolder.'/themes/'.$templateData['TEMPLATE_THEME'].'/style.css');
	$APPLICATION->SetAdditionalCSS('/bitrix/css/main/themes/'.$templateData['TEMPLATE_THEME'].'/style.css', true);
}

if (!empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;
	if (!empty($templateData['CURRENCIES']))
	{
		$loadCurrency = \Bitrix\Main\Loader::includeModule('currency');
	}

	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);

	if ($loadCurrency)
	{
		?>
		<script>
			BX.Currency.setCurrencies(<?=$templateData['CURRENCIES']?>);
		</script>
		<?
	}
}

//	lazy load and big data json answers
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
if ($request->isAjaxRequest() && ($request->get('action') === 'showMore' || $request->get('action') === 'deferredLoad'))
{
	$content = ob_get_contents();
	ob_end_clean();

	list(, $itemsContainer) = explode('<!-- items-container -->', $content);
	list(, $paginationContainer) = explode('<!-- pagination-container -->', $content);
	list(, $epilogue) = explode('<!-- component-end -->', $content);

	if ($arParams['AJAX_MODE'] === 'Y')
	{
		$component->prepareLinks($paginationContainer);
	}

	$component::sendJsonAnswer(array(
		'items' => $itemsContainer,
		'pagination' => $paginationContainer,
		'epilogue' => $epilogue,
	));
}
//global $templateData;
//echo '<pre>'.print_r(count($component->elements), true).'</pre>';die();
$APPLICATION->SetPageProperty('CompanyCount',count($component->elements));

global $USER;
//if ($USER->isAdmin()){
//	echo '<pre>'.print_r($arResult, true).'</pre>';die();
//}
$pageSettings=$APPLICATION->GetPageProperty('pageSettings');
$pageSettings['CATALOG_NAME'] = $arResult['NAME'];
$APPLICATION->SetPageProperty('PageSettings',$pageSettings);

$pageSettings = $APPLICATION->GetPageProperty('pageSettings');

if (!isset($pageSettings['UF_TITLE'])){
	$pageSettings['UF_TITLE'] = $arResult['NAME']." в ##IN_CITY## - выбрать компанию по изготовлению и установке ограждения";
}
if (!isset($pageSettings['UF_DESCRIPTION'])){
	$pageSettings['UF_DESCRIPTION'] = "Нужен ".$arResult['NAME']." в ##IN_CITY##? Выбери подрядчика по цене, отзывам, качеству работ и другим критериям. Работа по договорам с соблюдением сроков. Гарантии. Сертифицированный материал. Осмечивание.";
}
$APPLICATION->SetPageProperty('pageSettings', $pageSettings);