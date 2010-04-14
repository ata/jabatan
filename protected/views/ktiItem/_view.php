<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('judul')); ?>:</b>
	<?php echo CHtml::encode($data->judul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unsur')); ?>:</b>
	<?php echo CHtml::encode($data->unsur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p2jp_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->p2jp_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p2jp_lipi')); ?>:</b>
	<?php echo CHtml::encode($data->p2jp_lipi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kti_id')); ?>:</b>
	<?php echo CHtml::encode($data->kti_id); ?>
	<br />


</div>