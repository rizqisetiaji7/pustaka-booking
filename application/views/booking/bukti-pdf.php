<!DOCTYPE html>
<html><head>
    <title><?= $judul ?></title>
</head><body>
    <table style="border-collapse: collapse; width: 100%;" border="1" cellpadding="15">
        <tr>
            <th colspan="5">Nama Anggota : <?= $useraktif[0]->nama ?></th>
        </tr>
        <tr>
            <th colspan="5" align="left">Buku yang dibooking:</th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
        </tr>
        
        <?php $no=1; foreach($items as $it) { ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$it['judul_buku']?></td>
            <td><?=$it['pengarang']?></td>
            <td><?=$it['penerbit']?></td>
            <td><?=$it['tahun_terbit']?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="5" align="center"><?= substr(md5(date('d M Y H:i:s')), 0, 10); ?></td>
        </tr>
    </table>
    
</body></html>