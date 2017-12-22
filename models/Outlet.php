<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tb_m_outlet".
 *
 * @property int $id_outlet
 * @property string $kode_outlet
 * @property string $nama_outlet
 * @property string $alamat_outlet
 * @property string $created_at
 * @property string $updated_at
 */
class Outlet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_outlet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_outlet', 'nama_outlet', 'alamat_outlet'], 'required'],
            [['alamat_outlet'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_outlet', 'nama_outlet'], 'string', 'max' => 255],
            [['kode_outlet'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_outlet' => Yii::t('app', 'Id Outlet'),
            'kode_outlet' => Yii::t('app', 'Kode Outlet'),
            'nama_outlet' => Yii::t('app', 'Nama Outlet'),
            'alamat_outlet' => Yii::t('app', 'Alamat Outlet'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    public function getDataBrowseOutlet()
    {        
     return ArrayHelper::map(
                     Outlet::find()
                                        ->select([
                                                'id_outlet','nama_outlet'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_outlet', 'nama_outlet');
    }
}
