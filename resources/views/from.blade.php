<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Form Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .form-section { margin-bottom: 2rem; }
        .barang-info { display: flex; gap: 10px; }
        #cart-table { margin-top: 1rem; }
        .invoice-container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .invoice-header { text-align: center; margin-bottom: 20px; }
        .invoice-header h2 { margin: 0; font-size: 24px; color: #333; }
        .invoice-header p { margin: 5px 0; color: #666; }
        .invoice-details { margin-bottom: 20px; }
        .invoice-details p { margin: 5px 0; color: #333; }
        .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .invoice-table th, .invoice-table td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        .invoice-table th { background-color: #f8f9fa; font-weight: bold; color: #333; }
        .invoice-table tbody tr:nth-child(even) { background-color: #f9f9f9; }
        .invoice-total { text-align: right; font-size: 18px; font-weight: bold; color: #333; }
        .invoice-footer { text-align: center; margin-top: 20px; color: #666; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container my-5">
        <div id="InnerForm" class="mb-5">
            <h3 class="text-center mb-4">Form Penjualan dan Detail Penjualan</h3>
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('penjualan.store') }}" method="POST">
                        @csrf
                        <div class="form-section">
                            <h5 class="mb-3">Data Penjualan</h5>
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-grow-1">
                                    <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                                    <select id="id_pelanggan" class="form-control" name="id_pelanggan" required>
                                        <option value="">Pilih ID Pelanggan</option>
                                        @foreach ($pelanggans as $pelanggan)
                                            <option value="{{ $pelanggan->id_pelanggan }}">{{ $pelanggan->id_pelanggan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                    <input type="text" id="nama" class="form-control" disabled>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="gender_pelanggan" class="form-label">Gender</label>
                                    <input type="text" id="gender" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-grow-1">
                                <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" required readonly>
                            </div>
                            <div class="flex-grow-1">
                                <label for="total_transaksi" class="form-label">Total Transaksi</label>
                                <input type="number" class="form-control" id="total_transaksi" name="total_transaksi" placeholder="Total Transaksi Otomatis" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-section">
                            <h5 class="mb-3">Detail Barang</h5>
                            <div class="row mb-3 align-items-end">
                                <div class="col-md-2">
                                    <label for="id_barang" class="form-label">ID Barang</label>
                                    <select class="form-control id-barang" name="detil_penjualan[0][id_barang]">
                                        <option value="">Pilih ID Barang</option>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id_barang }}">{{ $barang->id_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control nama-barang" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="harga_barang" class="form-label">Harga Barang</label>
                                    <input type="text" class="form-control harga-barang" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="stok_barang" class="form-label">Stok Barang</label>
                                    <input type="text" class="form-control stock" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="jumlah_barang" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control jumlah-barang" name="detil_penjualan[0][jml_barang]">
                                </div>
                                <div class="col-md-2">
                                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                    <input type="number" class="form-control harga-satuan" name="detil_penjualan[0][harga_satuan]">
                                </div>
                            </div>
                            <button type="button" id="add-to-cart" class="btn btn-sm btn-primary">Tambah ke Keranjang</button>
                        </div>
                        <div class="form-section">
                            <h5 class="mb-3">Keranjang Barang</h5>
                            <table class="table" id="cart-table">
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success w-100">Simpan Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="invoiceModalLabel">Invoice Penjualan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="invoice-content"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="printInvoice()">Cetak Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let cart = [];

        // Fungsi untuk mereset form detail barang
        function resetDetailBarangForm() {
            const row = document.querySelector('.row.mb-3.align-items-end');
            row.querySelector('.id-barang').value = '';
            row.querySelector('.nama-barang').value = '';
            row.querySelector('.harga-barang').value = '';
            row.querySelector('.stock').value = '';
            row.querySelector('.jumlah-barang').value = '';
            row.querySelector('.harga-satuan').value = '';
        }

        window.onload = function () {
            const today = new Date();
            const day = String(today.getDate()).padStart(2, '0');
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const year = today.getFullYear();
            const formattedDate = year + '-' + month + '-' + day;
            document.getElementById('tgl_transaksi').value = formattedDate;
        };

        document.querySelector('#id_pelanggan').addEventListener('change', function () {
            const idPelanggan = this.value;
            if (idPelanggan) {
                fetch(`/get-pelanggan?id_pelanggan=${idPelanggan}`)
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('#nama').value = data.nama || '';
                        document.querySelector('#gender').value = data.gender || '';
                    })
                    .catch(err => console.error('Error:', err));
            }
        });

        document.addEventListener('change', function (event) {
    if (event.target.classList.contains('id-barang')) {
        const idBarangInput = event.target;
        const row = idBarangInput.closest('.row');
        const namaBarang = row.querySelector('.nama-barang');
        const hargaBarang = row.querySelector('.harga-barang');
        const stock = row.querySelector('.stock');
        const hargaSatuan = row.querySelector('.harga-satuan');
        const jumlahBarang = row.querySelector('.jumlah-barang');
        const idBarang = idBarangInput.value;
        
        if (idBarang) {
            fetch(`/get-barang?id_barang=${idBarang}`)
                .then(response => response.json())
                .then(data => {
                    namaBarang.value = data.nama_barang || '';
                    hargaBarang.value = data.harga_barang || '';
                    stock.value = data.stock || '';
                    hargaSatuan.value = data.harga_barang || '';
                    
                    // Set jumlah barang ke 1 jika masih kosong atau belum diisi
                    if (!jumlahBarang.value) {
                        jumlahBarang.value = 1;
                    }
                })
                .catch(err => console.error('Error:', err));
        }
    }
});


        document.getElementById('add-to-cart').addEventListener('click', function () {
            const idBarang = document.querySelector('.id-barang').value;
            const namaBarang = document.querySelector('.nama-barang').value;
            const jumlahBarang = document.querySelector('.jumlah-barang').value;
            const hargaSatuan = document.querySelector('.harga-satuan').value;

            if (idBarang && jumlahBarang && hargaSatuan) {
                const subtotal = jumlahBarang * hargaSatuan;
                cart.push({ idBarang, namaBarang, jumlahBarang, hargaSatuan, subtotal });
                updateCartTable();
                updateTotalTransaksi();
                resetDetailBarangForm(); // Reset form detail barang setelah berhasil ditambahkan
            } else {
                alert('Silakan lengkapi data barang.');
            }
        });

        function updateCartTable() {
            const cartTableBody = document.querySelector('#cart-table tbody');
            cartTableBody.innerHTML = '';
            cart.forEach((item, index) => {
                const row = `
                    <tr>
                        <td>${item.idBarang}</td>
                        <td>${item.namaBarang}</td>
                        <td>${item.jumlahBarang}</td>
                        <td>${item.hargaSatuan}</td>
                        <td>${item.subtotal}</td>
                        <td><button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Hapus</button></td>
                    </tr>
                `;
                cartTableBody.innerHTML += row;
            });
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCartTable();
            updateTotalTransaksi();
        }

        function updateTotalTransaksi() {
            const totalTransaksi = cart.reduce((total, item) => total + item.subtotal, 0);
            document.getElementById('total_transaksi').value = totalTransaksi;
        }

        function cetakInvoice() {
            const pelanggan = document.getElementById('id_pelanggan').value;
            const nama = document.getElementById('nama').value;
            const gender = document.getElementById('gender').value;
            const tanggal = document.getElementById('tgl_transaksi').value;
            const totalTransaksi = document.getElementById('total_transaksi').value;
            let barangHTML = '';
            cart.forEach(item => {
                barangHTML += `
                    <tr>
                        <td>${item.idBarang}</td>
                        <td>${item.namaBarang}</td>
                        <td>${item.jumlahBarang}</td>
                        <td>${item.hargaSatuan}</td>
                        <td>${item.subtotal}</td>
                    </tr>
                `;
            });
            const invoiceHTML = `
                <div class="invoice-container">
                    <div class="invoice-header">
                        <h2>Invoice Penjualan</h2>
                        <p>Tanggal: ${tanggal}</p>
                    </div>
                    <div class="invoice-details">
                        <p><strong>ID Pelanggan:</strong> ${pelanggan}</p>
                        <p><strong>Nama:</strong> ${nama}</p>
                        <p><strong>Gender:</strong> ${gender}</p>
                    </div>
                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>${barangHTML}</tbody>
                    </table>
                    <div class="invoice-total">
                        <p><strong>Total Transaksi:</strong> ${totalTransaksi}</p>
                    </div>
                    <div class="invoice-footer">
                        <p>Terima kasih telah berbelanja bersama kami.</p>
                    </div>
                </div>
            `;
            document.getElementById('invoice-content').innerHTML = invoiceHTML;
            const modal = new bootstrap.Modal(document.getElementById('invoiceModal'));
            modal.show();
        }

        // Menentukan URL dashboard berdasarkan peran pengguna
const userRole = "{{ auth()->user()->role }}"; // Ambil peran dari pengguna yang sedang login
const adminDashboardURL = "{{ route('admin') }}"; // Ganti dengan route dashboard admin
const karyawanDashboardURL = "{{ route('karyawan') }}"; // Ganti dengan route dashboard karyawan

function printInvoice() {
    const invoiceContent = document.getElementById('invoice-content').innerHTML;
    const win = window.open('', '', 'width=800,height=600');
    win.document.write(`
        <html>
            <head>
                <title>Invoice Penjualan</title>
                <style>
                    .invoice-container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
                    .invoice-header { text-align: center; margin-bottom: 20px; }
                    .invoice-header h2 { margin: 0; font-size: 24px; color: #333; }
                    .invoice-header p { margin: 5px 0; color: #666; }
                    .invoice-details { margin-bottom: 20px; }
                    .invoice-details p { margin: 5px 0; color: #333; }
                    .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                    .invoice-table th, .invoice-table td { padding: 10px; border: 1px solid #ddd; text-align: center; }
                    .invoice-table th { background-color: #f8f9fa; font-weight: bold; color: #333; }
                    .invoice-table tbody tr:nth-child(even) { background-color: #f9f9f9; }
                    .invoice-total { text-align: right; font-size: 18px; font-weight: bold; color: #333; }
                    .invoice-footer { text-align: center; margin-top: 20px; color: #666; font-size: 14px; }
                </style>
            </head>
            <body>${invoiceContent}</body>
        </html>
    `);
    win.document.close();
    win.print();

    // Setelah pencetakan selesai, arahkan pengguna ke dashboard
    setTimeout(() => {
        if (userRole === 'admin') {
            window.location.href = adminDashboardURL;
        } else if (userRole === 'karyawan') {
            window.location.href = karyawanDashboardURL;
        } else {
            alert('Peran pengguna tidak diketahui, tetap di halaman ini.');
        }
    }, 1000); // Tunggu 1 detik sebelum redirect
}

        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();
            if (cart.length === 0) {
                alert('Keranjang kosong. Silakan tambahkan barang terlebih dahulu.');
                return;
            }
            const formData = new FormData(this);
            cart.forEach((item, index) => {
                formData.append(`detil_penjualan[${index}][id_barang]`, item.idBarang);
                formData.append(`detil_penjualan[${index}][jml_barang]`, item.jumlahBarang);
                formData.append(`detil_penjualan[${index}][harga_satuan]`, item.hargaSatuan);
            });
            fetch('{{ route('penjualan.store') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    cetakInvoice();
                    cart = [];
                    updateCartTable();
                    updateTotalTransaksi();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>