<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pegawai-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nskp'); ?>
		<?php echo $form->textField($model,'nskp',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nskp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir'); ?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tmt'); ?>
		<?php echo $form->textField($model,'tmt'); ?>
		<?php echo $form->error($model,'tmt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bidang_kepakaran'); ?>
		<?php echo $form->textField($model,'bidang_kepakaran',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bidang_kepakaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jabatan_id'); ?>
		<?php echo $form->textField($model,'jabatan_id'); ?>
		<?php echo $form->error($model,'jabatan_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->