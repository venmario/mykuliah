<div class="container">

    <h1 class="mt-3">Kartu Hasil Studi</h1>
    <div class="row mt-5">
        <div class="col-2">
            <div class="mb-3 row">
                <h5 class="mb-3">Semester :</h5>
                <select class="form-select" aria-label="Default select example" name="idsemester" id="comboSemseter">
                    <option value="">Gasal 2021/2022</option>
                </select>
            </div>
            <div class="row mb-3">
                <button id="" type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#inputMatkulModal">Input Matkul
                </button>
            </div>
        </div>
        <div class="col-10">
            <table class="table table-dark table-hover shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">ID MK</th>
                        <th scope="col">Nama MK</th>
                        <th scope="col">SKS</th>
                        <th scope="col">NTS</th>
                        <th scope="col">NAS</th>
                        <th scope="col">NA</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php foreach ($data['matkul'] as $matkul) : ?>
                        <tr class="row-matkul cursor-pointer" data-id="<?= $matkul['id']; ?>">
                            <th scope="row"><?= $matkul['id']; ?></th>
                            <td><?= $matkul['nama']; ?></td>
                            <td><?= $matkul['jenis']; ?></td>
                            <td><?= $matkul['sks']; ?></td>
                        </tr>
                    <?php endforeach; ?> -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="inputMatkulModal" tabindex="-1" aria-labelledby="inputMatkulTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputMatkulTitle">Input Matkul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Save changes</button>
            </div>
        </div>
    </div>
</div>