<?php
$this->breadcrumbs=array(
	'Dupaks',
);

$this->menu=array(
	array('label'=>'Create Dupak', 'url'=>array('create')),
	array('label'=>'Manage Dupak', 'url'=>array('admin')),
);
?>

<h1>Dupaks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
