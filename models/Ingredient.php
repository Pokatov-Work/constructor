<?php


namespace app\models;

use yii\db\ActiveRecord;

class Ingredient extends ActiveRecord
{
    public static function getIngredient(){
        $data = self::find()->asArray()->all();
        $sort=[];
        foreach ($data as $item){
            $sort[$item['type_id']][] = $item;
        }

//        echo "<pre>";
//        print_r($sort);
//        echo "</pre>";
//        die();
        return $sort;
    }
}