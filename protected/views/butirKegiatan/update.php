<?php
$this->breadcrumbs=array(
	'Butir Kegiatans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ButirKegiatan', 'url'=>array('index')),
	array('label'=>'Create ButirKegiatan', 'url'=>array('create')),
	array('label'=>'View ButirKegiatan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ButirKegiatan', 'url'=>array('admin')),
);
?>

<h1>Update ButirKegiatan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>