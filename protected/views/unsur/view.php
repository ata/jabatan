<?php
$this->breadcrumbs=array(
    'Unsurs'=>array('index'),
    $model->id,
);

$this->menu=array(
    array('label'=>'List Unsur', 'url'=>array('index')),
    array('label'=>'Create Unsur', 'url'=>array('create')),
    array('label'=>'Update Unsur', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete Unsur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
    array('label'=>'Manage Unsur', 'url'=>array('admin')),
);
?>

<h1>View Unsur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'nama',
        'jenis_dupak_id',
    ),
)); ?>
