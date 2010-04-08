<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'sub-unsur-form',
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
        <?php echo $form->labelEx($model,'unsur_id'); ?>
        <?php echo $form->dropDownList($model,'unsur_id', CHtml::listData(Unsur::model()->findAll(),'id','unsurOption')); ?>
        <?php echo $form->error($model,'unsur_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
