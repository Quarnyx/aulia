<?php
require_once '../../layouts/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-barang-masuk':
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $id_supplier = $_POST['id_supplier'];
        $harga_beli = preg_replace('/[^0-9]/', '', $_POST['harga_beli']);
        $harga_beli = substr($harga_beli, 0, -2);
        $id_pengguna = $_POST['id_pengguna'];


        $sql = "INSERT INTO stok_masuk (id_barang, jumlah, tanggal, keterangan, id_supplier, harga_beli, id_pengguna)
                VALUES ('$id_barang', '$jumlah', '$tanggal', '$keterangan', '$id_supplier', '$harga_beli', '$id_pengguna')";
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
    case 'hapus-barang-masuk':
        $id = $_POST['id'];
        $sql = "DELETE FROM stok_masuk WHERE id_masuk = '$id'";
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
    case 'update-barang-masuk':
        $id = $_POST['id'];
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $id_supplier = $_POST['id_supplier'];
        $harga_beli = preg_replace('/[^0-9]/', '', $_POST['harga_beli']);
        $harga_beli = substr($harga_beli, 0, -2);
        $id_pengguna = $_POST['id_pengguna'];

        $sql = "UPDATE stok_masuk SET 
                id_barang = '$id_barang',
                jumlah = '$jumlah',
                tanggal = '$tanggal',
                keterangan = '$keterangan',
                id_supplier = '$id_supplier',
                harga_beli = '$harga_beli',
                id_pengguna = '$id_pengguna'
                WHERE id_masuk = '$id'";
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