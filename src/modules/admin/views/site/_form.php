<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Site */
/* @var $form yii\widgets\ActiveForm */

$model->enabled = 1;
?>

<div class="site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'window_default')->dropDownList([
      1=>'Окно 1',
      2=>'Окно 2',
    ]); ?>

    <?= $form->field($model, 'enabled')->checkbox(); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
