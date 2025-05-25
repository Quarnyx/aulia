<?php
include "../../layouts/config.php";

$aksi = $_GET['aksi'];

switch ($aksi) {
    case 'tambah-supplier':
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        $sql = "INSERT INTO supplier (nama_supplier, alamat, telepon) VALUES ('$nama_supplier', '$alamat', '$telepon')";
        if ($link->query($sql)) {
            echo "ok";
        } else {
            echo "error";
        }
        break;

    case 'edit-supplier':
        $id = $_POST['id'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        $sql = "UPDATE supplier SET nama_supplier = '$nama_supplier', alamat = '$alamat', telepon = '$telepon' WHERE id_supplier = '$id'";
        if ($link->query($sql)) {
            echo "ok";
        } else {
            echo "error";
        }
        break;

    case 'hapus-supplier':
        $id = $_POST['id'];

        $sql = "DELETE FROM supplier WHERE id_supplier = '$id'";
        if ($link->query($sql)) {
            echo "ok";
        } else {
            echo "error";
        }
        break;

    default:
        echo "error";
        break;
}
?>