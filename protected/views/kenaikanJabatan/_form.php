<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'kenaikan-jabatan-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'pegawai_id'); ?>
        <?php echo $form->dropDownList($model,'pegawai_id',CHtml::listData(Pegawai::model()->findAll(),'id','nama')); ?>
        <?php echo $form->error($model,'pegawai_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'jabatan_id'); ?>
        <?php echo $form->dropDownList($model,'jabatan_id',CHtml::listData(Jabatan::model()->findAll(),'id','nama')); ?>
        <?php echo $form->error($model,'jabatan_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
