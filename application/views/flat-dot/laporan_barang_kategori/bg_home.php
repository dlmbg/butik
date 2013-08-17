<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			Laporan Daftar Barang Per Kategori</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/laporan_barang_kategori/act",'class="form-horizontal" name="frm"'); ?>
			<div class="control-group">
				  <label class="control-label">Kategori</label>
				  <div class="controls">
						<select name="kd_kategori">
						<?php
							foreach($kategori->result_array() as $k)
							{
								if($this->session->userdata("cari")==$k['kd_kategori'])
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
						<input type="submit" value="Cari">
			  	</div>
			</div>
			<?php echo form_close(); ?>
			<?php if($this->session->userdata("cari")!=""){echo $dt_retrieve;} ?>
		</div>
	</div>

</div>
</div>
</div>