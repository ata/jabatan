<?php
$this->breadcrumbs=array(
	'Kenaikan Jabatans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KenaikanJabatan', 'url'=>array('index')),
	array('label'=>'Create KenaikanJabatan', 'url'=>array('create')),
	array('label'=>'View KenaikanJabatan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KenaikanJabatan', 'url'=>array('admin')),
);
?>

<h1>Update KenaikanJabatan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>