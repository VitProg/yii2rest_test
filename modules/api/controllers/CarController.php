<?php
/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 17.07.2015
 * Time: 19:33
 */

namespace app\modules\api\controllers;


use app\modules\common\models\Car;
use yii\rest\ActiveController;

class CarController extends ActiveController
{
    public $modelClass = Car::class;

}