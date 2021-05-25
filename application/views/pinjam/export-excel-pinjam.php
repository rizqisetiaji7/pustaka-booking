<?php 
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$namafile");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
	<h3 style="text-align: center;">LAPORAN DATA PEMINJAMAN BUKU</h3>
	<br/>
	<table border="1" class="table-data">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Anggota</th>
				<th>Judul Buku</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th>Tanggal Pengembalian</th>
				<th>Total Denda</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($laporan as $l) { ?>
			<tr>
				<th scope="row"><?= $no++ ?></th>
				<td><?= $l['nama'] ?></td>
				<td><?= $l['judul_buku'] ?></td>
				<td><?= $l['tgl_pinjam'] ?></td>
				<td><?= $l['tgl_kembali'] ?></td>
				<td><?= $l['tgl_pengembalian'] ?></td>
				<td><?= $l['total_denda'] ?></td>
				<td><?= $l['status'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
