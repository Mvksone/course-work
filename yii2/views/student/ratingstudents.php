
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<h1>Рейтинг студентов</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Имя</th>
                <th>Средний балл</th>
                <th>Участие в олимпиадах</th>
                <th>Сумма</th>
                <? if (!Yii::$app->user->isGuest) { ?> <th>Удаление</th> <? } ?>
            </tr>
        </thead>
<?php foreach ($ratingstudents as $ratingstudents) {?>
    <tr>
        <td><?=$ratingstudents->name ?></td> 
        <td><?=$ratingstudents->grade ?></td> 
        <td><?=$ratingstudents->olymp ?></td>
        <td><?=$ratingstudents->grade+$ratingstudents->olymp?></td>
        <? if (!Yii::$app->user->isGuest) { ?>
        <td>
            <form method="post" action="/student/delete"> 
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

                <input name="id" type="hidden" value="<?=$ratingstudents->id ?>">
                <input name="submit" type="submit" value="Удалить">
            </form>
        </td>
        
        
        <? } ?>
    </tr>
<?php } ?>
</table>

<? if (!Yii::$app->user->isGuest) { ?>
    <h1>Создать студента</h1>


    <form action="/student/create" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <div class="container">
            <div class="row">
                <div class="col">
                    <label>
                        <div>Имя студента</div>
                        <input name="name" type="text">
                    </label>
                </div>
                <div class="col">
                    <label>
                        <div>Оценка</div>
                        <input name="grade" type="text">
                    </label>
                </div>
                <div class="col">
                    <label>
                        <div>Олимпиады</div>
                        <input name="olymp" type="text">
                    </label>
                </div>
                <div class="col">
                    <label>
                        <input name="submit" type="submit" value="Добавить">
                    </label>
                </div>
            </div>
        </div>
        
    </form>


<? } ?>