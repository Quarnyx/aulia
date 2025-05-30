<?php
include "../../layouts/config.php";
$sql = "SELECT * FROM barang WHERE id_barang = '$_POST[id]'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_barang'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" name="kode_barang" id="kode_barang"
                        placeholder="Kode Barang" value="<?= $row['kode_barang'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                        placeholder="Nama Barang" value="<?= $row['nama_barang'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan"
                        value="<?= $row['satuan'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli"
                        value="<?= $row['harga_beli'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual"
                        value="<?= $row['harga_jual'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <label for="jenis_barang" class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang"
                    value="<?= $row['jenis_barang'] ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'pages/barang/proses-barang.php?aksi=edit-barang',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Edit Berhasil');
                } else {
                    alertify.error('Edit Gagal');
                }
            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>