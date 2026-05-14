<div class="row">
    <div class="col-lg-12">
        <!-- Header Halaman -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Daftar Mahasiswa</h2>
            </div>
            <a href="<?= BASEURL; ?>/mahasiswa/create" class="btn btn-primary px-4 py-2 shadow-sm rounded-3">
                <i class="fa-solid fa-plus me-2"></i>Tambah Mahasiswa
            </a>
        </div>

        <!-- Filter & Search Card -->
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body p-3">
                <form action="<?= BASEURL; ?>/mahasiswa" method="GET" class="row g-2 align-items-center">
                    <div class="col-md-5">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" name="search" class="form-control bg-light border-start-0"
                                placeholder="Cari Nama atau NPM..."
                                value="<?= $_GET['search'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="jurusan" class="form-select bg-light">
                            <option value="">Semua Jurusan</option>
                            <option value="Teknik Informatika" <?= (isset($_GET['jurusan']) && $_GET['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                            <option value="Sistem Informasi" <?= (isset($_GET['jurusan']) && $_GET['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                        </select>
                    </div>
                    <div class="col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100 fw-semibold">
                            <i class="fa-solid fa-filter me-2"></i>Filter
                        </button>
                        <?php if (!empty($_GET['search']) || !empty($_GET['jurusan'])) : ?>
                            <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-outline-secondary">Reset</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Alert System -->
        <div class="flash-container">
            <?php Controller::flash(); ?>
        </div>

        <!-- Table Card -->
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="py-3 ps-4" style="width: 60px;">No</th>
                            <th class="py-3">NPM</th>
                            <th class="py-3">Nama Lengkap</th>
                            <th class="py-3">Jurusan</th>
                            <th class="py-3 text-center">L/P</th>
                            <th class="py-3">Tempat, Tgl Lahir</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-center pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data['mhs'])) : ?>
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <img src="https://illustrations.popsy.co/gray/data-report.svg" alt="no-data" style="width: 120px;" class="mb-3">
                                    <p class="text-muted">Data mahasiswa tidak ditemukan.</p>
                                </td>
                            </tr>
                        <?php else : ?>
                            <?php $no = 1;
                            foreach ($data['mhs'] as $mhs) : ?>
                                <tr>
                                    <td class="ps-4 fw-medium text-muted"><?= $no++; ?></td>
                                    <td><span class="badge bg-secondary-subtle text-secondary fw-bold px-2 py-1 border border-secondary-subtle"><?= $mhs['npm']; ?></span></td>
                                    <td class="fw-semibold text-dark"><?= $mhs['nama_lengkap']; ?></td>
                                    <td><span class="text-muted"><?= $mhs['jurusan']; ?></span></td>
                                    <td class="text-center">
                                        <span class="badge rounded-circle bg-light text-dark border p-2 shadow-sm" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;">
                                            <?= ($mhs['jenis_kelamin'] == 'Laki-laki') ? 'L' : 'P'; ?>
                                        </span>
                                    </td>
                                    <td><small class="text-muted"><i class="fa-solid fa-location-dot me-1"></i><?= $mhs['tempat_lahir']; ?>, <br><?= $mhs['tanggal_lahir']; ?></small></td>
                                    <td>
                                        <?php if ($mhs['status_id'] == 1) : ?>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                                                <i class="fa-solid fa-circle-check me-1"></i>Aktif
                                            </span>
                                        <?php else : ?>
                                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill">
                                                <i class="fa-solid fa-circle-xmark me-1"></i>Nonaktif
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['id']; ?>" class="btn btn-sm btn-white border shadow-sm text-primary" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="<?= BASEURL; ?>/mahasiswa/delete/<?= $mhs['id']; ?>" class="btn btn-sm btn-white border shadow-sm text-danger"
                                                onclick="return confirm('Hapus data <?= $mhs['nama_lengkap']; ?>?')" title="Hapus">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styling tambahan */
    .table thead th {
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .btn-white:hover {
        background-color: #f8f9fa;
        transform: translateY(-1px);
    }

    .input-group-merge .form-control {
        border-left: 0;
    }

    .input-group-merge .input-group-text {
        border-right: 0;
    }

    .badge {
        font-size: 0.75rem;
    }
</style>