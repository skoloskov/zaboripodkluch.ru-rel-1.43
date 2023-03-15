<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Осмечивание забора");
?>

<section class="smeta">
    <div class="container smeta__container">
        <h1 class="main__title smeta__title">СОСТАВЛЕНИЕ СМЕТЫ НА СТРОИТЕЛЬСТВО ЗАБОРА ИЛИ ОГРАЖДЕНИЯ В 
        <span class="bolt"><font color="#b3cd34">
<!-- Город -->
<? $ufincity = $APPLICATION->GetPageProperty('regionSettings')['UF_INCITY']; ?>
<? if ($ufincity != '') { ?>
    <? echo $ufincity; ?>
<? } else { echo $APPLICATION->GetPageProperty('regionSettings')['UF_NAME']; } ?>
</span></font></h1>
        <p>Любая смета на строительно-монтажные работы по заборам состоит из двух разделов. Первый этап включает расчет стоимости строительных работ, а второй – стоимость всех необходимых материалов, аренды техники и доставки.</p>
        <p>Цена услуг, зависит от конструкции ограждения, а, следовательно, состава и объема работ, которые необходимо выполнить в процессе установки. </p>
    </div>
</section>
<section class="smeta-form">
    <div class="container smeta-form__container">
        <h3 class="smeta-form__title">Оформить заявку</h3>
        <form action="" class="smeta-form__form">
            <fieldset class="smeta-form__fieldset">

                <label class="smeta-form__lbl" for="smeta--name">Имя</label>
                <input class="smeta-form__input" id="smeta--name" type="text">

                <label class="smeta-form__lbl" for="smeta--phone">Телефон</label>
                <input class="smeta-form__input" id="smeta--phone" type="tel">

                <label class="smeta-form__lbl" for="smeta--email">E-mail</label>
                <input class="smeta-form__input" id="smeta--email" type="text">

                <label class="smeta-form__lbl" for="smeta--info">Подробные требования</label>
                <textarea class="smeta-form__textarea" name="" id="smeta--info" cols="30" rows="10"></textarea>

                <div class="smeta-form__block-btn">
                    <button class="btn smeta-form__submit" type="submit">Оформить заявку</button>
                    <button class="btn smeta-form__download" type="button"></button>
                </div>
                <small>Нажимая на кнопку, вы соглашаетесь с <a href="/privacy/">Политикой конфиденциальности</a></small>
            </fieldset>
        </form>
    </div>
</section>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>