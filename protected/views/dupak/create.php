<?php
$this->breadcrumbs=array(
	'Dupaks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dupak', 'url'=>array('index')),
	array('label'=>'Manage Dupak', 'url'=>array('admin')),
);
?>

<h1>Create Dupak</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>