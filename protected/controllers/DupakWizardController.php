<?php

class DupakWizardController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('*'),
                'users'=>array('admin'),
            )
        );
    }
    
    public function actionStepOne()
    {
        $kenaikanJabatan=new KenaikanJabatan;
        if(isset($_POST['KenaikanJabatan']))
        {
            $kenaikanJabatan->attributes=$_POST['KenaikanJabatan'];
            $_SESSION['KenaikanJabatan'] = $kenaikanJabatan;
            $this->redirect(array('stepTwo'));
            
        }
        $this->render('stepOne',array(
            'kenaikanJabatan'=>$kenaikanJabatan,
        ));
    }

    public function actionStepTwo()
    {
        if (!isset($_SESSION['KenaikanJabatan']))
            $this->redirect(array('kenaikanJabatan/create'));
        $item = new KtiItem;

        if(isset($_POST['KtiItem']))
        {
            $item->attributes=$_POST['KtiItem'];
            $_SESSION['KtiItem'][] = $item;
            $this->redirect(array('create'));
        }
        $this->render('stepTwo',array(
            'kenaikanJabatan'=> $_SESSION['KenaikanJabatan'],
            'items' => isset($_SESSION['KtiItem'])?$_SESSION['KtiItem']:array(),
            'item' => $item
        ));
    }

    public function actionStepThree()
    {
        $this->render('stepThree');
    }

    public function actionStepFour()
    {
        $this->render('stepFour');
    }

    public function actionStepFive()
    {
        $this->render('stepFive');
    }

    public function actionIndex()
    {
        $this->render('index');
    }

}
