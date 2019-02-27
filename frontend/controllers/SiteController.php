<?php

namespace frontend\controllers;

use common\models\tables\Projects;
use common\models\tables\Users;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use common\models\ContactForm;

class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProject($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('project', [
            'model' => $model,
            'userId' => Yii::$app->user->id,
        ]);
        return $this->render('project');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionLang($lang){
        $session = Yii::$app->session;
        $session->set('lang', $lang);
        if(!Yii::$app->user->isGuest){
            $user = Users::findOne(\Yii::$app->user->id);
            $user->lang = $lang;
            $user->save();
        }
        $this->redirect(Yii::$app->request->referrer);
    }

    protected function findModel($id)
    {
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

}
