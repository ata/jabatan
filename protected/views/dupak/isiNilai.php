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
	'data'=>$dupak->kenaikanJabatan->pegawai,
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
<h1>Unsur Yang di nilai</h1>
<table>
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
	<?php foreach($unsurs as $i => $unsur):?>
		<tr>
			<td><?php echo $i+1?></td>
			<td colspan="8"><?php echo $unsur->nama ?></td>
		</tr>
		<?php foreach($unsur->subUnsurs as $j => $subUnsur):?>
			<tr>
				<td></td>
				<td><?php echo $j+1?></td>
				<td colspan="7"><?php echo $subUnsur->nama?></td>
			</tr>
			<?php foreach($subUnsur->kegiatans as $k => $kegiatan):?>
				<tr>
					<td colspan="2"></td>
					<td><?php echo $k+1?></td>
					<td colspan="6"><?php echo $kegiatan->nama?></td>
				</tr>
				<?php foreach($kegiatan->butirs as $l => $butir):?>
					<tr>
						<td colspan="3"></td>
						<td><?php echo $l+1?></td>
						<td colspan="5"><?php echo $butir->nama?></td>
					</tr>
				<?php endforeach?>
			<?php endforeach?>
		<?php endforeach?>
		
	<?php endforeach?>
</table>




