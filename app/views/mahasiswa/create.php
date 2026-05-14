<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Navigasi / Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/mahasiswa" class="text-decoration-none">Daftar Mahasiswa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Baru</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm rounded-3">
                <!-- Header Form -->
                <div class="card-header bg-white py-3 border-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                            <i class="fa-solid fa-user-plus text-primary fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0 text-dark">Tambah Mahasiswa Baru</h4>
                            <small class="text-muted">Masukkan data akademik mahasiswa dengan lengkap dan benar</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Flash Message -->
                    <div class="flash-container">
                        <?php Controller::flash(); ?>
                    </div>

                    <form action="<?= BASEURL; ?>/mahasiswa/store" method="POST">
                        <div class="row g-4">

                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="npm" class="form-label fw-semibold text-secondary">NPM (Nomor Pokok Mahasiswa)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-id-card"></i></span>
                                        <input type="text" id="npm" name="npm" class="form-control rounded-end"
                                            placeholder="Contoh: 2110010xxx" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control rounded-3"
                                        placeholder="Masukkan nama sesuai ijazah" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-secondary d-block">Jenis Kelamin</label>
                                    <div class="d-flex gap-4 pt-2">
                                        <div class="form-check custom-radio">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki"
                                                value="Laki-laki" required>
                                            <label class="form-check-label" for="laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check custom-radio">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                                value="Perempuan">
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
                                        value="FTI" readonly>
                                    <div class="form-text small">Fakultas Teknologi Informasi (Default)</div>
                                </div>

                                <div class="mb-3">
                                    <label for="jurusan" class="form-label fw-semibold text-secondary">Program Studi / Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-select rounded-3">
                                        <option value="" disabled selected>-- Pilih Jurusan --</option>
                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tempat_lahir" class="form-label fw-semibold text-secondary">Tempat Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                                            placeholder="Contoh: Banjarmasin">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_lahir" class="form-label fw-semibold text-secondary">Tanggal Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-12 mt-4">
                                <hr class="my-4 opacity-25">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-light px-4 py-2 border">
                                        <i class="fa-solid fa-xmark me-2"></i>Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm fw-bold">
                                        <i class="fa-solid fa-cloud-arrow-up me-2"></i>Simpan Data
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
    /* Styling agar input terlihat modern & konsisten */
    .form-control,
    .form-select {
        border-color: #e9ecef;
        padding: 0.65rem 0.9rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.08);
    }

    .input-group-text {
        border-color: #e9ecef;
    }

    /* Breadcrumb custom arrow icon */
    .breadcrumb-item+.breadcrumb-item::before {
        content: "\f105";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        font-size: 12px;
        padding-top: 4px;
    }
</style>