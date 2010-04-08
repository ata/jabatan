<?php
$this->breadcrumbs=array(
	'Unsurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Unsur', 'url'=>array('index')),
	array('label'=>'Create Unsur', 'url'=>array('create')),
	array('label'=>'View Unsur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Unsur', 'url'=>array('admin')),
);
?>

<h1>Update Unsur <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>