<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $ID_client
 * @property string $last_name_client
 * @property string $first_name_client
 * @property string $patronimic_name_client
 * @property string $mobile_number
 * @property string $address
 *
 * @property Order[] $orders
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['last_name_client', 'first_name_client', 'patronimic_name_client', 'mobile_number', 'address'], 'required'],
            [['last_name_client', 'first_name_client', 'patronimic_name_client', 'address'], 'string'],
            [['mobile_number'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_client' => 'Id Client',
            'last_name_client' => 'Фамилия',
            'first_name_client' => 'Имя',
            'patronimic_name_client' => 'Отчество',
            'mobile_number' => 'Номер телефона',
            'address' => 'Адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['ID_client' => 'ID_client']);
    }
}
