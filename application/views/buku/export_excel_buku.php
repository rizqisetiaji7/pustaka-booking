<?php 
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$namafile");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
	<h3><center>Laporan Data Buku Perpustakaan Online</center></h3>
	<br/>
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Tahun Terbit</th>
				<th>ISBN</th>
				<th>Stok</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($buku as $b) { ?>
			<tr>
				<th scope="row"><?= $no++ ?></th>
				<td><?= $b['judul_buku'] ?></td>
				<td><?= $b['pengarang'] ?></td>
				<td><?= $b['penerbit'] ?></td>
				<td><?= $b['tahun_terbit'] ?></td>
				<td><?= $b['isbn'] ?></td>
				<td><?= $b['stok'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
