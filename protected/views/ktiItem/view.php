<?php
$this->breadcrumbs=array(
	'Kti Items'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KtiItem', 'url'=>array('index')),
	array('label'=>'Create KtiItem', 'url'=>array('create')),
	array('label'=>'Update KtiItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KtiItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage KtiItem', 'url'=>array('admin')),
);
?>

<h1>View KtiItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'judul',
		'unsur',
		'p2jp_instansi',
		'p2jp_lipi',
		'keterangan',
		'kti_id',
	),
)); ?>
