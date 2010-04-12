<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kti-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kenaikan_jabatan_id'); ?>
		<?php echo $form->textField($model,'kenaikan_jabatan_id'); ?>
		<?php echo $form->error($model,'kenaikan_jabatan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dupak_id'); ?>
		<?php echo $form->textField($model,'dupak_id'); ?>
		<?php echo $form->error($model,'dupak_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->