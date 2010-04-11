<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nilai-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ip_lama'); ?>
		<?php echo $form->textField($model,'ip_lama'); ?>
		<?php echo $form->error($model,'ip_lama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip_baru'); ?>
		<?php echo $form->textField($model,'ip_baru'); ?>
		<?php echo $form->error($model,'ip_baru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip_jumlah'); ?>
		<?php echo $form->textField($model,'ip_jumlah'); ?>
		<?php echo $form->error($model,'ip_jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tp_lama'); ?>
		<?php echo $form->textField($model,'tp_lama'); ?>
		<?php echo $form->error($model,'tp_lama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tp_baru'); ?>
		<?php echo $form->textField($model,'tp_baru'); ?>
		<?php echo $form->error($model,'tp_baru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tp_jumlah'); ?>
		<?php echo $form->textField($model,'tp_jumlah'); ?>
		<?php echo $form->error($model,'tp_jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'butir_kegiatan_id'); ?>
		<?php echo $form->textField($model,'butir_kegiatan_id'); ?>
		<?php echo $form->error($model,'butir_kegiatan_id'); ?>
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