<?php
/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 17.07.2015
 * Time: 18:38
 */

namespace app\modules\api\controllers;


use app\modules\common\models\CarModel;
use app\modules\common\models\User;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class ModelController extends ActiveController
{
    public $modelClass = CarModel::class;

    public function behaviors() {
        return [
            'authenticator' => [
                'class' => HttpBasicAuth::className(),
                'auth'=> function ($username, $password) {
                    print_r([$username, $password]);die();
                    return User::findOne([
                        'username' => $username,
                        'password_hash' => $password,
                    ]);
                },
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


    public function checkAccess($action, $model = null, $params = [])
    {
        die('test');
    }

}