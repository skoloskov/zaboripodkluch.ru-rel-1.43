<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О сервисе");
?>



<section class="konf__section">
    <div class="container konf__container">
       <?/* <h1 class="konf__title main__title">Сервис по строительству забора</h1> */?>
        <ol class="konf-lvl1">
            <li>
        <h1 class="konf__title main__title">О проекте</h1>
                <p>Портал <span class="bolt"><font color="#b3cd34">Заборы</font>ПодКлюч</span> предоставляет сервис, который помогает заказчикам подобрать лучшие условия которые предлагают профессиональные исполнители по строительству заборов и ограждений в 
<span class="bolt"><font color="#b3cd34">
<!-- Город -->
<? $ufincity = $APPLICATION->GetPageProperty('regionSettings')['UF_INCITY']; ?>
<? if ($ufincity != '') { ?>
    <? echo $ufincity; ?>
<? } else { echo $APPLICATION->GetPageProperty('regionSettings')['UF_NAME']; } ?>
</span></font>

                . </p>
                <p>Наш проект – это узко специализированный программный продукт, разработанный группой IT специалистов. </p>
        <h1 class="konf__title main__title">Ответственность за выполнения работ по строительству заборов</h1>
                <p>Мы не оказывает услуги по вашим заказам и не являемся работодателями компаний размещенных на портале и соответственно не несем ответственности за результат их работы.</p>
                <p>Всю ответственность, гарантии за проведенные работы берет на себя подрядчик, которые описаны в официальном договоре.</p>
        <h1 class="konf__title main__title">Права и копирование любых данных с портала</h1>
      <font color="red"> <span class="bolt"> Запрещается:</span></font>
                <ol class="konf-lvl2__list">
                    <li>1.&nbsp;&nbsp;любое копирование или заимствования любых данных с сайта (парсинг);</li>
                    <li>2.&nbsp;&nbsp;использовать информационные материалы, без письменного согласия сервиса.
                </ol>
                <p>Не соблюдение данных правил является нарушением Федерального закона УК РФ Статья 146 "Об авторском праве и смежных правах", ст.1259 ст.1252 так как представленная информация является интеллектуальной собственностью и преследуется законами России.</p>
            </li>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
