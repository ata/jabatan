<?php
$this->breadcrumbs=array(
    'Dupak Wizard'=>array('dupakWizard/index'),
    'Step 1',
);?>

<h1>Step 1 : Pilih Pegawai dan Jabatan</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'kenaikan-jabatan-form')); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($kenaikanJabatan); ?>

    <div class="row">
        <?php echo $form->labelEx($kenaikanJabatan,'pegawai_id'); ?>
        <?php echo $form->dropDownList($kenaikanJabatan,'pegawai_id',CHtml::listData(Pegawai::model()->findAll(),'id','nama')); ?>
        <?php echo $form->error($kenaikanJabatan,'pegawai_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($kenaikanJabatan,'jabatan_id'); ?>
        <?php echo $form->dropDownList($kenaikanJabatan,'jabatan_id',CHtml::listData(Jabatan::model()->findAll(),'id','nama')); ?>
        <?php echo $form->error($kenaikanJabatan,'jabatan_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Next'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
