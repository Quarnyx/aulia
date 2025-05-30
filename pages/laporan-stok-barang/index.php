<div class="row d-print-none">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Filter Tanggal</h5>
            </div><!-- end card header -->
            <?php
            function tanggal($tanggal)
            {
                $bulan = array(
                    1 => 'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
                $split = explode('-', $tanggal);
                return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
            }
            $daritanggal = "";
            $sampaitanggal = "";

            if (isset($_GET['dari_tanggal']) && isset($_GET['sampai_tanggal'])) {
                $daritanggal = $_GET['dari_tanggal'];
                $sampaitanggal = $_GET['sampai_tanggal'];
            }

            ?>
            <div class="card-body">
                <form action="" method="get" class="row g-3">
                    <input type="hidden" name="page" value="laporan-stok-barang">
                    <div class="col-md-6">
                        <label for="validationDefault01" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault01" required=""
                            name="dari_tanggal">
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault02" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault02" required=""
                            name="sampai_tanggal">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Pilih</button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
<!-- end row-->
<?php if (isset($_GET['dari_tanggal']) && isset($_GET['sampai_tanggal'])) { ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="text-center mt-3 mb-3"><b>TOKO AULIA</b><br><b>LAPORAN STOK BARANG</b><br>Periode <?php
                if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"])) {
                    echo tanggal($_GET['dari_tanggal']) . " s.d " . tanggal($_GET['sampai_tanggal']);
                } else {
                    echo "Semua";
                }
                ?></h4>
                <div class="card-body">


                    <table id="tabel-data" class="table table-bordered table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Stok Awal</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                                <th>Stok Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'layouts/config.php';
                            $sampaitanggal_plus = date('Y-m-d', strtotime($sampaitanggal . ' +1 day'));
                            $sql = "SELECT 
                                        b.kode_barang,
                                        b.nama_barang,

                                        -- Stok awal
                                        IFNULL((
                                            SELECT SUM(jumlah) FROM stok_masuk 
                                            WHERE id_barang = b.id_barang AND tanggal < '$daritanggal'
                                        ), 0)
                                        -
                                        IFNULL((
                                            SELECT SUM(jumlah) FROM stok_keluar 
                                            WHERE id_barang = b.id_barang AND tanggal < '$daritanggal'
                                        ), 0) AS stok_awal,

                                        -- Barang masuk periode
                                        IFNULL((
                                            SELECT SUM(jumlah) FROM stok_masuk 
                                            WHERE id_barang = b.id_barang AND tanggal BETWEEN '$daritanggal' AND '$sampaitanggal'
                                        ), 0) AS barang_masuk,

                                        -- Barang keluar periode
                                        IFNULL((
                                            SELECT SUM(jumlah) FROM stok_keluar 
                                            WHERE id_barang = b.id_barang AND tanggal BETWEEN '$daritanggal' AND '$sampaitanggal'
                                        ), 0) AS barang_keluar,

                                        -- Stok akhir
                                        (
                                            IFNULL((
                                                SELECT SUM(jumlah) FROM stok_masuk 
                                                WHERE id_barang = b.id_barang AND tanggal < '$sampaitanggal_plus'
                                            ), 0)
                                            -
                                            IFNULL((
                                                SELECT SUM(jumlah) FROM stok_keluar 
                                                WHERE id_barang = b.id_barang AND tanggal < '$sampaitanggal_plus'
                                            ), 0)
                                        ) AS stok_akhir

                                    FROM barang b
                                    ORDER BY b.nama_barang ASC";
                            $result = $link->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $row['kode_barang'] ?></td>
                                    <td><?= $row['nama_barang'] ?></td>
                                    <td><?= $row['stok_awal'] ?></td>
                                    <td><?= $row['barang_masuk'] ?></td>
                                    <td><?= $row['barang_keluar'] ?></td>
                                    <td><?= $row['stok_akhir'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="mt-3" style="text-align:end;">
                        <hr>
                        <p class="font-weight-bold">Weleri, <?= tanggal(date('Y-m-d')) ?><br>Pencetak,</p>
                        <div class="mt-5">
                            <p class="font-weight-bold"><?php echo $_SESSION['nama']; ?></p>
                        </div>
                    </div>
                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                    class="mdi mdi-printer me-1"></i> Print</a>
                        </div>
                    </div>
                </div> <!-- end card body-->

            </div> <!-- end card -->

        </div><!-- end col-->
    </div>
    <!-- end row-->
<?php }
?>

<script>
</script>