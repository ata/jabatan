<?php
$this->breadcrumbs=array(
	'Dupaks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dupak', 'url'=>array('index')),
	array('label'=>'Manage Dupak', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$kenaikanJabatan->pegawai,
	'attributes'=>array(
		'id',
		'nip',
		'nama',
		'nskp',
		'tempat_lahir',
		'tanggal_lahir',
		'tmt',
		'bidang_kepakaran',
		'jabatan',
	),
)); ?>

<h1>Create Dupak</h1>

<?php echo $this->renderPartial('_form', array('dupak'=>$dupak)); ?>
