<?php
$this->breadcrumbs=array(
	'Sub Unsurs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubUnsur', 'url'=>array('index')),
	array('label'=>'Manage SubUnsur', 'url'=>array('admin')),
);
?>

<h1>Create SubUnsur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>