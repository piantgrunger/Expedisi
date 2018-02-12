<?php

namespace app\controllers;

use Yii;
use app\models\Resi;
use app\models\ResiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\Kota;
use app\models\Kelurahan;
use app\models\Kecamatan;

/**
 * ResiController implements the CRUD actions for Resi model.
 */
class ResiController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Resi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
      
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionLaporan()
    {
        $searchModel = new ResiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
      
        return $this->render('laporan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionTerima()
    {
        $searchModel = new ResiSearch();
                                         
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1);
                          

        return $this->render('terima', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Resi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Resi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_resi]);
        } else {
               $session = Yii::$app->session;
               $model->id_outlet=$session['id_outlet'];  
               $model->tgl_resi=date('Y-m-d');
               $model->charge=0;
               $model->packing=0;
               $model->other=0;
               $model->vat=0;
               $model->total=0;
               
               
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Resi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
  
            return $this->redirect(['index']);
            } else {

            if (($model->status == 'Sudah Dikirim') || ($model->status=='Sampai'))

            {
                Yii::$app->session->setFlash('error', "Data Tidak Dapat Dikoreksi Karena Dalam Status : $model->status ");
                return $this->redirect(['index']);
            } else
            {
              
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionPenerimaan($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['terima']);
        } else {
            return $this->render('updateterima', [
                'model' => $model,
            ]);
        }
    }

// THE CONTROLLER
public function actionKota() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $id_propinsi = $_POST['depdrop_parents'];
            $out = Kota::getDataBrowseKota($id_propinsi); 
            // the getDefaultSubCat function will query the database
            // and return the default sub cat for the cat_id
            
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}
// THE CONTROLLER
public function actionKelurahan() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $id_propinsi = $_POST['depdrop_parents'];
            $out = Kelurahan::getDataBrowseKelurahan($id_propinsi); 
            // the getDefaultSubCat function will query the database
            // and return the default sub cat for the cat_id
            
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}


// THE CONTROLLER
public function actionKecamatan() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $id_propinsi = $_POST['depdrop_parents'];
            $out = Kecamatan::getDataBrowseKecamatan($id_propinsi); 
            // the getDefaultSubCat function will query the database
            // and return the default sub cat for the cat_id
            
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}

    /**
     * Deletes an existing Resi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        if (($model->status == 'Sudah Dikirim') || ($model->status=='Sampai'))

        {
            Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dalam Status : $model->status ");
            return $this->redirect(['index']);
        } else
        {   
       try
      {
          
        $this->findModel($id)->delete();
      
      }
      catch(\yii\db\IntegrityException  $e)
      {
	Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
       } 
         return $this->redirect(['index']);
    }    
    }

    /**
     * Finds the Resi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
