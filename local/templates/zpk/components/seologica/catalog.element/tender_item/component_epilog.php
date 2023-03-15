<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $templateData
 * @var array $arParams
 * @var string $templateFolder
 * @global CMain $APPLICATION
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
        $loadCurrency = Loader::includeModule('currency');
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

if (isset($templateData['JS_OBJ']))
{
    ?>
    <script>
        BX.ready(BX.defer(function(){
            if (!!window.<?=$templateData['JS_OBJ']?>)
            {
                window.<?=$templateData['JS_OBJ']?>.allowViewedCount(true);
            }
        }));
    </script>

    <?
    // check compared state
    if ($arParams['DISPLAY_COMPARE'])
    {
        $compared = false;
        $comparedIds = array();
        $item = $templateData['ITEM'];

        if (!empty($_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]))
        {
            if (!empty($item['JS_OFFERS']))
            {
                foreach ($item['JS_OFFERS'] as $key => $offer)
                {
                    if (array_key_exists($offer['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
                    {
                        if ($key == $item['OFFERS_SELECTED'])
                        {
                            $compared = true;
                        }

                        $comparedIds[] = $offer['ID'];
                    }
                }
            }
            elseif (array_key_exists($item['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
            {
                $compared = true;
            }
        }

        if ($templateData['JS_OBJ'])
        {
            ?>
            <script>
                BX.ready(BX.defer(function(){
                    if (!!window.<?=$templateData['JS_OBJ']?>)
                    {
                        window.<?=$templateData['JS_OBJ']?>.setCompared('<?=$compared?>');

                        <? if (!empty($comparedIds)): ?>
                        window.<?=$templateData['JS_OBJ']?>.setCompareInfo(<?=CUtil::PhpToJSObject($comparedIds, false, true)?>);
                        <? endif ?>
                    }
                }));
            </script>
            <?
        }
    }

    // select target offer
    $request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
    $offerNum = false;
    $offerId = (int)$this->request->get('OFFER_ID');
    $offerCode = $this->request->get('OFFER_CODE');

    if ($offerId > 0 && !empty($templateData['OFFER_IDS']) && is_array($templateData['OFFER_IDS']))
    {
        $offerNum = array_search($offerId, $templateData['OFFER_IDS']);
    }
    elseif (!empty($offerCode) && !empty($templateData['OFFER_CODES']) && is_array($templateData['OFFER_CODES']))
    {
        $offerNum = array_search($offerCode, $templateData['OFFER_CODES']);
    }

    if (!empty($offerNum))
    {
        ?>
        <script>
            BX.ready(function(){
                if (!!window.<?=$templateData['JS_OBJ']?>)
                {
                    window.<?=$templateData['JS_OBJ']?>.setOffer(<?=$offerNum?>);
                }
            });
        </script>
        <?
    }
}

$pageSettings=$APPLICATION->GetPageProperty('pageSettings');
$pageSettings['CATALOG_NAME'] = $arResult['NAME'];
$APPLICATION->SetPageProperty('PageSettings',$pageSettings);

$pageSettings = $APPLICATION->GetPageProperty('pageSettings');

if (!isset($pageSettings['UF_TITLE'])){
    $pageSettings['UF_TITLE'] = $arResult['NAME']." в ##IN_CITY## - цена, характеристики, популярность";
}

if(!function_exists('mb_lcfirst')) {
    function mb_lcfirst($str) {
        $fc = mb_strtolower(mb_substr($str, 0, 1));
        return $fc . mb_substr($str, 1);
    }
}

if (!isset($pageSettings['UF_DESCRIPTION'])){
    $pageSettings['UF_DESCRIPTION'] = "Заказать под ключ ". mb_lcfirst($arResult['NAME']) ." в ##IN_CITY##. Фотографии, описание, стоимость под ключ. Отправьте заявку на расчет похожего ограждения с вашими параметрами.";
}
$APPLICATION->SetPageProperty('pageSettings', $pageSettings);