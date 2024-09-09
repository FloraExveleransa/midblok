<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Bulanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .table {
            margin-top: 20px;
            width: 100%;
            overflow-x: auto;
            display: block;
        }
        .search-section {
            margin-bottom: 20px;
        }
        .card {
            margin-top: 20px;
        }
        .search-input {
            border-radius: 0;
            border: 1px solid #ced4da;
        }
        .search-button {
            border-radius: 0;
            border: 1px solid #ced4da;
            border-left: none;
            background-color: #007bff;
            color: white;
        }
        .input-group {
            max-width: 400px;
            margin: 0 auto;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4 text-center">Rekap Bulanan</h2>

        <!-- Notification -->
        <?php if (session()->getFlashdata('status')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('status') ?>
            </div>
        <?php endif; ?>

        <!-- Search Section -->
        <div class="search-section">
            <form action="<?= base_url('rekap/search') ?>" method="get">
                <div class="input-group">
                    <input type="text" class="form-control search-input" name="query" placeholder="Cari bulan atau tahun...">
                    <div class="input-group-append">
                        <button class="btn search-button" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Data Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Kegiatan</h5>
            </div>
            <div class="card-body table-responsive">
                <?php if (!empty($manda) && is_array($manda)): ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal Kegiatan</th>
                                <th>Situasi Kegiatan</th>
                                <th>Tempat Kegiatan</th>
                                <th>Penyelenggara</th>
                                <th>Keterangan</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Dana yang Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($manda as $data): ?>
                                <tr>
                                    <td><?= esc($data['tanggal_kegiatan']) ?></td>
                                    <td><?= esc($data['situs_kegiatan']) ?></td>
                                    <td><?= esc($data['tempat_kegiatan']) ?></td>
                                    <td><?= esc($data['penyelenggara']) ?></td>
                                    <td><?= esc($data['keterangan']) ?></td>
                                    <td><?= esc($data['jam_mulai']) ?></td>
                                    <td><?= esc($data['jam_selesai']) ?></td>
                                    <td><?= esc($data['dana_keluar']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">Tidak ada data untuk bulan dan tahun yang dipilih.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
