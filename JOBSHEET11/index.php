<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';

require_once __DIR__ . '/includes/koneksi.php';

$totalMahasiswa = (int) $pdo->query("SELECT COUNT(*) FROM mahasiswa")->fetchColumn();
$totalPengajuan = (int) $pdo->query("SELECT COUNT(*) FROM pengajuan")->fetchColumn();
?>
        <section>
            <h2>Selamat Datang di Sistem Management Data Mahasiswa</h2>
            <p>Aplikasi untuk Mengelola Data Mahasiswa Jurusan Teknologi Informasi Politeknik Negeri Malang</p>
        </section>

        <section>
            <h2>Ringkasan</h2>
            <article>
                <h3>Total Mahasiswa</h3>
                <p><?php echo $totalMahasiswa; ?></p>
            </article>
            <article>
                <h3>Total Pengajuan</h3>
                <p><?php echo $totalPengajuan; ?></p>
            </article>
            <article>
                <h3>Sedang Diproses</h3>
                <p>0</p>
            </article>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>