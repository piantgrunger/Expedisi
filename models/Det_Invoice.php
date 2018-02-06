<?php

namespace app\models;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "tb_dt_invoice".
 *
 * @property int $id_det_invoice
 * @property int $id_invoice
 * @property int $id_resi
 * @property string $sub_total
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMtInvoice $invoice
 * @property TbMtResi $resi
 */
class Det_Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['sub_total'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['sub_total'],
                ],
                'value' => function ($event) {
                    return is_null($this->resi)?null: $this->resi->total;
                },
            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_dt_invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['id_invoice', 'id_resi'], 'integer'],
            [['sub_total'], 'number'],
            [['keterangan'], 'string'],
            [['created_at','id_resi','sub_total' ,'updated_at'], 'safe'],
            [['id_invoice'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['id_invoice' => 'id_invoice']],
            [['id_resi'], 'exist', 'skipOnError' => true, 'targetClass' => Resi::className(), 'targetAttribute' => ['id_resi' => 'id_resi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_det_invoice' => Yii::t('app', 'Id Det Invoice'),
            'id_invoice' => Yii::t('app', 'Id Invoice'),
            'id_resi' => Yii::t('app', 'Id Resi'),
            'sub_total' => Yii::t('app', 'Sub  Total'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id_invoice' => 'id_invoice']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResi()
    {
        return $this->hasOne(Resi::className(), ['id_resi' => 'id_resi']);
    }
}
