<?php
$this->breadcrumbs=array(
	'Butir Kegiatans',
);

$this->menu=array(
	array('label'=>'Create ButirKegiatan', 'url'=>array('create')),
	array('label'=>'Manage ButirKegiatan', 'url'=>array('admin')),
);
?>

<h1>Butir Kegiatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
