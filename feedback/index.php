<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Жалобы и предложения");
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
<section class="feedback">
    <div class="container feedback__container">
        <h1 class="main__title feedback__title">Помощь и поддержка. Жалобы и предложения</h1>
        <span class="feedback__desc">Ваши вопросы, жалобы и предложения по улучшению качества обслуживания</span>
        <form action="" class="feedback__form">
            <fieldset class="feedback__fieldset">

                <label class="feedback__lbl" for="">Тема обращения
                    <select class="feedback__select" name="" id="">
                        <option value="">--- Выберите ---</option>
                        <option value="">Предложение по работе сервиса</option>
                        <option value="">Жалоба на работу сервиса</option>
                        <option value="">Жалоба на организацию</option>
                        <option value="">Другая жалоба</option>
                    </select></label>

                <label class="feedback__lbl priory" for="">Контактное лицо
                    <input required class="feedback__input" type="text" placeholder="например, Иванов Иван" /></label>

                <label class="feedback__lbl priory" for="">E-mail
                    <input required class="feedback__input" type="text" placeholder="example@mail.ru" /></label>

                <label class="feedback__lbl priory" for="">Мобильный телефон
                    <input required class="feedback__input" type="text" placeholder="например: +7 (903) 123-45-67" /></label>

                <label class="feedback__lbl label__message priory" for="">Сообщение
                    <textarea class="feedback__textarea" name="" id="" cols="30" rows="10"></textarea></label>

                <small>Вы можете прикрепить до 5 файлов JPG, PNG или PDF общим весом до 50 Мбайт.</small>
                <div class="feedback__block-submit">
                    <div class="feedback__block-btn">
                        <button type="submit" class="btn feedback__btn feedback__submit">Отправить</button>
                        <button type="button" class="btn feedback__btn feedback__download"></button>
                    </div>
                    <span class="block__priory_red"><span class="priory_red">*</span> - обязательно для заполнения</span>
                </div>
            </fieldset>
        </form>
    </div>
</section>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>