<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
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
            min-width: 1000px; /* Menambahkan lebar minimum agar tabel tidak terlalu kecil */
        }
        .modal-dialog {
            margin-top: 10%; /* Menurunkan posisi modal agar tidak menutupi data */
        }
        .modal-header {
            background-color: #007bff; /* Warna biru untuk header modal */
            color: white;
        }
        .modal-body {
            padding: 20px; /* Padding yang sesuai untuk tampilan modal */
        }
        .modal-content {
            border-radius: 10px; /* Border radius yang lebih lembut */
        }
        .modal-footer {
            padding: 15px; /* Padding untuk footer modal */
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
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Data Users</h2>

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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Foto</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users) && is_array($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= esc($user['username']) ?></td>
                                <td><?= esc($user['email']) ?></td>
                                <td><?= esc($user['id_level']) ?></td>
                               <td>
    <?php if (!empty($user['foto'])): ?>
        <button class="btn btn-info btn-foto" data-toggle="modal" data-target="#fotoModal" 
            data-foto ="<?= base_url('path_to_current_image/' . $user->foto) ?>">Lihat Foto</button>
    <?php else: ?>
        Tidak ada foto
    <?php endif; ?>
</td>

                                <td>
                                    <button class="btn btn-primary btn-detail" data-toggle="modal" data-target="#detailModal" 
                                        data-username="<?= esc($user['username']) ?>"
                                        data-email="<?= esc($user['email']) ?>"
                                        data-id_level="<?= esc($user['id_level']) ?>"
                                        data-foto="<?= esc($user['foto']) ?>"> 
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
<!-- Modal Lihat Foto -->
<div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoModalLabel">Foto User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="fotoUser" src="" alt="Foto User" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Username:</strong> <span id="modalUsername"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Level:</strong> <span id="modalIdLevel"></span></p>
                    <p><strong>Foto:</strong> <img id="modalFoto" src="" alt="Foto User" width="100"></p>
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
                var username = $(this).data('username');
                var email = $(this).data('email');
                var idLevel = $(this).data('id_level');
                var foto = $(this).data('foto');

                $('#modalUsername').text(username);
                $('#modalEmail').text(email);
                $('#modalIdLevel').text(idLevel);
               $(document).ready(function() {
    $('.btn-foto').on('click', function() {
        var foto = $(this).data('foto');
        $('#fotoUser').attr('src', 'C:/bisnis/public/images/' + foto);
    });
});


            });
        });
    </script>
</body>
</html>
