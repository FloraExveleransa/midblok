<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .card-deck .card {
            margin-bottom: 20px;
        }
        .proposal-btn {
            text-align: right;
        }
        .card-body p {
            margin-bottom: 0.5rem;
        }
        .proposal-card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Laporan Data Kegiatan</h2>

        <!-- Notification -->
        <div class="notification" id="notification">
            Data berhasil dikirim!
        </div>

        <!-- Card Deck for Activities -->
        <div class="card-deck">
            <?php if (!empty($manda) && is_array($manda)): ?>
                <?php foreach ($manda as $data): ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($data['kegiatan']) ?></h5>
                            <p><strong>Tanggal Kegiatan:</strong> <?= esc($data['tanggal_kegiatan']) ?></p>
                            <p><strong>Situasi Kegiatan:</strong> <?= esc($data['situs_kegiatan']) ?></p>
                            <p><strong>Tempat Kegiatan:</strong> <?= esc($data['tempat_kegiatan']) ?></p>
                            <p><strong>Penyelenggara:</strong> <?= esc($data['penyelenggara']) ?></p>
                            <p><strong>Keterangan:</strong> <?= esc($data['keterangan']) ?></p>
                            <p><strong>Jam Mulai:</strong> <?= esc($data['jam_mulai']) ?></p>
                            <p><strong>Jam Selesai:</strong> <?= esc($data['jam_selesai']) ?></p>
                            <p><strong>Dana yang Keluar:</strong> <?= number_format($data['dana_keluar'], 0, ',', '.') ?></p>
                            <div class="proposal-btn">
                                <?php if (!empty($data['proposal_url'])): ?>
                                    <a href="<?= esc($data['proposal_url']) ?>" target="_blank" class="btn btn-primary">Lihat Proposal</a>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada Proposal</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    Tidak ada data untuk ditampilkan.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
