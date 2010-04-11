<?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model->kenaikanJabatan->pegawai,
        'attributes'=>array(
            'id',
            'nip',
            'nama',
            'nskp',
            'tempat_lahir',
            'tanggal_lahir',
            'tmt',
            'bidang_kepakaran',
            'jabatan',
        ),
    )); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'dupak-form',
    'enableAjaxValidation'=>false,
)); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'nomor'); ?>
        <?php echo $form->textField($model,'nomor',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'nomor'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'mp_mulai'); ?>
        <?php echo $form->textField($model,'mp_mulai'); ?>
        <?php echo $form->error($model,'mp_mulai'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'mp_selesai'); ?>
        <?php echo $form->textField($model,'mp_selesai',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'mp_selesai'); ?>
    </div>
    
    <?php echo $form->hiddenField($model,'kenaikan_jabatan_id'); ?>
    
    <div class="row">
        <?php echo $form->labelEx($model,'jenis_dupak_id'); ?>
        <?php echo $form->dropDownList($model,'jenis_dupak_id', CHtml::listData(JenisDupak::model()->findAll(),'id', 'nama')); ?>
        <?php echo $form->error($model,'jenis_dupak_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
