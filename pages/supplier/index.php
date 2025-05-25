<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Supplier</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sistem Informasi</a></li>
                        <li class="breadcrumb-item active">Supplier</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Supplier</h4>
                    <button id="tambah" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal">
                        Tambah Supplier
                    </button>
                </div>
                <div class="card-body">
                    <div id="content"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function loadTable() {
        $('#content').load('pages/supplier/tabel-supplier.php');
    }
    $(document).ready(function () {
        loadTable();
        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Supplier');
            $('.modal-body').load('pages/supplier/tambah-supplier.php');
        });


    });

</script>