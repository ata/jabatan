<?php

class NilaiController extends Controller
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
                'actions'=>array('admin','delete'),
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
        if(!isset($_SESSION['Dupak']))
            $this->redirect(array('dupak/create'));
        $dupak = $_SESSION['Dupak'];
        
        if(isset($_POST['Nilai'])){
            $data = $_POST['Nilai'];
            $nilais = array();
            foreach($data as $item){
                $nilai = new Nilai;
                $nilai->attributes = $item;
                $nilais[] = clone $nilai;
            }
            $_SESSION['Nilai'] = $nilais;
            $this->redirect(array('dupak'));
        }
        //var_dump($_SESSION);
        $this->render('create',array(
            'kenaikanJabatan' => $_SESSION['KenaikanJabatan'],
            'dupak' => $_SESSION['Dupak'],
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


        if(isset($_POST['Nilai']))
        {
            $model->attributes=$_POST['Nilai'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
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
        $dataProvider=new CActiveDataProvider('Nilai');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Nilai('search');
        if(isset($_GET['Nilai']))
            $model->attributes=$_GET['Nilai'];

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
                $this->_model=Nilai::model()->findbyPk($_GET['id']);
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='nilai-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    protected function getRows()
    {
        $dupak = $_SESSION['Dupak'];
        $unsurs = Unsur::model()->findByDupak($dupak);
        $rows = array();
        $nilaiIndex = 0;
        foreach($unsurs as $unsur){
            $row = new StdClass;
            $row->label = $unsur->nama;
            $row->left = 1;
            $row->right = 7;
            $row->input = false;
            $rows[] = clone $row;
            foreach($unsur->subUnsurs as $sub){
                $row = new StdClass;
                $row->label = $sub->nama;
                $row->left = 2;
                $row->right = 6;
                $row->input = false;
                $rows[] = clone $row;
                foreach($sub->kegiatans as $kegiatan){
                    $row = new StdClass;
                    $row->label = $kegiatan->nama;
                    $row->left = 3;
                    $row->right = 5;
                    $row->input = false;
                    $rows[] = clone $row;
                    foreach($kegiatan->topButir as $butir){
                        $nilai = isset($_SESSION['Nilai'][$nilaiIndex])?$_SESSION['Nilai'][$nilaiIndex]:new Nilai;
                        $nilai->butir_kegiatan_id = $butir->id;
                        $row = new StdClass;
                        $row->label = $butir->nama;
                        $row->nilai = clone $nilai;
                        $row->left = 4;
                        $row->right = 4;
                        $row->input = true;
                        $rows[] = clone $row;
                        $nilaiIndex++;
                        foreach($butir->childs as $child1){
                            $nilai = isset($_SESSION['Nilai'][$nilaiIndex])?$_SESSION['Nilai'][$nilaiIndex]:new Nilai;
                            $nilai->butir_kegiatan_id = $child1->id;
                            $row = new StdClass;
                            $row->label = $child1->nama;
                            $row->nilai = clone $nilai;
                            $row->left = 5;
                            $row->right = 3;
                            $row->input = true;
                            $rows[] = clone $row;
                            $nilaiIndex++;
                            foreach($child1->childs as $child2){
                                $nilai = isset($_SESSION['Nilai'][$nilaiIndex])?$_SESSION['Nilai'][$nilaiIndex]:new Nilai;
                                $nilai->butir_kegiatan_id = $child2->id;
                                $row = new StdClass;
                                $row->label = $child2->nama;
                                $row->nilai = clone $nilai;
                                $row->left = 6;
                                $row->right = 2;
                                $row->input = true;
                                $rows[] = clone $row;
                                $nilaiIndex++;
                                foreach($child2->childs as $child3){
                                    $nilai = isset($_SESSION['Nilai'][$nilaiIndex])?$_SESSION['Nilai'][$nilaiIndex]:new Nilai;
                                    $nilai->butir_kegiatan_id = $child3->id;
                                    $row = new StdClass;
                                    $row->label = $child3->nama;
                                    $row->nilai = clone $nilai;
                                    $row->left = 7;
                                    $row->right = 1;
                                    $row->input = true;
                                    $rows[] = clone $row;
                                    $nilaiIndex++;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $rows;
    }
}
