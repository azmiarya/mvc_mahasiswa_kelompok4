<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* --- CSS STYLING DASAR --- */
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

        /* --- SESI 6: STYLING FORM PENCARIAN & FILTER --- */
        .search-filter-container {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #eee;
        }

        .search-form {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .input-group {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 2px 12px;
            flex: 2;
        }

        .input-group i {
            color: #999;
            margin-right: 10px;
        }

        .input-group input {
            border: none;
            padding: 10px 0;
            width: 100%;
            outline: none;
            font-size: 14px;
        }

        .select-jurusan {
            flex: 1;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            background-color: white;
            min-width: 180px;
        }

        .btn-search {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 11px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.3s;
        }

        .btn-search:hover {
            background-color: #1557b0;
        }

        .btn-reset {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            padding: 10px;
        }

        .btn-reset:hover {
            text-decoration: underline;
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
            body { padding: 15px; }
            .nav-actions { flex-direction: column; align-items: flex-start; gap: 15px; }
            .search-form { flex-direction: column; align-items: stretch; }
            table { display: block; overflow-x: auto; }
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

        <div class="search-filter-container">
            <form action="<?= BASEURL; ?>/mahasiswa" method="GET" class="search-form">
                <div class="input-group">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" placeholder="Cari Nama atau NPM..." 
                           value="<?= $_GET['search'] ?? ''; ?>">
                </div>

                <select name="jurusan" class="select-jurusan">
                    <option value="">-- Semua Jurusan --</option>
                    <option value="Teknik Informatika" <?= (isset($_GET['jurusan']) && $_GET['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                    <option value="Sistem Informasi" <?= (isset($_GET['jurusan']) && $_GET['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                </select>

                <button type="submit" class="btn-search">
                    <i class="fa-solid fa-filter"></i> Cari & Filter
                </button>

                <?php if(!empty($_GET['search']) || !empty($_GET['jurusan'])) : ?>
                    <a href="<?= BASEURL; ?>/mahasiswa" class="btn-reset">Reset</a>
                <?php endif; ?>
            </form>
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
                <?php if (empty($data['mhs'])) : ?>
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 30px; color: #999;">
                            <i class="fa-solid fa-circle-info"></i> Data mahasiswa tidak ditemukan.
                        </td>
                    </tr>
                <?php else : ?>
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
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>