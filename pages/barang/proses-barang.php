<?php
require_once '../../layouts/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-barang':
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $satuan = $_POST['satuan'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];
        $jenis_barang = $_POST['jenis_barang'];

        $sql = "INSERT INTO barang (kode_barang, nama_barang, satuan, harga_beli, harga_jual, jenis_barang) 
                VALUES ('$kode_barang', '$nama_barang', '$satuan', '$harga_beli', '$harga_jual', '$jenis_barang')";
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

    case 'edit-barang':
        $id = $_POST['id'];
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $satuan = $_POST['satuan'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];
        $jenis_barang = $_POST['jenis_barang'];

        $sql = "UPDATE barang SET 
                kode_barang = '$kode_barang',
                nama_barang = '$nama_barang',
                satuan = '$satuan',
                harga_beli = '$harga_beli',
                harga_jual = '$harga_jual',
                jenis_barang = '$jenis_barang'
                WHERE id_barang = '$id'";

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

    case 'hapus-barang':
        $id = $_POST['id'];
        $sql = "DELETE FROM barang WHERE id_barang = '$id'";
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