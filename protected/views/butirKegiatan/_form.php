<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'butir-kegiatan-form',
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
        <?php echo $form->labelEx($model,'kegiatan_id'); ?>
        <?php echo $form->dropDownList($model,'kegiatan_id', CHtml::listData(Kegiatan::model()->findAll(),'id','nama')); ?>
        <?php echo $form->error($model,'kegiatan_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'parent_id'); ?>
        <?php echo $form->dropDownList($model,'parent_id',  array_merge(array('--parent--'),CHtml::listData(ButirKegiatan::model()->findAll(),'id','nama'))); ?>
        <?php echo $form->error($model,'parent_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
