<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Смета");
?>

<section class="smeta">
    <div class="container smeta__container">
        <h1 class="main__title smeta__title">Составление сметы заборы</h1>
        <p>Любая смета на строительно-монтажные работы, в том числе и на монтаж состоит из двух разделов. Первый раздел включает расчет стоимости строительных работ, а второй раздел – стоимость материалов, необходимых для выполнения работ. Цена услуг, предоставляемых строительной организацией, зависит от конструкции ограждения, а, следовательно, состава и объема работ, которые необходимо выполнить в процессе строительства. Именно стоимость услуг является базой для расчета налогов и обязательных платежей в бюджет, обязательных для каждого предприятия. Раздел сметы, определяющий стоимость материалов, в обязательном порядке согласовывается с заказчиком. Ведь именно он решает материал использовать для ограждения и какой конструкции должны быть опорные столбы</p>
        <h2 class="section__title eskiz__title">Эскиз забора</h2>
        <p>Лучше всего до начала строительства заказать проект забора в специализированной проектной организации или у профессионального архтектора. Несмотря на кажущуюся простоту конструкции, забор достаточно ответственное сооружение. Просто забив металлические трубы и прикрутив к соединяющим их прогонам материал, можно уже следующей весной получить покосившееся или даже упавшее ограждение и начать активно заниматься его ремонтом. Проекты учитывают множество факторов, которые влияют на выбор конструкции фундаментов забора и материалов, используемых для изготовления каркаса ограждения. Особенно это касается тех ограждений, которые планируется установить на проблемных участках: болотистой местности, уклоне, грунтах, подверженных повышенному вспучиванию. Само собой разумеется, что любой проект забора разрабатывается с учетом требований заказчика.</p>
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