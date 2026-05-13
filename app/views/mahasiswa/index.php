<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>

    <!-- Link Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
            max-width: 1200px;
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

        /* Navigasi & Tombol Atas */
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
            display: flex;
            align-items: center;
            gap: 5px;
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
            display: inline-flex;
            align-items: center;
            gap: 8px;
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

        /* Tombol Aksi (Edit & Hapus) */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            background-color: #fff;
            color: #1a73e8;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            border: 1px solid #1a73e8;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #1a73e8;
            color: #fff;
        }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            background-color: #fff;
            color: #d93025;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            border: 1px solid #d93025;
            border-radius: 6px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #d93025;
            color: #fff;
        }

        /* Responsive */
        @media (max-width: 992px) {
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
                <a href="<?= BASEURL; ?>/home" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Home
                </a>
            </div>
            <a href="<?= BASEURL; ?>/mahasiswa/create" class="btn-add">
                <i class="fa-solid fa-plus"></i> Tambah Mahasiswa
            </a>
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
                    <th>Aksi</th>
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
                        <td>
                            <div class="action-buttons">
                                <a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['id']; ?>" class="btn-edit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>

                                <a href="<?= BASEURL; ?>/mahasiswa/delete/<?= $mhs['id']; ?>"
                                    class="btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus data <?= $mhs['nama_lengkap']; ?>?')">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>