<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use mdm\behaviors\ar\RelationTrait;



/**
 * This is the model class for table "tb_mt_invoice".
 *
 * @property int $id_invoice
 * @property int $id_outlet
 * @property string $no_invoice
 * @property string $tgl_invoice
 * @property int $id_customer
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMOutlet $outlet
 * @property TbMCustomer $customer
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    use RelationTrait;
 

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
        return 'tb_mt_invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_outlet', 'id_customer'], 'integer'],
            [['no_invoice', 'tgl_invoice', 'id_customer'], 'required'],
            [['tgl_invoice', 'created_at', 'updated_at'], 'safe'],
            [['no_invoice'], 'string', 'max' => 255],
            [['no_invoice'], 'unique'],
            [['id_outlet'], 'exist', 'skipOnError' => true, 'targetClass' => Outlet::className(), 'targetAttribute' => ['id_outlet' => 'id_outlet']],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'id_customer']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_invoice' => Yii::t('app', 'Id Invoice'),
            'id_outlet' => Yii::t('app', 'Id Outlet'),
            'no_invoice' => Yii::t('app', 'No Invoice'),
            'tgl_invoice' => Yii::t('app', 'Tgl Invoice'),
            'id_customer' => Yii::t('app', 'Id Customer'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailInvoice()
    {
        return $this->hasMany(Det_Invoice::className(), ['id_invoice' => 'id_invoice']);
    }
    public function setDetailInvoice($value)
    {
        return $this->loadRelated('detailInvoice',$value);
    }
    public function getOutlet()
    {
        return $this->hasOne(Outlet::className(), ['id_outlet' => 'id_outlet']);
    }
    public function getDetailCount()
    {
         return Det_Invoice::find()->where(['id_invoice' => $this->id_invoice])->count();;
    }
      
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_customer']);
    }

    public function getNamaCustomer()
    {
        return is_null($this->customer)?"":$this->customer->nama_customer;
    }
    
    public function getTotal()
    {
        $x=0;    
        if ($this->isNewRecord) {
            return $x; // This avoid calling a query searching for null primary keys.
        }
        
          foreach($this->detailInvoice as $detail)
          {
              $x=$x+$detail->sub_total;
          }    
     
     
        return $x;
    }

}
