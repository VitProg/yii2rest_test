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
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class ModelController extends ActiveController
{
    public $modelClass = CarModel::class;

    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }


//    public function checkAccess($action, $model = null, $params = [])
//    {
//        return true;
//    }

}