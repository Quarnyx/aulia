<div class="table-responsive">
    <table id="table-data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../../layouts/config.php";
            $no = 1;
            $sql = "SELECT * FROM supplier ORDER BY id_supplier DESC";
            $result = $link->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_supplier'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['telepon'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" id="edit" data-id="<?= $row['id_supplier'] ?>"
                            data-nama="<?= $row['nama_supplier'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" id="hapus" data-id="<?= $row['id_supplier'] ?>"
                            data-nama="<?= $row['nama_supplier'] ?>">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#table-data').DataTable();
        // Handle edit button click
        $('#table-data').on('click', '#edit', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            $.ajax({
                type: 'POST',
                url: 'pages/supplier/edit-supplier.php',
                data: 'id=' + id,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Supplier ' + nama);
                    $('.modal-body').html(data);
                }
            });
        });

        // Handle delete button click
        $('#table-data').on('click', '#hapus', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            alertify.confirm('Hapus Supplier', 'Apakah anda yakin ingin menghapus supplier ' + nama + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'pages/supplier/proses-supplier.php?aksi=hapus-supplier',
                    data: 'id=' + id,
                    success: function (data) {
                        if (data == "ok") {
                            loadTable();
                            alertify.success('Supplier berhasil dihapus');
                        } else {
                            alertify.error('Supplier gagal dihapus');
                        }
                    }
                });
            }, function () {
                alertify.error('Hapus supplier dibatalkan');
            });
        });
    });

</script>