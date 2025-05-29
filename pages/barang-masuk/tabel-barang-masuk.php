<table id="table-data" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Tanggal Masuk</th>
            <th>Supplier</th>
            <th>Harga Beli</th>
            <th>Keterangan</th>
            <th>PIC</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../layouts/config.php';
        $no = 1;
        $sql = "SELECT * FROM view_stok_masuk";
        $result = $link->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['kode_barang'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= $row['satuan'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nama_supplier'] ?></td>
                <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td>
                    <button id="edit" data-nama="<?= $row['nama_barang'] ?>" data-id="<?= $row['id_masuk'] ?>"
                        class="btn btn-primary btn-sm">Edit</button>
                    <button id="delete" data-nama="<?= $row['nama_barang'] ?>" data-id="<?= $row['id_masuk'] ?>"
                        class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#table-data').DataTable();
        $('#table-data').on('click', '#edit', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            $.ajax({
                type: 'POST',
                url: 'pages/barang-masuk/edit-barang-masuk.php',
                data: 'id=' + id + '&nama=' + nama,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Data ' + nama);
                    $('.modal .modal-body').html(data);
                }
            })
        });
        $('#table-data').on('click', '#delete', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ' + nama + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'pages/barang-masuk/proses-barang-masuk.php?aksi=hapus-barang-masuk',
                    data: 'id=' + id,
                    success: function (data) {
                        if (data == "ok") {
                            loadTable();
                            $('.modal').modal('hide');
                            alertify.success('Barang Berhasil Dihapus');
                        } else {
                            alertify.error('Barang Gagal Dihapus');
                        }
                    },
                    error: function (data) {
                        alertify.error(data);
                    }
                })
            }, function () {
                alertify.error('Hapus dibatalkan');
            })
        });
    });
</script>