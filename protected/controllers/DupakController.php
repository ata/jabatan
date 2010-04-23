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
    
    public $errors = array();
    public $messages = array();

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
                'actions'=>array('admin','delete','catatan','deleteCatatan','finish'),
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
        if(!isset($_SESSION['KtiItem'])){
            $_SESSION['KtiItem'] = array();
            $_SESSION['Lampiran'] = array();
        }
            
            
        foreach($_SESSION['KtiItem'] as $item){
            $lampiran = new Lampiran;
            $lampiran->deskripsi = $item->judul;
            $_SESSION['Lampiran'][] = clone $lampiran;
        }
        
        
        if(isset($_POST['CatatanKetuaPenilai'])){
            foreach($_POST['CatatanKetuaPenilai'] as $i => $catatan){
                if(strlen(trim($catatan['deskripsi'])) == 0)
                    continue;
                $catatanKetuaPenilai = new CatatanKetuaPenilai;
                $catatanKetuaPenilai->attributes = $catatan;
                $_SESSION['CatatanKetuaPenilai'][$i] = clone $catatanKetuaPenilai;
            }
        }
        
        if(isset($_POST['CatatanPengusul'])){
            foreach($_POST['CatatanPengusul'] as $i => $catatan){
                if(strlen(trim($catatan['deskripsi'])) == 0)
                    continue;
                $catatanPengusul = new CatatanPengusul;
                $catatanPengusul->attributes = $catatan;
                $_SESSION['CatatanPengusul'][$i] = clone $catatanPengusul;
            }
            
        }
        
        if(isset($_POST['CatatanTimPenilai'])){
            foreach($_POST['CatatanTimPenilai'] as $i => $catatan){
                if(strlen(trim($catatan['deskripsi'])) == 0)
                    continue;
                $catatanTimPenilai = new CatatanTimPenilai;
                $catatanTimPenilai->attributes = $catatan;
                $_SESSION['CatatanTimPenilai'][$i] = clone $catatanTimPenilai;
            }
        }

        
        
        
        if(isset($_POST['Penilai'])){
            foreach($_POST['Penilai'] as $i => $p){
                if(strlen(trim($p['nama'])) == 0 && strlen(trim($p['nip'])) == 0)
                    continue;
                if($i === 'ketua') 
                    continue;
                $penilai = new Penilai;
                //$penilai->attributes = $p;
                $penilai->nama = $p['nama'];
                $penilai->nip = $p['nip'];
                $_SESSION['Penilai'][$i] = clone $penilai;
                //var_dump($p);
                //var_dump($penilai->attributes);
            }
            $penilai = new Penilai;
            //$penilai->attributes = $_POST['Penilai']['ketua'];
            $p = $_POST['Penilai']['ketua'];
            $penilai->nama = $p['nama'];
            $penilai->nip = $p['nip'];
            $penilai->ketua = true;
            $_SESSION['Penilai']['ketua'] = clone $penilai;
            //var_dump($penilai->attributes);
        }
        
        
        if(!empty($_POST)){
            $this->saveAll();
            $this->redirect(array('finish'));
        }
        
        //$catatanKetuaPenilai = new CatatanKetuaPenilai;
        //$catatanPengusul = new CatatanPengusul;
        //$catatanTimPenilai = new CatatanTimPenilai;
        
        $this->render('catatan',array(
            'listCatatanKetuaPenilai' => isset($_SESSION['CatatanKetuaPenilai'])?
                $_SESSION['CatatanKetuaPenilai']:array(
                    new CatatanKetuaPenilai,
                    new CatatanKetuaPenilai,
                    new CatatanKetuaPenilai,
                    new CatatanKetuaPenilai,
                    new CatatanKetuaPenilai,
                ),
            'listCatatanPengusul' => isset($_SESSION['CatatanPengusul'])?
                $_SESSION['CatatanPengusul']:array(
                    new CatatanPengusul,
                    new CatatanPengusul,
                    new CatatanPengusul,
                    new CatatanPengusul,
                    new CatatanPengusul,
                ),
            'listCatatanTimPenilai' => isset($_SESSION['CatatanTimPenilai'])?
                $_SESSION['CatatanTimPenilai']:array(
                    new CatatanTimPenilai,
                    new CatatanTimPenilai,
                    new CatatanTimPenilai,
                    new CatatanTimPenilai,
                    new CatatanTimPenilai,
                ),
            'timPenilai' => isset($_SESSION['Penilai'])?
                $_SESSION['Penilai']:array(
                    new Penilai,
                    new Penilai,
                    new Penilai,
                ),
            'ketuaPenilai' => isset($_SESSION['Penilai']['ketua'])?
                $_SESSION['Penilai']['ketua']:new Penilai,
            'listLampiran' => $_SESSION['Lampiran'],
            'dupak'=>$_SESSION['Dupak'],
            //'catatanKetuaPenilai' => $catatanKetuaPenilai,
            //'catatanPengusul' => $catatanPengusul,
            //'catatanTimPenilai' => $catatanTimPenilai
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
    
    
    public function actionFinish()
    {
        
        $messages = isset($_SESSION['Messages'])?$_SESSION['Messages']:array();
        if (isset($_SESSION['Messages']))
            unset($_SESSION['Messages']);
        $this->render('finish',array('messages' => $messages));
    }
    
    protected function saveAll()
    {
        $messages = array();
        $errors = array();
        
        $kenaikanJabatan = $_SESSION['KenaikanJabatan'];
        if ($kenaikanJabatan->save()) 
            $messages[] =  'kenaikan jabatan saved';
        else
            $errors[] = 'kenaikan jabatan not saved';
            
        $kti = new Kti;
        $kti->kenaikan_jabatan_id = $kenaikanJabatan->id;
        if ($kti->save())
            $messages[] = 'kti saved';
        else
            $errors[] = 'kti not saved';
        
        foreach($_SESSION['KtiItem'] as $item){
            $item->kti_id = $kti->id;
            if($item->save())
                $messages[] =  "kti item #{$item->id} saved";
            else
                $errors[] = 'kti item not saved';
        }
        
        $dupak = $_SESSION['Dupak'];
        $dupak->kenaikan_jabatan_id = $kenaikanJabatan->id;
        if($dupak->save())
            $messages[] = 'dupak saved';
        else
            $errors[] = 'dupak not saved';
            
        foreach($_SESSION['Nilai'] as $nilai){
            $nilai->dupak_id = $dupak->id;
            if($nilai->save())
                $messages[] =  "nilai #{$nilai->id} saved!";
            else
                $errors[] = 'nilai not saved!';
            
        }
        
        foreach($_SESSION['CatatanKetuaPenilai'] as $catatan){
            $catatan->dupak_id = $dupak->id;
            if($catatan->save())
                $messages[] = "catatan Ketua tim penilai #{$catatan->id} saved!";
            else
                $errors[] = 'catatan Ketua tim penilai not saved!';
        }
        
        foreach($_SESSION['CatatanTimPenilai'] as $catatan){
            $catatan->dupak_id = $dupak->id;
            if($catatan->save())
                $messages[] = "catatan tim penilai #{$catatan->id} saved!";
            else
                $errors[] = 'catatan tim penilai not saved!';
        }
        
        foreach($_SESSION['CatatanPengusul'] as $catatan){
            $catatan->dupak_id = $dupak->id;
            if($catatan->save())
                $messages[] = "catatan Pejabat Pengusul #{$catatan->id} saved!";
            else
                $errors[] = 'catatan Pejabat Pengusul tim penilai not saved!';
        }
        
        foreach($_SESSION['Lampiran'] as $lampiran){
            $lampiran->dupak_id = $dupak->id;
            if($lampiran->save())
                $messages[] = "Lampiran #{$lampiran->id} saved!";
            else
                $errors[] = "Lampiran not saved!";
        }
        
        foreach($_SESSION['Penilai'] as $penilai){
            $penilai->dupak_id = $dupak->id;
            if($penilai->save())
                $messages[] = "Penilai #{$penilai->id} saved!";
            else
                $errors[] = "Penilai not saved!";
        }
        
        
        
        
        unset($_SESSION['KenaikanJabatan']);
        unset($_SESSION['Kti']);
        unset($_SESSION['KtiItem']);
        unset($_SESSION['Dupak']);
        unset($_SESSION['Nilai']);
        unset($_SESSION['CatatanKetuaPenilai']);
        unset($_SESSION['CatatanTimPenilai']);
        unset($_SESSION['CatatanPengusul']);
        unset($_SESSION['Lampiran']);
        unset($_SESSION['Penilai']);
        
        $_SESSION['Errors'] = $errors;
        $_SESSION['Messages'] = $messages;
        
        return !empty($errors);
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
