<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'enabled') ?>

    <?= $form->field($model, 'site_id') ?>

    <?= $form->field($model, 'shows') ?>

    <?= $form->field($model, 'clicks') ?>

    <?php // echo $form->field($model, 'conversion') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'calls') ?>

    <?php // echo $form->field($model, 'calls_conversion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
