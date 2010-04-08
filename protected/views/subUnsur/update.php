<?php
$this->breadcrumbs=array(
	'Sub Unsurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubUnsur', 'url'=>array('index')),
	array('label'=>'Create SubUnsur', 'url'=>array('create')),
	array('label'=>'View SubUnsur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubUnsur', 'url'=>array('admin')),
);
?>

<h1>Update SubUnsur <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>