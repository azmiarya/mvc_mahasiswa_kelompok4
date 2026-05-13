<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $data['judul']; ?></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .status-aktif {
            color: green;
            font-weight: bold;
        }

        .status-non {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="<?= BASEURL; ?>/home">Kembali ke Home</a>
    <h1>Daftar Mahasiswa</h1>
    <?php Controller::flash(); ?>
    <a href="<?= BASEURL; ?>/mahasiswa/create" style="padding: 10px; background: blue; color: white; text-decoration: none;">+ Tambah Mahasiswa</a>

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
                    <td><?= $mhs['npm']; ?></td>
                    <td><?= $mhs['nama_lengkap']; ?></td>
                    <td><?= $mhs['jurusan']; ?></td>
                    <td><?= ($mhs['jenis_kelamin'] == 'Laki-laki') ? 'L' : 'P'; ?></td>
                    <td><?= $mhs['tempat_lahir'] . ', ' . $mhs['tanggal_lahir']; ?></td>
                    <td>
                        <span class="<?= ($mhs['status_id'] == 1) ? 'status-aktif' : 'status-non'; ?>">
                            <?= ($mhs['status_id'] == 1) ? 'Aktif' : 'Nonaktif'; ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>