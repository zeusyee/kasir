<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dinamis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 250px;
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding: 30px 20px;
            z-index: 1;
}
        .sidebar a {
            color: #ddd;
            display: block;
            padding: 12px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover, .sidebar .active {
            background-color: #6c757d;
            text-decoration: none;
        }
        .main-content {
            margin-left: 270px;
            padding: 30px;
        }
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #6c757d;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar p-3">
            <div class="text-center fs-4 fw-bold">Dashboard Admin</div>
            <ul class="list-unstyled mt-4">
                <li><a href="#barang" class="d-block py-2 px-3 rounded"><i class="bi bi-box-seam-fill me-2"></i> Barang</a></li>
                <li><a href="#pelanggan" class="d-block py-2 px-3 rounded"><i class="fas fa-users me-2"></i> Pelanggan</a></li>
                <li><a href="#User" class="d-block py-2 px-3 rounded"><i class="fas fa-user-cog me-2"></i> User</a></li>
                <li><a href="#laporan" class="d-block py-2 px-3 rounded"><i class="fas fa-chart-line me-2"></i> Laporan</a></li>
                <li><a href="{{ route('from') }}" class="d-block py-2 px-3 rounded"><i class="fas fa-cash-register me-2"></i> Kasir</a></li>
                <li><a href="#login" class="logout-btn d-block py-2 px-3 rounded"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
        </div>
        <div class="main-content w-100">
                  <!-- Header with Dashboard Title and Search -->
        <div class="header-top">
            <div class="dashboard-title">Dashboard</div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search by ID" onkeyup="searchTable()">
            </div>
        </div>
            <!-- Section Barang -->
        <div id="barang" class="mb-5">
            <h3 class="text-center my-4">Barang</h3>
            <hr>
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('admin.createBarang') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                    <table class="table table-bordered" id="barang-table">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop Barang -->
                            @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->id_barang }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->harga_barang }}</td>
                                <td>{{ $barang->stock }}</td>
                                <td>
                                    <a href="{{ route('admin.editbarang', $barang->id_barang) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.delete_barang', $barang->id_barang) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?')"style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($barangs->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">Data Barang Belum Tersedia.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Section Pelanggan -->
        <div id="pelanggan" class="mb-5">
            <h3 class="text-center my-4">Pelanggan</h3>
            <hr>
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('admin.createpelanggan') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                    <table class="table table-bordered" id="pelanggan-table">
                        <thead>
                            <tr>
                                <th>ID Pelanggan</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop Pelanggan -->
                            @foreach ($pelanggans as $pelanggan)
                            <tr>
                                <td>{{ $pelanggan->id_pelanggan }}</td>
                                <td>{{ $pelanggan->nama }}</td>
                                <td>{{ $pelanggan->gender }}</td>
                                <td>
                                    <a href="{{ route('admin.editpelanggan', $pelanggan->id_pelanggan) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.delete_pelanggan', $pelanggan->id_pelanggan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')"style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($pelanggans->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">Data Pelanggan Belum Tersedia.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- User -->
        <div id="User" class="mb-5">
            <h3 class="text-center my-4">User</h3>
            <hr>
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('admin.add_user') }}" class="btn btn-md btn-success mb-3">TAMBAH USER</a>
                    <table class="table table-bordered" id="detail-penjualan-table">
                        <thead>
                            <tr>
                                <th>ID USER</th>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th>ROLE</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- USER -->
                            @foreach ($Users as $User)
                            <tr>
                                <td>{{ $User->id_user }}</td>
                                <td>{{ $User->username }}</td>
                                <td>{{ $User->password}}</td>
                                <td>{{ $User->role}}</td>
                                <td>
                                    <a href="{{ route('admin.edit_user', $User->id_user) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.delete_user', $User->id_user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')"style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($Users->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Data Detail Penjualan Belum Tersedia.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="laporan" class="mb-5">
            <h3 class="text-center my-4">Laporan</h3>
            <hr>
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <table class="table table-bordered" id="inner-table">
                        <thead>
                            <tr>
                                <th>ID TRANSAKSI</th>
                                <th>ID BARANG</th>
                                <th>JUMLAH BARANG</th>
                                <th>HARGA SATUAN</th>
                                <th>TANGGAL TRANSAKSI</th>
                                <th>TOTAL TRANSAKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualans as $penjualan)
                                @foreach ($penjualan->detilPenjualan as $detil)
                                    <tr>
                                        <td>{{ $penjualan->id_transaksi }}</td>
                                        <td>{{ $detil->id_barang }}</td>
                                        <td>{{ $detil->jml_barang }}</td>
                                        <td>{{ $detil->harga_satuan }}</td>
                                        <td>{{ $penjualan->tgl_transaksi }}</td>
                                        <td>{{ $penjualan->total_transaksi }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            @if($penjualans->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Data Tidak Tersedia.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Menangani klik pada tautan sidebar
document.querySelectorAll('.sidebar a').forEach(link => {
    link.addEventListener('click', function (e) {
        const href = this.getAttribute('href');

        // Jika href adalah anchor link (mengandung #)
        if (href.startsWith('#')) {
            e.preventDefault();

            // Menghapus kelas aktif dari semua tautan
            document.querySelectorAll('.sidebar a').forEach(item => {
                item.classList.remove('active');
            });

            // Menambahkan kelas aktif pada tautan yang diklik
            this.classList.add('active');

            // Scroll ke bagian yang sesuai
            const targetId = href.substring(1); // Menghapus #
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        } else {
            // Untuk tautan non-anchor, biarkan navigasi default berjalan
            this.classList.add('active');
        }
    });
});

        // Menambahkan logika untuk scroll dan mengubah warna berdasarkan posisi scroll
        window.addEventListener('scroll', function () {
            const sections = document.querySelectorAll('.main-content > div');
            let currentSection = null;

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 50;  // Sesuaikan dengan posisi scroll
                const sectionBottom = sectionTop + section.offsetHeight;
                if (window.scrollY >= sectionTop && window.scrollY < sectionBottom) {
                    currentSection = section;
                }
            });

            if (currentSection) {
                const targetLink = document.querySelector(`.sidebar a[href="#${currentSection.id}"]`);
                document.querySelectorAll('.sidebar a').forEach(link => {
                    link.classList.remove('active');
                });
                if (targetLink) {
                    targetLink.classList.add('active');
                }
            }
        });

        // Pencarian pada tabel berdasarkan primary key (ID)
        function searchTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toUpperCase();
            const tables = document.querySelectorAll("table");
            
            tables.forEach(table => {
                const rows = table.querySelectorAll("tbody tr");
                rows.forEach(row => {
                    const cells = row.querySelectorAll("td");
                    const idCell = cells[0]; // Asumsikan ID berada di kolom pertama
                    if (idCell && idCell.textContent.toUpperCase().includes(filter)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            });
        }
        document.querySelector('.logout-btn').addEventListener('click', function (e) {
        e.preventDefault();
        window.location.href = '/'; // Sesuaikan dengan URL halaman login Anda
     });

    </script>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
