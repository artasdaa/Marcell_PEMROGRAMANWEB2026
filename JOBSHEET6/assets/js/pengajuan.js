 // Mengambil & menampilkan Daftar Pengajuan Surat secara asinkron dari data/pengajuan.json
async function muatDaftarPengajuan() {
    const tbody = document.querySelector(".table-responsive table tbody");
    const loading = document.getElementById("loading-indicator");
    const searchInput = document.getElementById("search-input");

    if (!tbody) return;

    loading.style.display = "block";
    tbody.innerHTML = "";

    try {
        // simulasi delay jaringan agar loading indicator terlihat
        await new Promise((resolve) => setTimeout(resolve, 600));

        const res = await fetch("../data/pengajuan.json");

        if (!res.ok) {
            throw new Error("Gagal mengambil data (status " + res.status + ")");
        }

        const daftarPengajuan = await res.json();

        function tampilkanPengajuan(data) {
            tbody.innerHTML = "";

            data.forEach(function (pengajuan) {
                const tr = document.createElement("tr");

                tr.innerHTML =
                    "<td>" + pengajuan.keperluan_surat + "</td>" +
                    "<td>" + pengajuan.nama + "</td>" +
                    "<td>" + pengajuan.alamat + "</td>" +
                    "<td>" + pengajuan.no_hp + "</td>" +
                    "<td>" +
                    "<button type=\"button\">Edit</button> " +
                    "<button type=\"button\" class=\"btn-hapus\">Hapus</button>" +
                    "</td>";

                tbody.appendChild(tr);
            });
        }

        tampilkanPengajuan(daftarPengajuan);

        // Fitur pencarian
        searchInput.addEventListener("input", function () {
            const keyword = this.value.toLowerCase();

            const hasil = daftarPengajuan.filter(function (pengajuan) {
                return pengajuan.keperluan_surat
                    .toLowerCase()
                    .includes(keyword);
            });

            tampilkanPengajuan(hasil);
        });

    } catch (err) {
        tbody.innerHTML =
            "<tr><td colspan=\"5\">Gagal memuat data: " +
            err.message +
            "</td></tr>";
    } finally {
        loading.style.display = "none";
    }
}

document.addEventListener("DOMContentLoaded", muatDaftarPengajuan);