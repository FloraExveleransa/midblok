<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukkan Data Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your CSS styles */
        .form-section {
            margin-bottom: 20px;
        }
        .notification {
            display: none;
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            z-index: 1050;
        }
        .error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
        .info {
            color: #007bff;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Formulir Data Kegiatan</h2>
        <form id="dataForm" action="/simpandata" method="post" enctype="multipart/form-data">
            <div class="form-section">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="kegiatan">Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Nama Kegiatan">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan">
                    </div>
                </div>
            </div>
            <div class="form-section">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="situasi_kegiatan">Situasi Kegiatan</label>
                        <input type="text" class="form-control" id="situasi_kegiatan" name="situasi_kegiatan" placeholder="Situasi">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tempat_kegiatan">Tempat Kegiatan</label>
                        <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" placeholder="Tempat">
                    </div>
                </div>
            </div>
            <div class="form-section">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="penyelenggara">Penyelenggara</label>
                        <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Penyelenggara">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                    </div>
                </div>
            </div>
            <div class="form-section">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                    </div>
                </div>
            </div>
            <div class="form-section">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dana_keluar">Dana yang Keluar</label>
                        <input type="number" class="form-control" id="dana_keluar" name="dana_keluar" placeholder="Dana Keluar (Rp)">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="proposal">Proposal</label>
                        <input type="file" class="form-control-file" id="proposal" name="proposal" accept="application/pdf">
                        <div class="info">Harap unggah file dalam format PDF. Jika dokumen Anda tidak dalam format PDF, mohon konversikan terlebih dahulu.</div>
                        <div id="proposalError" class="error"></div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>

    <!-- Notification -->
    <div class="notification" id="notification">
        Data berhasil dikirim!
    </div>

    <script>
        document.getElementById('dataForm').addEventListener('submit', function(event) {
            // Prevent default form submission
            event.preventDefault();

            // Clear previous error messages
            const proposalError = document.getElementById('proposalError');
            proposalError.textContent = '';

            // Get file input and its file
            const fileInput = document.getElementById('proposal');
            const file = fileInput.files[0];

            // Check if a file was selected and if it is a PDF
            if (file) {
                if (file.type !== 'application/pdf') {
                    proposalError.textContent = 'Mohon maaf, hanya file PDF yang diperbolehkan. Silakan konversikan dokumen Anda ke PDF dan unggah kembali.';
                    return; // Exit function to prevent form submission
                }
            }

            // Display the notification
            const notification = document.getElementById('notification');
            notification.style.display = 'block';

            // Hide the notification after 3 seconds
            setTimeout(function() {
                notification.style.display = 'none';
            }, 3000);

            // Optionally, you can submit the form here if you are using AJAX
            // For standard form submission, remove the `event.preventDefault()` above
            // document.getElementById('dataForm').submit();
        });
    </script>
</body>
</html>
