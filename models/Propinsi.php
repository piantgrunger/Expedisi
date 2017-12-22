<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "tb_m_propinsi".
 *
 * @property int $id_propinsi
 * @property string $nama_propinsi
 *
 * @property TbMKota[] $tbMKotas
 * @property TbMtResi[] $tbMtResis
 * @property TbMtResi[] $tbMtResis0
 */
class Propinsi extends \yii\db\ActiveRecord
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
        return 'tb_m_propinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_propinsi'], 'required'],
            [['nama_propinsi'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_propinsi' => 'Id Propinsi',
            'nama_propinsi' => 'Nama Propinsi',
        ];
    }

     public function getDataBrowsePropinsi()
    {        
     return ArrayHelper::map(
                     Propinsi::find()
                                        ->select([
                                                'id_propinsi','nama_propinsi'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_propinsi', 'nama_propinsi');
    }
}
