<form id="tambah-barang" enctype="multipart/form-data">
    <?php session_start(); ?>
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <label for="id_barang" class="form-label">Nama Barang</label>
                <select class="form-select" name="id_barang" id="id_barang" data-trigger="">
                    <option value="">Pilih Barang</option>
                    <?php
                    include "../../layouts/config.php";
                    $sql = "SELECT * FROM barang";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['id_barang'] ?>" data-hargabeli="<?= $row['harga_beli'] ?>">
                                <?= $row['nama_barang'] ?>
                            </option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="id_supplier" class="form-label">Supplier</label>
                <select class="form-select" name="id_supplier" id="id_supplier" data-trigger="">
                    <?php
                    $sql = "SELECT * FROM supplier";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['id_supplier'] ?>"><?= $row['nama_supplier'] ?></option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli">
            </div>
            <div class="col-md-6">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="total" class="form-label">Total</label>
                <input type="text" class="form-control" name="total" id="total" placeholder="Total">
            </div>
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $(document).ready(function () {
        new Selectr('.form-select');
        $('#id_barang').on('change', function () {
            const id = $(this).val();
            const hargabeli = $(this).find(':selected').data('hargabeli');
            $('#harga_beli').val("Rp. " + hargabeli.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        });
        $('#jumlah').on('keyup', function () {
            const jumlah = $('#jumlah').val();
            const hargabeli = $('#harga_beli').val().replace(/[^\d]/g, '').slice(0, -2);
            const total = parseInt(jumlah) * parseInt(hargabeli);
            $('#total').val("Rp. " + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        });
    })
    $("#tambah-barang").submit(function (e) {
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "pages/barang-masuk/proses-barang-masuk.php?aksi=tambah-barang-masuk",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Transaksi Berhasil Ditambah');
                } else {
                    alertify.error('Transaksi Gagal Ditambah');
                }
            }
        });
    });
</script>