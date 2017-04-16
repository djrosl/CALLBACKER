<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sites');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Site'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'url:url',
            [
                'attribute'=>'links',
                'format'=>'html',
                'value'=>function($model){
                    return \yii\helpers\Html::a('Виджеты', \yii\helpers\Url::to(['widgets', 'site_id'=>$model->id])).'<br>'.
                    \yii\helpers\Html::a('Окна', \yii\helpers\Url::to(['windows', 'site_id'=>$model->id])).'<br>'.
                    \yii\helpers\Html::a('Алгоритмы', \yii\helpers\Url::to(['algo', 'site_id'=>$model->id]));
                }
            ],
            'enabled',
            'registered_at',
            'visits_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
