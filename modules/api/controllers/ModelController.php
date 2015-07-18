<?php
/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 17.07.2015
 * Time: 18:38
 */

namespace app\modules\api\controllers;


use app\modules\common\models\CarModel;
use yii\filters\AccessControl;
use yii\rest\ActiveController;

class ModelController extends ActiveController
{
    public $modelClass = CarModel::class;

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function checkAccess($action, $model = null, $params = [])
    {
        die('test');
    }

}