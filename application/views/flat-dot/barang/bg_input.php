<script type="text/javascript">
	function cekHarga()
	{
		var beli = document.frm.harga_beli.value;
		var jual = document.frm.harga_jual.value;
		var diskon = document.frm.diskon.value;
		var jual_diskon = eval(jual-(jual*diskon/100));
		var hasil_diskon = eval(jual*diskon/100);

		if(jual_diskon<beli)
		{
			alert("Anda mengalami kerugian. Modal anda adalah "+beli+", harga jual "+jual+", diskon "+hasil_diskon+". Pendapatan anda setelah diskon adalah "+jual_diskon+" ");
			document.frm.btn.disabled =true;
		}
		else
		{
			document.frm.btn.disabled =false;
		}
	}
</script>
<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/barang/tambah">Tambah Barang</a><span class="break"></span>
			Data Barang</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/barang/simpan",'class="form-horizontal" name="frm"'); ?>
			  <fieldset>
			  
				<div class="control-group">
				  <label class="control-label">Nama Barang</label>
				  <div class="controls">
				  	<style>
					div.b128{
					    border-left: 1px black solid;
						height: 60px;
					}	
					</style>
				  	<?php
				  	if($st=="edit")
					echo bar128($id_param);
					?>
					<input type="text" class="input-xlarge" value="<?php echo $nm_barang; ?>" name="nm_barang" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Harga Beli</label>
				  <div class="controls">
					<input type="number" class="input-xlarge" value="<?php echo $harga_beli; ?>" name="harga_beli" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Harga Jual</label>
				  <div class="controls">
					<input type="number" class="input-xlarge" value="<?php echo $harga_jual; ?>" onchange="cekHarga();" name="harga_jual" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Diskon</label>
				  <div class="controls">
					<input type="number" class="input-xlarge" value="<?php echo $diskon; ?>" onchange="cekHarga();" name="diskon" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Stok</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $stok; ?>" name="stok" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Keterangan</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $keterangan; ?>" name="keterangan" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Kategori</label>
				  <div class="controls">
					<select name="kd_kategori">
					<?php
						foreach($kategori->result_array() as $k)
						{
							if($kd_kategori==$k['kd_kategori'])
							{
					?>
								<option value="<?php echo $k['kd_kategori']; ?>" selected="selected"><?php echo $k['nm_kategori']; ?></option>
					<?php
							}
							else
							{
					?>
								<option value="<?php echo $k['kd_kategori']; ?>"><?php echo $k['nm_kategori']; ?></option>
					<?php
							}
						}
					?>
				</select>
				  </div>
				</div>
				
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary" name="btn">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
			  <input type="hidden" name="st" value="<?php echo $st; ?>" />
			<?php echo form_close(); ?> 
		</div>
	</div>

</div>
</div>
</div>