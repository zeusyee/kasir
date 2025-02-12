<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Form Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f5f7;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            max-width: 800px;
        }
        .form-section {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        h2 {
            color: #5a5a5a;
        }
        .form-control {
            border-radius: 6px;
            border: 1px solid #ddd;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-success {
            background-color: #6c757d;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
        }
        .btn-primary:hover, .btn-success:hover {
            opacity: 0.9;
        }
        .barang-info {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f8f9fa;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }
        .modal-title {
            font-weight: bold;
        }
        .form-section .row {
            margin-bottom: 15px;
        }
        .form-section .col-md-3 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div id="InnerForm" class="mb-5">
            <h2 class="text-center mb-4">KASIR</h2>
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('penjualan.store') }}" method="POST">
                        @csrf
                        <div class="form-section">
                            <h5 class="mb-3">Data Penjualan</h5>
                            <div class="mb-3">
                                <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                                <select id="id_pelanggan" class="form-control" name="id_pelanggan" required>
                                    <option value="">Pilih ID Pelanggan</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id_pelanggan }}">{{ $pelanggan->id_pelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="barang-info">
                                <div><label for="nama_pelanggan" class="form-label">Nama Pelanggan</label><input type="text" id="nama" class="form-control" disabled></div>
                                <div><label for="gender_pelanggan" class="form-label">Gender</label><input type="text" id="gender" class="form-control" disabled></div>
                            </div>
                            <div class="mb-3"><label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label><input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" required readonly></div>
                            <div class="mb-3"><label for="total_transaksi" class="form-label">Total Transaksi</label><input type="number" class="form-control" id="total_transaksi" name="total_transaksi" placeholder="Total Transaksi Otomatis" readonly></div>
                        </div>
                        <hr>
                        <div class="form-section">
                            <h5 class="mb-3">Detail Barang</h5>
                            <div id="detail-barang">
                                <div class="row mb-3">
                                    <div class="col-md-3"><label for="id_barang" class="form-label">ID Barang</label><select class="form-control id-barang" name="detil_penjualan[0][id_barang]" required><option value="">Pilih ID Barang</option>@foreach ($barangs as $barang)<option value="{{ $barang->id_barang }}">{{ $barang->id_barang }}</option>@endforeach</select></div>
                                    <div class="col-md-3"><label for="nama_barang" class="form-label">Nama Barang</label><input type="text" class="form-control nama-barang" disabled></div>
                                    <div class="col-md-3"><label for="harga_barang" class="form-label">Harga Barang</label><input type="text" class="form-control harga-barang" disabled></div>
                                    <div class="col-md-3"><label for="stok_barang" class="form-label">Stok Barang</label><input type="text" class="form-control stock" disabled></div>
                                    <div class="col-md-3 mt-2"><label for="jumlah_barang" class="form-label">Jumlah Barang</label><input type="number" class="form-control jumlah-barang" name="detil_penjualan[0][jml_barang]" placeholder="Masukkan Jumlah Barang" required></div>
                                    <div class="col-md-3 mt-2"><label for="harga_satuan" class="form-label">Harga Satuan</label><input type="number" class="form-control harga-satuan" name="detil_penjualan[0][harga_satuan]" placeholder="Masukkan Harga Satuan" required></div>
                                </div>
                            </div>
                            <button type="button" id="add-barang" class="btn btn-sm btn-primary">Tambah Barang</button>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success w-100">Simpan Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="invoice-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="printInvoice()">Cetak</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set tanggal saat ini pada input tgl_transaksi saat halaman dimuat
        window.onload = function () {
            const today = new Date();
            const day = String(today.getDate()).padStart(2, '0'); // Menambahkan angka 0 jika hari kurang dari 10
            const month = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const year = today.getFullYear();
            const formattedDate = year + '-' + month + '-' + day;

            document.getElementById('tgl_transaksi').value = formattedDate;
        };

        // Handle ID Pelanggan
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

        // Handle ID Barang
        document.addEventListener('change', function (event) {
            if (event.target.classList.contains('id-barang')) {
                const idBarangInput = event.target;
                const row = idBarangInput.closest('.row');
                const namaBarang = row.querySelector('.nama-barang');
                const hargaBarang = row.querySelector('.harga-barang');
                const stock = row.querySelector('.stock');
                const hargaSatuan = row.querySelector('.harga-satuan');

                const idBarang = idBarangInput.value;

                if (idBarang) {
                    fetch(`/get-barang?id_barang=${idBarang}`)
                        .then(response => response.json())
                        .then(data => {
                            namaBarang.value = data.nama_barang || '';
                            hargaBarang.value = data.harga_barang || '';
                            stock.value = data.stock || '';
                            hargaSatuan.value = data.harga_barang || ''; // Set harga satuan otomatis
                        })
                        .catch(err => console.error('Error:', err));
                }
            }
        });

        // Handle menambah barang
        document.getElementById('add-barang').addEventListener('click', function () {
            const detailBarang = document.getElementById('detail-barang');
            const newRow = document.createElement('div');
            newRow.classList.add('row', 'mb-3');
            newRow.innerHTML = `
                <div class="col-md-3">
                    <label for="id_barang" class="form-label">ID Barang</label>
                    <select class="form-control id-barang" name="detil_penjualan[][id_barang]" required>
                        <option value="">Pilih ID Barang</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id_barang }}">{{ $barang->id_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control nama-barang" disabled>
                </div>
                <div class="col-md-3">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <input type="text" class="form-control harga-barang" disabled>
                </div>
                <div class="col-md-3">
                    <label for="stok_barang" class="form-label">Stok Barang</label>
                    <input type="text" class="form-control stock" disabled>
                </div>
                <div class="col-md-3 mt-2">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control jumlah-barang" name="detil_penjualan[][jml_barang]" placeholder="Masukkan Jumlah Barang" required>
                </div>
                <div class="col-md-3 mt-2">
                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                    <input type="number" class="form-control harga-satuan" name="detil_penjualan[][harga_satuan]" placeholder="Masukkan Harga Satuan" required>
                </div>
            `;
            detailBarang.appendChild(newRow);
        });

        // Function untuk menghitung total transaksi
        function updateTotalTransaksi() {
           const jumlahBarangInputs = document.querySelectorAll('.jumlah-barang');
           const hargaSatuanInputs = document.querySelectorAll('.harga-satuan');
           let totalTransaksi = 0;

        jumlahBarangInputs.forEach((jumlahInput, index) => {
           const jumlah = parseFloat(jumlahInput.value) || 0;
           const hargaSatuan = parseFloat(hargaSatuanInputs[index].value) || 0;
           totalTransaksi += jumlah * hargaSatuan;
        });

    // Menampilkan total transaksi tanpa format tambahan (murni angka)
        document.getElementById('total_transaksi').value = totalTransaksi.toFixed(0); // Tidak ada desimal
        }


        // Event listener untuk setiap perubahan pada jumlah barang atau harga satuan
        document.addEventListener('input', function (event) {
            if (event.target.classList.contains('jumlah-barang') || event.target.classList.contains('harga-satuan')) {
                updateTotalTransaksi();
            }
        });
         // Cetak Invoice

                   // Menangani pengiriman form
