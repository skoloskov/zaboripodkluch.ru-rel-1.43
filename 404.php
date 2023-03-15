<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404");
?>
<div class="container">
		<h1 class="main__title">Ошибка 404 - Страница не найдена</h1>
		<p style="text-align: center">
		Запрошенной Вами страницы не существует!
		</p>
	</div>
</div>

<?/* Секция Виды заборов */?>
<?$APPLICATION->IncludeComponent("seologica:catalog.section.list", "index_page_list", Array(
			"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
				"CACHE_TYPE" => "A",	// Тип кеширования
				"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
				"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
				"FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
				"IBLOCK_ID" => "3",	// Инфоблок
				"IBLOCK_TYPE" => "objects",	// Тип инфоблока
				"SECTION_CODE" => "",	// Код раздела
				"SECTION_FIELDS" => array(	// Поля разделов
					0 => "",
					1 => "",
				),
				"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
				"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
				"SECTION_USER_FIELDS" => array(	// Свойства разделов
					0 => "",
					1 => "",
				),
				"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
				"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
				"USE_DOMENS_FOR_CACHE" => $_SERVER["HTTP_HOST"],	// Домен кеширования (по умолчанию '={$_SERVER["HTTP_HOST"]}')
				"VIEW_MODE" => "LINE",	// Вид списка подразделов
				"COMPONENT_TEMPLATE" => ".default"
			),
			false
		);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>