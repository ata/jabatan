<?php
$this->breadcrumbs=array(
	'Butir Kegiatans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ButirKegiatan', 'url'=>array('index')),
	array('label'=>'Create ButirKegiatan', 'url'=>array('create')),
	array('label'=>'Update ButirKegiatan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ButirKegiatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage ButirKegiatan', 'url'=>array('admin')),
);
?>

<h1>View ButirKegiatan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'kegiatan_id',
		'parent_id',
	),
)); ?>
