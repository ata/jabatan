<?php
$this->breadcrumbs=array(
	'Unsurs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Unsur', 'url'=>array('index')),
	array('label'=>'Manage Unsur', 'url'=>array('admin')),
);
?>

<h1>Create Unsur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>