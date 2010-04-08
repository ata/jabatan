<?php
$this->breadcrumbs=array(
	'Jenis Dupaks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JenisDupak', 'url'=>array('index')),
	array('label'=>'Manage JenisDupak', 'url'=>array('admin')),
);
?>

<h1>Create JenisDupak</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>