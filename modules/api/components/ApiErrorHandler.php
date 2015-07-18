<?php
/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 18.07.2015
 * Time: 20:26
  */

namespace app\modules\common\components;
//          app\modules\common\components\ApiErrorHandler

use Yii;
use yii\web\ErrorHandler;
use yii\web\Response;

class ApiErrorHandler extends ErrorHandler
{

    /**
     * @inheritdoc
     * @param \Exception $exception the exception to be rendered.
     */
    protected function renderException($exception)
    {
        if (Yii::$app->has('response')) {
            $response = Yii::$app->getResponse();
        } else {
            $response = new Response();
        }

        $response->data = $this->convertExceptionToArray($exception);
        $response->setStatusCode($exception->statusCode);

        $response->send();
    }

    /**
     * @inheritdoc
     * @param \Exception $exception the exception to be rendered.
     */
    protected function convertExceptionToArray($exception)
    {
        return [
            'meta'=>
                [
                    'status'=>'error',
                    'errors'=>[
                        ['message'=>$exception->getName(),'code'=>$exception->statusCode]
                    ]
                ]
        ];
    }
}