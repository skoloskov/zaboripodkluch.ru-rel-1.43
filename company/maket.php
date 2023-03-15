<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Компании");
?>
<section class="company-page">
    <div class="container company-page__container">
        <h1 class="main__title company-page-content__title">Московские заборы</h1>
        <div class="company-page-content">
            <div class="company-page-content__left">
                <!-- Шапка контента -->
                <div class="company-page-content__header">
                    <div class="company-page-content__block-logo">
                        <img class="company-page-content__img company-page-content__img1" src="<?= SITE_TEMPLATE_PATH; ?>/img/company_logo4.png" alt="" />
                    </div>
                    <div class="company-page-content__title-block">
                        <div class="range-page__block">
                            <span class="range-page__title">Рейтинг</span>
                            <span class="range-page__number">5.0</span>
                        </div>
                        <div class="company-page-content__el">
                            <span class="company-page-content__title-el">Москва</span>
                            <span class="company-page-content__title-el">15 лет на рынке</span>
                            <span class="company-page-content__title-el">1335 заборов</span>
                        </div>
                        <div class="company-page-content__btn-block">
                            <button type="button" class="company-page-content__phone">
                                <span class="company-page-content__phone_text">Телефон</span>
                            </button>
                            <button type="button" class="company-page-content__order">
                                Предложить заказ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="company-page-content__right">
                <div class="company-page-content__work">
                    <div class="security-page__block">
                        <div class="team-page">
                            <span class="team-page__block">Свободных бригад:
                                <span class="team-page__link">10</span></span>
                        </div>
                        <span class="security-page__el security-page__contract">Работает
                            <a class="contract-page__link" href="">по договору</a></span>
                        <span class="security-page__el security-page__guarantee">Дает гарантию</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="company-page-content__description">
            Предлагаем современные заборы под ключ с гарантией и установкой.
            Используемые в производстве материалы соответствуют строгим
            стандартам качества. Монтаж осуществляется опытными специалистами,
            опыт работы которых не менее трех лет. Наша компания с 2012 года
            установила свыше 20 тысяч метров ограждений по стандартным и
            индивидуальным чертежам.<br /><br />Все условия сотрудничества и
            стоимость услуг фиксируются в договоре и являются неизменными до
            окончания проведения работ. Никаких скрытых платежей и комиссий,
            только прозрачная ценовая политика и высокий уровень сервиса!
        </div>
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
                    <td>Из профнастила</td>
                    <td>от 1650 руб</td>
                </tr>
                <tr>
                    <td>Из сетки-рабицы секционный (при h=1,8 м)</td>
                    <td>от 990 руб</td>
                </tr>
                <tr>
                    <td>Деревянные</td>
                    <td>от 1800 руб</td>
                </tr>
                <tr>
                    <td>Кованые</td>
                    <td>от 2000 руб за кв.м.</td>
                </tr>
                <tr>
                    <td>Кованые ворота</td>
                    <td>от 11500 руб за шт.</td>
                </tr>
                <tr>
                    <td>Каменные</td>
                    <td>от 1990 руб за кв.м.</td>
                </tr>
                <tr>
                    <td>Кирпичные</td>
                    <td>от 12600 руб</td>
                </tr>
                <tr>
                    <td>Комбинированные</td>
                    <td>от 10600 руб</td>
                </tr>
                <tr>
                    <td>Из профильной трубы</td>
                    <td>от 1800 руб</td>
                </tr>
                <tr>
                    <td>Шумозащитные заборы, экраны (при h=2 м)</td>
                    <td>от 3000 руб</td>
                </tr>
                <tr>
                    <td>Бетонные (при h=2 м)</td>
                    <td>3000 руб</td>
                </tr>
                <tr>
                    <td>Кирпичные столбы (при h столба = 2 м)</td>
                    <td>11900 руб за шт.</td>
                </tr>
                <tr>
                    <td>Кирпичный (кладка в 0,5 кирпича)</td>
                    <td>1700 руб</td>
                </tr>
                <tr>
                    <td>Кирпичный (кладка в 1,5 карпича)</td>
                    <td>2700 руб</td>
                </tr>
                <tr>
                    <td>Из поликарбоната</td>
                    <td>2850 руб</td>
                </tr>
            </tbody>
        </table>
        <span class="table__description">* В указанные цены на заборы уже включена стоимость работ по
            установке.</span>
    </div>
