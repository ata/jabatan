<?php
$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<h1>Create Kegiatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>