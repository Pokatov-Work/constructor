<?php


namespace app\controllers;


use app\models\Ingredient;
use app\models\IngredientType;
use Yii;
use yii\helpers\Url;
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

        if (empty($ingredients['code'])){
            \Yii::$app->response->redirect('/', 301)->send();
        }

        $code = strip_tags(trim($ingredients['code']));

        preg_match_all("/[ci]/", $code, $matches);

        $counts_code = array_count_values(array_shift($matches));
        $counts_code['d'] = 1;
        $types = IngredientType::find()->asArray()->all();

        $products = Ingredient::getIngredient();

        // dcii

        $product = [];
        $arr_ingredient = [];
        foreach ($types as $type) {
            foreach ($products[$type['id']] as $item) {
                $arr_ingredient[$type['id']][] = [
                    "type"=> $type['title'],
                    "value"=> $item['title'],
                    "price"=> $item['price'],
                ];
            }
        }

//        foreach ($counts_code as $code){
//            for ($i=1; $i<=$code; $i++){
//
//            }
//        }

        foreach ($arr_ingredient[1] as $key => $dough){
            $product[] = [$dough];
        }

        foreach ($product as $key => $item) {
            if (!empty($arr_ingredient[2][$key])) {
                $product[$key][] = $arr_ingredient[2][$key];
            }
//            foreach ($arr_ingredient[3] as $filling) {
//                $product[$key][] = $filling;
//            }
        }
/*
    products => [
	    [
            type => 'Тесто',
            value => ”Тонкое тесто”
        ],
	    [
            type => ”Сыр”,
            value => ”Моцарелла”
        ],
	    [
            type => ”Начинка”,
            value => ”Ветчина”,
	    [
            type => ”Начинка”,
            value => ”Колбаса”
        ],
    ],
*/
        echo "<pre>";
        print_r($product);
        echo "</pre>";
        die();
        return $this->asJson(['status' => 'success', 'message' => '']);
    }
}