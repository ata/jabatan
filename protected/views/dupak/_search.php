<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomor'); ?>
		<?php echo $form->textField($model,'nomor',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mp_mulai'); ?>
		<?php echo $form->textField($model,'mp_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mp_selesai'); ?>
		<?php echo $form->textField($model,'mp_selesai',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kenaikan_jabatan_id'); ?>
		<?php echo $form->textField($model,'kenaikan_jabatan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_dupak_id'); ?>
		<?php echo $form->textField($model,'jenis_dupak_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->