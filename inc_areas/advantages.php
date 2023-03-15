<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>


<h2 class="advantages__title">Портал строительных компаний по заборам и ограждениям в <? $ufincity = $APPLICATION->GetPageProperty('regionSettings')['UF_INCITY']; ?>
<? if ($ufincity != '') { ?>
    <? echo $ufincity; ?>
<? } else { echo $APPLICATION->GetPageProperty('regionSettings')['UF_NAME']; } ?>!</h2>
<div class="advantages__description">Поможем найти компанию или бригаду по вашим критериям выбора. Все подрядчики, зарегистрированные на нашем портале, специализируются на строительстве разных видов заборово и прошли документальную проверку.</div>
<div class="advantages__infografica">
    <div class="advantages__infografica_item advantages__infografica_item_waiting">
        <h3 class="advantages__infografica_item_title">5-15 минут</h3>
        <span class="advantages__infografica_item_descr"> среднее время ожидания первого предложения</span>
    </div>
    <div class="advantages__infografica_item advantages__infografica_item_saving">
        <h3 class="advantages__infografica_item_title">До 60% экономии</h3>
        <span class="advantages__infografica_item_descr">за счет конкуренции</span>
    </div>
    <div class="advantages__infografica_item advantages__infografica_item_contractors">
        <h3 class="advantages__infografica_item_title">10-ки компаний</h3>
        <span class="advantages__infografica_item_descr">поборются за ваш заказ</span>
    </div>
    <div class="advantages__infografica_item advantages__infografica_item_offers">
        <h3 class="advantages__infografica_item_title">7 предложений</h3>
        <span class="advantages__infografica_item_descr">в среднем приходит на заказ</span>
    </div>
    <div class="advantages__infografica_item advantages__infografica_item_confidentiality">
        <h3 class="advantages__infografica_item_title">Конфиденциально</h3>
        <span class="advantages__infografica_item_descr">сообщайте свои контакты только выбранным исполнителям</span>
    </div>
    <div class="advantages__infografica_item advantages__infografica_item_rewiew">
        <h3 class="advantages__infografica_item_title">Сопровождение</h3>
        <span class="advantages__infografica_item_descr">работы подрядчика до сдачи</span>
    </div>
</div>