</section>
<!-- Секция territory -->
<section class="territory">
    <div class="container territory__container">
        <h2 class="territory__title section__title">Фото готовых заборов</h2>
        <select name="zabory" id="" class="territory__select">
            <option value="all">Все заборы</option>
            <option value="profnastil">Заборы из профнастила</option>
            <option value="shtaketnik">Заборы из металлического штакетника</option>
            <option value="rabica">Заборы из сетки-рабицы</option>
            <option value="profnastil-zabivStolb">Заборы из профнастила с забивными столбами</option>
            <option value="profnastil-fund">Заборы из профнастила на ленточном фундаменте</option>
            <option value="profnastil-kirpichStolb">Заборы из профнастила с кирпичными столбами</option>
            <option value="profnastil-utrambovka">Заборы из профнастила с утрамбовкой щебнем</option>
            <option value="profnastil-betonirStolb">Заборы из профнастила с бетонированием столбов</option>
            <option value="profnastil-vorotaIkalitki">Заборы из профнастила с воротами и калитками</option>
            <option value="shtaketnik-zabivStolb">Заборы из евроштакетника с забивными столбами</option>
            <option value="shtaketnik-utrambovka">Заборы из евроштакетника с утрамбовкой щебнем</option>
            <option value="shtaketnik-fund">Заборы из евроштакетника на ленточном фундаменте</option>
            <option value="shtaketnik-kirpichStolb">Заборы из евроштакетника с кирпичными столбами</option>
            <option value="shtaketnik-betonirStolb">Заборы из евроштакетника с бетонированием столбов</option>
            <option value="shtaketnik-vorotaIkalitki">Заборы из евроштакетника с воротами и клиткой</option>
            <option value="rabica-natyag">Заборы из сетки-рабицы в натяг</option>
            <option value="rabica-natyagArm">Заборы из сетки-рабицы в натяг с протяжкой арматуры</option>
            <option value="rabica-section">Заборы из сетки-рабицы секционный</option>
        </select>
        <ul class="territory__list">
            <li class="territory__item">
                <a class="territory__link bg__img1" href="">
                    <!-- cards 1 -->
                    <div class="territory__item-content">
                        <div class="territory__item-header">
                            <div class="territory__item-date">10.10.20</div>
                            <div class="territory__item-range">
                                <span class="range__el"></span>
                                <span class="range__el"></span>
                                <span class="range__el"></span>
                                <span class="range__el"></span>
                                <span class="range__el"></span>
                            </div>
                            <span class="range__text">рейтинг: 2015</span>
                        </div>
                        <div class="territory__item-title">
                            Забор из штакетника, Огуднево
                        </div>
                        <button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
                        <div class="territory__item-desc">
                            <div class="territory__desc-content">
                                <div class="territory__el_height">Высота</div>
                                <div class="territory__el_value">1,8 метра</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_color">Длина</div>
                                <div class="territory__el_rgb">150 метров</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_price">Стоимость</div>
                                <div class="territory__el_number">350 000 р</div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="territory__item">
                <a class="territory__link bg__img2" href="">
                    <!-- cards 2 -->
                    <div class="territory__item-content">
                        <div class="territory__item-date">9 октября 2020 года</div>
                        <div class="territory__item-title">
                            Забор из металлического штакетника, Боровский р-н, Киселево
                        </div>
                        <button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
                        <div class="territory__item-desc">
                            <div class="territory__desc-content">
                                <div class="territory__el_height">Высота</div>
                                <div class="territory__el_value">1,8 метра</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_color">Длина</div>
                                <div class="territory__el_rgb">150 метров</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_price">Стоимость</div>
                                <div class="territory__el_number">350 000 р</div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="territory__item">
                <a class="territory__link bg__img3" href="">
                    <!-- cards 3 -->
                    <div class="territory__item-content">
                        <div class="territory__item-date">6 октября 2020 года</div>
                        <div class="territory__item-title">
                            Фото забора из металлического штакетника, Щелковский район,
                            Масальское
                        </div>
                        <button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
                        <div class="territory__item-desc">
                            <div class="territory__desc-content">
                                <div class="territory__el_height">Высота</div>
                                <div class="territory__el_value">1,8 метра</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_color">Длина</div>
                                <div class="territory__el_rgb">150 метров</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_price">Стоимость</div>
                                <div class="territory__el_number">350 000 р</div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="territory__item">
                <a class="territory__link bg__img4" href="">
                    <!-- cards 4 -->
                    <div class="territory__item-content">
                        <div class="territory__item-date">4 октября 2020 года</div>
                        <div class="territory__item-title">
                            Забор из штакетника, Калужская обл, д. Макарово
                        </div>
                        <button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
                        <div class="territory__item-desc">
                            <div class="territory__desc-content">
                                <div class="territory__el_height">Высота</div>
                                <div class="territory__el_value">1,8 метра</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_color">Длина</div>
                                <div class="territory__el_rgb">150 метров</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_price">Стоимость</div>
                                <div class="territory__el_number">350 000 р</div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="territory__item">
                <a class="territory__link bg__img5" href="">
                    <!-- cards 5 -->
                    <div class="territory__item-content">
                        <div class="territory__item-date">1 октября 2020 года</div>
                        <div class="territory__item-title">
                            Забор из металлического штакетника, с. Пирочи
                        </div>
                        <button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
                        <div class="territory__item-desc">
                            <div class="territory__desc-content">
                                <div class="territory__el_height">Высота</div>
                                <div class="territory__el_value">1,8 метра</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_color">Длина</div>
                                <div class="territory__el_rgb">150 метров</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_price">Стоимость</div>
                                <div class="territory__el_number">350 000 р</div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="territory__item">
                <a class="territory__link bg__img6" href="">
                    <!-- cards 6 -->
                    <div class="territory__item-content">
                        <div class="territory__item-date">18 сентября 2020 года</div>
                        <div class="territory__item-title">
                            Забор из металлического штакетника, д. Киселевка
                        </div>
                        <button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
                        <div class="territory__item-desc">
                            <div class="territory__desc-content">
                                <div class="territory__el_height">Высота</div>
                                <div class="territory__el_value">1,8 метра</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_color">Длина</div>
                                <div class="territory__el_rgb">150 метров</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_price">Стоимость</div>
                                <div class="territory__el_number">350 000 р</div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="territory__item">
                <a class="territory__link bg__img7" href="">
                    <!-- cards 7 -->
                    <div class="territory__item-content">
                        <div class="territory__item-date">15 сентября 2020 года</div>
                        <div class="territory__item-title">
                            Забор из металлического штакетника, КП Истра Парк
                        </div>
                        <button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
                        <div class="territory__item-desc">
                            <div class="territory__desc-content">
                                <div class="territory__el_height">Высота</div>
                                <div class="territory__el_value">1,8 метра</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_color">Длина</div>
                                <div class="territory__el_rgb">Золотой дуб</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_price">Стоимость</div>
                                <div class="territory__el_number">350 000 р</div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="territory__item">
                <a class="territory__link bg__img8" href="">
                    <!-- cards 8 -->
                    <div class="territory__item-content">
                        <div class="territory__item-date">10 сентября 2020 года</div>
                        <div class="territory__item-title">
                            Забор из металлического штакетника, КП Балтия
                        </div>
                        <button type="button" class="territory__item-btn">Смотреть характеристики забора</button>
                        <div class="territory__item-desc">
                            <div class="territory__desc-content">
                                <div class="territory__el_height">Высота</div>
                                <div class="territory__el_value">2,0 метра</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_color">Длина</div>
                                <div class="territory__el_rgb">150 метров</div>
                            </div>
                            <div class="territory__desc-content">
                                <div class="territory__el_price">Стоимость</div>
                                <div class="territory__el_number">350 000 р</div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="territory__all-block">
            <button type="button" class="territory__all-btn">Показать следующие 30 товары</button>
        </div>
        <!-- <div class="territory-pagination">
            <a class="territory-pagination__link link__back">Назад</a>
            <a class="territory-pagination__link territory-pagination__link_active">1</a>
            <a class="territory-pagination__link">2</a>
            <a class="territory-pagination__link">3</a>
            <a class="territory-pagination__link link__invisible">4</a>
            <span class="link__none">...</span>
            <a class="territory-pagination__link">13</a>
            <a class="territory-pagination__link link__next">Далее</a>
        </div> -->
    </div>
