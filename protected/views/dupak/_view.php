<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor')); ?>:</b>
	<?php echo CHtml::encode($data->nomor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mp_mulai')); ?>:</b>
	<?php echo CHtml::encode($data->mp_mulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mp_selesai')); ?>:</b>
	<?php echo CHtml::encode($data->mp_selesai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kenaikan_jabatan_id')); ?>:</b>
	<?php echo CHtml::encode($data->kenaikan_jabatan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_dupak_id')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_dupak_id); ?>
	<br />


</div>