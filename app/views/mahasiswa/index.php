<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <style>
        /* --- CSS STYLING --- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #1a73e8;
            margin-top: 0;
            font-weight: 600;
        }

        /* Navigasi & Tombol */
        .nav-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .btn-back {
            text-decoration: none;
            color: #666;
            font-size: 14px;
            transition: color 0.3s;
        }

        .btn-back:hover {
            color: #1a73e8;
        }

        .btn-add {
            padding: 10px 20px;
            background-color: #1a73e8;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.3s;
            display: inline-block;
        }

        .btn-add:hover {
            background-color: #1557b0;
        }

        /* Flash Message */
        .flash-container {
            margin-bottom: 20px;
        }

        /* Tabel Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 8px;
            margin-top: 10px;
        }

        thead {
            background-color: #f8f9fa;
        }

        th {
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #eee;
            color: #555;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-size: 14px;
        }

        tr:hover {
            background-color: #fcfcfc;
        }

        /* Status Badge */
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .status-aktif {
            background-color: #e6f4ea;
            color: #1e7e34;
        }

        .status-non {
            background-color: #fce8e6;
            color: #d93025;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .nav-actions {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="nav-actions">
            <div>
                <h1>Daftar Mahasiswa</h1>
                <a href="<?= BASEURL; ?>/home" class="btn-back">← Kembali ke Home</a>
            </div>
            <a href="<?= BASEURL; ?>/mahasiswa/create" class="btn-add">+ Tambah Mahasiswa</a>
        </div>

        <div class="flash-container">
            <?php Controller::flash(); ?>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>L/P</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($data['mhs'] as $mhs) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><strong><?= $mhs['npm']; ?></strong></td>
                        <td><?= $mhs['nama_lengkap']; ?></td>
                        <td><?= $mhs['jurusan']; ?></td>
                        <td><?= ($mhs['jenis_kelamin'] == 'Laki-laki') ? 'L' : 'P'; ?></td>
                        <td><?= $mhs['tempat_lahir'] . ', ' . $mhs['tanggal_lahir']; ?></td>
                        <td>
                            <span class="status-badge <?= ($mhs['status_id'] == 1) ? 'status-aktif' : 'status-non'; ?>">
                                <?= ($mhs['status_id'] == 1) ? 'Aktif' : 'Nonaktif'; ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>