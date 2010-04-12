<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kenaikan_jabatan_id')); ?>:</b>
	<?php echo CHtml::encode($data->kenaikan_jabatan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dupak_id')); ?>:</b>
	<?php echo CHtml::encode($data->dupak_id); ?>
	<br />


</div>