<?php

namespace app\modules\common\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => 'common\views\error',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
