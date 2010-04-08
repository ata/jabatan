<?php
$this->breadcrumbs=array(
	'Kenaikan Jabatans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KenaikanJabatan', 'url'=>array('index')),
	array('label'=>'Create KenaikanJabatan', 'url'=>array('create')),
	array('label'=>'Update KenaikanJabatan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KenaikanJabatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage KenaikanJabatan', 'url'=>array('admin')),
);
?>

<h1>View KenaikanJabatan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pegawai_id',
		'jabatan_id',
	),
)); ?>
