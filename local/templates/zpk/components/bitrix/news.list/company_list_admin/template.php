<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
//echo '<pre>'.print_r($arResult['DOMENS_LIST'], true).'</pre>';die();
?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<table width="100%" cellpading=0 cellspacing=0>
	<thead>
		<tr>
			<th>Логотип</th>
			<th>Название</th>
			<?/*<th>Свободных бригад</th>
			<th>Услуги</th>*/?>
			<th>Города</th>
			<th></th>
			
		</tr>
	</thead>
	<tbody>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	//echo '<pre>'.print_r($arItem, true).'</pre>';die();
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<tr class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<td>
				<a href="/admin-panel/edit_company.php?ID=<?echo $arItem["ID"]?>"><img
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="200"
						alt="<?=$arItem["NAME"]?>"
						title="<?=$arItem["NAME"]?>"
						/></a>
			
		</td>
		<td>
			<a href="/admin-panel/edit_company.php?ID=<?echo $arItem["ID"]?>"><b><?echo $arItem["NAME"]?></b></a>
		</td>
		<?/*<td>
		<?
			echo $arItem['PROPERTIES']['COMMANDS']['VALUE'];
		?>
		</td>
		<td>
		<?if (count($arItem['PROPERTIES']['ZABOR_TYPE'])){
			foreach($arItem['PROPERTIES']['ZABOR_TYPE']['VALUE'] as $prop){
				echo $arResult['SECTION_LIST'][$prop]['NAME'].'<br/>';
			}
		}?>
		</td>*/?>
		<td>
		<?if (count($arItem['PROPERTIES']['CITY'])){
			foreach($arItem['PROPERTIES']['CITY']['VALUE'] as $prop){
				echo $arResult['DOMENS_LIST'][$prop]['UF_NAME'].'<br/>';
			}
		}?>
		</td>
		<td>
			<a href="/admin-panel/edit_company.php?ID=<?echo $arItem["ID"]?>">Изменить</a>
		</td>
		<?/*foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;*/?>
	</tr>
<?endforeach;?>
	</tbody>
</table>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
