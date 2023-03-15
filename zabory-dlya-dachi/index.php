<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Объекты");
?>

<section class="breadcrumb__section">
	<div class="container breadcrumb__container">
		<? $APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"",
			array()
		); ?>
	</div>
</section>

<?
$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc_areas/top_block.php"
	)
);
?>
<?
$GLOBALS['sectionsFilter']=['!ID'=>9];
$APPLICATION->IncludeComponent("seologica:catalog.section.list", "index_page_list", Array(
			"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
				"CACHE_TYPE" => "A",	// Тип кеширования
				"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
				"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
				"FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
				"USE_FILTER" =>"Y",
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
	<?/*Секция с товарами*/ ?>
<?
$CompanyList = $APPLICATION->GetPageProperty('CompanyList');
$GLOBALS['arrFilter'] = ['ACTIVE' => 'Y'];//, 'PROPERTY_COMPANY' => $CompanyList];
?>
<? $APPLICATION->IncludeComponent(
	"seologica:catalog.section",
	"zabor_list",
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "SHOW_COUNTER",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrFilter",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "objects",
		"INCLUDE_SUBSECTIONS" => "A",
		"LABEL_PROP" => array(),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "show_more",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "6",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PROPERTY_CODE_MOBILE" => array(),
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => isset($_REQUEST['section']) ? html_entity_decode($_REQUEST['section']) : '',
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("", ""),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_DOMENS_FOR_CACHE" => $_SERVER["HTTP_HOST"],
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N"
	)
); ?>
	<section class="company">
        <div class="container company__container">
		
			<?$APPLICATION->IncludeComponent("seologica:catalog.section", "company_list", Array(
				"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
					"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
					"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
					"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
					"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
					"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
					"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
					"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
					"CACHE_GROUPS" => "Y",	// Учитывать права доступа
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_TYPE" => "A",	// Тип кеширования
					"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
					"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
					"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
					"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
					"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
					"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
					"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
					"ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
					"FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
					"USE_FILTER" => "Y",
					"IBLOCK_ID" => "1",	// Инфоблок
					"IBLOCK_TYPE" => "catalog",	// Тип инфоблока
					"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
					"LABEL_PROP" => "",	// Свойства меток товара
					"LAZY_LOAD" => "N",	// Показать кнопку ленивой загрузки Lazy Load
					"LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
					"LOAD_ON_SCROLL" => "N",	// Подгружать товары при прокрутке до конца
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
					"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
					"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
					"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
					"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
					"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
					"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
					"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
					"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
					"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
					"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
					"PAGER_TITLE" => "Товары",	// Название категорий
					"PAGE_ELEMENT_COUNT" => "18",	// Количество элементов на странице
					"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
					"PRICE_CODE" => "",	// Тип цены
					"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",	// Порядок отображения блоков товара
					"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
					"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",	// Вариант отображения товаров
					"PROPERTY_CODE_MOBILE" => "",	// Свойства товаров, отображаемые на мобильных устройствах
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],	// Параметр ID продукта (для товарных рекомендаций)
					"RCM_TYPE" => "personal",	// Тип рекомендации
					"SECTION_CODE" => "",	// Код раздела
					"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
					"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
					"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
					"SECTION_USER_FIELDS" => array(	// Свойства раздела
						0 => "",
						1 => "",
					),
					"SEF_MODE" => "N",	// Включить поддержку ЧПУ
					"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
					"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
					"SHOW_404" => "N",	// Показ специальной страницы
					"SHOW_ALL_WO_SECTION" => "N",	// Показывать все элементы, если не указан раздел
					"SHOW_FROM_SECTION" => "N",	// Показывать товары из раздела
					"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
					"SHOW_SLIDER" => "Y",	// Показывать слайдер для товаров
					"SLIDER_INTERVAL" => "3000",	// Интервал смены слайдов, мс
					"SLIDER_PROGRESS" => "N",	// Показывать полосу прогресса
					"TEMPLATE_THEME" => "blue",	// Цветовая тема
					"USE_DOMENS_FOR_CACHE" => $_SERVER["HTTP_HOST"],	// Домен кеширования (по умолчанию '={$_SERVER["HTTP_HOST"]}')
					"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
					"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
					"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
					"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
					"COMPONENT_TEMPLATE" => ".default"
				),
				false
			);?>
		</div>
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>