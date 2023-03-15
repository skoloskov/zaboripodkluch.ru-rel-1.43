<form class="tender_fence__form js-form">
    <div class="close">
        <span class="close_icn"></span>
    </div>
    <div class="tender_fence__title">Оформить тендер на забор</div>
    <div class="tender_fence__order_block">
        <div class="tender_fence__title tender_fence__second_title">Параметры забора</div>
        <label class="tender_fence__lbl">
            <select name="type_fence">
                <option value="#" selected>Выберите тип забора</option>
                <option value="108">Профнастил</option>
                <option value="109">Сетка-рабица</option>
                <option value="110">Металоштакетник</option>
                <option value="111">Поликарбонат</option>
                <option value="112">Сварные</option>
                <option value="113">Шумозащитные</option>
                <option value="114">3D</option>
            </select>
        </label>

        <label class="tender_fence__lbl">
            <select name="pillars">
                <option value="#" selected>Выберите основание забора</option>
                <option value="115">Забивные столбы</option>
                <option value="116">Утрамбовка щебнем</option>
                <option value="117">Бетонирование столбов</option>
                <option value="118">Ленточный фундамент</option>
                <option value="119">Кирпичные столбы</option>
            </select>
        </label>

        <label class="tender_fence__lbl">
            <select name="gate">
                <option value="#" selected>Выберите ворота</option>
                <option value="120">Не нужны</option>
                <option value="121">Откатные</option>
                <option value="122">Откатные с автоматикой</option>
                <option value="123">Распашные</option>
                <option value="124">Распашные с автоматикой</option>
            </select>
        </label>

        <label class="tender_fence__lbl">
            <input type="text" name="height_fence" required placeholder="Высота забора" />
        </label>

        <label class="tender_fence__lbl">
            <input type="text" name="length_fence" required placeholder="Длина забора" />
        </label>

        <label class="tender_fence__lbl">
            <textarea placeholder="Описание заказа:
Пример: Забор из профнастила с односторонним  зеленым окрасом толщиной 0.5мм, одна калитка, ворота распашные 4 метра без автоматики и т.п." name="descript"></textarea>
        </label>
    </div>

    <div class="tender_fence__user_block">
        <div class="tender_fence__title callback__second_title">Данные клиента</div>

        <label class="order_fence__lbl">
            <span class="tender_fence__lbl_text">Введите ваше имя:</span>
            <input type="text" name="name" placeholder="Иван" />
        </label>

        <label class="order_fence__lbl">
            <span class="tender_fence__lbl_text">Номер телефона:</span>
            <input type="tel" name="phone" required placeholder="+7 (___) ___-__-__" required data-validate-field="tel" data-validate-rules="phone" />
        </label>

        <label class="order_fence__lbl">
            <span class="tender_fence__lbl_text">E-mail:</span>
            <input type="text" name="email" placeholder="info@site.ru" />
        </label>

        <label class="order_fence__lbl">
            <span class="tender_fence__lbl_text">Статус заказчика:</span>
            <span class="order_fence__radio"><input type="radio" name="customer_type" checked value="103">Физ. лицо</span>
            <span class="order_fence__radio"><input type="radio" name="customer_type" value="104">Юр. лицо</span>
        </label>

        <label class="order_fence__lbl">
            <span class="tender_fence__lbl_text">Место установки:</span>
            <input type="text" name="place_fence" required placeholder="Укажите город или район с населенным пунктом" />
        </label>

        <label class="order_fence__lbl">
            <span class="tender_fence__lbl_text">Дата установки:</span>
            <input type="date" name="date_fence" />
        </label>

        <label class="checkbox checkbox__lbl">
            <input type="checkbox" checked="" name="Согласие" />
            <span class="tender_fence__lbl_text checkbox__lbl_text">Я согласен с
				<a class="checkbox__link" href="/privacy/" target="_blank">политикой конфиденциальности</a>
			</span>
        </label>
    </div>
    <button class="button primary js-tender-fence">Отправить</button>
</form>