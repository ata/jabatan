<?php
$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Create Kegiatan', 'url'=>array('create')),
	array('label'=>'View Kegiatan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<h1>Update Kegiatan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>