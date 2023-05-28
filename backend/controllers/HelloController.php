<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class HelloController extends Controller
{
    
    
    public function actionIndex()
    {
        // return 'Hello world';
        // $message = 'Hello world';
        // return $this->render('message',['message'=>$message]);
        return $this->render('index');
    }
}
