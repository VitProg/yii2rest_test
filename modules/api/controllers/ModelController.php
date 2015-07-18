<?php
/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 17.07.2015
 * Time: 18:38
 */

namespace app\modules\api\controllers;


use app\modules\api\components\HttpBearerAuth;
use app\modules\common\models\CarModel;
use app\modules\common\models\User;
use yii\filters\AccessControl;
use yii\rest\ActiveController;

class ModelController extends ActiveController
{
    public $modelClass = CarModel::class;

    public function behaviors() {
        return [
            'authenticator' => [
////                'class' => HttpBasicAuth::className(),
                'class' => HttpBearerAuth::className(),
////                'auth'=> function ($username, $password) {
////                    $password_hash = \Yii::$app->security->generatePasswordHash($password);
////                    print_r([$username, $password, $password_hash]);
////                    print_r(User::findOne([
////                        'username' => $username,
////                        'password_hash' => $password_hash,
////                    ]));die();
////                    return User::findOne([
////                        'username' => $username,
////                        'password_hash' => $password_hash,
////                    ]);
////                },
            ],
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


//    public function checkAccess($action, $model = null, $params = [])
//    {
//        return true;
//    }

}