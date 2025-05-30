<div class="container-fluid">
    <?php
    require_once 'layouts/config.php';
    ?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aulia</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Pengguna</span>
                            <h4 class="mb-3">
                                <?php
                                $sql = "SELECT count(id_pengguna) AS total FROM pengguna";
                                $result = $link->query($sql);

                                ?>
                                <span class="counter-value"
                                    data-target="<?php echo $result->fetch_assoc()['total']; ?>"></span>
                            </h4>
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <span class="ms-1 text-muted font-size-13">Total Pengguna Terdaftar</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Barang</span>
                            <h4 class="mb-3">
                                <?php
                                $sql = "SELECT count(id_barang) AS total FROM barang";
                                $result = $link->query($sql);

                                ?>
                                <span class="counter-value"
                                    data-target="<?php echo $result->fetch_assoc()['total']; ?>">0</span>
                            </h4>
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <span class="ms-1 text-muted font-size-13">Total Barang Terdaftar</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Barang Masuk</span>
                            <h4 class="mb-3">
                                <?php
                                $sql = "SELECT sum(jumlah) AS total FROM stok_masuk";
                                $result = $link->query($sql);

                                ?>
                                <span class="counter-value"
                                    data-target="<?php echo $result->fetch_assoc()['total']; ?>">0</span>
                            </h4>
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <span class="ms-1 text-muted font-size-13">Total Barang Masuk Bulan Ini</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Barang Keluar</span>
                            <h4 class="mb-3">
                                <?php
                                $sql = "SELECT sum(jumlah) AS total FROM stok_keluar";
                                $result = $link->query($sql);

                                ?>
                                <span class="counter-value"
                                    data-target="<?php echo $result->fetch_assoc()['total']; ?>">0</span>
                            </h4>
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <span class="ms-1 text-muted font-size-13">Total Barang Keluar Bulan Ini</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row-->

    <div class="row">
        <div class="col-xl-8">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Grafik Transaksi Barang</h5>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <div>
                                <div id="transaksi-barang" data-colors='["#5156be", "#34c38f"]' class="apex-charts">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row-->

        <div class="col-xl-4">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Stok Barang Terkini</h5>
                    </div>
                    <div class="px-2 py-2">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Stok Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM view_stok_terkini ORDER BY id_barang DESC LIMIT 5";
                                $result = $link->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 fs-14"><?php echo $row['kode_barang']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 fs-14"><?php echo $row['nama_barang']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 fs-14"><?php echo $row['stok_tersedia']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row-->



</div>
<!-- container-fluid -->
<?php
$sqlstokmasuk = "SELECT
                YEAR(tanggal) AS year,
                MONTH(tanggal) AS month,
                SUM(jumlah) AS total_stok_masuk
            FROM
	            stok_masuk
                WHERE YEAR(tanggal) = YEAR(CURDATE())
            GROUP BY year, month";
$sqlstokkeluar = "SELECT
                YEAR(tanggal) AS year,
                MONTH(tanggal) AS month,
                SUM(jumlah) AS total_stok_keluar
            FROM
                stok_keluar
                WHERE YEAR(tanggal) = YEAR(CURDATE())
            GROUP BY year, month";

$hasilstokmasuk = $link->query($sqlstokmasuk);
$data_stok_masuk = [];

if ($hasilstokmasuk->num_rows > 0) {
    while ($row = $hasilstokmasuk->fetch_assoc()) {
        $data_stok_masuk[] = $row;
    }
}

$hasilstokkeluar = $link->query($sqlstokkeluar);
$datastokkeluar = [];

if ($hasilstokkeluar->num_rows > 0) {
    while ($row = $hasilstokkeluar->fetch_assoc()) {
        $datastokkeluar[] = $row;
    }
}

// Preparing data for ApexCharts
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$total_stok_masuks = array_fill(0, 12, 0);
$total_stok_keluars = array_fill(0, 12, 0);

// Map buys data to corresponding months
foreach ($datastokkeluar as $data) {
    $total_stok_keluars[$data['month'] - 1] = $data['total_stok_keluar'];
}
// Map sales data to corresponding months
foreach ($data_stok_masuk as $data) {
    $total_stok_masuks[$data['month'] - 1] = $data['total_stok_masuk'];
}

$link->close();
?>
<script>
    function getChartColorsArray(chartId) {
        var colors = $(chartId).attr('data-colors');
        var colors = JSON.parse(colors);
        return colors.map(function (value) {
            var newValue = value.replace(' ', '');
            if (newValue.indexOf('--') != -1) {
                var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                if (color) return color;
            } else {
                return newValue;
            }
        })
    }
    const masuk = <?php echo json_encode($total_stok_masuks); ?>;
    const keluar = <?php echo json_encode($total_stok_keluars); ?>;
    var barchartColors = getChartColorsArray("#transaksi-barang");
    var options = {
        series: [{
            name: 'Stok Masuk',
            data: masuk
        }, {
            name: 'Stok Keluar',
            data: keluar
        }],
        chart: {
            type: 'bar',
            height: 400,
            stacked: true,
            toolbar: {
                show: false
            },
        },
        plotOptions: {
            bar: {
                columnWidth: '20%',
            },
        },
        colors: barchartColors,
        fill: {
            opacity: 1
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        yaxis: {
            labels: {
                formatter: function (y) {
                    return y.toFixed(0) + "";
                }
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: {
                rotate: -90
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#transaksi-barang"), options);
    chart.render();
</script>