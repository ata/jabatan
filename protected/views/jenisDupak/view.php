<?php
$this->breadcrumbs=array(
	'Jenis Dupaks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JenisDupak', 'url'=>array('index')),
	array('label'=>'Create JenisDupak', 'url'=>array('create')),
	array('label'=>'Update JenisDupak', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JenisDupak', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage JenisDupak', 'url'=>array('admin')),
);
?>

<h1>View JenisDupak #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>
