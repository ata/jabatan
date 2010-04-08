<?php
$this->breadcrumbs=array(
	'Unsurs',
);

$this->menu=array(
	array('label'=>'Create Unsur', 'url'=>array('create')),
	array('label'=>'Manage Unsur', 'url'=>array('admin')),
);
?>

<h1>Unsurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
