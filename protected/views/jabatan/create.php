<?php
$this->breadcrumbs=array(
	'Jabatans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jabatan', 'url'=>array('index')),
	array('label'=>'Manage Jabatan', 'url'=>array('admin')),
);
?>

<h1>Create Jabatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>