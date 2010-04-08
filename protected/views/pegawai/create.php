<?php
$this->breadcrumbs=array(
	'Pegawais'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pegawai', 'url'=>array('index')),
	array('label'=>'Manage Pegawai', 'url'=>array('admin')),
);
?>

<h1>Create Pegawai</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>