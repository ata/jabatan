<?php
$this->breadcrumbs=array(
	'Kti Items',
);

$this->menu=array(
	array('label'=>'Create KtiItem', 'url'=>array('create')),
	array('label'=>'Manage KtiItem', 'url'=>array('admin')),
);
?>

<h1>Kti Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
