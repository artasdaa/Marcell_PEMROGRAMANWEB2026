<?php
$page_title = "Daftar Pengajuan";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftarPengajuan = $_SESSION['pengajuan'] ?? [];
?>
        <section>
            <h2>Daftar Pengajuan</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <div class="search-box">
                <label for="search-input">Cari Pengajuan</label>
                <input type="text" id="search-input" placeholder="Cari Pengajuan...">
            </div>

            <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Keperluan Surat</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarPengajuan)): ?>
                    <tr>
                        <td colspan="5">Belum ada data anggota. Silakan tambah lewat menu "Tambah Anggota".</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($daftarPengajuan as $pengajuan): ?>
                        <tr>
                            <td><?php echo $pengajuan['keperluan_surat']; ?></td>
                            <td><?php echo $pengajuan['nama']; ?></td>
                            <td><?php echo $pengajuan['nim']; ?></td>
                            <td><?php echo $pengajuan['no_hp']; ?></td>
                            <td>
                                <button type="button">Edit</button>
                                <button type="button" class="btn-hapus">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
