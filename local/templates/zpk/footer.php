<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
if ($APPLICATION->GetPageProperty('PageSettings')['UF_TITLE']) {
	$title = city_replace($APPLICATION->GetPageProperty('PageSettings')['UF_TITLE']);
}

if ($APPLICATION->GetPageProperty('PageSettings')['UF_KEYWORDS']) {
	$keywords = city_replace($APPLICATION->GetPageProperty('PageSettings')['UF_KEYWORDS']);
}

if ($APPLICATION->GetPageProperty('PageSettings')['UF_DESCRIPTION']) {
	$description = city_replace($APPLICATION->GetPageProperty('PageSettings')['UF_DESCRIPTION']);
}

$APPLICATION->SetPageProperty('title', $title);
$APPLICATION->SetPageProperty('keywords', $keywords);
$APPLICATION->SetPageProperty('description', $description);

?>
</main>
<!-- Footer -->
<footer class="footer">
	<div class="container footer__container">
		<ul class="footer__list">
			<li class="footer__item">
				<a class="footer__logo-link" href="#">
					<img class="footer__logo" src="<?= SITE_TEMPLATE_PATH; ?>/img/logo.png" alt="Логотип" />
				</a>
			</li>
			<li class="footer__item">
				<div class="footer__subtitle">Заборы</div>
				<ul class="footer__nav">
					<li class="nav__item">
						<a class="nav__link" href="/zabory-dlya-dachi/">Заборы для дачи</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="/zabory-iz-profnastila/">Заборы из профнастила</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="/zabory-iz-metallicheskogo-shtaketnika/">Заборы из еврошаткетника</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="/zabory-iz-setki-rabitsy/">Заборы из сетки – рабицы</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="/3d-zabory/">3D заборы</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="/vorota/">Ворота</a>
					</li>
				</ul>
			</li>
            <li class="footer__item">
                <div class="footer__subtitle"><a  href="/servis-po-stroitelstvu-zabora/">О сервисе</a></div>
                <ul class="footer__nav">
                        <li class="nav__item">
                        <a class="nav__link" href="/zakazchik-po-stroitelstvu-zaborov/">Для заказчика</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="/ispolnitel-po-stroitelstvu-zabora/">Для исполнителя</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="/osmechivanie-zabora/">Осмечивание забора</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="/moderation/">Модерация</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="/feedback/">Жалобы и предложения </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="/privacy/">Политика конфиденциальности</a>
                    </li>
                </ul>
            </li>
			<li class="footer__item">
				<div class="footer__subtitle">Горячая линия</div>
                    <? $ufphone = $APPLICATION->GetPageProperty('regionSettings')['UF_PHONE']; ?>
                    <? if ($ufphone != '') { ?>
                    <? echo '<a class="footer__phone" href="tel:' . $ufphone . '">' . $ufphone . '</a>'; ?>
                    <? } else { echo '<a class="footer__phone" href="tel:88003018735">8 (800) 301-87-35</a>'; } ?>
				<div class="footer__block-contacts">
                    <? $ufmail = $APPLICATION->GetPageProperty('regionSettings')['UF_MAIL']; ?>
                    <? if ($ufmail != '') { ?>
                    <? echo '<a class="footer__mail" href="mailto:' . $ufmail . '">' . $ufmail . '</a>'; ?>
                    <? } else { echo '<a class="footer__mail" href="mailto:zakaz@zaboripodkluch.ru"></a>'; } ?>
                    <a></a>
					<span class="footer__time">9:00 - 20:00</span>
					<div class="footer__block-social">
                        <a href="https://wa.me/79777760323"> <span class="footer__whatsapp"></span></a>
                        <a href="https://telegram.me/+79777760323" alt="Telegram"  ><span class="footer__viber"></span> </a>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<div class="container footer-bottom__container">
		<div class="author">
			Копирование любых материалов с сайта строго запрещена и является нарушением Федерального закона УК РФ Статья 146 "Об авторском праве и смежных правах",<br />
			ст.1259 ст.1252 так как представленная информация является интеллектуальной собственностью компании.
		</div>
	</div>
</footer>

<?/* Модальное окно Оформить заказ */ ?>
<div class="order_fence popup" id="order_fence">
    <?
    $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/inc_areas/order_form.php",
            "BLOCK" => 'modal'
        )
    );
    ?>
	<div class="black"></div>
</div>

<?/* Модальное окно Оформить тендер */ ?>
<div class="tender_fence popup" id="tender_fence">
    <?
    $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/inc_areas/tender_form.php",
            "BLOCK" => 'modal'
        )
    );
    ?>
    <div class="black"></div>
</div>

<?/*Модальное окно Спасибо*/ ?>
<div class="thanks popup" id="thanks">
	<div class="thanks__block">
		<div class="thanks__name"></div>
		<div class="thanks__text">
			Благодарим Вас за заполнение опросника по расчету стоимости ограждения!<br />
			Вашу заявку уже обрабатывают выбранные компании и отправят вам расчетную смету!<br /><br />
			Из них Вы сможете выбрать лучшего исполнителя!
		</div>
		<button type="button" class="thanks__btn btn">Спасибо</button>
	</div>
	<div class="black"></div>
</div>
<!-- Возврат вверх -->
<a id="button__up"></a>


<?/* JQuery */ ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script -->
<?/* Slider click */ ?>
<script src="<?= SITE_TEMPLATE_PATH; ?>/script/slick.min.js"></script>

<?/* lazyload */ ?>
<script src="<?= SITE_TEMPLATE_PATH; ?>/script/lazyload.min.js"></script>

<!-- Modal Win -->
<script src="<?= SITE_TEMPLATE_PATH; ?>/script/modal_win.js"></script>
<script src="<?= SITE_TEMPLATE_PATH; ?>/script/modal_photo.js"></script>
<!-- JS -->
<script src="<?= SITE_TEMPLATE_PATH; ?>/script/new_scripts.min.js"></script>

<!-- Mask and validation form -->
<script src="<?= SITE_TEMPLATE_PATH; ?>/script/inputmask.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH; ?>/script/just-validate.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH; ?>/script/script.js"></script>

<?
if (strpos($APPLICATION->getCurPage(), 'domens-admin') != 0) {
?>
	<script type="text/javascript" src="/domens-admin/domens-admin.js"></script>
<?
}
?>

<!---/Кнопка WhatsApp -->
<a href="https://wa.me/79777760323" target="_blank" title="Написать в Whatsapp" rel="noopener noreferrer">
  <div class="whatsapp-button">
      <i class="fab fa-whatsapp"></i>
  </div>
</a>

</body>

</html>