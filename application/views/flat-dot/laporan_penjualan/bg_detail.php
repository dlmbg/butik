<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			Laporan Daftar Penjualan</h2>
		</div>
		<div class="box-content">
			<a href="<?php echo base_url(); ?>dashboard/laporan_penjualan/cetak_excel/<?php echo $param; ?>" class="btn btn-danger">Cetak Excel</a>
			<a href="<?php echo base_url(); ?>dashboard/laporan_penjualan/cetak_pdf/<?php echo $param; ?>" class="btn btn-danger">Cetak PDF</a>
			<?php echo $dt_retrieve; ?>
			<?php echo $dt_retrieve_detail; ?>
		</div>
	</div>

</div>
</div>
</div>