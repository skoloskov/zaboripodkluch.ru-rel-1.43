
 <head>
  <meta charset="utf-8">
  <title>Горизонтальный список</title>
  <style>
   ul.hr {
    margin: 0; /* Обнуляем значение отступов */
    padding: 4px; /* Значение полей */
   }
   ul.hr li {
    display: inline; /* Отображать как строчный элемент */
   /* margin-right: 5px; /* Отступ слева */
   /* border: 1px solid #fff; /* Рамка вокруг текста */
    padding: 3px; /* Поля вокруг текста */
   }


li.sub-news  
{
    color: red;
    font-weight: 900;
    font-size: 24.5px;
/*    font-family: Arial;
    text-align: center;
    text-transform: uppercase;
    padding: 0px 90px 0px 0px; */
}

  </style>
 </head>




<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
  <section class="hero">
    <div class="container hero__container">
      <h1 class="main__title hero__title">
        <?=city_replace($APPLICATION->GetPageProperty('pageSettings')['UF_H1'])?><br />
		<?/*Найдено <span class="hero__number"><?= ($APPLICATION->GetPageProperty('CompanyList')!== null ? count($APPLICATION->GetPageProperty('CompanyList')) : count($APPLICATION->GetPageProperty('CompanyList'))) ?></span> проверенных подрядчиков!*/?>
      </h1>
      <div class="hero__desc">
        Вам не придется обзванивать компании в поисках исполнителя. Создайте заказ и опишите требования - свободные бригады сами пришлют свои сметы и предложения.
      </div>
<div class="hero__desc">
  <body>
   <ul class="hr">
      <li >Компаний и бригад:</li>
      <li class="sub-news">334</li>
      <li>Заказов в неделю:</li>
      <li class="sub-news">186</li>
      <li>Предложений в сутки:</li>
      <li class="sub-news">12</li>
   </ul>
 </body>
</div>
      <button class="hero__btn btn modal-quiz">
        Отправить заявку<br />
        <small class="hero__small">и получить лучшее предложение</small>
      </button>
    </div>
  </section>




 <?/* <style>
ul li { display: table; }
ul li ul { display: table-row; }
ul li ul li { display: table-cell; border: 0px solid gray; }
</style>
<div class="hero__desc">
  <body>
   <ul><li><ul>
      <li>ONE</li>
      <li>TWO</li>
   </ul><ul>
      <li>FIVE</li>
      <li>SIX</li>
   </ul></li></ul>
  </body>
</div>
*/?>
