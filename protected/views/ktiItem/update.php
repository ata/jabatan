<?php
$this->breadcrumbs=array(
	'Kti Items'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KtiItem', 'url'=>array('index')),
	array('label'=>'Create KtiItem', 'url'=>array('create')),
	array('label'=>'View KtiItem', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KtiItem', 'url'=>array('admin')),
);
?>

<h1>Update KtiItem <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>