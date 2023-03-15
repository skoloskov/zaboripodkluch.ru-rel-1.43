<?
IncludeModuleLangFile(__FILE__); // в menu.php точно так же можно использовать языковые файлы
$aMenu = array(
    "parent_menu" => "global_menu_marketing", // поместим в раздел "Сервис"
    "sort"        => 1000,                    // вес пункта меню
    "url"         => "/domens-admin/",  // ссылка на пункте меню
    "text"        => "Управление поддоменами",       // текст пункта меню
    "title"       => "", // текст всплывающей подсказки
    "icon"        => "form_menu_icon", // малая иконка
    "page_icon"   => "form_page_icon", // большая иконка
    "items_id"    => "menu_webforms",  // идентификатор ветви
    "items"       => array(),          // остальные уровни меню сформируем ниже.
  );
return $aMenu;
?>