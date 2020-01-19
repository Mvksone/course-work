<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Car */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Добавить новую машину';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'add-new-car',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'model')->textInput() ?>
    <?= $form->field($model, 'description')->textInput() ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'add-new-car--button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
