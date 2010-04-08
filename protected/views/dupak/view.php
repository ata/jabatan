<?php
$this->breadcrumbs=array(
	'Dupaks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dupak', 'url'=>array('index')),
	array('label'=>'Create Dupak', 'url'=>array('create')),
	array('label'=>'Update Dupak', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dupak', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage Dupak', 'url'=>array('admin')),
);
?>

<h1>View Dupak #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nomor',
		'mp_mulai',
		'mp_selesai',
		'kenaikan_jabatan_id',
		'jenis_dupak_id',
	),
)); ?>
