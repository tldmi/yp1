<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $ID_order
 * @property integer $ID_client
 * @property integer $ID_service
 * @property integer $status_order
 *
 * @property Service $iDService
 * @property Client $iDClient
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_client', 'ID_service', 'status_order'], 'required'],
            [['ID_client', 'ID_service', 'status_order'], 'integer'],
            [['ID_service'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['ID_service' => 'ID_service']],
            [['ID_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['ID_client' => 'ID_client']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_order' => 'Id Order',
            'ID_client' => 'Id Client',
            'ID_service' => 'Id Service',
            'status_order' => 'Status Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDService()
    {
        return $this->hasOne(Service::className(), ['ID_service' => 'ID_service']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDClient()
    {
        return $this->hasOne(Client::className(), ['ID_client' => 'ID_client']);
    }
}
