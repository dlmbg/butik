<div id="sidebar-left" class="span1">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="<?php echo $mark_dashboard; ?>"><a href="<?php echo base_url(); ?>"><i class="fa-icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	

			<?php if($this->session->userdata("level")=="admin"){?>
			<li class="<?php echo $mark_pengguna; ?>"><a href="<?php echo base_url(); ?>dashboard/pengguna"><i class="fa-icon-tasks"></i><span class="hidden-tablet"> Data Pengguna</span></a></li>
			<?php } ?>

			<li class="<?php echo $mark_kategori; ?>"><a href="<?php echo base_url(); ?>dashboard/kategori"><i class="fa-icon-hdd"></i><span class="hidden-tablet"> Data Kategori</span></a></li>

			<li class="<?php echo $mark_barang; ?>"><a href="<?php echo base_url(); ?>dashboard/barang"><i class="fa-icon-list-alt"></i><span class="hidden-tablet"> Data Barang</span></a></li>

			<li class="<?php echo $mark_supplier; ?>"><a href="<?php echo base_url(); ?>dashboard/supplier"><i class="fa-icon-leaf"></i><span class="hidden-tablet"> Data Suplier</span></a></li>

			<li class="<?php echo $mark_pembelian; ?>"><a href="<?php echo base_url(); ?>dashboard/pembelian"><i class="fa-icon-align-justify"></i><span class="hidden-tablet"> Pembelian Barang</span></a></li>

			<li class="<?php echo $mark_penjualan; ?>"><a href="<?php echo base_url(); ?>dashboard/penjualan"><i class="fa-icon-calendar"></i><span class="hidden-tablet"> Penjualan Barang</span></a></li>
		</ul>
	</div>
</div>