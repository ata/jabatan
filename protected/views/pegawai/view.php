<?php
$this->breadcrumbs=array(
	'Pegawais'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pegawai', 'url'=>array('index')),
	array('label'=>'Create Pegawai', 'url'=>array('create')),
	array('label'=>'Update Pegawai', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pegawai', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage Pegawai', 'url'=>array('admin')),
);
?>

<h1>View Pegawai #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nip',
		'nama',
		'nskp',
		'tempat_lahir',
		'tanggal_lahir',
		'tmt',
		'bidang_kepakaran',
		'jabatan_id',
	),
)); ?>
