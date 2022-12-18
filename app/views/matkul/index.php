<div class="container mt-3">
    <span class="fs-1">Daftar Matkul</span>
    <div class="row mt-4">
        <div class="col-2"></div>
        <div class="col-10">
            <input class="form-control form-control-lg mb-3" type="text" placeholder="Cari matakuliah..." id="cariMatkul">
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h5>Filter</h5>
            <div class="mb-3 row">
                <label for="idjenis" class="col-sm-2 col-form-label">Jenis</label>
                <select class="form-select" aria-label="Default select example" name="idjenis" id="comboJenis">
                    <option value="">Semua</option>
                </select>
            </div>
            <div class="mb-3 row">
                <label for="idjenis" class="col-sm-2 col-form-label">SKS</label>
                <select class="form-select" aria-label="Default select example" name="idjenis" id="comboSks">
                    <option value="">Semua</option>
                </select>
            </div>
        </div>
        <div class="col-md-10">
            <table class="table table-dark table-hover shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Sifat</th>
                        <th scope="col">Sks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['matkul'] as $matkul) : ?>
                        <tr class="row-matkul cursor-pointer" data-id="<?= $matkul['id']; ?>">
                            <th scope="row"><?= $matkul['id']; ?></th>
                            <td><?= $matkul['nama']; ?></td>
                            <td><?= $matkul['jenis']; ?></td>
                            <td><?= $matkul['sks']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="deskripsiModal" tabindex="-1" aria-labelledby="matkulTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="matkulTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="idmatkul"></p>
                <p id="jenismatkul"></p>
                <p id="sksmatkul"></p>
                <p>Prasyarat : <span id="prasyaratmatkul" class="fw-bold"></span></p>
                <p class="fw-bolder">Deskripsi : </p>
                <p id="deskripsimatkul"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahMatkulModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Matkul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/matkul/tambah" method="POST">
                    <div class="mb-3 row">
                        <label for="inputId" class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id" id="inputId">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="inputNama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPrasyarat" class="col-sm-2 col-form-label">Prasyarat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prasyarat" id="inputPrasyarat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="idjenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="idjenis" id="selectJenis">
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="selectSks" class="col-sm-2 col-form-label">SKS</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="idsks" id="selectSks">
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsiArea" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="deskripsi" id="deskripsiArea" rows="3">Belum Ada Deskripsi</textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>