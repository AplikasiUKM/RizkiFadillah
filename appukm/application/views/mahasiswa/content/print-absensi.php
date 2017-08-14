<?php  
$npm = $mahasiswa->mahasiswa_npm;					   
$query = $this->db->query("SELECT 
						pengajuan.pengajuan_id AS pengajuan_id,
						pengajuan.pengajuan_judul AS pengajuan_judul,
						pengajuan.mahasiswa_npm AS mahasiswa_npm,
						pengajuan.dosen_nip AS dosen_nip,
						pengajuan.katpengajuan_id AS katpengajuan_id,
						mahasiswa.mahasiswa_nama AS mahasiswa_nama,
						mahasiswa.mahasiswa_foto AS mahasiswa_foto,
						dosen.dosen_nama AS dosen_nama,
						katpengajuan.katpengajuan_nama AS katpengajuan_nama
						FROM pengajuan
						LEFT JOIN mahasiswa ON mahasiswa.mahasiswa_npm = pengajuan.mahasiswa_npm
						LEFT JOIN dosen ON dosen.dosen_nip = pengajuan.dosen_nip
						LEFT JOIN katpengajuan ON katpengajuan.katpengajuan_id = pengajuan.katpengajuan_id WHERE pengajuan.mahasiswa_npm ='$npm' ORDER BY pengajuan_post DESC LIMIT 1");
 foreach ($query->result() as $row){ 
?>
<body onload="javascript:window.print()">
<style type="text/css">
body {
	font-family:Times New Roman;
}
	.table {
		width: 100%;
		border-collapse: collapse;
		border:1px solid #000;
	}
	.table tr {
		border:1px solid #000;
	}

	.table tr td{
		height: 50px;
		border:1px solid #000;
	}
</style>
<img src="<?php echo base_url();?>templates/mahasiswa/images/poltek.png">
<h2 align="center">FORMULIR BIMBINGAN <br><?php echo strtoupper($row->katpengajuan_nama); ?></h2><br>
<table width="1096">
  <tr>
    <td colspan="2">Nama Mahasiswa</td>
    <td width="13">:</td>
    <td width="514"><?php echo $row->mahasiswa_nama; ?></td>
    <td width="394" rowspan="6" align="right"><img src="<?php echo base_url();?>assets/images/mahasiswa/<?php echo $row->mahasiswa_foto; ?>" width="170px" height="190px"></td>
  </tr>
  <tr>
    <td colspan="2">NPM</td>
    <td width="13">:</td>
    <td><?php echo $row->mahasiswa_npm; ?></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="3">Judul Karya Ilmiah</td>
    <td rowspan="3"><p>:</p>
    <td width="514"><p><?php echo $row->pengajuan_judul; ?></p>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
    <td colspan="2">Nama Pembimbing</td>
    <td>:</td>
    <td width="514"><?php echo $row->dosen_nama; ?></td>
  </tr>
  </table><br />
  <table class="table">
  <tr>
    <td width="49" align="center"><strong>NO</strong></td>
    <td width="112" align="center"><strong>TANGGAL</strong></td>
    <td width="345" align="center"><strong>URAIAN BIMBINGAN</strong></td>
    <td width="106" align="center"><strong>PARAF</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table><br />
<table>
	<tr>
		<td width="50%">Keterangan :</td>
		<td align="center">Bandung, ............................... <?php echo date('Y'); ?></td>
	</tr>
	<tr>
		<td width="50%">
				<ol>
			    <li>Formulir kegiatan Proyek I harus selalu dibawa pada saat bimbingan berlangsung.</li>
			    <li>Formulir kegiatan Proyek I  tidak boleh hilang, kotor dan tidak boleh rusak.</li>
			    <li>Formulir kegiatan Proyek I  dikumpulkan kembali pada saat pengajuan sidang Proyek I.</li>
			 </ol></td>
		<td align="center" colspan="2">Pembimbing,<br><br><br><br><br><br><b><u><?php echo $row->dosen_nama; ?></u><br><?php echo $row->dosen_nip; ?></td>
	</tr>
</table>
</body>
<?php } ?>