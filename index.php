<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc_areas/top_block.php"
	)
);?> 
<?/* Секция Виды заборов */ ?>
<? $APPLICATION->IncludeComponent(
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

<?/* Секция Инфографика преимуществ */ ?>
<section class="advantages">
    <div class="container">
    <?$APPLICATION->IncludeComponent(
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

<?/* Секция Открытая форма Тендер */ ?>
    <section class="tender_form_section">
        <div class="container">
            <? $APPLICATION->IncludeComponent(
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

<?/* Секция Тендеры клиентов */ ?>
    <section class="parameter">
        <div class="container parameter__container">
            <h2 class="parameter__title section__title">
                Заказы по заборам в <?=$APPLICATION->GetPageProperty('regionSettings')['UF_INCITY']?>
            </h2>
            <?
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
                    "ELEMENT_SORT_FIELD" => "timestamp_x",
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

<?/* Секция компании */ ?>
    <section class="company">
    <div class="container company__container">
        <h2 class="parameter__title section__title">
            Исполнители по установке заборов в <?=$APPLICATION->GetPageProperty('regionSettings')['UF_INCITY']?> под ключ</h2>
        <p class="parameter__title_size-s">
            (список лучших подрядчиков)
        </p>
        <?
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
        ?> <?$APPLICATION->IncludeComponent(
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

<?/*Секция с товарами ?> */ ?><?
$CompanyList = $APPLICATION->GetPageProperty('CompanyList');
$GLOBALS['arrFilter'] = ['ACTIVE' => 'Y'];//, 'PROPERTY_COMPANY' => $CompanyList];
?> <?$APPLICATION->IncludeComponent(
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

<?/* Секция Люди искали */ ?>
<section class="people_search">
    <div class="container people_search_container">
        <h2 class="people_search__header">Люди искали похожее</h2>
        <div class="people_search__list">
            <a href="" class="people_search__link">заборы</a>
            <a href="" class="people_search__link">заборы из профнастила</a>
            <a href="" class="people_search__link">установка заборов</a>
            <a href="" class="people_search__link">откатные ворота</a>
            <a href="" class="people_search__link">строительство заборов</a>
            <a href="" class="people_search__link">забор из профлиста</a>
            <a href="" class="people_search__link">установка забора из профнастила</a>
            <a href="" class="people_search__link">установка забора из профлиста</a>
            <a href="" class="people_search__link">навесы</a>
            <a href="" class="people_search__link">монтаж забора</a>
            <a href="" class="people_search__link">заборы для дачи</a>
        </div>
    </div>
</section>

<?/* Секция Аккордеон Вопросы и ответы */ ?>
<section class="faq_accordion">
    <div class="container faq_accordion__container">
        <h2 class="faq_accordion__header">Люди часто спрашивают</h2>
        <div class="faq_accordion__list">
            <div class="faq_accordion__item">
                <div class="faq_accordion__item_header">Сколько стоит услуга «Строительство заборов и ограждений»? <span class="faq_accordion__item_arrow">></span></div>
                <div class="faq_accordion__item_body">Услуга «Строительство заборов и ограждений» может стоить от 50 000 рублей. Всё зависит от задачи: расскажите, что случилось, и мастера сами расскажут о расценках, а вы выберете подходящий вариант.</div>
            </div>
            <div class="faq_accordion__item">
                <div class="faq_accordion__item_header">Сколько компаний, которые оказывают услугу «Строительство заборов и ограждений»? <span class="faq_accordion__item_arrow">></span></div>
                <div class="faq_accordion__item_body">На нашем портале зарегистрированы 30 проверенных компаний, оказывающих услугу «Строительство заборов и ограждений».</div>
            </div>
            <div class="faq_accordion__item">
                <div class="faq_accordion__item_header">Клиенты обычно довольны услугой «Строительство заборов и ограждений»? <span class="faq_accordion__item_arrow">></span></div>
                <div class="faq_accordion__item_body">Заказчики, оставившие отзывы на Яндекс Услугах, в среднем оценивают услугу «Строительство заборов и ограждений» на 4.4 из 5.</div>
            </div>
            <div class="faq_accordion__item">
                <div class="faq_accordion__item_header">Как выбрать компанию в сфере «Строительство заборов и ограждений»? <span class="faq_accordion__item_arrow">></span></div>
                <div class="faq_accordion__item_body">Можно искать по каталогу, а можно создать заказ — тогда специалисты откликнутся сами. Чтобы выбрать лучшего из лучших, загляните в профиль компании — там есть отзывы и примеры работ.</div>
            </div>
        </div>
    </div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>