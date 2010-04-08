<?php
$this->breadcrumbs=array(
	'Dupaks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dupak', 'url'=>array('index')),
	array('label'=>'Create Dupak', 'url'=>array('create')),
	array('label'=>'View Dupak', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dupak', 'url'=>array('admin')),
);
?>

<h1>Update Dupak <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>