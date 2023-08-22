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
                        <h4 style="color: red;">Sewa</h4>
                        <p style="color: #000;" class="mb-4"><b>Data Sewa</b></p>
                    </div>
                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table style="font-size: 12px;" id="myTable" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Boking</th>
                    <th scope="col">Username</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Total</th>
                    <th scope="col">Sisa</th>
                    <th scope="col">Bukti DP</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($sewa) == 0): ?>
                    <tr>
                        <td colspan="8" class="text-center">Maaf Data Kosong</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1;
                    foreach ($sewa as $val) {
                        $ids = $val->id_sewa; ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $val->id_sewa; ?>
                            </td>
                            <td>
                                <?php foreach ($user as $key) {
                                    if ($key->id_pelanggan == $val->id_pelanggan) {
                                        $username = $key->username;
                                        echo $key->username;
                                    }
                                } ?>
                            </td>
                            <td>
                                <?php echo 'Lapangan ' . $val->id_lapangan; ?>
                            </td>
                            <td>
                                <?php echo date_create($val->tanggal)->format('d/m/Y'); ?>
                            </td>
                            <?php foreach ($jam as $tjm) {
                                if ($tjm->id_jam == $val->id_jam) {
                                    $nm_jam = $tjm->jam;
                                    $nm_harga = $tjm->harga; ?>
                                    <td>
                                        <?php echo $tjm->jam; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($tjm->harga, 0, ',', '.'); ?>
                                    </td>
                                <?php }
                            } ?>
                            <?php foreach ($bukti as $buk) {
                                if ($buk->id_sewa == $val->id_sewa) {
                                    $idb = $buk->id_bukti;
                                    $dibayar = $buk->bayar;
                                    $tot = $buk->tot_biaya;
                                    $tgl_byr = $buk->tgl_bayar;
                                    $status_byr = $buk->status;
                                    $sisa = $buk->tot_biaya - $dibayar;
                                    $bukti_tf = $buk->bukti; ?>
                                    <td>
                                        <?php
                                        if ($status_byr == 'DP') {
                                            echo '(DP) -' . number_format($sisa, 0, ',', '.');
                                        } else {
                                            echo 'LUNAS';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a style="font-size: 10px;" href="" data-toggle="modal"
                                            data-target="#ModalEdit<?php echo '_' . $idb; ?>"
                                            class="btn btn-sm btn-outline-success">Lihat Bukti</a>
                                    </td>
                                    <!-- Modal bukti -->
                                    <div class="modal fade" id="ModalEdit<?php echo '_' . $idb; ?>" tabindex="-1"
                                        aria-labelledby="ModalJadwalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Bukti DP</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <center>
                                                        <img src="<?php echo base_url('/upload_bukti/' . $bukti_tf) ?>" alt="">
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Modal -->
                                <?php }
                            } ?>
                            <td>
                                <?php if ($val->status == 'Belum Main') { ?>
                                    <button class="btn btn-sm btn-warning">
                                        <?php echo $val->status; ?>
                                    </button>
                                <?php } elseif ($val->status == 'Sudah Main') { ?>
                                    <button class="btn btn-sm btn-success">
                                        <?php echo $val->status; ?>
                                    </button>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-danger">
                                        <?php echo $val->status; ?>
                                    </button>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-outline-dark" href="" data-toggle="modal"
                                    data-target="#ModalEdit<?php echo '_' . $ids; ?>"><i class="bi bi-pencil-square"></i></a>
                                <form method="POST" action="<?php echo site_url('admin/Manager/hapus_sewa/') ?>">
                                    <input type="hidden" name="id_sewa" value="<?php echo $ids; ?>">
                                    <input type="hidden" name="id_bukti" value="<?php echo $idb; ?>">
                                    <button type="submit" class="btn btn-outline-dark tombolkirim"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="ModalEdit<?php echo '_' . $ids; ?>" tabindex="-1"
                            aria-labelledby="ModalJadwalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-size: 18px;" class="modal-title" id="exampleModalLabel">Detail
                                            <?php echo $ids; ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form" method="POST"
                                            action="<?php echo site_url('admin/Manager/edit_status_sewa'); ?>">
                                            <p>Edit Status</p>
                                            <div class="form-row align-items-center">
                                                <div class="col-auto my-1">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Status
                                                        Main</label>
                                                    <input type="hidden" class="form-control" name="id_sewa"
                                                        value="<?php echo $ids; ?>">
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                                        name="status">
                                                        <option value="<?php echo $val->status; ?>" selected><?php echo $val->status; ?></option>
                                                        <option value="Belum Main">Belum Main</option>
                                                        <option value="Sudah Main">Sudah Main</option>
                                                        <option value="Tidak Main">Tidak Main</option>
                                                    </select>
                                                </div>
                                                <div class="col-auto my-1">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Status
                                                        Bayar</label>
                                                    <input type="hidden" class="form-control" name="id_bukti"
                                                        value="<?php echo $idb; ?>">
                                                    <input type="hidden" class="form-control" name="bayar"
                                                        value="<?php echo $tot; ?>">
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                                        name="status_byr">
                                                        <option value="<?php echo $status_byr; ?>" selected><?php echo $status_byr; ?></option>
                                                        <option value="DP">DP</option>
                                                        <option value="LUNAS">LUNAS</option>
                                                    </select>
                                                </div>
                                                <div class="col-auto my-1">
                                                    <div class="custom-control mr-sm-2 mt-3">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <hr><br><br>
                                        <form class="form" action="">
                                            <p><b>Data Sewa</b></p>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nama Pembooking</label>
                                                <input type="text" class="form-control" readonly name=""
                                                    value="<?php echo $username; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Lapangan</label>
                                                <input type="text" class="form-control" readonly name=""
                                                    value="<?php echo 'Lapangan' . $val->id_lapangan; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal & Jam</label>
                                                <input type="text" class="form-control" readonly name=""
                                                    value="<?php echo $val->tanggal . '/' . $nm_jam; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Total Bayar</label>
                                                <input type="text" class="form-control" readonly name=""
                                                    value="<?php echo number_format($nm_harga, 0, ',', '.'); ?>">
                                            </div>
                                            <p><b>Data Pembayaran</b></p>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Jumlah dibayar (DP)</label>
                                                <input type="text" class="form-control" readonly name=""
                                                    value="<?php echo number_format($dibayar, 0, ',', '.'); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Bukti</label>
                                                <img style="width: 100%; max-width: 580px; height: 500px; object-fit: contain;"
                                                    src="<?php echo base_url('/upload_bukti/' . $bukti_tf) ?>" alt="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Waktu Pembayaran</label>
                                                <input type="text" class="form-control" readonly name=""
                                                    value="<?php echo $tgl_byr; ?>">
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Modal -->
                    <?php }endif; ?>
            </tbody>
        </table>
    </div>
</section>