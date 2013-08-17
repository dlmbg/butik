<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Single Window</title>
	<title><?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?></title>
	<meta name="description" content="ACME Dashboard Bootstrap Admin Template." />
	<meta name="author" content="Łukasz Holeczek" />
	<meta name="keyword" content="ACME, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link id="bootstrap-style" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap-responsive.css" rel="stylesheet" />
	<link id="base-style" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/style.css" rel="stylesheet" />
	<link id="base-style-responsive" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" />
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/bootstrap.js"></script>
	<link type="text/css" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
	<script type="text/javascript">
		$(function(){
			$('#tgl_pesan').datepicker({ dateFormat: 'dd MM yy' });
			$('#tgl_selesai').datepicker({ dateFormat: 'dd MM yy' });
		});
	</script>
	<link id="base-style-responsive" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" />
</head>
<body>
	<div class="container-fluid">
	<div class="well">
	<h1>Masukkan Data Barang</h1>
		<div id="body">
		<?php $atr = array('name' => 'frm', 'id' => 'frm'); echo form_open('dashboard/pembelian/tambah_item',$atr); ?>
			<table width="100%" cellpadding="3" cellspacing="0">
				<tr><td width="130">Nama Barang</td><td>:</td><td>
				<select data-placeholder="Cari nama barang..." class="chzn-select" style="width:400px;" tabindex="2" name="kd_barang" id="kd_barang">
					<?php
						foreach($barang->result_array() as $db)
						{
					?>
						<option value="<?php echo $db['kd_barang']; ?>"><?php echo $db['kd_barang'].' - '.$db['nm_barang']; ?></option>
					<?php
						}
					?>
				</select>
				</td></tr>
				<tr><td width="130">Harga Beli</td><td>:</td><td>
				<input type="text" name="harga_beli">
				</td></tr>
				</td></tr>
				<tr><td width="130">Jumlah</td><td>:</td><td>
				<input type="text" name="qty">
				</td></tr>
			</table>
			<input type="submit" class="btn btn-small" value="Tambahkan" name="add" id="add">
			<div class="cleaner_h20"></div>
		<?php echo form_close(); ?>
		</div>
	</div>
	</div>
</body>
</html>