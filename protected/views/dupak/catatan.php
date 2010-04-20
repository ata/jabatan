<h3>LAMPIRAN PENDUKUNG DUPAK </h3>
<ol>
    <?php foreach($listLampiran as $lampiran):?>
    <li><?php echo $lampiran->deskripsi?></li>
    <?php endforeach?>
</ol>
<?php $form = $this->beginWidget('CActiveForm')?>
Ka. Subbag Kepegawaian:  
<?php echo $form->dropDownList($dupak,'subbag_id',CHtml::listData(Pegawai::model()->findAll(),'id','nama')); ?>
<?php $this->endWidget() ?>

<br/><br/>
<hr/>
<h3>Catatan Pejabat Pengusul</h3>

<ol>
    <?php foreach($listCatatanPengusul as $i => $catatan):?>
    <li><?php echo $catatan->deskripsi?> <?php echo CHtml::link('delete',array('deleteCatatan','type'=>'cp','index' => $i))?></li>
    <?php endforeach?>
    <li>
        <?php $form = $this->beginWidget('CActiveForm')?>
            <?php echo $form->textField($catatanPengusul,'deskripsi'); ?>
            <?php echo CHtml::submitButton('add')?>
        <?php $this->endWidget() ?>
    </li>
</ol>
<?php $form = $this->beginWidget('CActiveForm')?>
Kepala Pusat Penelitan Informatika LIPI:  
<?php echo $form->dropDownList($dupak,'pengusul_id',CHtml::listData(Pegawai::model()->findAll(),'id','nama')); ?>
<?php $this->endWidget() ?>






<br/><br/>
<hr/>
<h3>Catatan Tim Penilai</h3>

<ol>
    <?php foreach($listCatatanTimPenilai as $i => $catatan):?>
    <li><?php echo $catatan->deskripsi?> <?php echo CHtml::link('delete',array('deleteCatatan','type'=>'ctp','index' => $i))?></li>
    <?php endforeach?>
    <li>
        <?php $form = $this->beginWidget('CActiveForm')?>
            <?php echo $form->textField($catatanTimPenilai,'deskripsi'); ?>
            <?php echo CHtml::submitButton('add')?>
        <?php $this->endWidget() ?>
    </li>
</ol>
<?php $form = $this->beginWidget('CActiveForm')?>
Kepala Pusat Penelitan Informatika LIPI:  
<?php echo $form->dropDownList($dupak,'pengusul_id',CHtml::listData(Pegawai::model()->findAll(),'id','nama')); ?>
<?php $this->endWidget() ?>






<br/><br/>
<hr/>
<h3>Catatan Ketua Tim Penilai</h3>

<ol>
    <?php foreach($listCatatanKetuaPenilai as $i => $catatan):?>
    <li><?php echo $catatan->deskripsi?> <?php echo CHtml::link('delete',array('deleteCatatan','type'=>'ckp','index' => $i))?></li>
    <?php endforeach?>
    <li>
        <?php $form = $this->beginWidget('CActiveForm')?>
            <?php echo $form->textField($catatanKetuaPenilai,'deskripsi'); ?>
            <?php echo CHtml::submitButton('add')?>
        <?php $this->endWidget() ?>
    </li>
</ol>
<?php $form = $this->beginWidget('CActiveForm')?>
Kepala Pusat Penelitan Informatika LIPI:  
<?php echo $form->dropDownList($dupak,'pengusul_id',CHtml::listData(Pegawai::model()->findAll(),'id','nama')); ?>
<?php $this->endWidget() ?>





