<form id="tambah-barang" enctype="multipart/form-data">
    <?php session_start();
    include "../../layouts/config.php";

    $sql = "SELECT * FROM stok_keluar WHERE id_keluar = '$_POST[id]'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $rowa = $result->fetch_assoc();
    }
    ?>
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
    <input type="hidden" name="id" value="<?= $rowa['id_keluar'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <label for="id_barang" class="form-label">Nama Barang</label>
                <select class="form-select" name="id_barang" id="id_barang" data-trigger="">
                    <option value="">Pilih Barang</option>
                    <?php
                    $sql = "SELECT * FROM barang";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['id_barang'] ?>" <?php if ($row['id_barang'] == $rowa['id_barang'])
                                  echo "selected"; ?>>
                                <?= $row['nama_barang'] ?>
                            </option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal"
                    value="<?= $rowa['tanggal'] ?>">

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan"
                    value="<?= $rowa['tujuan'] ?>">
            </div>
            <div class="col-md-6">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah"
                    value="<?= $rowa['jumlah'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"
                    placeholder="Keterangan"><?php echo $rowa['keterangan'] ?></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $(document).ready(function () {
        new Selectr('.form-select');
    })
    $("#tambah-barang").submit(function (e) {
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "pages/barang-keluar/proses-barang-keluar.php?aksi=update-barang-keluar",
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