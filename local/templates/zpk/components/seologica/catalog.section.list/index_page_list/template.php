<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder() . '/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));


if (0 < $arResult["SECTIONS_COUNT"]) {
?>
	<section class="types-fences">
		<div class="container types-fences__container">
			<h2 class="types-fences__title section__title"><?= (strpos($APPLICATION->getCurPage(),'/vorota/')!==false ? 'Виды ворот':'Виды заборов') ?></h2>
			<ul class="types-fences__list">
				<?
				foreach ($arResult['SECTIONS'] as &$arSection) {
					$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
					$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

					//echo '<pre>'.print_r($arSection, true).'</pre>';die();
				?>
					<li class="types-fences__item">
						<a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>" class="types-fences__link">
							<img data-src="<? echo $arSection['PICTURE']['SRC']; ?>" alt="<? echo $arSection['NAME']; ?>" class="types-fences__img lazyload" />
							<div class="item-desc">
								<p class="item-desc__title"><? echo $arSection['NAME']; ?></p>
								<span class="item-desc__price">от <?=$arSection['IPROPERTY_VALUES']['UF_PRICE']?> р/м.п.<br />от 5 дней</span>
							</div>
						</a>
					</li>
				<?
				}
				?>
			</ul>
		<?
		}
		?>
		</div>
	</section>