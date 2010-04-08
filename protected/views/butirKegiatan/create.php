<?php
$this->breadcrumbs=array(
	'Butir Kegiatans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ButirKegiatan', 'url'=>array('index')),
	array('label'=>'Manage ButirKegiatan', 'url'=>array('admin')),
);
?>

<h1>Create ButirKegiatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>