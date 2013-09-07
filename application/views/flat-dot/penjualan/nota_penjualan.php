<html>
<head>
<title> :: Nota Penjualan - Butik Indah Way jepara</title>
<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/nota.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="500" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td width="59" rowspan="2" align="center"><img src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/img/logo_ib.png" width="104" height="86" /></td>
    <td width="208"><strong>
      <h3> BUTIK INDAH</h3>
    </strong></td>
    <td width="217"><strong>Way Jepara,</strong> <?php echo $tgl_transaksi; ?></td>
  </tr>
  <tr>
    <td>Jl. Suhada, No 31, Labuhan Ratu Baru, Way Jepara, Lampung Timur <br> Telpon : 07241111111 </td>
    <td valign="top"><strong>Kepada Yth.</strong> <?php echo $pelanggan; ?> .. ..... ... .. ... ... .... . .... ... ... .. .... ..... ....... ....... .... ... ... ... ... .... .... ....</td>
  </tr>
</table>
<?php echo $detail; ?>
<br/>
<table class="table-print" width="500" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="140" align="center">Tanda terima,<br /><br /><br /> 
    ( ............................ ) </td>
    <td width="204">&nbsp;</td>
    <td width="140" align="center">Hoarmat kami,<br /><br /><br /> 
	(  <?php echo $this->session->userdata("nama_user_login"); ?> ) </td>
  </tr>
</table>
</body>
