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
		<?php echo $form->label($model,'ip_lama'); ?>
		<?php echo $form->textField($model,'ip_lama'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip_baru'); ?>
		<?php echo $form->textField($model,'ip_baru'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip_jumlah'); ?>
		<?php echo $form->textField($model,'ip_jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tp_lama'); ?>
		<?php echo $form->textField($model,'tp_lama'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tp_baru'); ?>
		<?php echo $form->textField($model,'tp_baru'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tp_jumlah'); ?>
		<?php echo $form->textField($model,'tp_jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'butir_kegiatan_id'); ?>
		<?php echo $form->textField($model,'butir_kegiatan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dupak_id'); ?>
		<?php echo $form->textField($model,'dupak_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->