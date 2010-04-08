<?php
$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Create Kegiatan', 'url'=>array('create')),
	array('label'=>'Update Kegiatan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kegiatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<h1>View Kegiatan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'sub_unsur_id',
	),
)); ?>
