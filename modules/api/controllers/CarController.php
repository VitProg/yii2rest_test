<?php
/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 17.07.2015
 * Time: 19:33
 */

namespace app\modules\api\controllers;

use Yii;
use app\modules\common\models\Car;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class CarController extends ActiveController
{
    public $modelClass = Car::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }

    public function actions()
    {
        return array_merge(
            parent::actions(),
            [
                'index' => [
                    'class' => 'yii\rest\IndexAction',
                    'modelClass' => $this->modelClass,
                    'checkAccess' => [$this, 'checkAccess'],
                    'prepareDataProvider' => function ($action) {
                        /* @var $model Car */
                        $model = new $this->modelClass;
                        $query = $model::find();
                        $query->where('user_id = ' . (int)Yii::$app->user->id);
                        $dataProvider = new ActiveDataProvider(['query' => $query]);
                        return $dataProvider;
                    }
                ]
            ]
        );
    }

    public function checkAccess($action, $model = null, $params = []) {
        if ($action === 'view' && $model instanceof Car) {
            return $model->user_id === (int)Yii::$app->user->id;
        }
        return parent::checkAccess($action, $model, $params);
    }


}