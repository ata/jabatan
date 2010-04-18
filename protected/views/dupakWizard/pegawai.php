<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$pegawai,
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
