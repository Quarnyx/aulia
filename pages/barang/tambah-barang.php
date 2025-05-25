<form id="tambah-barang" enctype="multipart/form-data">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang">
            </div>
            <div class="col-md-6">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan">
            </div>
            <div class="col-md-6">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $("#tambah-barang").submit(function (e) {
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "pages/barang/proses-barang.php?aksi=tambah-barang",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Barang Berhasil Ditambah');
                } else {
                    alertify.error('Barang Gagal Ditambah');
                }
            }
        });
    });
</script>