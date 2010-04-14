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
		<?php echo $form->label($model,'judul'); ?>
		<?php echo $form->textArea($model,'judul',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unsur'); ?>
		<?php echo $form->textField($model,'unsur',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p2jp_instansi'); ?>
		<?php echo $form->textField($model,'p2jp_instansi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p2jp_lipi'); ?>
		<?php echo $form->textField($model,'p2jp_lipi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kti_id'); ?>
		<?php echo $form->textField($model,'kti_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->