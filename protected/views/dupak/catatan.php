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




