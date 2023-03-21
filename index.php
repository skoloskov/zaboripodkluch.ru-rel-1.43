<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

<?php $APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc_areas/top_block.php"
	)
);?>
<?php /* Секция Виды заборов */ ?>
<?php $APPLICATION->IncludeComponent(
	"seologica:catalog.section.list",
	"slider_showcase",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "objects",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"USE_DOMENS_FOR_CACHE" => $_SERVER["HTTP_HOST"],
		"VIEW_MODE" => "LINE"
	)
); ?>

<?php /* Секция Инфографика преимуществ */ ?>
<section class="advantages">
    <div class="container">
        <?php $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/inc_areas/advantages.php"
        )
    );?>
    </div>
</section>

<?php /* Секция Открытая форма Тендер */ ?>
    <section class="tender_form_section">
        <div class="container">
            <?php $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/inc_areas/tender_form.php",
                    "BLOCK" => 'modal'
                )
            );?>
        </div>
    </section>

<?php /* Секция Тендеры клиентов */ ?>
    <section class="parameter">
        <div class="container parameter__container">
            <h2 class="parameter__title section__title">
                Заказы по заборам в <?=$APPLICATION->GetPageProperty('regionSettings')['UF_INCITY']?>
            </h2>
            <?php
            $arr_domen_name = explode('.', $_SERVER['HTTP_HOST']);

            if ($arr_domen_name[0] == 'zaboripodkluch') {
                $region_xml_id = "moskva";
            }
            else {
                $region_xml_id = $arr_domen_name[0];
            }

            $region_value = CIBlockPropertyEnum::GetList(Array(),
                Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "XML_ID"=>$region_xml_id))->GetNext()["VALUE"];

            $GLOBALS['arrTenderFilter']  = array("=PROPERTY_REGION_VALUE" => $region_value);

            $APPLICATION->IncludeComponent(
	"seologica:catalog.section", 
	"tenders_list", 
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
		"COMPONENT_TEMPLATE" => "tenders_list",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "active_from",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrTenderFilter",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "tenders",
		"INCLUDE_SUBSECTIONS" => "A",
		"LABEL_PROP" => array(
			0 => "CUSTOMER_TYPE",
			1 => "STATUS",
			2 => "TYPE_FENCE",
			3 => "PILLARS",
			4 => "GATE",
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "tenders",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "18",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PROPERTY_CODE_MOBILE" => array(
		),
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
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
		"USE_PRODUCT_QUANTITY" => "N",
		"LABEL_PROP_MOBILE" => array(
		),
		"LABEL_PROP_POSITION" => "top-left",
		"SEF_RULE" => "",
		"SECTION_CODE_PATH" => ""
	),
	false
);?>
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
                    <tr>
                        <td>Профнастил</td>
                        <td>1545 руб.</td>
                    </tr>
                    <tr>
                        <td>Евроштакетник</td>
                        <td>2008 руб.</td>
                    </tr>
                    <tr>
                        <td>Забор из сетки рабица</td>
                        <td>770 руб.</td>
                    </tr>
                    <tr>
                        <td>Сварные заборы </td>
                        <td>1795 руб.</td>
                    </tr>
                    <tr>
                        <td>Заборы из дерева</td>
                        <td>1000 руб.</td>
                    </tr>
                </tbody>
            </table>
            <span class="table__description">* В указанные цены на заборы уже включена стоимость работ по
			установке.</span>
        </div>
    </section>

