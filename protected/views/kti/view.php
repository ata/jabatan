<?php
$this->breadcrumbs=array(
	'Ktis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kti', 'url'=>array('index')),
	array('label'=>'Create Kti', 'url'=>array('create')),
	array('label'=>'Update Kti', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kti', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage Kti', 'url'=>array('admin')),
);
?>

<h1>View Kti #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'kenaikan_jabatan_id',
		'dupak_id',
	),
)); ?>
