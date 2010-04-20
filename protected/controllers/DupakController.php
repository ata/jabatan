<?php

class DupakController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to 'column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='column2';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','catatan','deleteCatatan'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView()
    {
        $this->render('view',array(
            'model'=>$this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        if(!isset($_SESSION['KenaikanJabatan']))
            $this->redirect(array('kenaikanJabatan/create'));
            
        $dupak = isset($_SESSION['Dupak'])?$_SESSION['Dupak']:new Dupak;
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        if(isset($_POST['Dupak']))
        {
            $dupak->attributes=$_POST['Dupak'];
            $_SESSION['Dupak'] = $dupak;
            $this->redirect(array('nilai/create'));
        }
        $this->render('create',array(
            'dupak'=>$dupak,
            'kenaikanJabatan' => $_SESSION['KenaikanJabatan'],
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate()
    {
        $model=$this->loadModel();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Dupak']))
        {
            $model->attributes=$_POST['Dupak'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }
    
    public function actionCatatan()
    {
        if(!isset($_SESSION['KenaikanJabatan']))
            $this->redirect(array('kenaikanJabatan/create'));
        if(isset($_SESSION['Lampiran'])) 
            unset($_SESSION['Lampiran']);
        if(!isset($_SESSION['KtiItem']))
            $this->redirect(array('KtiItem/create'));
        foreach($_SESSION['KtiItem'] as $item){
            $lampiran = new Lampiran;
            $lampiran->deskripsi = $item->judul;
            $_SESSION['Lampiran'][] = clone $lampiran;
        }
        
        if(isset($_POST['CatatanKetuaPenilai'])){
            $catatanKetuaPenilai = new CatatanKetuaPenilai;
            $catatanKetuaPenilai->attributes = $_POST['CatatanKetuaPenilai'];
            $_SESSION['CatatanKetuaPenilai'][] = $catatanKetuaPenilai;
        }
        
        if(isset($_POST['CatatanPengusul'])){
            $catatanPengusul = new CatatanPengusul;
            $catatanPengusul->attributes = $_POST['CatatanPengusul'];
            $_SESSION['CatatanPengusul'][] = $catatanPengusul;
        }
        
        if(isset($_POST['CatatanTimPenilai'])){
            $catatanTimPenilai = new CatatanTimPenilai;
            $catatanTimPenilai->attributes = $_POST['CatatanTimPenilai'];
            $_SESSION['CatatanTimPenilai'][] = $catatanTimPenilai;
        }
        
        if(!empty($_POST)){
            $this->redirect(array('catatan'));
        }
        
        $catatanKetuaPenilai = new CatatanKetuaPenilai;
        $catatanPengusul = new CatatanPengusul;
        $catatanTimPenilai = new CatatanTimPenilai;
        
        $this->render('catatan',array(
            'listCatatanKetuaPenilai' => isset($_SESSION['CatatanKetuaPenilai'])?
                $_SESSION['CatatanKetuaPenilai']:array(),
            'listCatatanPengusul' => isset($_SESSION['CatatanPengusul'])?
                $_SESSION['CatatanPengusul']:array(),
            'listCatatanTimPenilai' => isset($_SESSION['CatatanTimPenilai'])?
                $_SESSION['CatatanTimPenilai']:array(),
            'listLampiran' => $_SESSION['Lampiran'],
            'dupak'=>$_SESSION['Dupak'],
            'catatanKetuaPenilai' => $catatanKetuaPenilai,
            'catatanPengusul' => $catatanPengusul,
            'catatanTimPenilai' => $catatanTimPenilai
        ));
    }
    
    public function actionDeleteCatatan()
    {
        if(isset($_GET['type']) && isset($_GET)){
            switch($_GET['type']){
                case 'ckp':
                    unset($_SESSION['CatatanKetuaPenilai'][$_GET['index']]);
                    break;
                case 'cp':
                    unset($_SESSION['CatatanPengusul'][$_GET['index']]);
                    break;
                case 'ctp':
                    unset($_SESSION['CatatanTimPenilai'][$_GET['index']]);
                    break;
            }
        }
        $this->redirect(array('catatan'));
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete()
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Dupak');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Dupak('search');
        if(isset($_GET['Dupak']))
            $model->attributes=$_GET['Dupak'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
                $this->_model=Dupak::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='dupak-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
