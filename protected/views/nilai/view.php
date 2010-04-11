<?php
$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Nilai', 'url'=>array('index')),
	array('label'=>'Create Nilai', 'url'=>array('create')),
	array('label'=>'Update Nilai', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Nilai', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage Nilai', 'url'=>array('admin')),
);
?>

<h1>View Nilai #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ip_lama',
		'ip_baru',
		'ip_jumlah',
		'tp_lama',
		'tp_baru',
		'tp_jumlah',
		'butir_kegiatan_id',
		'dupak_id',
	),
)); ?>
