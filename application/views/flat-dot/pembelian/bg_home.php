
	<script type="text/javascript">
		$(function(){
			$('#tgl').datepicker({ dateFormat: 'yy-mm-dd' });
		});
	</script>
<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			Pembelian Barang</h2>
		</div>
		<div class="box-content">
			<?php 
			print($this->session->flashdata("salah"));
			$atr = array('name' => 'frm', 'id' => 'frm'); 
			echo form_open('dashboard/pembelian/tambah_item',$atr); ?>
			<table width="100%" cellpadding="3" cellspacing="0">
				<tr><td width="130">Kode Barang</td><td>:</td><td>
				<input type="text" name="kd_barang" required>
				</td></tr>
				<tr><td width="130">Jumlah</td><td>:</td><td>
				<input type="number" name="qty" required>
				</td></tr>
			</table>
			<input type="submit" class="btn btn-small" value="Tambahkan" name="add" id="add">
			<div class="cleaner_h20"></div>
		<?php echo form_close(); ?>
			<?php echo $dt_retrieve; ?>
			<?php echo form_open("dashboard/pembelian/simpan"); ?>
			<table width="100%" cellspacing="0" cellpadding="10" class="table-common" style="margin-top:0px;">
				<tr>
				  <td width="20%"><b>No Pembelian </b></td>
				  <td width="1%"><b>:</b></td>
				  <td width="79%"><input name="txtNomor" value="<?php echo $nomorTransaksi; ?>" size="9" maxlength="9" readonly="readonly"/></td></tr>
				<tr>
			      <td><b>Tanggal Pembelian </b></td>
				  <td><b>:</b></td>
				  <td><input type="text" id="tgl" name="tgl_transaksi" required></td>
			    </tr>
				<tr>
			      <td><b>Supplier Barang </b></td>
				  <td><b>:</b></td>
				  <td>
				  	<select name="kd_supplier" required>
					<?php
						foreach($supplier->result_array() as $k)
						{
							?>
								<option value="<?php echo $k['kd_supplier']; ?>"><?php echo $k['nm_supplier']; ?></option>	
							<?php
						}
					?>
					</select>
				  </td>
			    </tr>
				<tr>
			      <td><b>Catatan</b></td>
				  <td><b>:</b></td>
				  <td><input name="catatan" value="" size="30" maxlength="100" /></td>
			    </tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td><input name="btnSave" type="submit" class="btn btn-danger" <?php if($cek==0){echo "disabled";} ?> value=" SIMPAN TRANSAKSI " /></td>
			    </tr>
			</table>
			<?php echo form_close(); ?>
		</div>
	</div>

</div>
</div>
</div>