<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<section class="hero">
    <div class="container hero__container">
        <div class="hero__container_block">
            <h1 class="main__title hero__title">
                <?= city_replace($APPLICATION->GetPageProperty('pageSettings')['UF_H1']) ?><br/>
                <? /*Найдено <span class="hero__number"><?= ($APPLICATION->GetPageProperty('CompanyList')!== null ? count($APPLICATION->GetPageProperty('CompanyList')) : count($APPLICATION->GetPageProperty('CompanyList'))) ?></span> проверенных подрядчиков!*/ ?>
            </h1>
            <div class="hero__desc">
                Вам не придется обзванивать компании в поисках исполнителя. Создайте заказ и опишите требования -
                свободные бригады сами пришлют свои сметы и предложения.
            </div>
            <div class="hero__buttons">
                <div class="hero__button_item">
                    <button class="hero__button_item_button btn modal-order">Добавить заказ</button>
                    <span class="hero__button_item_desc">никаких лишних звонков - мы никому <br>не показываем ваш номер</span>
                </div>
                <div class="hero__button_item hero__button_item_tender">
                    <button class="hero__button_item_button btn modal-tender">Заказ на тендер</button>
                    <span class="hero__button_item_desc">изучите отзывы об исполнителях, сравните <br>их условия и цены на вашу работу</span>
                </div>
            </div>
        </div>
    </div>
</section>