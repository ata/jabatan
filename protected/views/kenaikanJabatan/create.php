<?php
$this->breadcrumbs=array(
	'Kenaikan Jabatan'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KenaikanJabatan', 'url'=>array('index')),
	array('label'=>'Manage KenaikanJabatan', 'url'=>array('admin')),
);
?>

<h1>Create KenaikanJabatan</h1>

<?php echo $this->renderPartial('_form', array('kenaikanJabatan'=>$kenaikanJabatan)); ?>