</section>
<!-- Секция с отзывами -->
<section class="recall">
    <div class="container recall__container">
        <h2 class="recall__title section__title">Отзывы о компании</h2>

        <h3 class="recall__subtitle">32 отзыва</h3>
        <div class="recall__to-write">
            <span class="recall__to-write_text">Вы сотрудничали с этим исполнителем? Оставьте отзыв о его
                работе</span>
            <button type="button" class="recall__btn">
                <span class="recall__btn_text">Написать отзыв</span>
            </button>
        </div>
        <ul class="recall__list">
            <!-- Отзыв 1 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Ольга О.</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star_none"></span>
                                <span class="range-page__star_none"></span>
                                <span class="range-page__star_none"></span>
                                <span class="range-page__star_none"></span>
                            </div>
                            <div class="recall__date">26.12.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
                    possimus ipsa molestias voluptates, nisi commodi modi debitis
                    unde laudantium animi, quaerat, tenetur consectetur corporis in
                    id perspiciatis consequuntur eius. Quaerat? Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Voluptate, eaque maxime!
                    Architecto exercitationem iure, provident quo debitis
                    reprehenderit mollitia necessitatibus aspernatur, quis nemo,
                    eligendi minima fugit doloremque veritatis ut laboriosam?
                </div>
            </li>
            <!-- Отзыв 2 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">СЕРГЕЙ Г.</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                            </div>
                            <div class="recall__date">24.12.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
            </li>
            <!-- Отзыв 3 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Олег Ч.</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                            </div>
                            <div class="recall__date">04.12.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
                    possimus ipsa molestias voluptates, nisi commodi modi debitis.
                </div>
            </li>
            <!-- Отзыв 4 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Алан А.</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                            </div>
                            <div class="recall__date">26.11.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
                    possimus ipsa molestias voluptates, nisi commodi modi debitis
                    unde laudantium animi, quaerat, tenetur consectetur corporis in
                    id perspiciatis consequuntur eius.
                </div>
                <!-- Изображения -->
                <div class="recall__slider">
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
                    </div>
                </div>
            </li>
            <!-- Отзыв 5 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Юлия С.</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                            </div>
                            <div class="recall__date">05.11.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
            </li>
            <!-- Отзыв 6 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Владимир Корягин</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                            </div>
                            <div class="recall__date">23.09.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
                    possimus ipsa molestias voluptates, nisi commodi modi debitis
                    unde laudantium animi, quaerat, tenetur consectetur corporis in
                    id perspiciatis consequuntur eius. Quaerat? Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Voluptate, eaque maxime!
                    Architecto exercitationem iure, provident quo debitis
                    reprehenderit mollitia necessitatibus aspernatur, quis nemo,
                    eligendi minima fugit doloremque veritatis ut laboriosam?
                </div>
            </li>
            <!-- Отзыв 7 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Иван</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                            </div>
                            <div class="recall__date">23.09.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
                    possimus ipsa molestias voluptates, nisi commodi modi debitis
                    unde laudantium animi, quaerat, tenetur consectetur corporis in
                    id perspiciatis consequuntur eius.
                </div>
                <!-- Изображения -->
                <div class="recall__slider">
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img1.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img2.jpg" alt="" />
                    </div>
                    <div class="slider__item">
                        <img class="slide__img" src="<?= SITE_TEMPLATE_PATH; ?>/img/company/recall_img3.jpg" alt="" />
                    </div>
                </div>
            </li>
            <!-- Отзыв 8 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Наталья Е.</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                            </div>
                            <div class="recall__date">29.08.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
                    possimus ipsa molestias voluptates, nisi commodi modi debitis
                    unde laudantium animi, quaerat, tenetur consectetur corporis in
                    id perspiciatis consequuntur eius.
                </div>
            </li>
            <!-- Отзыв 9 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Игорь Климович</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                            </div>
                            <div class="recall__date">16.08.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
                    possimus ipsa molestias voluptates, nisi commodi modi debitis
                    unde laudantium animi, quaerat, tenetur consectetur corporis in
                    id perspiciatis consequuntur eius.
                </div>
            </li>
            <!-- Отзыв 10 -->
            <li class="recall__item">
                <div class="recall__header">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/user_img.png" alt="" class="recall__user" />
                    <div class="recall__block">
                        <span class="recall__name">Алексей</span>
                        <div class="recall__el">
                            <div class="recall__range-page">
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star"></span>
                                <span class="range-page__star_none"></span>
                            </div>
                            <div class="recall__date">04.08.2020</div>
                        </div>
                    </div>
                </div>
                <div class="recall__desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
                    possimus ipsa molestias voluptates, nisi commodi modi debitis
                    unde laudantium animi, quaerat, tenetur consectetur corporis in
                    id perspiciatis consequuntur eius. Quaerat? Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Voluptate, eaque maxime!
                    Architecto exercitationem iure, provident quo debitis
                    reprehenderit mollitia necessitatibus aspernatur, quis nemo,
                    eligendi minima fugit doloremque veritatis ut laboriosam?
                </div>
            </li>
        </ul>
        <div class="recall__pagination">
            <a class="pagination__link pagination__link_active">1</a>
            <a class="pagination__link">2</a>
            <a class="pagination__link">3</a>
            <a class="pagination__link">4</a>
            <a class="pagination__link">5</a>
            <a class="pagination__link">Далее</a>
        </div>
    </div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>