<?php
require_once '../../layouts/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-barang-keluar':
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $tujuan = $_POST['tujuan'];
        $id_pengguna = $_POST['id_pengguna'];


        $sql = "INSERT INTO stok_keluar (id_barang, jumlah, tanggal, keterangan, tujuan, id_pengguna)
                VALUES ('$id_barang', '$jumlah', '$tanggal', '$keterangan', '$tujuan', '$id_pengguna')";
        $result = $link->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $link->error;
            http_response_code(400);
        }
        break;
    case 'hapus-barang-keluar':
        $id = $_POST['id'];
        $sql = "DELETE FROM stok_keluar WHERE id_keluar = '$id'";
        $result = $link->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $link->error;
            http_response_code(400);
        }
        break;
    case 'update-barang-keluar':
        $id = $_POST['id'];
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $tujuan = $_POST['tujuan'];
        $id_pengguna = $_POST['id_pengguna'];

        $sql = "UPDATE stok_keluar SET 
                id_barang = '$id_barang',
                jumlah = '$jumlah',
                tanggal = '$tanggal',
                keterangan = '$keterangan',
                tujuan = '$tujuan',
                id_pengguna = '$id_pengguna'
                WHERE id_keluar = '$id'";
        $result = $link->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $link->error;
            http_response_code(400);
        }
        break;
}