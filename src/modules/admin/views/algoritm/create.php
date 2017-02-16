<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Algoritm */

$this->title = Yii::t('app', 'Create Algoritm');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Algoritms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="algoritm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
