<?php
$this->breadcrumbs=array(
	'Ktis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kti', 'url'=>array('index')),
	array('label'=>'Manage Kti', 'url'=>array('admin')),
);
?>

<h1>Create Kti</h1>
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

<?php echo Chtml::link('<button>Back</button>',array('kenaikanJabatan/create')) ?>
<?php echo Chtml::link('<button>Next</button>',array('dupak/create')) ?>


<br/>
<br/>
<br/>
<h1>Add Karya Ilmiah</h1>

<?php echo $this->renderPartial('_form', array('item'=>$item)); ?>

