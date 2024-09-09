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
        }
        .table-responsive {
            overflow-x: auto;
        }
        .modal-dialog {
            max-width: 80%;
        }
        .modal-body {
            max-height: 60vh; /* Adjust based on content */
            overflow-y: auto;
        }
        .modal-header {
            background-color: #007bff;
            color: white;
        }
        .modal-content {
            border-radius: 0.5rem;
        }
        .pdf-preview {
            width: 100%;
            height: 500px;
            border: none;
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
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kegiatan</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Situasi Kegiatan</th>
                            <th>Proposal</th> <!-- Kolom Proposal Baru -->
                            <th>Aksi</th> <!-- Kolom Aksi Baru -->
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
                                        <?php if (!empty($data['proposal_url'])): ?>
                                            <a href="<?= esc($data['proposal_url']) ?>" target="_blank" class="btn btn-primary btn-sm">Lihat Proposal</a>
                                        <?php else: ?>
                                            Tidak ada
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" 
                                                data-toggle="modal" 
                                                data-target="#detailModal"
                                                data-kegiatan="<?= esc($data['kegiatan']) ?>"
                                                data-tanggal="<?= esc($data['tanggal_kegiatan']) ?>"
                                                data-situasi="<?= esc($data['situs_kegiatan']) ?>"
                                                data-tempat="<?= esc($data['tempat_kegiatan']) ?>"
                                                data-penyelenggara="<?= esc($data['penyelenggara']) ?>"
                                                data-keterangan="<?= esc($data['keterangan']) ?>"
                                                data-jam-mulai="<?= esc($data['jam_mulai']) ?>"
                                                data-jam-selesai="<?= esc($data['jam_selesai']) ?>"
                                                data-dana="<?= number_format($data['dana_keluar'], 0, ',', '.') ?>"
                                                data-proposal="<?= esc($data['proposal_url']) ?>">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Informasi Kegiatan</h6>
                            <p><strong>Kegiatan:</strong> <span id="modalKegiatan"></span></p>
                            <p><strong>Tanggal Kegiatan:</strong> <span id="modalTanggal"></span></p>
                            <p><strong>Situasi Kegiatan:</strong> <span id="modalSituasi"></span></p>
                            <p><strong>Tempat Kegiatan:</strong> <span id="modalTempat"></span></p>
                            <p><strong>Penyelenggara:</strong> <span id="modalPenyelenggara"></span></p>
                            <p><strong>Keterangan:</strong> <span id="modalKeterangan"></span></p>
                            <p><strong>Jam Mulai:</strong> <span id="modalJamMulai"></span></p>
                            <p><strong>Jam Selesai:</strong> <span id="modalJamSelesai"></span></p>
                            <p><strong>Dana yang Keluar:</strong> <span id="modalDana"></span></p>
                            <p><strong>Proposal:</strong> <span id="modalProposal"></span></p>
                            <iframe id="pdfPreview" class="pdf-preview" src="" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to handle modal content
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var kegiatan = button.data('kegiatan');
            var tanggal = button.data('tanggal');
            var situasi = button.data('situasi');
            var tempat = button.data('tempat');
            var penyelenggara = button.data('penyelenggara');
            var keterangan = button.data('keterangan');
            var jamMulai = button.data('jam-mulai');
            var jamSelesai = button.data('jam-selesai');
            var dana = button.data('dana');
            var proposalUrl = button.data('proposal');

            // Update the modal's content.
            var modal = $(this);
            modal.find('#modalKegiatan').text(kegiatan);
            modal.find('#modalTanggal').text(tanggal);
            modal.find('#modalSituasi').text(situasi);
            modal.find('#modalTempat').text(tempat);
            modal.find('#modalPenyelenggara').text(penyelenggara);
            modal.find('#modalKeterangan').text(keterangan);
            modal.find('#modalJamMulai').text(jamMulai);
            modal.find('#modalJamSelesai').text(jamSelesai);
            modal.find('#modalDana').text(dana);
            
            // Handle proposal URL
            var proposalElement = modal.find('#modalProposal');
            var pdfPreviewElement = modal.find('#pdfPreview');

            if (proposalUrl) {
                proposalElement.html('<a href="' + proposalUrl + '" target="_blank">Lihat Proposal</a>');
                pdfPreviewElement.attr('src', proposalUrl);
                pdfPreviewElement.show();
            } else {
                proposalElement.text('Tidak ada');
                pdfPreviewElement.hide();
            }
        });
    </script>
</body>
</html>
