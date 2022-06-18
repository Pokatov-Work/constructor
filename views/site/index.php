<?php

/** @var yii\web\View $this */

$this->title = 'Конструктор блюда';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Введите ингридиенты</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">

                <form action="/form/construct" method="post" name="constructor">
                    <label>Введите код ингридиентов блюда
                        <input type="text" name="code">
                    </label>
                    <input type="submit" name="btn" value="Заказать">
                </form>
            </div>
        </div>

    </div>
</div>
