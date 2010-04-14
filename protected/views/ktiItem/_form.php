<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kti-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($item); ?>

	<div class="row">
		<?php echo $form->labelEx($item,'judul'); ?>
		<?php echo $form->textArea($item,'judul',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($item,'judul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($item,'unsur'); ?>
		<?php echo $form->textField($item,'unsur',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($item,'unsur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($item,'p2jp_instansi'); ?>
		<?php echo $form->textField($item,'p2jp_instansi'); ?>
		<?php echo $form->error($item,'p2jp_instansi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($item,'p2jp_lipi'); ?>
		<?php echo $form->textField($item,'p2jp_lipi'); ?>
		<?php echo $form->error($item,'p2jp_lipi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($item,'keterangan'); ?>
		<?php echo $form->textArea($item,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($item,'keterangan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($item->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
