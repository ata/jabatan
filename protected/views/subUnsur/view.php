<?php
$this->breadcrumbs=array(
	'Sub Unsurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SubUnsur', 'url'=>array('index')),
	array('label'=>'Create SubUnsur', 'url'=>array('create')),
	array('label'=>'Update SubUnsur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubUnsur', 'url'=>array('delete','id'=>$model->id), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage SubUnsur', 'url'=>array('admin')),
);
?>

<h1>View SubUnsur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'unsur_id',
	),
)); ?>
