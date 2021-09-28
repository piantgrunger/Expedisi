<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_dt_manifest".
 *
 * @property int $id_det_manifest
 * @property int $id_manifest
 * @property int $id_resi
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMtManifest $manifest
 * @property TbMtResi $resi
 */
class Det_Manifest extends \yii\db\ActiveRecord
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
        return 'tb_dt_manifest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'id_resi'], 'required'],
            [['id_manifest', 'id_resi'], 'integer'],
            [['keterangan'], 'string'],
            [['id_manifest','created_at', 'updated_at'], 'safe'],
            [['id_manifest'], 'exist', 'skipOnError' => true, 'targetClass' => Manifest::className(), 'targetAttribute' => ['id_manifest' => 'id_manifest']],
            [['id_resi'], 'exist', 'skipOnError' => true, 'targetClass' => Resi::className(), 'targetAttribute' => ['id_resi' => 'id_resi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_det_manifest' => 'Id Det Manifest',
            'id_manifest' => 'Id Manifest',
            'id_resi' => 'Id Resi',
            'keterangan' => 'Keterangan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManifest()
    {
        return $this->hasOne(Manifest::className(), ['id_manifest' => 'id_manifest']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResi()
    {
        return $this->hasOne(Resi::className(), ['id_resi' => 'id_resi']);
    }
}
