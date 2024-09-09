<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .table-section {
            margin-top: 20px;
            overflow-x: auto; /* Menambahkan scroll horizontal jika tabel terlalu lebar */
        }
        table {
            min-width: 1200px; /* Menambahkan lebar minimum agar tabel tidak terlalu kecil */
        }
        .modal-dialog {
            margin-top: 10%; /* Menurunkan posisi modal agar tidak menutupi data */
        }
        .modal-header {
            background-color: #007bff; /* Warna biru untuk header modal */
            color: white;
            border-bottom: 1px solid #dee2e6;
        }
        .modal-body {
            padding: 20px; /* Padding yang sesuai untuk tampilan modal */
        }
        .modal-content {
            border-radius: 10px; /* Border radius yang lebih lembut */
        }
        .modal-footer {
            border-top: 1px solid #dee2e6;
            padding: 15px; /* Padding untuk footer modal */
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-primary {
            background-color: #28a745; /* Warna hijau untuk tombol */
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .modal-title {
            font-weight: 600; /* Menambah ketebalan font untuk judul modal */
        }
        .modal-body p {
            font-size: 16px; /* Ukuran font yang lebih besar untuk keterbacaan */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Program Kegiatan OSIS</h2>

        <!-- Notification -->
        <?php if (session()->getFlashdata('status')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('status') ?>
            </div>
        <?php endif; ?>

        <!-- Table Section -->
        <div class="table-section">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Situasi Kegiatan</th>
                        <th>Detail</th>
                        <th>Proposal</th> <!-- Kolom Proposal -->
                        <th>Status Kesiswaan</th> <!-- Kolom Status Kesiswaan -->
                        <th>Status Kepala Sekolah</th> <!-- Kolom Status Kepala Sekolah -->
                        <th>Status Yayasan</th> <!-- Kolom Status Yayasan -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($manda) && is_array($manda)): ?>
                        <?php foreach ($manda as $data): ?>
                            <tr>
                                <td><?= esc($data['kegiatan']) ?></td>
                                <td><?= esc($data['tanggal_kegiatan']) ?></td>
                                <td><?= esc($data['situs_kegiatan']) ?></td>
                                <td>
                                    <button class="btn btn-primary btn-detail" data-toggle="modal" data-target="#detailModal" 
                                        data-kegiatan="<?= esc($data['kegiatan']) ?>"
                                        data-tanggal_kegiatan="<?= esc($data['tanggal_kegiatan']) ?>"
                                        data-situs_kegiatan="<?= esc($data['situs_kegiatan']) ?>"
                                        data-tempat_kegiatan="<?= esc($data['tempat_kegiatan']) ?>"
                                        data-penyelenggara="<?= esc($data['penyelenggara']) ?>"
                                        data-keterangan="<?= esc($data['keterangan']) ?>"
                                        data-jam_mulai="<?= esc($data['jam_mulai']) ?>"
                                        data-jam_selesai="<?= esc($data['jam_selesai']) ?>"
                                        data-dana_keluar="<?= number_format($data['dana_keluar'], 0, ',', '.') ?>"> 
                                        Detail
                                    </button>
                                </td>
                                <td>
                                    <?php if (!empty($data['proposal'])): ?>
                                        <a href="<?= base_url('images/' . esc($data['proposal'])) ?>" class="btn btn-secondary" target="_blank">Lihat Proposal</a>
                                    <?php else: ?>
                                        Tidak ada Proposal
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <select class="form-control">
                                        <option <?= $data['status_kesiswaan'] === 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
                                        <option <?= $data['status_kesiswaan'] === 'tidak disetujui' ? 'selected' : '' ?>>Tidak Disetujui</option>
                                        <option <?= $data['status_kesiswaan'] === 'menunggu persetujuan' ? 'selected' : '' ?>>Menunggu Persetujuan</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control">
                                        <option <?= $data['status_kepala_sekolah'] === 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
                                        <option <?= $data['status_kepala_sekolah'] === 'tidak disetujui' ? 'selected' : '' ?>>Tidak Disetujui</option>
                                        <option <?= $data['status_kepala_sekolah'] === 'menunggu persetujuan' ? 'selected' : '' ?>>Menunggu Persetujuan</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control">
                                        <option <?= $data['status_yayasan'] === 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
                                        <option <?= $data['status_yayasan'] === 'tidak disetujui' ? 'selected' : '' ?>>Tidak Disetujui</option>
                                        <option <?= $data['status_yayasan'] === 'menunggu persetujuan' ? 'selected' : '' ?>>Menunggu Persetujuan</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Kegiatan:</strong> <span id="modalKegiatan"></span></p>
                    <p><strong>Tanggal Kegiatan:</strong> <span id="modalTanggalKegiatan"></span></p>
                    <p><strong>Situasi Kegiatan:</strong> <span id="modalSituasiKegiatan"></span></p>
                    <p><strong>Tempat Kegiatan:</strong> <span id="modalTempatKegiatan"></span></p>
                    <p><strong>Penyelenggara:</strong> <span id="modalPenyelenggara"></span></p>
                    <p><strong>Keterangan:</strong> <span id="modalKeterangan"></span></p>
                    <p><strong>Jam Mulai:</strong> <span id="modalJamMulai"></span></p>
                    <p><strong>Jam Selesai:</strong> <span id="modalJamSelesai"></span></p>
                    <p><strong>Dana yang Keluar:</strong> <span id="modalDanaKeluar"></span></p>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk mengisi modal dengan data detail -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-detail').on('click', function() {
                var kegiatan = $(this).data('kegiatan');
                var tanggalKegiatan = $(this).data('tanggal_kegiatan');
                var situasiKegiatan = $(this).data('situs_kegiatan');
                var tempatKegiatan = $(this).data('tempat_kegiatan');
                var penyelenggara = $(this).data('penyelenggara');
                var keterangan = $(this).data('keterangan');
                var jamMulai = $(this).data('jam_mulai');
                var jamSelesai = $(this).data('jam_selesai');
                var danaKeluar = $(this).data('dana_keluar');

                $('#modalKegiatan').text(kegiatan);
                $('#modalTanggalKegiatan').text(tanggalKegiatan);
                $('#modalSituasiKegiatan').text(situasiKegiatan);
                $('#modalTempatKegiatan').text(tempatKegiatan);
                $('#modalPenyelenggara').text(penyelenggara);
                $('#modalKeterangan').text(keterangan);
                $('#modalJamMulai').text(jamMulai);
                $('#modalJamSelesai').text(jamSelesai);
                $('#modalDanaKeluar').text(danaKeluar);
               
            });
        });
    </script>
</body>
</html>
