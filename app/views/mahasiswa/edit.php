<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Breadcrumb / Navigasi -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/mahasiswa" class="text-decoration-none">Daftar Mahasiswa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                            <i class="fa-solid fa-user-pen text-primary fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0 text-dark">Edit Data Mahasiswa</h4>
                            <small class="text-muted">Perbarui informasi akademik mahasiswa secara akurat</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Alert System -->
                    <div class="flash-container">
                        <?php Controller::flash(); ?>
                    </div>

                    <form action="<?= BASEURL; ?>/mahasiswa/update/<?= $data['mhs']['id']; ?>" method="POST">
                        <div class="row g-4">

                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="npm" class="form-label fw-semibold text-secondary">NPM (Nomor Pokok Mahasiswa)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fa-solid fa-id-card"></i></span>
                                        <input type="text" id="npm" name="npm" class="form-control bg-light"
                                            value="<?= $data['mhs']['npm']; ?>" required readonly>
                                    </div>
                                    <div class="form-text">NPM tidak dapat diubah secara manual.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control rounded-3"
                                        value="<?= $data['mhs']['nama_lengkap']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-secondary d-block">Jenis Kelamin</label>
                                    <div class="d-flex gap-4 pt-2">
                                        <div class="form-check custom-radio">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki"
                                                value="Laki-laki" <?= ($data['mhs']['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?> required>
                                            <label class="form-check-label" for="laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check custom-radio">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                                value="Perempuan" <?= ($data['mhs']['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fakultas" class="form-label fw-semibold text-secondary">Fakultas</label>
                                    <input type="text" id="fakultas" name="fakultas" class="form-control bg-light"
                                        value="<?= $data['mhs']['fakultas']; ?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="jurusan" class="form-label fw-semibold text-secondary">Program Studi / Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-select rounded-3">
                                        <option value="Teknik Informatika" <?= ($data['mhs']['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                                        <option value="Sistem Informasi" <?= ($data['mhs']['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tempat_lahir" class="form-label fw-semibold text-secondary">Tempat Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                                            value="<?= $data['mhs']['tempat_lahir']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_lahir" class="form-label fw-semibold text-secondary">Tanggal Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                                            value="<?= $data['mhs']['tanggal_lahir']; ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Card Action -->
                            <div class="col-12 mt-4">
                                <hr class="my-4 opacity-25">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-light px-4 py-2 border">
                                        <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm fw-bold">
                                        <i class="fa-solid fa-save me-2"></i>Simpan Perubahan
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling agar input terlihat lebih modern */
    .form-control,
    .form-select {
        border-color: #e9ecef;
        padding: 0.6rem 0.85rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.05);
    }

    .input-group-text {
        border-color: #e9ecef;
        color: #adb5bd;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: "\f054";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        font-size: 10px;
        padding-top: 5px;
    }
</style>