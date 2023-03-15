<form class="order_fence__form js-form">
    <div class="close">
        <span class="close_icn"></span>
    </div>
    <div class="order_fence__title">Оформить заказ</div>
    <div class="order_fence__order_block">
        <div class="order_fence__title order_fence__second_title">Параметры забора</div>
        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Вид забора:</span>
            <select name="type_fence">
                <option selected>Профнастил</option>
                <option>Сетка-рабица</option>
                <option>Металоштакетник</option>
                <option>Поликарбонат</option>
                <option>Сварные</option>
                <option>Шумозащитные</option>
                <option>3D</option>
            </select>
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Основание забора:</span>
            <select name="pillars">
                <option selected>Забивные столбы</option>
                <option>Утрамбовка щебнем</option>
                <option>Бетонирование столбов</option>
                <option>Ленточный фундамент</option>
                <option>Кирпичные столбы</option>
            </select>
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Ворота:</span>
            <select name="gate">
                <option selected>Не нужны</option>
                <option>Откатные</option>
                <option>Откатные с автоматикой</option>
                <option>Распашные</option>
                <option>Распашные с автоматикой</option>
            </select>
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Высота забора:</span>
            <input type="text" name="height_fence" required placeholder="2 метра" />
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Длина забора:</span>
            <input type="text" name="length_fence" required placeholder="200 метров" />
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Описание заказа:</span>
            <textarea placeholder="Описание заказа" name="descript"></textarea>
        </label>
    </div>

    <div class="order_fence__user_block">
        <div class="order_fence__title callback__second_title">Данные клиента</div>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Место установки:</span>
            <input type="text" name="place_fence" required placeholder="Населенный пункт" />
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Дата установки:</span>
            <input type="date" name="date_fence" />
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Введите ваше имя:</span>
            <input type="text" name="name" placeholder="Иван" />
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">Номер телефона:</span>
            <input type="tel" name="phone" required placeholder="+7 (___) ___-__-__" required data-validate-field="tel" data-validate-rules="phone" />
        </label>

        <label class="order_fence__lbl">
            <span class="order_fence__lbl_text">E-mail:</span>
            <input type="text" name="email" placeholder="info@site.ru" />
        </label>

        <label class="checkbox checkbox__lbl">
            <input type="checkbox" checked="" name="Согласие" />
            <span class="order_fence__lbl_text checkbox__lbl_text">Я согласен с
				<a class="checkbox__link" href="/privacy/" target="_blank">политикой конфиденциальности</a>
			</span>
        </label>
    </div>
    <button class="button primary js-order-fence">Отправить</button>
</form>