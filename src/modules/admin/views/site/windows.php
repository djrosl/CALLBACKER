<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Windows');
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <p>
    
    </p>

    <?php 
    $dataProvider = new \yii\data\ActiveDataProvider([
        'query' => $models,
        'pagination' => [
            'pageSize' => 20,
        ]
    ]);
    ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'site_id',
            'type',
            'title',
            'shows',
            'clicks',
            'calls',
            'calls_conversion',
            'conversion',
            'enabled',
            
        ],
    ]); ?>

</div>
