// Mengambil & menampilkan Daftar Mahasiswa secara asinkron dari data/mahasiswa.json
async function muatDaftarMahasiswa() {
    const tbody = document.querySelector(".table-responsive table tbody");
    const loading = document.getElementById("loading-indicator");
    const searchInput = document.getElementById("search-input");

    if (!tbody) return;

    loading.style.display = "block";
    tbody.innerHTML = "";

    try {
        // simulasi delay jaringan agar loading indicator terlihat
        await new Promise((resolve) => setTimeout(resolve, 600));

        const res = await fetch("../data/mahasiswa.json");

        if (!res.ok) {
            throw new Error("Gagal mengambil data (status " + res.status + ")");
        }

        const daftarMahasiswa = await res.json();

        function tampilkanMahasiswa(data) {
            tbody.innerHTML = "";

            data.forEach(function (mahasiswa) {
                const tr = document.createElement("tr");

                tr.innerHTML =
                    "<td>" + mahasiswa.nama + "</td>" +
                    "<td>" + mahasiswa.nim + "</td>" +
                    "<td>" + mahasiswa.tahun_masuk + "</td>" +
                    "<td>" + mahasiswa.kelas + "</td>" +
                    "<td>" +
                    "<button type=\"button\">Edit</button> " +
                    "<button type=\"button\" class=\"btn-hapus\">Hapus</button>" +
                    "</td>";

                tbody.appendChild(tr);
            });
        }

        tampilkanMahasiswa(daftarMahasiswa);

        // Fitur pencarian
        searchInput.addEventListener("input", function () {
            const keyword = this.value.toLowerCase();

            const hasil = daftarMahasiswa.filter(function (mahasiswa) {
                return mahasiswa.nama.toLowerCase().includes(keyword);
            });

            tampilkanMahasiswa(hasil);
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

document.addEventListener("DOMContentLoaded", muatDaftarMahasiswa);