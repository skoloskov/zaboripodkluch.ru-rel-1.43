<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(79619314, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/79619314" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  <link rel="icon" href="/favicon.svg" type="image/x-icon">

  <?/*Шрифты*/ ?>
  <link rel="preload" href="<?= SITE_TEMPLATE_PATH; ?>/fonts/Montserrat-Regular.woff" as="fonts">
  <link rel="preload" href="<?= SITE_TEMPLATE_PATH; ?>/fonts/Montserrat-Regular.woff2" as="fonts">
  <link rel="preload" href="<?= SITE_TEMPLATE_PATH; ?>/fonts/Montserrat-Bold.woff" as="fonts">
  <link rel="preload" href="<?= SITE_TEMPLATE_PATH; ?>/fonts/Montserrat-Bold.woff2" as="fonts">
  <link rel="preload" href="<?= SITE_TEMPLATE_PATH; ?>/fonts/HelveticaNeueCyr.woff" as="fonts">



  <?/* Стилизация */ ?>
  <link type="text/css" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH; ?>/css/style.css" />
  <link type="text/css" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH; ?>/css/normalize.css" />

   <?/* Подключение Font Awesome */ ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH; ?>/css/jquery-ui.css">

  <? $APPLICATION->ShowHead(); ?>
  <title>
    <? $APPLICATION->ShowTitle() ?>
  </title>
</head>

<body>

  <? $APPLICATION->ShowPanel() ?>
  <?/* Header */ ?>
  <header class="header">
      <div class="preheader">
          <div class="container">
              <div class="preheader_city"><i class="fas fa-map-marker-alt"></i><?=$APPLICATION->GetPageProperty('regionSettings')['UF_NAME']?><i class="fas fa-chevron-down"></i> </div>
              <div class="preheader_phone">
                  <? $ufphone = $APPLICATION->GetPageProperty('regionSettings')['UF_PHONE']; ?>
                  <? if ($ufphone != '') { ?>
                      <? echo '<a href="tel:' . $ufphone . '">' . $ufphone . '</a>'; ?>
                  <? } else { echo '<a href="tel:88003018735">8 (800) 301-87-35</a>'; } ?>
              </div>
          </div>
      </div>
    <div class="container header__container">

        <div class="header__el header__desc">
            <div class="main_menu">
                <nav class="burger">
                    <button type="button" class="burger_toggle">
                        <span class="burger_top"></span>
                        <span class="burger_middle"></span>
                        <span class="burger_bottom"></span>
                    </button>
                </nav>
            </div>
            <a class="header__link" href="/">
                <img class="header__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/logo.png" alt="<?= city_replace($APPLICATION->GetPageProperty('pageSettings')['UF_ALTLOGO']) ?>" title="<?= city_replace($APPLICATION->GetPageProperty('pageSettings')['UF_ALTLOGO']) ?>" />
            </a>
        </div>
        <div class="mylinknone">
            <p>
                <a class='mylink' href="/zakazchik-po-stroitelstvu-zaborov/">ДЛЯ ЗАКАЗЧИКА</a>  |  <a class='mylink' href="/ispolnitel-po-stroitelstvu-zabora/">ДЛЯ ИСПОЛНИТЕЛЯ</a>
            </p>
        </div>
      <div class="header__el header__phone-block">
        <div class="header__phone-block_position">
            <button type="button" class="header__btn btn">+ Оформить тендер</button>
        </div>
      </div>
    </div>
    <div class="container">
    <div class="mylinkyes">
        <p>
            <a class='mylink' href="/zakazchik-po-stroitelstvu-zaborov/">ДЛЯ ЗАКАЗЧИКА</a>  |  <a class='mylink' href="/ispolnitel-po-stroitelstvu-zabora/">ДЛЯ ИСПОЛНИТЕЛЯ</a>
        </p>
    </div>
    </div>
  </header>



  <?$APPLICATION->IncludeComponent(
      "bitrix:main.include",
      "",
      Array(
          "AREA_FILE_SHOW" => "file",
          "AREA_FILE_SUFFIX" => "inc",
          "EDIT_TEMPLATE" => "",
          "PATH" => "/inc_areas/menu.php"
      )
  );?> 
<?/* Главная секция */ ?>
  <!-- Main -->
  <main class="main">
