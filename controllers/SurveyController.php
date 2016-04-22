<?php

namespace app\controllers;

use Yii;
use app\models\Survey;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Department;
use app\models\Role;
use app\models\Question;
use app\models\QuestionOptions;
use app\models\User;

/**
 * SurveyController implements the CRUD actions for Survey model.
 */
class SurveyController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Survey models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $conditions = Yii::$app->user->identity->role_id != User::ADMIM ? ['targeted_role_id' => Yii::$app->user->identity->role_id] : [];
        $surveys    = Survey::find()->where($conditions)->all();
        return $this->render('index', [
                    'surveys' => $surveys,
        ]);
    }

    /**
     * Displays a single Survey model.
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
     * Creates a new Survey model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Survey();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->response->redirect(['question/create', 'surveyId' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'roleModel' => new Role(),
                'departmentModel' => new Department()
            ]);
        }
    }

    /**
     * Updates an existing Survey model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);           
        if($model->load(Yii::$app->request->post()) && $model->save()){
            $questions = Yii::$app->request->post()['questions'];
            $options   = Yii::$app->request->post()['options'];            
            foreach($questions as $questionId => $questionBody){
                $question       = Question::findOne($questionId);
                $question->body = $questionBody;
                $question->save(false);
            }
            foreach($options as $optionId => $optionBody){
                $option       = QuestionOptions::findOne($optionId);
                $option->body = $optionBody;
                $option->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }else{
            return $this->render('update', [
                        'model'           => $model,
                        'roleModel'       => new Role(),
                        'departmentModel' => new Department()
            ]);
        }
    }

    /**
     * Deletes an existing Survey model.
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
     * Finds the Survey model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Survey the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Survey::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
