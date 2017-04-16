<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Schedule;
use app\modules\admin\models\ScheduleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ScheduleController implements the CRUD actions for Schedule model.
 */
class ScheduleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Schedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Schedule model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Schedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCompose(){
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Schedule();

        if (Yii::$app->request->post()) {
            Schedule::deleteAll(['rule_id'=>1]);

            foreach(Yii::$app->request->post('Schedule') as $param){
                $schedule = new Schedule();
                $schedule->setAttributes($param);
                $schedule->rule_id = 1;
                if(!$schedule->save()) {
                    $schedule->validate();
                    //var_dump($schedule);die;
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Schedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {

        if (Yii::$app->request->post()) {
            Schedule::deleteAll(['rule_id'=>1]);

            $rule = \app\models\Rule::findOne(['id'=>1]);

            $rule->timezone = Yii::$app->request->post('Rule')['timezone'];
            $rule->regions = Yii::$app->request->post('Rule')['regions'];
            $rule->show_everywhere = Yii::$app->request->post('Rule')['show_everywhere'];
            $rule->save();

            //var_dump(Yii::$app->request->post());die;

            foreach(Yii::$app->request->post('Schedule')['params'] as $param){
                $schedule = new Schedule();
                $schedule->setAttributes($param);
                $schedule->rule_id = 1;
                if(!$schedule->save()) {
                    $schedule->validate();
                }
            }

            return $this->render('update');
        } else {
            return $this->render('update');
        }
    }

    /**
     * Deletes an existing Schedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Schedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Schedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Schedule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
