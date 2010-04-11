<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_lama')); ?>:</b>
	<?php echo CHtml::encode($data->ip_lama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_baru')); ?>:</b>
	<?php echo CHtml::encode($data->ip_baru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->ip_jumlah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tp_lama')); ?>:</b>
	<?php echo CHtml::encode($data->tp_lama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tp_baru')); ?>:</b>
	<?php echo CHtml::encode($data->tp_baru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tp_jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->tp_jumlah); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('butir_kegiatan_id')); ?>:</b>
	<?php echo CHtml::encode($data->butir_kegiatan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dupak_id')); ?>:</b>
	<?php echo CHtml::encode($data->dupak_id); ?>
	<br />

	*/ ?>

</div>