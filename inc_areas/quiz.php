<form class="quiz" action="">
  <fieldset class="quiz__fieldset">
    <ul class="quiz__list">
      <?/*Первый вопрос*/ ?>
      <li class="quiz__item quiz1__item">
        <div class="quiz__left">
          <div class="quiz__question1">
            <div class="questions__title question1__title">Какой вам нужен тип забора?</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar"></div>
              </div>
              <span class="questions__number">1-й вопрос из 7</span>
            </div>
            <div class="question1__block">
              <span class="questions__subtitle">Укажите из какого материала вы планируете установить забор?</span>
              <ul class="question1__list">
                <li class="question1__item">
                  <label for="<?= $arParams['BLOCK'] ?>question1__radio1" class="question1__lbl">
                    <img class="question1__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/img_zakaz/profnastil.png" alt="" />
                    <div class="question1__desc">
                      <input id="<?= $arParams['BLOCK'] ?>question1__radio1" name="question1__radio" type="radio" value="Заборы из профнастила" class="question1__radio">
                      Заборы из профнастила
                    </div>
                  </label>
                </li>
                <li class="question1__item">
                  <label for="<?= $arParams['BLOCK'] ?>question1__radio2" class="question1__lbl">
                    <img class="question1__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/img_zakaz/shtaketnik.png" alt="" />
                    <div class="question1__desc">
                      <input id="<?= $arParams['BLOCK'] ?>question1__radio2" name="question1__radio" type="radio" value="Заборы из евроштакетника" class="question1__radio">
                      Заборы из евроштакетника
                    </div>
                  </label>
                </li>
                <li class="question1__item">
                  <label for="<?= $arParams['BLOCK'] ?>question1__radio3" class="question1__lbl">
                    <img class="question1__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/img_zakaz/setka_rabica.png" alt="" />
                    <div class="question1__desc">
                      <input id="<?= $arParams['BLOCK'] ?>question1__radio3" name="question1__radio" type="radio" value="Заборы из сетки рабицы" class="question1__radio">
                      Заборы из сетки рабицы
                    </div>
                  </label>
                </li>
                <li class="question1__item">
                  <label for="<?= $arParams['BLOCK'] ?>question1__radio4" class="question1__lbl">
                    <img class="question1__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/img_zakaz/3d.png" alt="" />
                    <div class="question1__desc">
                      <input id="<?= $arParams['BLOCK'] ?>question1__radio4" name="question1__radio" type="radio" value="3D заборы" class="question1__radio">
                      3D заборы
                    </div>
                  </label>
                </li>
              </ul>
            </div>
            <div class="questions__block-btn">
              <button type="button" class="questions__back close__btn">Закрыть</button>
              <button type="button" class="questions__next question1__btn">Далее</button>
            </div>
          </div>
        </div>
        <div class="quiz__right">
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <span class="question1-right__subtitle">Популярные виды заборов:</span>
            <ol class="question1-right__list">
              <li class="question1-right__item">Заборы из профнастила</li>
              <li class="question1-right__item">Заборы из сетки-рабицы</li>
              <li class="question1-right__item">Заборы из металлоштакетника</li>
              <li class="question1-right__item">3D заборы</li>
              <li class="question1-right__item">Деревянные заборы</li>
              <li class="question1-right__item">Сварные заборы</li>
              <li class="question1-right__item">Заборы из поликарбоната</li>
              <li class="question1-right__item">Кованые заборы</li>
              <li class="question1-right__item">Кирпичные заборы</li>
              <li class="question1-right__item">Бетонные заборы</li>
            </ol>
          </div>
        </div>
      </li>
      <?/*Второй вопрос*/ ?>
      <li class="quiz__item quiz2__item">
        <div class="quiz__left">
          <span class="quiz__close"></span>
          <div class="quiz__question2">
            <div class="questions__title question2__title">Укажите покрытие материала профлиста?</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar2"></div>
              </div>
              <span class="questions__number">2-й вопрос из 7</span>
            </div>
            <div class="questions__block">
              <span class="questions__subtitle">Укажите из какого материала вы планируете установить забор?</span>
              <ul class="question2__list">
                <li class="question2__item">
                  <label for="<?= $arParams['BLOCK'] ?>question2__radio1" class="question2__lbl">
                    <img class="question2__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question2_img2.jpg" alt="Окрас с одной стороны" />
                    <div class="question2__desc">
                      <input id="<?= $arParams['BLOCK'] ?>question2__radio1" name="question2__radio1" type="radio" class="question2__radio" value="Окрас с одной стороны">
                      Окрас с одной стороны
                    </div>
                  </label>
                </li>
                <li class="question2__item">
                  <label for="<?= $arParams['BLOCK'] ?>question2__radio2" class="question2__lbl">
                    <img class="question2__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question2_img1.jpg" alt="Окрас с двух сторон" />
                    <div class="question2__desc">
                      <input id="<?= $arParams['BLOCK'] ?>question2__radio2" name="question2__radio1" type="radio" class="question2__radio" value="Окрас с двух сторон">
                      Окрас с двух сторон
                    </div>
                  </label>
                </li>
                <li class="question2__item">
                  <label for="<?= $arParams['BLOCK'] ?>question2__radio3" class="question2__lbl">
                    <img class="question2__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question2_img3.jpg" alt="Оцинкованный без покраски" />
                    <div class="question2__desc">
                      <input id="<?= $arParams['BLOCK'] ?>question2__radio3" name="question2__radio1" type="radio" class="question2__radio" value="Оцинкованный без покраски">
                      Оцинкованный без покраски
                    </div>
                  </label>
                </li>
              </ul>
              <div class="question2__color-block">
                <span class="question2__color-title">Выбрать цвет:</span>
                <ul class="question2__color">
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio1" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img1.jpg" alt="RAL 3003 рубин красный" class="question2__img">
                      <span class="question2__color-name">RAL 3003</span>
                      <span class="question2__color-value">рубин красный</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio1" name="question2__radio2" type="radio" value="RAL 3003 рубин красный">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio2" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img2.jpg" alt="RAL 3011 красно-коричневый" class="question2__img">
                      <span class="question2__color-name">RAL 3011</span>
                      <span class="question2__color-value">красно-коричневый</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio2" name="question2__radio2" type="radio" value="RAL 3011 красно-коричневый">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio3" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img3.jpg" alt="RAL 3009 оксид-красного" class="question2__img">
                      <span class="question2__color-name">RAL 3009</span>
                      <span class="question2__color-value">оксид красного</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio3" name="question2__radio2" type="radio" value="RAL 3009 оксид-красного">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio4" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img4.jpg" alt="RAL 3005 винно-красный" class="question2__img">
                      <span class="question2__color-name">RAL 3005</span>
                      <span class="question2__color-value">винно-красный</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio4" name="question2__radio2" type="radio" value="RAL 3005 винно-красный">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio5" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img5.jpg" alt="RAL 8017 темно-коричневый" class="question2__img">
                      <span class="question2__color-name">RAL 8017</span>
                      <span class="question2__color-value">темно-коричневый</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio5" name="question2__radio2" type="radio" value="RAL 8017 темно-коричневый">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio6" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img6.jpg" alt="RAL 9005 реактивный черный" class="question2__img">
                      <span class="question2__color-name">RAL 9005</span>
                      <span class="question2__color-value">реактивный черный</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio6" name="question2__radio2" type="radio" value="RAL 9005 реактивный черный">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio7" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img7.jpg" alt="RAL 6002 зеленый" class="question2__img">
                      <span class="question2__color-name">RAL 6002</span>
                      <span class="question2__color-value">зеленый</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio7" name="question2__radio2" type="radio" value="RAL 6002 зеленый">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio8" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img8.jpg" alt="RAL 6005 зеленый мох" class="question2__img">
                      <span class="question2__color-name">RAL 6005</span>
                      <span class="question2__color-value">зеленый мох</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio8" name="question2__radio2" type="radio" value="RAL 6005 зеленый мох">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio9" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img9.jpg" alt="RAL 5021 морская волна" class="question2__img">
                      <span class="question2__color-name">RAL 5021</span>
                      <span class="question2__color-value">морская волна</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio9" name="question2__radio2" type="radio" value="RAL 5021 морская волна">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio10" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img10.jpg" alt="RAL 5024 пастельно голубой" class="question2__img">
                      <span class="question2__color-name">RAL 5024</span>
                      <span class="question2__color-value">пастельно голубой</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio10" name="question2__radio2" type="radio" value="RAL 5024 пастельно голубой">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio11" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img11.jpg" alt="RAL 5005 сигнально-синий" class="question2__img">
                      <span class="question2__color-name">RAL 5005</span>
                      <span class="question2__color-value">сигнально-синий</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio11" name="question2__radio2" type="radio" value="RAL 5005 сигнально-синий">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio12" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img12.jpg" alt="RAL 5002 ультрамарин голубой" class="question2__img">
                      <span class="question2__color-name">RAL 5002</span>
                      <span class="question2__color-value">ультрамарин голубой</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio12" name="question2__radio2" type="radio" value="RAL 5002 ультрамарин голубой">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio13" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img13.jpg" alt="RAL 1014 слоновая кость" class="question2__img">
                      <span class="question2__color-name">RAL 1014</span>
                      <span class="question2__color-value">слоновая кость</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio13" name="question2__radio2" type="radio" value="RAL 1014 слоновая кость">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio14" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img14.jpg" alt="RAL 1018 цинково-желтый" class="question2__img">
                      <span class="question2__color-name">RAL 1018</span>
                      <span class="question2__color-value">цинково-желтый</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio14" name="question2__radio2" type="radio" value="RAL 1018 цинково-желтый">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio15" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img15.jpg" alt="RAL 7005 мышиный серый" class="question2__img">
                      <span class="question2__color-name">RAL 7005</span>
                      <span class="question2__color-value">мышиный серый</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio15" name="question2__radio2" type="radio" value="RAL 7005 мышиный серый">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio16" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img16.jpg" alt="RAL 7004 сигнально-серый" class="question2__img">
                      <span class="question2__color-name">RAL 7004</span>
                      <span class="question2__color-value">сигнально-серый</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio16" name="question2__radio2" type="radio" value="RAL 7004 сигнально-серый">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio17" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img17.jpg" alt="RAL 9002 белая ночь" class="question2__img">
                      <span class="question2__color-name">RAL 9002</span>
                      <span class="question2__color-value">белая ночь</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio17" name="question2__radio2" type="radio" value="RAL 9002 белая ночь">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio18" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img18.jpg" alt="RAL 9010 чисто белый" class="question2__img">
                      <span class="question2__color-name">RAL 9010</span>
                      <span class="question2__color-value">чисто белый</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio18" name="question2__radio2" type="radio" value="RAL 9010 чисто белый">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio19" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img19.jpg" alt="RAL 9003 сигнально-белый" class="question2__img">
                      <span class="question2__color-name">RAL 9003</span>
                      <span class="question2__color-value">сигнально-белый</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio19" name="question2__radio2" type="radio" value="RAL 9003 сигнально-белый">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio20" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img20.png" alt="кирпичный" class="question2__img">
                      <span class="question2__color-value">кирпичный</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio20" name="question2__radio2" type="radio" value="кирпичный">
                    </label>
                  </li>
                  <li class="question2__card">
                    <label for="<?= $arParams['BLOCK'] ?>question22__radio21" class="question2__color-label">
                      <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img21.png" alt="деревянный" class="question2__img">
                      <span class="question2__color-value">деревянный</span>
                      <input id="<?= $arParams['BLOCK'] ?>question22__radio21" name="question2__radio2" type="radio" value="деревянный">
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="questions__block-btn">
              <button type="button" class="questions__back question2__back">Назад</button>
              <button type="button" class="questions__next question2__btn">Далее</button>
            </div>
          </div>
        </div>
        <div class="quiz__right">
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <span class="question2-right__subtitle"> Выбор покраски профнастила:</span>
            <p class="questions-right__text">Обычно на забор выбирают профлист С8, C20 или С21 марок. Это оцинкованный стальной лист от 0.4 до 0.5 толщины.</p>
            <p class="questions-right__text">Самый популярный полимерный цветной покрас с одной стороны, также существуют профиль с двух сторонним полимерным покрытием и набирает популярность окрас под дерево или камень. Самый бюджетный вариант - это профнастил оцинкованный без дополнительного покрытия.</p>
          </div>
        </div>
      </li>
      <?/*Третий вопрос*/ ?>
      <li class="quiz__item quiz3__item">
        <div class="quiz__left">
          <div class="quiz__question3">
            <div class="questions__title question3__title">Какую высоту забора вы рассматриваете?</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar3"></div>
              </div>
              <span class="questions__number">3-й вопрос из 7</span>
            </div>
            <div class="questions__block">
              <span class="questions__subtitle">Заборы имеют разную высоту в зависимости от ваших задач</span>
              <ul class="question3__list">
                <li class="question3__item">
                  <label for="<?= $arParams['BLOCK'] ?>question3__radio1" class="question3__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question3__radio1" name="question3__radio" type="radio" class="question3__radio" value="H = 1.5 метра">
                    H = 1.5 метра</label>
                </li>
                <li class="question3__item">
                  <label for="<?= $arParams['BLOCK'] ?>question3__radio2" class="question3__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question3__radio2" name="question3__radio" type="radio" class="question3__radio" value="H = 1.8 метра">
                    H = 1.8 метра</label>
                </li>
                <li class="question3__item">
                  <label for="<?= $arParams['BLOCK'] ?>question3__radio3" class="question3__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question3__radio3" name="question3__radio" type="radio" class="question3__radio" value="H = 2.0 метра">
                    H = 2.0 метра</label>
                </li>
                <li class="question3__item">
                  <label for="<?= $arParams['BLOCK'] ?>question3__radio4" class="question3__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question3__radio4" name="question3__radio" type="radio" class="question3__radio" value="H = 2.2 метра">
                    H = 2.2 метра</label>
                </li>
                <li class="question3__item">
                  <label for="<?= $arParams['BLOCK'] ?>question3__radio5" class="question3__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question3__radio5" name="question3__radio" type="radio" class="question3__radio" value="H = 2.5 метра">
                    H = 2.5 метра</label>
                </li>
                <li class="question3__item">
                  <label for="<?= $arParams['BLOCK'] ?>question3__radio6" class="question3__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question3__radio6" name="question3__radio" type="radio" class="question3__radio" value="H = 3.0 метра">
                    H = 3.0 метра</label>
                </li>
              </ul>
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question3__back">Назад</button>
            <button type="button" class="questions__next question3__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <ul class="question3-right__list">
              <li class="question3-right__item">Самая популярная высота забора это 2 метра.</li>
              <li class="question3-right__item">От 1.5 до 2 метра, обычно используют верхнюю и нижнюю лаги крепления листов.</li>
              <li class="question3-right__item">Высотой от 2.2 до 3 метро делают три поперечные лаги.</li>
              <li class="question3-right__item">Не забывайте, чем выше ограждение, тем больше парусность сооружения!</li>
            </ul>
          </div>
        </div>
      </li>
      <?/*Четвертый вопрос*/ ?>
      <li class="quiz__item quiz4__item">
        <div class="quiz__left">
          <div class="quiz__question4">
            <div class="questions__title question4__title">Какая длина вашего ограждения?</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar4"></div>
              </div>
              <span class="questions__number">4-й вопрос из 7</span>
            </div>
            <div class="questions__block">
              <input class="question4__input" type="number" placeholder="Метров" min="0" name="question4__input" />
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question4__back">Назад</button>
            <button type="button" class="questions__next question4__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <p class="questions-right__text">Для более точного расчета стоимости забора, вам необходимо рулеткой померить длину участка. Не забывайте, что колитка и ворота не входят в длину и рассчитываются отдельно.</p>
            <p class="questions-right__text">Если у вас к примеру комбинированый забор т.е. фасадную часть желаете из профнастила, а внутри из металлоштакетника. Тогда необходимо сделать две заявки с разной длиной на рассчет.</p>
          </div>
        </div>
      </li>
      <?/*Пятый вопрос*/ ?>
      <li class="quiz__item quiz5__item">
        <div class="quiz__left">
          <div class="quiz__question5">
            <div class="questions__title question5__title">Укажите желаемый способ установки столбов</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar5"></div>
              </div>
              <span class="questions__number">5-й вопрос из 7</span>
            </div>
            <div class="questions__block">
              <ul class="question5__list">
                <li class="question5__item">
                  <label for="<?= $arParams['BLOCK'] ?>question5__radio1" class="question5__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question5__radio1" name="question5__radio" type="radio" class="question5__radio" value="с утрамбовкой щебня">
                    с утрамбовкой щебнем</label>
                </li>
                <li class="question5__item">
                  <label for="<?= $arParams['BLOCK'] ?>question5__radio2" class="question5__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question5__radio2" name="question5__radio" type="radio" class="question5__radio" value="с забивными столбами">
                    с забивными столбами</label>
                </li>
                <li class="question5__item">
                  <label for="<?= $arParams['BLOCK'] ?>question5__radio3" class="question5__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question5__radio3" name="question5__radio" type="radio" class="question5__radio" value="с бетонирование столбов">
                    с бетонированием столбов</label>
                </li>
                <li class="question5__item">
                  <label for="<?= $arParams['BLOCK'] ?>question5__radio4" class="question5__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question5__radio4" name="question5__radio" type="radio" class="question5__radio" value="на винтовых сваях">
                    на винтовых сваях</label>
                </li>
              </ul>
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question5__back">Назад</button>
            <button type="button" class="questions__next question5__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <p class="questions-right__text">Оптимальный для средней полосы России способ установки - это утрамбовка щебнем (бутование).</p>
            <p class="questions-right__text">Но специалисты компании должны исследовать грунт на вашем участке, чтобы предложить лучший вариант.</p>
          </div>
        </div>
      </li>
      <?/*Шестой вопрос*/ ?>
      <li class="quiz__item quiz6__item">
        <div class="quiz__left">
          <div class="quiz__question6">
            <div class="questions__title question6__title">Выберите тип ворот, калитку</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar6"></div>
              </div>
              <span class="questions__number">6-й вопрос из 7</span>
            </div>
            <div class="questions__block
							question6__block">
              <ul class="question6__list">
                <li class="question6__item question6-group_one">
                  <div class="question6__item-block question6_one">
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio11" class="question6__lbl question6__lbl1">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio11" type="radio" class="question6__radio" name="question6__radio" value="90 см">
                      90 см</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio12" class="question6__lbl question6__lbl1">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio12" type="radio" class="question6__radio" name="question6__radio" value="1 м">
                      1 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio13" class="question6__lbl question6__lbl1">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio13" type="radio" class="question6__radio" name="question6__radio" value="1.1 м">
                      1.1 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio14" class="question6__lbl question6__lbl1">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio14" type="checkbox" class="question6__radio" name="question6_check" value="2-ая калитка">
                      2-ая калитка</label>
                  </div>
                  <span class="question6__text">Калитка ширина</span>
                </li>
                <li class="question6__item question6-group_dropping">
                  <div class="question6__item-block">
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio31" class="question6__lbl question6__lbl3">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio31" type="radio" class="question6__radio-drop" name="question6__radio" value="не требуется">
                      Калитка не требуется</label>
                  </div>
                </li>
                <li class="question6__item question6-group_two">
                  <div class="question6__item-block">
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio21" class="question6__lbl question6__lbl2">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio21" type="radio" class="question6__radio" name="question6__radio1" value="3 м">
                      3 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio22" class="question6__lbl question6__lbl2">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio22" type="radio" class="question6__radio" name="question6__radio1" value="3.5 м">
                      3.5 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio23" class="question6__lbl question6__lbl2">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio23" type="radio" class="question6__radio" name="question6__radio1" value="4 м">
                      4 м</label>
                  </div>
                  <span class="question6__text">Распашные ворота без автоматики</span>
                </li>
                <li class="question6__item question6-group_two">
                  <div class="question6__item-block">
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio31" class="question6__lbl question6__lbl3">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio31" type="radio" class="question6__radio" name="question6__radio1" value="3 м">
                      3 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio32" class="question6__lbl question6__lbl3">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio32" type="radio" class="question6__radio" name="question6__radio1" value="3.5 м">
                      3.5 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio33" class="question6__lbl question6__lbl3">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio33" type="radio" class="question6__radio" name="question6__radio1" value="4 м">
                      4 м</label>
                  </div>
                  <span class="question6__text">Распашные ворота с автоматикой</span>
                </li>
                <li class="question6__item question6-group_two">
                  <div class="question6__item-block">
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio41" class="question6__lbl question6__lbl4">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio41" type="radio" class="question6__radio" name="question6__radio1" value="3 м">
                      3 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio42" class="question6__lbl question6__lbl4">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio42" type="radio" class="question6__radio" name="question6__radio1" value="3.5 м">
                      3.5 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio43" class="question6__lbl question6__lbl4">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio43" type="radio" class="question6__radio" name="question6__radio1" value="4 м">
                      4 м</label>
                  </div>
                  <span class="question6__text">Откатные ворота без автоматики</span>
                </li>
                <li class="question6__item question6-group_two">
                  <div class="question6__item-block">
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio51" class="question6__lbl question6__lbl5">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio51" type="radio" class="question6__radio" name="question6__radio1" value="3 м">
                      3 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio52" class="question6__lbl question6__lbl5">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio52" type="radio" class="question6__radio" name="question6__radio1" value="3.5 м">
                      3.5 м</label>
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio53" class="question6__lbl question6__lbl5">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio53" type="radio" class="question6__radio" name="question6__radio1" value="4 м">
                      4 м</label>
                  </div>
                  <span class="question6__text">Откатные ворота с автоматикой</span>
                </li>
                <li class="question6__item question6-group_dropping1">
                  <div class="question6__item-block">
                    <label for="<?= $arParams['BLOCK'] ?>question6__radio4" class="question6__lbl question6__lbl4">
                      <input id="<?= $arParams['BLOCK'] ?>question6__radio4" type="radio" class="question6__radio1-drop" name="question6__radio1" value="не требуются">
                      Ворота не требуются</label>
                  </div>
                </li>
              </ul>
            </div>
            <div class="questions__block-btn">
              <button type="button" class="questions__back question6__back">Назад</button>
              <button type="button" class="questions__next question6__btn">Далее</button>
            </div>
          </div>
        </div>
        <div class="quiz__right">
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <p class="questions-right__text">Здесь вы выбираете ширину и количество колиток, а также ширину и вид ворот. Самая популярная ширина ворот 3.5 метров</p>
          </div>
        </div>
      </li>
      <?/*Седьмой вопрос*/ ?>
      <li class="quiz__item quiz7__item">
        <div class="quiz__left">
          <div class="quiz__question7">
            <div class="questions__title question7__title">Когда вы хотите получить готовый забор?</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar7"></div>
              </div>
              <span class="questions__number">7-й вопрос из 7</span>
            </div>
            <div class="questions__block">
              <div class="question7__item">
              </div>
              <input id="<?= $arParams['BLOCK'] ?>datepicker" class="question7__input" type="text" name="question7__date" placeholder="Укажите дату" />
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question7__back">Назад</button>
            <button type="button" class="questions__next question7__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <p class="questions-right__text">Выбирайте удобную дату установки ограждения.</p>
          </div>
        </div>
      </li>
      <?/*Отправка формы и результаты*/ ?>
      <li class="quiz__item quiz8__item">
        <div class="quiz__left">
          <div class="quiz__last">
            <div class="questions__title question8__title">Спасибо за обращение</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar-end"></div>
              </div>
              <span class="questions__number">7-й вопрос из 7</span>
            </div>
            <div class="questions__block block-end">
              <div class="question-end__result">

              </div>
              <div class="question-end__title">Заполнить и оправить форму</div>
              <div class="question-end__form">
                <input name="phone" type="tel" class="question-end__input" placeholder="Ваш телефон" data-validate-field="tel">

                <label class="show-check" for="question-end__show-check">
                  <input id="question-end__show-check" class="question-end__input" type="checkbox">
                  Показывать представителю компании</label>

                <input name="user" type="text" class="question-end__input" placeholder="Ваше имя">
                <input name="mail" type="text" class="question-end__input" placeholder="Ваш e-mail">
                <input id="files" type="file" class="question-end__file" name="myfile" />
                <button type="submit" class="question-end__submit js-quiz_submit">Получить расчет заборов</button>
                <label class="question-end__label">
                  <input type="checkbox" checked>
                  Соглашаюсь с обработкой персональных данных
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="quiz__right">
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <p class="questions-right__text">Еще раз проверьте все параметры вашего забора.</p>
            <p class="questions-right__text">*По умолчанию, предложения от компаний будут приходить к вам на почту. Если вы желаете, чтобы вам представители позвонили, поставьте галочку напротив телефона.</p>
          </div>
        </div>
      </li>
      <?/*Ветка штакетника Второй вопрос*/ ?>
      <li class="quiz__item quiz9__item">
        <div class="quiz__left">
          <div class="questions__title question9__title">Укажите покрытие и материал евроштакетника?</div>
          <?/* Progressbar*/ ?>
          <div class="questions__header">
            <div class="questions__progress">
              <div class="questions__bar bar2"></div>
            </div>
            <span class="questions__number">2-й вопрос из 7</span>
          </div>
          <div class="questions__block">
            <span class="questions__subtitle">Укажите из какого материала вы планируете установить забор?</span>
            <ul class="question9__list">
              <li class="question9__item">
                <label for="<?= $arParams['BLOCK'] ?>question9__radio1" class="question9__lbl">
                  <img class="question9__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question2_img1.jpg" alt="Окрас с одной стороны" />
                  <div class="question9__desc">
                    <input id="<?= $arParams['BLOCK'] ?>question9__radio1" name="question9__radio1" type="radio" class="question9__radio" value="Окрас с одной стороны">
                    Окрас с одной стороны
                  </div>
                </label>
              </li>
              <li class="question9__item">
                <label for="<?= $arParams['BLOCK'] ?>question9__radio2" class="question9__lbl">
                  <img class="question9__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question9_img2.jpg" alt="Окрас с двух сторон" />
                  <div class="question9__desc">
                    <input id="<?= $arParams['BLOCK'] ?>question9__radio2" name="question9__radio1" type="radio" class="question9__radio" value="Окрас с двух сторон">
                    Окрас с двух сторон
                  </div>
                </label>
              </li>
              <li class="question9__item">
                <label for="<?= $arParams['BLOCK'] ?>question9__radio3" class="question9__lbl">
                  <img class="question9__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question9_img3.jpg" alt="В шахматном порядке" />
                  <div class="question9__desc">
                    <input id="<?= $arParams['BLOCK'] ?>question9__radio3" name="question9__radio1" type="radio" class="question9__radio" value="В шахматном порядке">
                    В шахматном порядке
                  </div>
                </label>
              </li>
            </ul>
            <div class="question9__color-block">
              <span class="question9__color-title">Выбрать цвет:</span>
              <ul class="question9__color">
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio1" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img1.jpg" alt="RAL 3003 рубин красный" class="question9__img">
                    <span class="question9__color-name">RAL 3003</span>
                    <span class="question9__color-value">рубин красный</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio1" name="question9__radio2" type="radio" value="RAL 3003 рубин красный">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio2" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img2.jpg" alt="RAL 3011 красно-коричневый" class="question9__img">
                    <span class="question9__color-name">RAL 3011</span>
                    <span class="question9__color-value">красно-коричневый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio2" name="question9__radio2" type="radio" value="RAL 3011 красно-коричневый">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio3" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img3.jpg" alt="RAL 3009 оксид-красного" class="question9__img">
                    <span class="question9__color-name">RAL 3009</span>
                    <span class="question9__color-value">оксид красного</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio3" name="question9__radio2" type="radio" value="RAL 3009 оксид-красного">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio4" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img4.jpg" alt="RAL 3005 винно-красный" class="question9__img">
                    <span class="question9__color-name">RAL 3005</span>
                    <span class="question9__color-value">винно-красный</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio4" name="question9__radio2" type="radio" value="RAL 3005 винно-красный">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio5" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img5.jpg" alt="RAL 8017 темно-коричневый" class="question9__img">
                    <span class="question9__color-name">RAL 8017</span>
                    <span class="question9__color-value">темно-коричневый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio5" name="question9__radio2" type="radio" value="RAL 8017 темно-коричневый">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio6" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img6.jpg" alt="RAL 9005 реактивный черный" class="question9__img">
                    <span class="question9__color-name">RAL 9005</span>
                    <span class="question9__color-value">реактивный черный</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio6" name="question9__radio2" type="radio" value="RAL 9005 реактивный черный">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio7" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img7.jpg" alt="RAL 6002 зеленый" class="question9__img">
                    <span class="question9__color-name">RAL 6002</span>
                    <span class="question9__color-value">зеленый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio7" name="question9__radio2" type="radio" value="RAL 6002 зеленый">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio8" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img8.jpg" alt="RAL 6005 зеленый мох" class="question9__img">
                    <span class="question9__color-name">RAL 6005</span>
                    <span class="question9__color-value">зеленый мох</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio8" name="question9__radio2" type="radio" value="RAL 6005 зеленый мох">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio9" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img9.jpg" alt="RAL 5021 морская волна" class="question9__img">
                    <span class="question9__color-name">RAL 5021</span>
                    <span class="question9__color-value">морская волна</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio9" name="question9__radio2" type="radio" value="RAL 5021 морская волна">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio10" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img10.jpg" alt="RAL 5024 пастельно голубой" class="question9__img">
                    <span class="question9__color-name">RAL 5024</span>
                    <span class="question9__color-value">пастельно голубой</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio10" name="question9__radio2" type="radio" value="RAL 5024 пастельно голубой">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio11" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img11.jpg" alt="RAL 5005 сигнально-синий" class="question9__img">
                    <span class="question9__color-name">RAL 5005</span>
                    <span class="question9__color-value">сигнально-синий</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio11" name="question9__radio2" type="radio" value="RAL 5005 сигнально-синий">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio12" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img12.jpg" alt="RAL 5002 ультрамарин голубой" class="question9__img">
                    <span class="question9__color-name">RAL 5002</span>
                    <span class="question9__color-value">ультрамарин голубой</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio12" name="question9__radio2" type="radio" value="RAL 5002 ультрамарин голубой">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio13" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img13.jpg" alt="RAL 1014 слоновая кость" class="question9__img">
                    <span class="question9__color-name">RAL 1014</span>
                    <span class="question9__color-value">слоновая кость</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio13" name="question9__radio2" type="radio" value="RAL 1014 слоновая кость">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio14" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img14.jpg" alt="RAL 1018 цинково-желтый" class="question9__img">
                    <span class="question9__color-name">RAL 1018</span>
                    <span class="question9__color-value">цинково-желтый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio14" name="question9__radio2" type="radio" value="RAL 1018 цинково-желтый">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio15" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img15.jpg" alt="RAL 7005 мышиный серый" class="question9__img">
                    <span class="question9__color-name">RAL 7005</span>
                    <span class="question9__color-value">мышиный серый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio15" name="question9__radio2" type="radio" value="RAL 7005 мышиный серый">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio16" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img16.jpg" alt="RAL 7004 сигнально-серый" class="question9__img">
                    <span class="question9__color-name">RAL 7004</span>
                    <span class="question9__color-value">сигнально-серый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio16" name="question9__radio2" type="radio" value="RAL 7004 сигнально-серый">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio17" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img17.jpg" alt="RAL 9002 белая ночь" class="question9__img">
                    <span class="question9__color-name">RAL 9002</span>
                    <span class="question9__color-value">белая ночь</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio17" name="question9__radio2" type="radio" value="RAL 9002 белая ночь">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio18" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img18.jpg" alt="RAL 9010 чисто белый" class="question9__img">
                    <span class="question9__color-name">RAL 9010</span>
                    <span class="question9__color-value">чисто белый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio18" name="question9__radio2" type="radio" value="RAL 9010 чисто белый">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio19" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img19.jpg" alt="RAL 9003 сигнально-белый" class="question9__img">
                    <span class="question9__color-name">RAL 9003</span>
                    <span class="question9__color-value">сигнально-белый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio19" name="question9__radio2" type="radio" value="RAL 9003 сигнально-белый">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio20" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img20.png" alt="кирпичный" class="question9__img">
                    <span class="question9__color-value">кирпичный</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio20" name="question9__radio2" type="radio" value="кирпичный">
                  </label>
                </li>
                <li class="question9__card">
                  <label for="<?= $arParams['BLOCK'] ?>question92__radio21" class="question9__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color_img21.png" alt="деревянный" class="question9__img">
                    <span class="question9__color-value">деревянный</span>
                    <input id="<?= $arParams['BLOCK'] ?>question92__radio21" name="question9__radio2" type="radio" value="деревянный">
                  </label>
                </li>
              </ul>
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question9__back">Назад</button>
            <button type="button" class="questions__next question9__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
         <?/*
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <span class="question9-right__subtitle"> Выбор покраски профнастила:</span>
            <p class="questions-right__text">Обычно на забор выбираю профлист С8, C20 или С21 марок. Это оцинкованный стальной лист от 0.4 до 0.5 толщины.</p>
            <p class="questions-right__text">Самый популярный полимерный цветной покрас с одной стороны, также существуют профиль с двух сторонним полимерным покрытием и набирает популярность окрас под дерево или камень. Самый бюджетный вариант - это профнастил оцинкованный без дополнительного покрытия.</p>
          </div>
         */?>
        </div>
      </li>
      <?/*Ветка штакетник третий вопрос*/ ?>
      <li class="quiz__item quiz10__item">
        <div class="quiz__left">
          <div class="quiz__question10">
            <div class="questions__title question3__title">Какую высоту забора вы рассматриваете?</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar3"></div>
              </div>
              <span class="questions__number">3-й вопрос из 7</span>
            </div>
            <div class="questions__block">
              <span class="questions__subtitle">Заборы имеют разную высоту в зависимости от ваших задач</span>
              <ul class="question10__list">
                <li class="question10__item">
                  <label for="<?= $arParams['BLOCK'] ?>question10__radio1" class="question10__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question10__radio1" name="question10__radio" type="radio" class="question10__radio" value="H = 1 метра">
                    H = 1 метра</label>
                </li>
                <li class="question10__item">
                  <label for="<?= $arParams['BLOCK'] ?>question10__radio2" class="question10__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question10__radio2" name="question10__radio" type="radio" class="question10__radio" value="H = 1.5 метра">
                    H = 1.5 метра</label>
                </li>
                <li class="question10__item">
                  <label for="<?= $arParams['BLOCK'] ?>question10__radio3" class="question10__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question10__radio3" name="question10__radio" type="radio" class="question10__radio" value="H = 1.8 метра">
                    H = 1.8 метра</label>
                </li>
                <li class="question10__item">
                  <label for="<?= $arParams['BLOCK'] ?>question10__radio4" class="question10__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question10__radio4" name="question10__radio" type="radio" class="question10__radio" value="H = 2 метра">
                    H = 2 метра</label>
                </li>
                <li class="question10__item">
                  <label for="<?= $arParams['BLOCK'] ?>question10__radio5" class="question10__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question10__radio5" name="question10__radio" type="radio" class="question10__radio" value="H = 2.2 метра">
                    H = 2.2 метра</label>
                </li>
                <li class="question10__item">
                  <label for="<?= $arParams['BLOCK'] ?>question10__radio6" class="question10__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question10__radio6" name="question10__radio" type="radio" class="question10__radio" value="H = 2.5 метра">
                    H = 2.5 метра</label>
                </li>
              </ul>
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question10__back">Назад</button>
            <button type="button" class="questions__next question10__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
         <?/*
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <ul class="question10-right__list">
              <li class="question10-right__item">Самая популярная высота забора это 2 метра.</li>
              <li class="question10-right__item">От 1.5 до 2 метра, обычно используют верхнюю и нижнюю лаги крепления листов.</li>
              <li class="question10-right__item">Высотой от 2.2 до 3 метро делают три поперечные лаги.</li>
              <li class="question10-right__item">Не забывайте, чем выше ограждение, тем больше парусность сооружения!</li>
            </ul>
          </div>
         */?>
        </div>
      </li>
      <?/*Ветка 3D Второй вопрос*/ ?>
      <li class="quiz__item quiz11__item">
        <div class="quiz__left">
          <div class="questions__title question11__title">Укажите толщину прута и цвет для 3D забора?</div>
          <?/* Progressbar*/ ?>
          <div class="questions__header">
            <div class="questions__progress">
              <div class="questions__bar bar2"></div>
            </div>
            <span class="questions__number">2-й вопрос из 7</span>
          </div>
          <div class="questions__block">
            <span class="questions__subtitle">Укажите толщину прута 3D сетки?</span>
            <ul class="question11__list">
              <li class="question11__item">
                <label for="<?= $arParams['BLOCK'] ?>question11__radio2" class="question11__lbl">
                  <input id="<?= $arParams['BLOCK'] ?>question11__radio2" name="question11__radio1" type="radio" class="question11__radio" value="3,5 мм">
                  3,5 мм</label>
              </li>
              <li class="question11__item">
                <label for="<?= $arParams['BLOCK'] ?>question11__radio3" class="question11__lbl">
                  <input id="<?= $arParams['BLOCK'] ?>question11__radio3" name="question11__radio1" type="radio" class="question11__radio" value="4 мм">
                  4 мм</label>
              </li>
              <li class="question11__item">
                <label for="<?= $arParams['BLOCK'] ?>question11__radio4" class="question11__lbl">
                  <input id="<?= $arParams['BLOCK'] ?>question11__radio4" name="question11__radio1" type="radio" class="question11__radio" value="5 мм">
                  5 мм</label>
              </li>
              <li class="question11__item">
                <label for="<?= $arParams['BLOCK'] ?>question11__radio5" class="question11__lbl">
                  <input id="<?= $arParams['BLOCK'] ?>question11__radio5" name="question11__radio1" type="radio" class="question11__radio" value="6 мм">
                  6 мм</label>
              </li>
            </ul>
            <div class="question11__color-block">
              <span class="question11__color-title">Выбрать цвет:</span>
              <ul class="question11__color">
                <li class="question11__card">
                  <label for="<?= $arParams['BLOCK'] ?>question112__radio1" class="question11__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color11_img1.png" alt="RAL 6005 зеленый мох" class="question11__img">
                    <span class="question11__color-name">RAL 6005</span>
                    <span class="question11__color-value">зеленый мох</span>
                    <input id="<?= $arParams['BLOCK'] ?>question112__radio1" name="question11__radio2" type="radio" value="RAL 6005 зеленый мох">
                  </label>
                </li>
                <li class="question11__card">
                  <label for="<?= $arParams['BLOCK'] ?>question112__radio2" class="question11__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color11_img2.png" alt="RAL 5005 сигнальный синий" class="question11__img">
                    <span class="question11__color-name">RAL 5005</span>
                    <span class="question11__color-value">сигнальный синий</span>
                    <input id="<?= $arParams['BLOCK'] ?>question112__radio2" name="question11__radio2" type="radio" value="RAL 5005 сигнальный синий">
                  </label>
                </li>
                <li class="question11__card">
                  <label for="<?= $arParams['BLOCK'] ?>question112__radio3" class="question11__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color11_img3.png" alt="оцинкованный" class="question11__img">
                    <span class="question11__color-name">оцинкованный</span>
                    <input id="<?= $arParams['BLOCK'] ?>question112__radio3" name="question11__radio2" type="radio" value="оцинкованный">
                  </label>
                </li>
                <li class="question11__card">
                  <label for="<?= $arParams['BLOCK'] ?>question112__radio4" class="question11__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color11_img4.png" alt="RAL 8017 шоколадно-коричневый" class="question11__img">
                    <span class="question11__color-name">RAL 8017</span>
                    <span class="question11__color-value">шоколадно-коричневый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question112__radio4" name="question11__radio2" type="radio" value="RAL 8017 шоколадно-коричневый">
                  </label>
                </li>
                <li class="question11__card">
                  <label for="<?= $arParams['BLOCK'] ?>question112__radio5" class="question11__color-label">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/color11_img5.png" alt="RAL 7004 сигнальный серый" class="question11__img">
                    <span class="question11__color-name">RAL 7004</span>
                    <span class="question11__color-value">сигнальный серый</span>
                    <input id="<?= $arParams['BLOCK'] ?>question112__radio5" name="question11__radio2" type="radio" value="RAL 7004 сигнальный серый">
                  </label>
                </li>
              </ul>
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question11__back">Назад</button>
            <button type="button" class="questions__next question11__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
          <?/*
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <span class="question11-right__subtitle"> Выбор покраски профнастила:</span>
            <p class="questions-right__text">Обычно на забор выбираю профлист С8, C20 или С21 марок. Это оцинкованный стальной лист от 0.4 до 0.5 толщины.</p>
            <p class="questions-right__text">Самый популярный полимерный цветной покрас с одной стороны, также существуют профиль с двух сторонним полимерным покрытием и набирает популярность окрас под дерево или камень. Самый бюджетный вариант - это профнастил оцинкованный без дополнительного покрытия.</p>
          </div>
          */?>
        </div>
      </li>
      <?/*Ветка 3D третий вопрос*/ ?>
      <li class="quiz__item quiz12__item">
        <div class="quiz__left">
          <div class="quiz__question12">
            <div class="questions__title question12__title">Какую высоту забора вы рассматриваете?</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar3"></div>
              </div>
              <span class="questions__number">3-й вопрос из 7</span>
            </div>
            <div class="questions__block">
              <span class="questions__subtitle">Заборы имеют разную высоту в зависимости от ваших задач</span>
              <ul class="question12__list">
                <li class="question12__item">
                  <label for="<?= $arParams['BLOCK'] ?>question12__radio1" class="question12__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question12__radio1" name="question12__radio" type="radio" class="question12__radio" value="H = 1.53 метра">
                    H = 1.53 метра</label>
                </li>
                <li class="question12__item">
                  <label for="<?= $arParams['BLOCK'] ?>question12__radio2" class="question12__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question12__radio2" name="question12__radio" type="radio" class="question12__radio" value="H = 1.73 метра">
                    H = 1.73 метра</label>
                </li>
                <li class="question12__item">
                  <label for="<?= $arParams['BLOCK'] ?>question12__radio3" class="question12__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question12__radio3" name="question12__radio" type="radio" class="question12__radio" value="H = 1.93 метра">
                    H = 1.93 метра</label>
                </li>
                <li class="question12__item">
                  <label for="<?= $arParams['BLOCK'] ?>question12__radio4" class="question12__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question12__radio4" name="question12__radio" type="radio" class="question12__radio" value="H = 2.03 метра">
                    H = 2.03 метра</label>
                </li>
                <li class="question12__item">
                  <label for="<?= $arParams['BLOCK'] ?>question12__radio5" class="question12__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question12__radio5" name="question12__radio" type="radio" class="question12__radio" value="H = 2.43 метра">
                    H = 2.43 метра</label>
                </li>
              </ul>
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question10__back">Назад</button>
            <button type="button" class="questions__next question10__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
          <?/*<span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <ul class="question10-right__list">
              <li class="question10-right__item">Самая популярная высота забора это 2 метра.</li>
              <li class="question10-right__item">От 1.5 до 2 метра, обычно используют верхнюю и нижнюю лаги крепления листов.</li>
              <li class="question10-right__item">Высотой от 2.2 до 3 метро делают три поперечные лаги.</li>
              <li class="question10-right__item">Не забывайте, чем выше ограждение, тем больше парусность сооружения!</li>
            </ul>
          </div>*/?>
        </div>
      </li>
      <?/*Ветка рабица Второй вопрос*/ ?>
      <li class="quiz__item quiz13__item">
        <div class="quiz__left">
          <div class="questions__title question13__title">Укажите толщину проволоки и размер ячейки сетки-рабицы?</div>
          <?/* Progressbar*/ ?>
          <div class="questions__header">
            <div class="questions__progress">
              <div class="questions__bar bar2"></div>
            </div>
            <span class="questions__number">2-й вопрос из 7</span>
          </div>
          <div class="questions__block">
            <span class="questions__subtitle">Укажите из какого материала вы планируете установить забор?</span>
            <ul class="question13__list">
              <li class="question13__item">
                <label for="<?= $arParams['BLOCK'] ?>question13__radio1" class="question13__lbl">
                  <img class="question13__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question13_img1.jpg" alt="секционная" />
                  <div class="question13__desc">
                    <input id="<?= $arParams['BLOCK'] ?>question13__radio1" name="question13__radio1" type="radio" class="question13__radio" value="секционная">
                    секционная
                  </div>
                </label>
              </li>
              <li class="question13__item">
                <label for="<?= $arParams['BLOCK'] ?>question13__radio2" class="question13__lbl">
                  <img class="question13__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question13_img2.jpg" alt="с арматурой" />
                  <div class="question13__desc">
                    <input id="<?= $arParams['BLOCK'] ?>question13__radio2" name="question13__radio1" type="radio" class="question13__radio" value="с арматурой">
                    с арматурой
                  </div>
                </label>
              </li>
              <li class="question13__item">
                <label for="<?= $arParams['BLOCK'] ?>question13__radio3" class="question13__lbl">
                  <img class="question13__img lazyload" data-src="<?= SITE_TEMPLATE_PATH; ?>/img/question13_img3.jpg" alt="в натяг" />
                  <div class="question13__desc">
                    <input id="<?= $arParams['BLOCK'] ?>question13__radio3" name="question13__radio1" type="radio" class="question13__radio" value="в натяг">
                    в натяг
                  </div>
                </label>
              </li>
            </ul>
            <ul class="question13-type__list">
              <li class="question13-type__item question13-group_one">
                <div class="question13-type__item-block question13-type_one">
                  <label for="<?= $arParams['BLOCK'] ?>question13-type__radio11" class="question13-type__lbl question13-type__lbl1">
                    <input id="<?= $arParams['BLOCK'] ?>question13-type__radio11" type="radio" class="question13-type__radio" name="question13-type__radio2" value="55 мм">
                    55 мм<small>(стандарт)</small></label>
                  <label for="<?= $arParams['BLOCK'] ?>question13-type__radio12" class="question13-type__lbl question13-type__lbl1">
                    <input id="<?= $arParams['BLOCK'] ?>question13-type__radio12" type="radio" class="question13-type__radio" name="question13-type__radio2" value="25 мм">
                    25 мм</label>
                  <label for="<?= $arParams['BLOCK'] ?>question13-type__radio13" class="question13-type__lbl question13-type__lbl1">
                    <input id="<?= $arParams['BLOCK'] ?>question13-type__radio13" type="radio" class="question13-type__radio" name="question13-type__radio2" value="35 мм">
                    35 мм</label>
                  <label for="<?= $arParams['BLOCK'] ?>question13-type__radio14" class="question13-type__lbl question13-type__lbl1">
                    <input id="<?= $arParams['BLOCK'] ?>question13-type__radio14" type="radio" class="question13-type__radio" name="question13-type__radio2" value="45 мм">
                    45 мм</label>
                </div>
                <span class="question13-type__text">Размер ячейки</span>
              </li>
              <li class="question13-type__item question13-group_two">
                <div class="question13-type__item-block">
                  <label for="<?= $arParams['BLOCK'] ?>question13-type__radio21" class="question13-type__lbl question13-type__lbl2">
                    <input id="<?= $arParams['BLOCK'] ?>question13-type__radio21" type="radio" class="question13-type__radio" name="question13-type__radio3" value="1,8 мм">
                    1,8 мм<small>(стандарт)</small></label>
                  <label for="<?= $arParams['BLOCK'] ?>question13-type__radio22" class="question13-type__lbl question13-type__lbl2">
                    <input id="<?= $arParams['BLOCK'] ?>question13-type__radio22" type="radio" class="question13-type__radio" name="question13-type__radio3" value="2,0 мм">
                    2,0 мм</label>
                </div>
                <span class="question13-type__text">Толщина проволоки</span>
              </li>
            </ul>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question9__back">Назад</button>
            <button type="button" class="questions__next question9__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
         <?/*
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <span class="question9-right__subtitle"> Выбор покраски профнастила:</span>
            <p class="questions-right__text">Обычно на забор выбираю профлист С8, C20 или С21 марок. Это оцинкованный стальной лист от 0.4 до 0.5 толщины.</p>
            <p class="questions-right__text">Самый популярный полимерный цветной покрас с одной стороны, также существуют профиль с двух сторонним полимерным покрытием и набирает популярность окрас под дерево или камень. Самый бюджетный вариант - это профнастил оцинкованный без дополнительного покрытия.</p>
          </div>
         */?>
        </div>
      </li>
      <?/*Ветка рабица третий вопрос*/ ?>
      <li class="quiz__item quiz14__item">
        <div class="quiz__left">
          <div class="quiz__question14">
            <div class="questions__title question14__title">Какую высоту забора вы рассматриваете?</div>
            <?/* Progressbar*/ ?>
            <div class="questions__header">
              <div class="questions__progress">
                <div class="questions__bar bar3"></div>
              </div>
              <span class="questions__number">3-й вопрос из 7</span>
            </div>
            <div class="questions__block">
              <span class="questions__subtitle">Заборы имеют разную высоту в зависимости от ваших задач</span>
              <ul class="question14__list">
                <li class="question14__item">
                  <label for="<?= $arParams['BLOCK'] ?>question14__radio1" class="question14__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question14__radio1" name="question14__radio" type="radio" class="question14__radio" value="H = 1,5 метра">
                    H = 1,5 метра</label>
                </li>
                <li class="question14__item">
                  <label for="<?= $arParams['BLOCK'] ?>question14__radio2" class="question14__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question14__radio2" name="question14__radio" type="radio" class="question14__radio" value="H = 1,8 метра">
                    H = 1,8 метра</label>
                </li>
                <li class="question14__item">
                  <label for="<?= $arParams['BLOCK'] ?>question14__radio3" class="question14__lbl">
                    <input id="<?= $arParams['BLOCK'] ?>question14__radio3" name="question14__radio" type="radio" class="question14__radio" value="H = 2,0 метра">
                    H = 2,0 метра</label>
                </li>
              </ul>
            </div>
          </div>
          <div class="questions__block-btn">
            <button type="button" class="questions__back question10__back">Назад</button>
            <button type="button" class="questions__next question10__btn">Далее</button>
          </div>
        </div>
        <div class="quiz__right">
          <?/*
          <span class="questions__name">Помощь при выборе забора</span>
          <div class="questions-right__block">
            <ul class="question10-right__list">
              <li class="question10-right__item">Самая популярная высота забора это 2 метра.</li>
              <li class="question10-right__item">От 1.5 до 2 метра, обычно используют верхнюю и нижнюю лаги крепления листов.</li>
              <li class="question10-right__item">Высотой от 2.2 до 3 метро делают три поперечные лаги.</li>
              <li class="question10-right__item">Не забывайте, чем выше ограждение, тем больше парусность сооружения!</li>
            </ul>
          </div>
          */?>
        </div>
      </li>
    </ul>
  </fieldset>
</form>