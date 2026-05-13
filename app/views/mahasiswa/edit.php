<h1>Edit Mahasiswa</h1>
<?php Controller::flash(); ?>

<form action="<?= BASEURL; ?>/mahasiswa/update/<?= $data['mhs']['id']; ?>" method="POST">
    <label>NPM:</label><br>
    <input type="text" name="npm" value="<?= $data['mhs']['npm']; ?>" required><br><br>

    <label>Nama Lengkap:</label><br>
    <input type="text" name="nama_lengkap" value="<?= $data['mhs']['nama_lengkap']; ?>" required><br><br>

    <label>Jurusan:</label><br>
    <select name="jurusan">
        <option value="Teknik Informatika" <?= ($data['mhs']['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
        <option value="Sistem Informasi" <?= ($data['mhs']['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
    </select><br><br>

    <label>Tempat Lahir:</label><br>
    <input type="text" name="tempat_lahir" value="<?= $data['mhs']['tempat_lahir']; ?>"><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal_lahir" value="<?= $data['mhs']['tanggal_lahir']; ?>"><br><br>

    <button type="submit">Simpan Perubahan</button>
    <a href="<?= BASEURL; ?>/mahasiswa">Batal</a>
</form>