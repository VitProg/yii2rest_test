<?php
/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 18.07.2015
 * Time: 23:07
  */

namespace app\modules\api\controllers;

use app\modules\common\forms\LoginForm;
use yii\rest\Controller;


class UserController extends Controller
{
    /**
     * This method implemented to demonstrate the receipt of the token.
     * Do not use it on production systems.
     * @return string AuthKey or model with errors
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $post = \Yii::$app->getRequest()->getBodyParams();
        var_dump($post);die();
        if ($model->load($post, '') && $model->login()) {
            return \Yii::$app->user->identity->getAuthKey();
        } else {
            return $model;
        }
    }
}