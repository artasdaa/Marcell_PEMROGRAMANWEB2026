<?php
session_start();

$keperluan_surat = trim($_POST['keperluan_surat'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$nim = trim($_POST['nim'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');

$errors = [];
if ($keperluan_surat === '') {
    $errors[] = "Keperluan surat wajib diisi.";
}
if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}
if ($nim === '') {
    $errors[] = "NIM wajib diisi.";
}
if ($noHP === '') {
    $errors[] = "Nomor HP wajib diisi.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

if (!isset($_SESSION['pengajuan'])) {
    $_SESSION['pengajuan'] = [];
}

$_SESSION['pengajuan'][] = [
    'keperluan_surat' => $keperluan_surat,
    'nama' => $nama,
    'nim' => $nim,
    'no_hp' => $noHp,
];

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil ditambahkan.'];
header('Location: list.php');
exit;
