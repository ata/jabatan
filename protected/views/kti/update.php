<?php
$this->breadcrumbs=array(
	'Ktis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kti', 'url'=>array('index')),
	array('label'=>'Create Kti', 'url'=>array('create')),
	array('label'=>'View Kti', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kti', 'url'=>array('admin')),
);
?>

<h1>Update Kti <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>