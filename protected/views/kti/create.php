<?php
$this->breadcrumbs=array(
	'Ktis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kti', 'url'=>array('index')),
	array('label'=>'Manage Kti', 'url'=>array('admin')),
);
?>

<h1>Create Kti</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>