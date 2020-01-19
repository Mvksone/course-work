<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RatingStudent;

class StudentController extends Controller
{
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) return;
        
        $request = Yii::$app->request;
        $model = new RatingStudent();
        
        $model->name = $request->post('name');
        $model->grade = $request->post('grade');
        $model->olymp = $request->post('olymp');
        
        $model->save(false);
        
        return $this->redirect(Yii::$app->request->referrer);
    }
    
    public function actionIndex()
    {
        $ratingstudents = RatingStudent::getStudentsByRaiting();
        return $this->render('ratingstudents', ['ratingstudents' =>$ratingstudents]);
        
    }
    
    public function actionDelete()
    {
        if (Yii::$app->user->isGuest) return;
        
        $request = Yii::$app->request;
        $id = $request->post('id'); 
        
        $ts = new RatingStudent;
        $ts->deleteStudent($id);
        
        return $this->redirect(Yii::$app->request->referrer);
        
    }
}