<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Site;

/* @var $this yii\web\View */
/* @var $model app\models\Window */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="window-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'site_id')->dropDownList(ArrayHelper::map(Site::find()->all(), 'id', 'url')) ?>

    <?= $form->field($model, 'type')->dropDownList([1,2]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
