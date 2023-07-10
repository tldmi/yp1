<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property integer $ID_service
 * @property string $name_service
 * @property integer $price_service
 *
 * @property Order[] $orders
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_service', 'price_service'], 'required'],
            [['name_service'], 'string'],
            [['price_service'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_service' => 'Id Service',
            'name_service' => 'Name Service',
            'price_service' => 'Price Service',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['ID_service' => 'ID_service']);
    }
}
