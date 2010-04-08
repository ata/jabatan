<?php
$this->breadcrumbs=array(
	'Pegawais',
);

$this->menu=array(
	array('label'=>'Create Pegawai', 'url'=>array('create')),
	array('label'=>'Manage Pegawai', 'url'=>array('admin')),
);
?>

<h1>Pegawais</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
