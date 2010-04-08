<?php
$this->breadcrumbs=array(
	'Jenis Dupaks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JenisDupak', 'url'=>array('index')),
	array('label'=>'Create JenisDupak', 'url'=>array('create')),
	array('label'=>'View JenisDupak', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JenisDupak', 'url'=>array('admin')),
);
?>

<h1>Update JenisDupak <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>