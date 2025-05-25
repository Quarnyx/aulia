<?php
include "../../layouts/config.php";
$sql = "SELECT * FROM supplier WHERE id_supplier = '$_POST[id]'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_supplier'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-12">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                    placeholder="Nama Supplier" value="<?= $row['nama_supplier'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat"
                    required><?= $row['alamat'] ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon"
                    value="<?= $row['telepon'] ?>" required>
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
            type: "POST",
            url: "pages/supplier/proses-supplier.php?aksi=edit-supplier",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Supplier berhasil diupdate');
                } else {
                    alertify.error('Supplier gagal diupdate');
                }
            }
        });
    });
</script>