<?php
$this->breadcrumbs=array(
	'Ktis',
);

$this->menu=array(
	array('label'=>'Create Kti', 'url'=>array('create')),
	array('label'=>'Manage Kti', 'url'=>array('admin')),
);
?>

<h1>Ktis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
