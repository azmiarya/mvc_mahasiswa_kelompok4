<h1>Tambah Mahasiswa</h1>
<?php Controller::flash(); ?>

<form action="<?= BASEURL; ?>/mahasiswa/store" method="POST">
    <label>NPM:</label><br>
    <input type="text" name="npm" required><br><br>

    <label>Nama Lengkap:</label><br>
    <input type="text" name="nama_lengkap" required><br><br>

    <label>Fakultas:</label><br>
    <input type="text" name="fakultas" value="FTI" readonly><br><br>

    <label>Jurusan:</label><br>
    <select name="jurusan">
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
    </select><br><br>

    <label>Tempat Lahir:</label><br>
    <input type="text" name="tempat_lahir"><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal_lahir"><br><br>

    <label>Jenis Kelamin:</label><br>
    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br><br>

    <button type="submit">Simpan Data</button>
    <a href="<?= BASEURL; ?>/mahasiswa">Batal</a>
</form>