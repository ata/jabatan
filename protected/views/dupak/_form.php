<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'dupak-form',
    'enableAjaxValidation'=>false,
)); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php echo $form->errorSummary($dupak); ?>

    <div class="row">
        <?php echo $form->labelEx($dupak,'nomor'); ?>
        <?php echo $form->textField($dupak,'nomor',array('size'=>30,'maxlength'=>255)); ?>
        <?php echo $form->error($dupak,'nomor'); ?>
    </div>
    
    <div class="row">
        <label>Masa Penilaian</label>
        <?php echo $form->textField($dupak,'mp_mulai',array('size'=>12,'maxlength'=>10)); ?> s/d 
        <?php echo $form->textField($dupak,'mp_selesai',array('size'=>12,'maxlength'=>10)); ?>
        
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($dupak,'jenis_dupak_id'); ?>
        <?php echo $form->dropDownList($dupak,'jenis_dupak_id', CHtml::listData(JenisDupak::model()->findAll(),'id', 'nama')); ?>
        <?php echo $form->error($dupak,'jenis_dupak_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo Chtml::link('<button>Back</button>',array('ktiItem/create')) ?>
        <?php echo CHtml::submitButton('Next'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
