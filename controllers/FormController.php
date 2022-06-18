<?php


namespace app\controllers;


use app\models\Ingredient;
use yii\web\Controller;

class FormController extends Controller
{
    public function beforeAction($action){

        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    public function actionConstruct () {
        $request = \Yii::$app->request;

        $ingredients = $request->post();

        $code = trim($ingredients['code']);

        $data = Ingredient::find()->all();

//        echo "<pre>";
//        print_r($ingredients);
//        echo "</pre>";
//        die();
        return $this->asJson(['status' => 'success', 'message' => '']);
    }
}