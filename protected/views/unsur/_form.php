<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'unsur-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'nama'); ?>
        <?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'nama'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'jenis_dupak_id'); ?>
        <?php echo $form->dropDownList($model,'jenis_dupak_id',CHtml::listData(JenisDupak::model()->findAll(),'id','nama')); ?>
        <?php echo $form->error($model,'jenis_dupak_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
