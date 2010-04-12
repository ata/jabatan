<?php
$this->breadcrumbs=array(
	'Ktis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kti', 'url'=>array('index')),
	array('label'=>'Manage Kti', 'url'=>array('admin')),
);
?>

<h1>Create Kti</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->kenaikanJabatan->pegawai,
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
<br/>

