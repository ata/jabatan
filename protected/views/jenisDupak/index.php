<?php
$this->breadcrumbs=array(
	'Jenis Dupaks',
);

$this->menu=array(
	array('label'=>'Create JenisDupak', 'url'=>array('create')),
	array('label'=>'Manage JenisDupak', 'url'=>array('admin')),
);
?>

<h1>Jenis Dupaks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
