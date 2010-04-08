<?php
$this->breadcrumbs=array(
	'Sub Unsurs',
);

$this->menu=array(
	array('label'=>'Create SubUnsur', 'url'=>array('create')),
	array('label'=>'Manage SubUnsur', 'url'=>array('admin')),
);
?>

<h1>Sub Unsurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
