<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-md-9">
                        <h4 style="color: red;">Pelanggan</h4>
                        <p style="color: #000;" class="mb-4"><b>Data Pelanggan</b></p>
                    </div>
                    <div class="col">
                        <!-- <a class="btn btn-outline-primary" href="">Tambah +</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table id="myTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Telp</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pelanggan) == 0): ?>
                    <tr>
                        <td colspan="5" class="text-center">Maaf Data Kosong</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1;
                    foreach ($pelanggan as $val) {
                        if ($val->hak_akses == 'member') { ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $val->username; ?>
                                </td>
                                <td>
                                    <?php echo $val->nama_lengkap; ?>
                                </td>
                                <td>
                                    <?php echo $val->no_tlp; ?>
                                </td>
                                <td>Member</td>
                                <td><a class="btn btn-outline-dark tombolhapus"
                                        href="<?php echo site_url('admin/Adminpanel/hapus_pelanggan/' . $val->id_pelanggan); ?>"><i
                                            class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $val->username; ?>
                                </td>
                                <td>
                                    <?php echo $val->nama_lengkap; ?>
                                </td>
                                <td>
                                    <?php echo $val->no_tlp; ?>
                                </td>
                                <td>Pelanggan</td>
                                <td><a class="btn btn-outline-dark tombolhapus"
                                        href="<?php echo site_url('admin/Adminpanel/hapus_pelanggan/' . $val->id_pelanggan); ?>"><i
                                            class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php }
                    }
                endif; ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col">
                <a class="btn btn-outline-dark"
                    href="<?php echo site_url('admin/Adminpanel/cetak_pelanggan') ?>">Cetak</a>
            </div>
        </div>
    </div>
</section>