<?php
$this->breadcrumbs=array(
    'Dupaks'=>array('index'),
    'isiNilai',
);

$this->menu=array(
    array('label'=>'List Dupak', 'url'=>array('index')),
    array('label'=>'Manage Dupak', 'url'=>array('admin')),
);
?>

<h1>Pengisian Nilai Dupak</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$kenaikanJabatan->pegawai,
    'attributes'=>array(
        'id',
        'nip',
        'nama',
        'nskp',
        'tempat_lahir',
        'tanggal_lahir',
        'tmt',
        'bidang_kepakaran',
        'jabatan',
    ),
)); ?>

<br/>
<br/>
<h2>Info Dupak</h2>
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$dupak,
    'attributes'=>array(
        'nomor',
        'range',
        'jenis.nama'
    ),
)); ?>

<br/>

<h2>Unsur Yang di nilai</h2>
<?php $n = 0;$form=$this->beginWidget('CActiveForm', array(
    'id'=>'nilai-form',
));?>
<?php $n = 0;?>
<table id="formNilaiDupak">
    <thead>
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3" colspan="8">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
            <th colspan="6">ANGKA KREDIT MENURUT</th>
        </tr>
        <tr>
            <th colspan="3" align="center">INSTANSI PENGUSUL</th>
            <th colspan="3">TIM PENILAI</th>
        </tr>
        <tr>
            <th>LAMA</th>
            <th>BARU</th>
            <th>JUMLAH</th>
            <th>LAMA</th>
            <th>BARU</th>
            <th>JUMLAH</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->rows as $row):?>
            <tr>
                <td colspan="<?php echo $row->left?>"></td>
                <td><?php echo ' '?></td>
                <td colspan="<?php echo $row->right?>"><?php echo $row->label?></td>
                <?php if(!$row->input):?>
                    <td colspan="6">&nbsp;</td>
                <?php else:?>
                    <?php echo $form->hiddenField($row->nilai,"[$n]butir_kegiatan_id",array('value'=>$row->nilai->butir_kegiatan_id)) ?>
                    <td><?php echo $form->textField($row->nilai,"[$n]ip_baru",array('size'=>2,'value'=>$row->nilai->ip_baru))?></td>
                    <td><?php echo $form->textField($row->nilai,"[$n]ip_lama",array('size'=>2,'value'=>$row->nilai->ip_lama))?></td>
                    <td><?php echo $form->textField($row->nilai,"[$n]ip_jumlah",array('size'=>2,'value'=>$row->nilai->ip_jumlah))?></td>
                    <td><?php echo $form->textField($row->nilai,"[$n]tp_baru",array('size'=>2,'value'=>$row->nilai->tp_baru))?></td>
                    <td><?php echo $form->textField($row->nilai,"[$n]tp_lama",array('size'=>2,'value'=>$row->nilai->tp_lama))?></td>
                    <td><?php echo $form->textField($row->nilai,"[$n]tp_jumlah",array('size'=>2,'value'=>$row->nilai->tp_jumlah))?></td>
                    <?php $n++?>
                <?php endif?>
            </tr>
        <?php endforeach?>
    </tbody>
</table>

<?php echo CHtml::link('<button>Back</button>',array('dupak/create'));?>
<?php echo CHtml::submitButton('Next'); ?>
<?php $this->endWidget(); ?>



