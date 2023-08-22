<?php if ($this->session->flashdata('flash')) : ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-md-9">
                        <h4 style="color: red;">Pengguna</h4>
                        <p style="color: #000;" class="mb-4"><b>Data Pengguna</b></p>
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
                    <th scope="col">Username</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pengguna) == 0) : ?>
                    <tr>
                        <td colspan="5" class="text-center">Maaf Data Kosong</td>
                    </tr>
                <?php else : ?>
                    <?php $no = 1;
                    foreach ($pengguna as $val) {
                        $idp = $val->id_pengguna ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $val->username; ?>

                            </td>
                            <td>
                                <?php echo $val->hak_akses; ?>
                            </td>
                            <td>
                                <a class="btn btn-outline-dark" href="" data-toggle="modal" data-target="#ModalEdit<?php echo '_' . $idp; ?>"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-outline-dark tombolhapus" href="<?php echo site_url('admin/Manager/hapus_pengguna/' . $idp) ?>"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="ModalEdit<?php echo '_' . $idp; ?>" tabindex="-1" aria-labelledby="ModalJadwalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit
                                            <?php echo $val->username; ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" method="POST" action="<?php echo site_url('admin/Manager/edit_pengguna'); ?>">
                                            <input type="hidden" name="id_pengguna" value="<?php echo $idp; ?>">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Username</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $val->username; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Hak Akses</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="hak_akses">
                                                    <option value="<?php echo $val->hak_akses; ?>"><?php echo $val->hak_akses; ?></option>
                                                    <option value="admin">Admin</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="owner">Owner</option>
                                                </select>
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
                <?php }
                endif; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Modal tambah -->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambah" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="POST" action="<?php echo site_url('admin/Manager/save_pengguna'); ?>">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Hak Akses</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="hak_akses">
                            <option value="">--PILIH--</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="owner">Owner</option>
                        </select>
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