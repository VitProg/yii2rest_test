<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "{{%cars}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $model_id
 * @property string $name
 * @property integer $year
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property CarsModels $model
 * @property Users $user
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cars}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'model_id', 'name', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'model_id', 'year', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'model_id' => 'Model ID',
            'name' => 'Name',
            'year' => 'Year',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(CarsModels::className(), ['id' => 'model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
