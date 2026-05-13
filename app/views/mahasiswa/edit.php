<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
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
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #f39c12;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* Flash Message */
        .flash-container {
            margin-bottom: 20px;
        }

        /* Form Grid System */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 5px;
        }

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
            transition: all 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #f39c12;
            outline: none;
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.2);
        }

        input[readonly] {
            background-color: #f8f9fa;
            cursor: not-allowed;
            color: #777;
        }

        /* Radio Buttons */
        .radio-group {
            display: flex;
            gap: 20px;
            padding: 10px 0;
        }

        .radio-item {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .radio-item input {
            margin-right: 8px;
        }

        /* Buttons */
        .button-group {
            grid-column: span 2;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        button {
            background-color: #f39c12;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #e67e22;
        }

        .btn-cancel {
            text-align: center;
            text-decoration: none;
            color: #666;
            font-size: 14px;
            padding: 10px;
        }

        .btn-cancel:hover {
            color: #d93025;
        }

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
        <h1>Edit Data Mahasiswa</h1>

        <div class="flash-container">
            <?php Controller::flash(); ?>
        </div>

        <form action="<?= BASEURL; ?>/mahasiswa/update/<?= $data['mhs']['id']; ?>" method="POST">
            <div class="form-grid">

                <div class="form-group">
                    <label for="npm">NPM</label>
                    <input type="text" id="npm" name="npm" value="<?= $data['mhs']['npm']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $data['mhs']['nama_lengkap']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" id="fakultas" name="fakultas" value="<?= $data['mhs']['fakultas']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan">
                        <option value="Teknik Informatika" <?= ($data['mhs']['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                        <option value="Sistem Informasi" <?= ($data['mhs']['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $data['mhs']['tempat_lahir']; ?>">
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['mhs']['tanggal_lahir']; ?>">
                </div>

                <!-- Field Jenis Kelamin ditambahkan kembali agar tidak error null -->
                <div class="form-group full-width">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                <?= ($data['mhs']['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?> required> Laki-laki
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                <?= ($data['mhs']['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
                        </label>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit">Simpan Perubahan</button>
                    <a href="<?= BASEURL; ?>/mahasiswa" class="btn-cancel">Batal dan Kembali</a>
                </div>

            </div>
        </form>
    </div>

</body>

</html>