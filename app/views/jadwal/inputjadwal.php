<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 border border-1 mt-3 mb-3">
            <?php Flasher::flash(); ?>
            <form action="<?= BASEURL; ?>/jadwal/tambahjadwal" method="post">
                <div class="mb-3 mt-3"> <label class="form-label">Jenis Matkul</label>
                    <select class="form-select" id="comboJenisPerwalian">

                        <option value="">Semua</option>
                        <?php foreach ($data['jenis'] as $jenis) : ?>
                            <option value="<?= $jenis['id']; ?>"><?= $jenis['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select class="form-select" name="idmatkul" id="comboMatkul">
                        <?php foreach ($data['matkul'] as $matkul) : ?>
                            <option value="<?= $matkul['id']; ?>"><?= $matkul['id']; ?> - <?= $matkul['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">KP</label>
                    <select class="form-select" name="idkp" id="comboKp">
                        <?php foreach ($data['kp'] as $kp) : ?>
                            <option value="<?= $kp['id']; ?>"><?= $kp['kp']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <select class="form-select" name="hari" id="">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam Mulai</label>
                    <select class="form-select" name="jam_mulai" id="">
                        <?php foreach ($data['jam'] as $jam) : ?>
                            <option value="<?= $jam; ?>"><?= $jam; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam Selesai</label>
                    <select class="form-select" name="jam_selesai" id="">
                        <?php foreach ($data['jam'] as $jam) : ?>
                            <option value="<?= $jam; ?>"><?= $jam; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-dark" type="button">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>