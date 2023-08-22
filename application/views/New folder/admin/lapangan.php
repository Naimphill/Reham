<?php if ($this->session->flashdata('flash')): ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-md-9">
                        <h4 style="color: red;">Lapangan</h4>
                        <p style="color: #000;" class="mb-4"><b>Data Lapangan</b></p>
                    </div>
                    <div class="col">
                        <a class="btn btn-outline-primary" data-toggle="modal" data-target="#ModalTambah">Tambah
                            +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($lapangan) == 0): ?>
                    <tr>
                        <td colspan="5" class="text-center">Maaf Data Kosong</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1;
                    foreach ($lapangan as $lap) {
                        $idp = $lap->id_lapangan ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <img style="width:100%; max-width:300px; height:250px; max-height:100% ;"
                                    src="<?php echo base_url('/upload_gambar/' . $lap->foto); ?>" class="img-thumbnail"
                                    alt="<?php echo $lap->nm_lapangan; ?>">
                            </td>
                            <td>
                                <?php echo $lap->nm_lapangan; ?>

                            </td>
                            <td>
                                <?php echo $idp; ?>
                            </td>
                            <td><a class="btn btn-outline-dark" href="" data-toggle="modal"
                                    data-target="#ModalEdit<?php echo '_' . $idp; ?>"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-outline-dark tombolhapus"
                                    href="<?php echo site_url('admin/Adminpanel/hapus_lapangan/' . $idp) ?>"><i
                                        class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="ModalEdit<?php echo '_' . $idp; ?>" tabindex="-1"
                            aria-labelledby="ModalJadwalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit
                                            <?php echo $lap->nm_lapangan; ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" method="POST"
                                            action="<?php echo site_url('admin/Adminpanel/edit_lapangan'); ?>">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Kode</label>
                                                <input type="text" class="form-control" value="<?php echo $idp; ?>" disabled>
                                                <input type="hidden" class="form-control" name="id_lapangan"
                                                    value="<?php echo $idp; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nama Lapangan</label>
                                                <input type="text" class="form-control" name="nm_lapangan"
                                                    value="<?php echo $lap->nm_lapangan; ?>">
                                            </div>
                                            <div class="form-group">
                                                <p>Foto Lama</p>
                                                <img style="width:100%; max-width:300px; height:250px; max-height:100% ;"
                                                    src="<?php echo base_url('/upload_gambar/' . $lap->foto); ?>"
                                                    class="img-thumbnail" alt="<?php echo $lap->nm_lapangan; ?>">
                                                <p>*Tidak Usah upload jika tidak ingin mengganti foto</p>
                                                <label for="exampleFormControlFile1">Foto</label>
                                                <input type="file" name="foto" class="form-control-file"
                                                    id="exampleFormControlFile1">
                                            </div>
                                            <input type="hidden" name="fotolama" class="form-control-file"
                                                id="exampleFormControlFile1" value="<?php echo $lap->foto; ?>">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }endif; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Modal tambah -->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambah" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="POST"
                    action="<?php echo site_url('admin/Adminpanel/save_lapangan'); ?>">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode</label>
                        <input type="text" class="form-control" name="id_lapangan">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Lapangan</label>
                        <input type="text" class="form-control" name="nm_lapangan">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto</label>
                        <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" class="btn btn-primary">Send message</button> -->
            </div>
        </div>
    </div>
</div>