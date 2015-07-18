<?php

namespace app\modules\api;

use app\modules\api\components\ApiErrorHandler;

class ApiModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\api\controllers';

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;

        $handler = new ApiErrorHandler();
        \Yii::$app->set('errorHandler', $handler);
        //необходимо вызывать register, это обязательный метод для регистрации обработчика
        $handler->register();
    }
}
