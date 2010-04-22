<?php $form = $this->beginWidget('CActiveForm')?>
<h3>LAMPIRAN PENDUKUNG DUPAK </h3>
<ol>
    <?php foreach($listLampiran as $lampiran):?>
        <li><?php echo $lampiran->deskripsi?></li>
    <?php endforeach?>
</ol>

Ka. Subbag Kepegawaian:  
<?php echo $form->dropDownList($dupak,'subbag_id',CHtml::listData(Pegawai::model()->findAll(),'id','nama')); ?>
<br/>
<br/>


<hr/>
<h3>Catatan Pejabat Pengusul</h3>

<ol>
    <?php foreach($listCatatanPengusul as $i => $catatan):?>
        <li><?php echo $form->textField($catatan,"[$i]deskripsi",array('value' => $catatan->deskripsi));?></li>
    <?php endforeach?>
</ol>

Kepala Pusat Penelitan Informatika LIPI:  
<?php echo $form->dropDownList($dupak,'pengusul_id',CHtml::listData(Pegawai::model()->findAll(),'id','nama')); ?>


<br/><br/>
<hr/>
<h3>Catatan Tim Penilai</h3>

<ol>
    <?php foreach($listCatatanTimPenilai as $i => $catatan):?>
        <li><?php echo $form->textField($catatan,"[$i]deskripsi",array('value' => $catatan->deskripsi));?></li>
    <?php endforeach?>
</ol>
Tim Penilai:  
<ol>
    <?php foreach($timPenilai as $i => $penilai):?>
        <?php if($i === 'ketua') continue; ?>
        <li>
            Nama: <?php echo $form->textField($penilai,"[$i]nama",array('value'=>$penilai->nama));?><br/>
            NIP: <?php echo $form->textField($penilai,"[$i]nip",array('value'=>$penilai->nip));?><br/>
        </li>
    <?php endforeach?>
</ol>






<br/><br/>
<hr/>
<h3>Catatan Ketua Tim Penilai</h3>

<ol>
    <?php foreach($listCatatanKetuaPenilai as $i => $catatan):?>
        <li><?php echo $form->textField($catatan,"[$i]deskripsi",array('value' => $catatan->deskripsi));?></li>
    <?php endforeach?>
</ol>
Ketua Tim Penilai:  

Nama: <?php echo $form->textField($ketuaPenilai,"[ketua]nama",array('value'=>$ketuaPenilai->nama));?><br/>
NIP: <?php echo $form->textField($ketuaPenilai,"[ketua]nip",array('value'=>$ketuaPenilai->nip));?><br/>

<hr/>

<?php echo Chtml::link('<button>Back</button>',array('nilai/create')) ?>  
<?php echo CHtml::submitButton('Finish'); ?>

<?php $this->endWidget() ?>





