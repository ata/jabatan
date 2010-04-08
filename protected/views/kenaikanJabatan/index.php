<?php
$this->breadcrumbs=array(
	'Kenaikan Jabatans',
);

$this->menu=array(
	array('label'=>'Create KenaikanJabatan', 'url'=>array('create')),
	array('label'=>'Manage KenaikanJabatan', 'url'=>array('admin')),
);
?>

<h1>Kenaikan Jabatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
