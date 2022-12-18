<!-- <?php var_dump($data); ?> -->
<div class="container">
    <p class="fs-1">Perwalian</p>

    <div class="row">
        <div class="col-lg-3">
            <h2>Input Matkul</h2>
            <div class="row border border-2 border-dark rounded">
                <div class="mb-3 mt-3">
                    <label class="form-label">Jenis Matkul</label>
                    <select class="form-select" id="comboJenisPerwalian">
                        <option value="">Semua</option>
                        <?php foreach ($data['jenis'] as $jenis) : ?>
                            <option value="<?= $jenis['id']; ?>"><?= $jenis['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select class="form-select" id="comboMatkul">
                        <?php foreach ($data['matkul'] as $matkul) : ?>
                            <option value="<?= $matkul['id']; ?>"><?= $matkul['id']; ?> - <?= $matkul['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-dark" id="btnCariJadwal" type="button">Cari</button>
                </div>
                <div class="mb-3">
                    <label class="form-label bg-danger p-1 rounded text-light" id="labelUjian">-</label>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <label class="col-2 col-form-label">KP</label>
                        <div class="col-10">
                            <select class="form-select" id="comboKP" aria-label="Default select example">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label bg-success p-1 rounded text-light visually-hidden" id="labelJadwal"></label>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-dark active visually-hidden" id="btnpilih" type="button">Pilih</button>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <h2>Jadwal Kuliah</h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <td width="150">Jam</td>
                        <td>Senin</td>
                        <td>Selasa</td>
                        <td>Rabu</td>
                        <td>Kamis</td>
                        <td>Jumat</td>
                        <td>Sabtu</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($data['rentangjam'] as $index => $jam) {
                        if ($index == 6) {
                            $i++;
                        }
                        echo '<tr>
                            <td>' . $jam . '</td>
                            <td hari="senin:' . $data['jam'][$i] . '"></td>
                            <td hari="selasa:' . $data['jam'][$i] . '"></td>
                            <td hari="rabu:' . $data['jam'][$i] . '"></td>
                            <td hari="kamis:' . $data['jam'][$i] . '"></td>
                            <td hari="jumat:' . $data['jam'][$i] . '"></td>
                            <td hari="sabtu:' . $data['jam'][$i] . '"></td>
                        </tr>';
                        $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>