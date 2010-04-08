<?php
$this->breadcrumbs=array(
	'Jabatans',
);

$this->menu=array(
	array('label'=>'Create Jabatan', 'url'=>array('create')),
	array('label'=>'Manage Jabatan', 'url'=>array('admin')),
);
?>

<h1>Jabatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
