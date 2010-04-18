<?php
$this->breadcrumbs=array(
    'Dupak Wizard'=>array('dupakWizard/index'),
    'Step 1'=>array('dupakWizard/stepOne'),
    'Step 2'
);?>

<h1>DAFTAR RINCIAN KEGIATAN JABATAN FUNGSIONAL PENELITI
DAN ANGKA KREDITNYA</h1>
<?php echo $this->renderPartial('pegawai', array('pegawai'=>$kenaikanJabatan->pegawai)); ?>
<br/><br/>
<table>
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Judul Karya Ilmiah</th>
            <th rowspan="2">
                Unsur<br/>
                yang<br/>
                Dinilai
            </th>
            <th colspan="2">
                Angka Kredit<br/>
                Menurut Penilaian
            </th>
            <th rowspan="2">Keterangan</th>
            <th rowspan="2">Action</th>
        </tr>
        <tr>
            <th>P2JP<br/>Instansi</th>
            <th>P2JP<br/>LIPI</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($items as $i => $it):?>
        <tr>
            <td><?php echo $i + 1?></td>
            <td><?php echo $it->judul ?></td>
            <td><?php echo $it->unsur ?></td>
            <td><?php echo $it->p2jp_instansi ?></td>
            <td><?php echo $it->p2jp_lipi ?></td>
            <td><?php echo $it->keterangan ?></td>
            <td>
                <?php echo Chtml::link('delete', array('delete','id' => $i))?>
            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'kti-item-form','action'=>'stepTwo')); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($item); ?>

    <div class="row">
        <?php echo $form->labelEx($item,'judul'); ?>
        <?php echo $form->textArea($item,'judul',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($item,'judul'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($item,'unsur'); ?>
        <?php echo $form->textField($item,'unsur'); ?>
        <?php echo $form->error($item,'unsur'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($item,'p2jp_instansi'); ?>
        <?php echo $form->textField($item,'p2jp_instansi'); ?>
        <?php echo $form->error($item,'p2jp_instansi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($item,'p2jp_lipi'); ?>
        <?php echo $form->textField($item,'p2jp_lipi'); ?>
        <?php echo $form->error($item,'p2jp_lipi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($item,'keterangan'); ?>
        <?php echo $form->textArea($item,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($item,'keterangan'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Add'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->



<?php echo Chtml::link('<button>Back</button>',array('kenaikanJabatan/create')) ?>
<?php echo Chtml::link('<button>Next</button>',array('dupak/create')) ?>