<?php /* Секция компании */ ?>
    <section class="company">
    <div class="container company__container">
        <h2 class="parameter__title section__title">
            Исполнители по установке заборов в <?=$APPLICATION->GetPageProperty('regionSettings')['UF_INCITY']?> под ключ</h2>
        <p class="parameter__title_size-s">
            (список лучших подрядчиков)
        </p>
        <?php
        $CompanyList = $APPLICATION->GetPageProperty('CompanyList');
        $GLOBALS['arrFilter'] = ['ID' => $CompanyList];
        $sort = "SHOW_COUNTER";
        $order = "desc";

        if (isset($_REQUEST['company_sort'])) {
            switch ($_REQUEST['company_sort']) {
                case 'free':
                    $sort = "PROPERTY_COMMANDS";
                    $order = "desc";
                    break;
                case 'works':
                    $sort = "PROPERTY_COMPLETED";
                    $order = "desc";
                    break;
                case 'years':
                    $sort = "PROPERTY_YEARS";
                    $order = "asc";
                    break;
                default:
                    break;
            }
        }
        ?> <?php $APPLICATION->IncludeComponent(
            "seologica:catalog.section",
            "company_list",
            Array(
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
                "COMPONENT_TEMPLATE" => ".default",
                "DETAIL_URL" => "",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_COMPARE" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "ELEMENT_SORT_FIELD" => $sort,
                "ELEMENT_SORT_FIELD2" => "id",
                "ELEMENT_SORT_ORDER" => $order,
                "ELEMENT_SORT_ORDER2" => "desc",
                "ENLARGE_PRODUCT" => "STRICT",
                "FILTER_NAME" => "arrFilter",
                "IBLOCK_ID" => "1",
                "IBLOCK_TYPE" => "catalog",
                "INCLUDE_SUBSECTIONS" => "Y",
                "LABEL_PROP" => "",
                "LAZY_LOAD" => "N",
                "LINE_ELEMENT_COUNT" => "3",
                "LOAD_ON_SCROLL" => "N",
                "MESSAGE_404" => "",
                "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                "MESS_BTN_BUY" => "Купить",
                "MESS_BTN_DETAIL" => "Подробнее",
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
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Товары",
                "PAGE_ELEMENT_COUNT" => "5",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "PRICE_CODE" => "",
                "PRICE_VAT_INCLUDE" => "Y",
                "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                "PRODUCT_ID_VARIABLE" => "id",
                "PRODUCT_PROPS_VARIABLE" => "prop",
                "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                "PROPERTY_CODE_MOBILE" => "",
                "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
                "RCM_TYPE" => "personal",
                "SECTION_CODE" => "",
                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                "SECTION_ID_VARIABLE" => "SECTION_ID",
                "SECTION_URL" => "",
                "SECTION_USER_FIELDS" => array(0=>"",1=>"",),
                "SEF_MODE" => "N",
                "SET_BROWSER_TITLE" => "Y",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "Y",
                "SET_META_KEYWORDS" => "Y",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "Y",
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
        );?>

        <?php /*Секция с товарами ?> */ ?>
        <?php
        $CompanyList = $APPLICATION->GetPageProperty('CompanyList');
        $GLOBALS['arrFilter'] = ['ACTIVE' => 'Y'];//, 'PROPERTY_COMPANY' => $CompanyList];
        ?>
        <?php $APPLICATION->IncludeComponent(
                "seologica:catalog.section",
                "objects_pictures",
                Array(
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
                    "PAGE_ELEMENT_COUNT" => "12",
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
                    "SECTION_CODE" => isset($_REQUEST['section'])?html_entity_decode($_REQUEST['section']):'',
                    "SECTION_ID" => "",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SECTION_URL" => "",
                    "SECTION_USER_FIELDS" => array("",""),
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
</div>
 </section>

<?php /* Секция Люди искали */ ?>
    <section class="people_search">
        <div class="container people_search_container">
            <h2 class="people_search__header">Люди искали похожее</h2>
            <?php
            $GLOBALS['arrFilterPeopleAsk'] = ['PROPERTY_LINKS_SECTION' => 'main'];
            $APPLICATION->IncludeComponent(
                "seologica:catalog.section",
                "people_ask_list",
                Array(
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
                    "FILTER_NAME" => "arrFilterPeopleAsk",	// Имя массива со значениями фильтра для фильтрации элементов
                    "IBLOCK_ID" => "5",	// Инфоблок
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
                    "PAGE_ELEMENT_COUNT" => "50",	// Количество элементов на странице
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
                    "SEF_MODE" => "N",	// Включить поддержку ЧПУ
                    "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
                    "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                    "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
                    "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
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
            ); ?>
        </div>
    </section>

<?php /* Секция Аккордеон Вопросы и ответы */ ?>
<section class="faq_accordion">
    <div class="container faq_accordion__container">
        <h2 class="faq_accordion__header">Люди часто спрашивают</h2>
        <div class="faq_accordion__list">
            <div class="faq_accordion__item">
                <div class="faq_accordion__item_header">Сколько стоит услуга «Строительство заборов и ограждений»? <span class="faq_accordion__item_arrow"><i class="fas fa-chevron-down"></i></span></div>
                <div class="faq_accordion__item_body">Услуга «Строительство заборов и ограждений» может стоить от 50 000 рублей. Всё зависит от задачи: расскажите, что случилось, и мастера сами расскажут о расценках, а вы выберете подходящий вариант.</div>
            </div>
            <div class="faq_accordion__item">
                <div class="faq_accordion__item_header">Сколько компаний, которые оказывают услугу «Строительство заборов и ограждений»? <span class="faq_accordion__item_arrow"><i class="fas fa-chevron-down"></i></span></div>
                <div class="faq_accordion__item_body">На нашем портале зарегистрированы 30 проверенных компаний, оказывающих услугу «Строительство заборов и ограждений».</div>
            </div>
            <div class="faq_accordion__item">
                <div class="faq_accordion__item_header">Клиенты обычно довольны услугой «Строительство заборов и ограждений»? <span class="faq_accordion__item_arrow"><i class="fas fa-chevron-down"></i></span></div>
                <div class="faq_accordion__item_body">Заказчики, оставившие отзывы на Яндекс Услугах, в среднем оценивают услугу «Строительство заборов и ограждений» на 4.4 из 5.</div>
            </div>
            <div class="faq_accordion__item">
                <div class="faq_accordion__item_header">Как выбрать компанию в сфере «Строительство заборов и ограждений»? <span class="faq_accordion__item_arrow"><i class="fas fa-chevron-down"></i></span></div>
                <div class="faq_accordion__item_body">Можно искать по каталогу, а можно создать заказ — тогда специалисты откликнутся сами. Чтобы выбрать лучшего из лучших, загляните в профиль компании — там есть отзывы и примеры работ.</div>
            </div>
        </div>
    </div>
</section>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>