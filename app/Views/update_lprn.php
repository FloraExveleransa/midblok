<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Kegiatan</h2>
        
        <!-- Notification -->
        <?php if (session()->getFlashdata('status')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('status') ?>
            </div>
        <?php endif; ?>
        
        <!-- Modal for Editing Data -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('home/update_lprn') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data Kegiatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_lprn" id="edit_id">
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan</label>
                                <input type="text" class="form-control" id="edit_kegiatan" name="kegiatan" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                <input type="date" class="form-control" id="edit_tanggal_kegiatan" name="tanggal_kegiatan" required>
                            </div>
                            <div class="form-group">
                                <label for="situs_kegiatan">Situasi Kegiatan</label>
                                <input type="text" class="form-control" id="edit_situs_kegiatan" name="situs_kegiatan" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat_kegiatan">Tempat Kegiatan</label>
                                <input type="text" class="form-control" id="edit_tempat_kegiatan" name="tempat_kegiatan" required>
                            </div>
                            <div class="form-group">
                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text" class="form-control" id="edit_penyelenggara" name="penyelenggara" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="edit_keterangan" name="keterangan" required>
                            </div>
                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input type="time" class="form-control" id="edit_jam_mulai" name="jam_mulai" required>
                            </div>
                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type="time" class="form-control" id="edit_jam_selesai" name="jam_selesai" required>
                            </div>
                            <div class="form-group">
                                <label for="dana_keluar">Dana yang Keluar</label>
                                <input type="number" class="form-control" id="edit_dana_keluar" name="dana_keluar" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Script to handle modal population -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.btn-warning').on('click', function() {
                    // Get data from the selected card
                    const id = $(this).closest('.card').find('.card-header').data('id');
                    const kegiatan = $(this).closest('.card').find('.card-title').text();
                    const tanggal_kegiatan = $(this).closest('.card').find('p:eq(0)').text().replace('Tanggal Kegiatan:', '').trim();
                    const situs_kegiatan = $(this).closest('.card').find('p:eq(1)').text().replace('Situasi Kegiatan:', '').trim();
                    const tempat_kegiatan = $(this).closest('.card').find('p:eq(2)').text().replace('Tempat Kegiatan:', '').trim();
                    const penyelenggara = $(this).closest('.card').find('p:eq(3)').text().replace('Penyelenggara:', '').trim();
                    const keterangan = $(this).closest('.card').find('p:eq(4)').text().replace('Keterangan:', '').trim();
                    const jam_mulai = $(this).closest('.card').find('p:eq(5)').text().replace('Jam Mulai:', '').trim();
                    const jam_selesai = $(this).closest('.card').find('p:eq(6)').text().replace('Jam Selesai:', '').trim();
                    const dana_keluar = $(this).closest('.card').find('p:eq(7)').text().replace('Dana yang Keluar:', '').trim();

                    // Set data to modal inputs
                    $('#edit_id').val(id);
                    $('#edit_kegiatan').val(kegiatan);
                    $('#edit_tanggal_kegiatan').val(tanggal_kegiatan);
                    $('#edit_situs_kegiatan').val(situs_kegiatan);
                    $('#edit_tempat_kegiatan').val(tempat_kegiatan);
                    $('#edit_penyelenggara').val(penyelenggara);
                    $('#edit_keterangan').val(keterangan);
                    $('#edit_jam_mulai').val(jam_mulai);
                    $('#edit_jam_selesai').val(jam_selesai);
                    $('#edit_dana_keluar').val(dana_keluar);

                    // Show the modal
                    $('#editModal').modal('show');
                });
            });
        </script>
    </div>
</body>
</html>
