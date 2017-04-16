<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Schedule',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form') ?>

</div>