document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault(); // Mencegah form dari submit standar

    const formData = new FormData(this);

    // Kirim data ke server menggunakan fetch
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
            // Jika sukses, tampilkan invoice
            cetakInvoice(data.penjualan);
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

// Function untuk menampilkan invoice
function cetakInvoice(penjualan) {
    const pelanggan = penjualan.id_pelanggan;
    const nama = penjualan.pelanggan.nama; // Pastikan data pelanggan tersedia
    const gender = penjualan.pelanggan.gender;
    const tanggal = penjualan.tgl_transaksi;
    const totalTransaksi = penjualan.total_transaksi;

    let barangHTML = '';
    penjualan.detilPenjualan.forEach(detil => {
        const idBarang = detil.id_barang;
        const namaBarang = detil.barang.nama_barang; // Pastikan data barang tersedia
        const jumlahBarang = detil.jml_barang;
        const hargaSatuan = detil.harga_satuan;
        const subtotal = jumlahBarang * hargaSatuan;

        barangHTML += `
            <tr>
                <td>${idBarang}</td>
                <td>${namaBarang}</td>
                <td>${jumlahBarang}</td>
                <td>${hargaSatuan}</td>
                <td>${subtotal}</td>
            </tr>
        `;
    });

    // Menampilkan invoice di modal
    document.getElementById('invoice-content').innerHTML = invoiceHTML;
    const modal = new bootstrap.Modal(document.getElementById('invoiceModal'));
    modal.show();

    // Cetak invoice setelah modal muncul
    setTimeout(function () {
        printInvoice();
    }, 500); // Memberikan waktu untuk modal tampil
}

         
         function cetakInvoice() {
            const pelanggan = document.getElementById('id_pelanggan').value;
            const nama = document.getElementById('nama').value;
            const gender = document.getElementById('gender').value;
            const tanggal = document.getElementById('tgl_transaksi').value;
            const totalTransaksi = document.getElementById('total_transaksi').value;

            const barangRows = document.querySelectorAll('#detail-barang .row');
            let barangHTML = '';
            barangRows.forEach(row => {
                const idBarang = row.querySelector('.id-barang').value;
                const namaBarang = row.querySelector('.nama-barang').value;
                const jumlahBarang = row.querySelector('.jumlah-barang').value;
                const hargaSatuan = row.querySelector('.harga-satuan').value;
                const subtotal = jumlahBarang * hargaSatuan;

                barangHTML += `
                    <tr>
                        <td>${idBarang}</td>
                        <td>${namaBarang}</td>
                        <td>${jumlahBarang}</td>
                        <td>${hargaSatuan}</td>
                        <td>${subtotal}</td>
                    </tr>
                `;
            });

            const invoiceHTML = `
            <style>
                    body { font-family: Arial, sans-serif; margin: 20px; }
                    h2 { text-align: center; color: #333; }
                    .invoice-header { margin-bottom: 20px; }
                    .invoice-header div { margin: 5px 0; }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f8f9fa;
                    }
                    .total {
                        font-weight: bold;
                        margin-top: 10px;
                    }
                    @media print {
                        button { display: none; }
                    }
                </style>
                <div>
            <div><strong>ID Pelanggan:</strong> ${pelanggan}</div>
            <div><strong>Nama:</strong> ${nama}</div>
            <div><strong>Gender:</strong> ${gender}</div>
            <div><strong>Tanggal:</strong> ${tanggal}</div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                ${barangHTML}
            </tbody>
        </table>
        <div class="total">Total: ${totalTransaksi}</div>
            `;
            document.getElementById('invoice-content').innerHTML = invoiceHTML;
            const modal = new bootstrap.Modal(document.getElementById('invoiceModal'));
            modal.show();
        }

        function printInvoice() {
    const invoiceContent = document.getElementById('invoice-content').innerHTML;
    const win = window.open('', '', 'width=800,height=600');
    win.document.write(`
        <html>
            <head>
                <title>Invoice</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 20px; }
                    h2 { text-align: center; color: #333; }
                    .invoice-header { margin-bottom: 20px; }
                    .invoice-header div { margin: 5px 0; }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f8f9fa;
                    }
                    .total {
                        font-weight: bold;
                        margin-top: 10px;
                    }
                    @media print {
                        button { display: none; }
                    }
                </style>
            </head>
            <body>
                <h2>Invoice</h2>
                <div class="invoice-header">
                    ${invoiceContent}
                </div>
            </body>
        </html>
    `);
    win.document.close();

    // Menambahkan event listener untuk mengarahkan setelah print selesai
    win.onafterprint = function() {
        window.location.href = '/admin';  // Mengarah ke halaman admin setelah print selesai
    };

    win.print();
}


    </script>
</body>
</html>
