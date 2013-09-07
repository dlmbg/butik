<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/supplier/tambah">Tambah supplier</a><span class="break"></span>
			Data supplier</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/supplier/simpan",'class="form-horizontal"'); ?>
			  <fieldset>
			  
				<div class="control-group">
				  <label class="control-label">Nama supplier</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $nm_supplier; ?>" name="nm_supplier" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Alamat</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $alamat; ?>" name="alamat" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Telpon</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $telpon; ?>" name="telpon" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Email</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $email; ?>" name="email" required />
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save changes</button>
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