<?php

namespace app\controllers;

use Yii;
use app\models\Invoice;
use app\models\InvoiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Resi;
use yii\helpers\Json;
use kartik\mpdf\Pdf; 

/**
 * InvoiceController implements the CRUD actions for Invoice model.
 */
class InvoiceController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Invoice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Invoice model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Invoice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Invoice();

        if ($model->load(Yii::$app->request->post()) ) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailInvoice = Yii::$app->request->post('Det_Invoice', []);
             
                if ($model->save()) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_invoice]);
                }

                $transaction->rollBack();
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
     
        } 
        
        $session = Yii::$app->session;
        $model->id_outlet=$session['id_outlet'];  
        $model->tgl_invoice=date('Y-m-d');


        return $this->render('create', [
            'model' => $model,
        ]);
        
    }

    /**
     * Updates an existing Invoice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailInvoice = Yii::$app->request->post('Det_Invoice', []);
             
                if ($model->save()) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_invoice]);
                }
                $transaction->rollBack();
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
     
        } else
        {

        return $this->render('update', [
            'model' => $model,
        ]);
        }
    }
    public function actionPrint($id)
    {
           //       
         $model = $this->findModel($id);  
         $content = $this->renderPartial('report',['model'=>$model]);
             // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_UTF8, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Invoice'],
         // call mPDF methods on the fly

         
    ]);
    return $pdf->render(); 

    }
   
    /**
     * Deletes an existing Invoice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionResi() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id_customer = $_POST['depdrop_parents'];
                $out = Resi::getDataBrowseResiInvoice($id_customer); 
                // the getDefaultSubCat function will query the database
                // and return the default sub cat for the cat_id
                
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    public function actionTotal($id){
        // you may need to check whether the entered ID is valid or not
        $model= Resi::findOne(['id_resi'=>$id]);
        return Json::encode([
            'id_resi'=>$model->id_resi,
            'total'=>$model->total,
        ]);
    }    
    

    /**
     * Finds the Invoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Invoice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Invoice::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
