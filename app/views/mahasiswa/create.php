<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <style>
        /* --- CSS STYLING --- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 800px;
            /* Diperlebar untuk menampung 2 kolom */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #1a73e8;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* Flash Message */
        .flash {
            background-color: #e8f0fe;
            color: #1967d2;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 25px;
            text-align: center;
            font-size: 14px;
        }

        /* Wrapper Form menjadi Grid 2 Kolom */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Membagi 2 kolom sama rata */
            gap: 20px;
            /* Jarak antar inputan */
        }

        .form-group {
            margin-bottom: 5px;
        }

        /* Agar Nama Lengkap memakan 2 kolom penuh (opsional) */
        .full-width {
            grid-column: span 2;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            border-color: #1a73e8;
            outline: none;
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.2);
        }

        input[readonly] {
            background-color: #f8f9fa;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            padding: 10px 0;
        }

        /* Tombol di bawah tetap melebar */
        .button-group {
            grid-column: span 2;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        button {
            background-color: #1a73e8;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-cancel {
            text-align: center;
            text-decoration: none;
            color: #666;
            font-size: 14px;
        }

        /* Responsif: Jika layar HP, balik lagi jadi 1 kolom */
        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width,
            .button-group {
                grid-column: span 1;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Tambah Mahasiswa</h1>

        <div class="flash">
            <?php Controller::flash(); ?>
        </div>

        <form action="<?= BASEURL; ?>/mahasiswa/store" method="POST">
            <div class="form-grid">

                <div class="form-group">
                    <label>NPM</label>
                    <input type="text" name="npm" placeholder="Masukkan NPM" required>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" placeholder="Nama sesuai ijazah" required>
                </div>

                <div class="form-group">
                    <label>Fakultas</label>
                    <input type="text" name="fakultas" value="FTI" readonly>
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <select name="jurusan">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" placeholder="Contoh: Jakarta">
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir">
                </div>

                <div class="form-group full-width">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit">Simpan Data Mahasiswa</button>
                    <a href="<?= BASEURL; ?>/mahasiswa" class="btn-cancel">Batal dan Kembali</a>
                </div>

            </div>
        </form>
    </div>

</body>

</html>