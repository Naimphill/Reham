<?php if ($this->session->flashdata('flash')): ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="color: red;">Sewa</h4>
                        <p style="color: #000;" class="mb-4"><b>Laporan Sewa</b></p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <form class="form mt-5" method="POST"
                                action="<?php echo site_url('admin/Adminpanel/laporancari/') ?>">
                                <div class="row">
                                    <?php
                                    if (isset($tgl_mulai) && isset($tgl_akhir)) { ?>
                                        <div class="col-md-4">
                                            <label for="" class="form-control">Dari</label>
                                            <input style="font-size: 12px;" type="date" class="form-control datepicker"
                                                name="tanggal_mulai" value="<?php echo $tgl_mulai; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="form-control">Sampai</label>
                                            <input style="font-size: 12px;" type="date" class="form-control datepicker"
                                                name="tanggal_akhir" value="<?php echo $tgl_akhir; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary mt-3">Cari</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-4">
                                            <label for="" class="form-control">Dari</label>
                                            <input style="font-size: 12px;" type="date" class="form-control datepicker"
                                                name="tanggal_mulai" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="form-control">Sampai</label>
                                            <input style="font-size: 12px;" type="date" class="form-control datepicker"
                                                name="tanggal_akhir" required>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary mt-3">Cari</button>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                                <div class="row mt-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table style="font-size:14px;" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Invoice</th>
                    <th scope="col">ID Boking</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Total</th>
                    <th scope="col">Dibayar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($bukti) == 0): ?>
                    <tr>
                        <td colspan="8" class="text-center">Maaf Data Kosong</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1;
                    $total = 0; // variabel untuk menyimpan total jumlah datanya
                    $bukti_bayar = 0;
                    foreach ($bukti as $buk) {
                        $id_bukti = $buk->id_bukti;
                        $dibayar = $buk->bayar;
                        $bukti_bayar += $dibayar;
                        $tot_b = $buk->tot_biaya;
                        $total += $tot_b; // menambahkan nilai $tot_b ke variabel $total
                        $tanggal = date('Y-m-d', strtotime($buk->tgl_bayar)); // mengambil data tanggal dengan format Y-m-d
                        ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $id_bukti; ?>
                            </td>
                            <td>
                                <?php echo $buk->id_sewa; ?>
                            </td>
                            <td>
                                <?php
                                foreach ($sewa as $val) {
                                    $ids = $val->id_sewa;
                                    if ($buk->id_sewa == $ids) {
                                        foreach ($user as $key) {
                                            if ($key->id_pelanggan == $val->id_pelanggan) {
                                                $username = $key->username;
                                                echo $key->username;
                                            }
                                        }
                                    }
                                }
                                ?>
                            </td>

                            <td>
                                <?php echo date('d-m-Y', strtotime($buk->tgl_bayar)); ?>
                            </td>
                            <td>
                                <?php echo number_format($tot_b, 0, ',', '.'); ?>
                            </td>
                            <td>
                                <?php echo number_format($buk->bayar, 0, ',', '.'); ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5">
                            <?php $no = $no - 1;
                            echo 'Total ' . $no . ' Transaksi '; ?>
                        </td>
                        <td class="bg-success">
                            <?php echo 'Rp. ' . number_format($total, 0, ',', '.'); ?>
                        </td>
                        <td class="bg-warning">
                            <?php echo 'Rp. ' . number_format($bukti_bayar, 0, ',', '.'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">Sisa</td>
                        <td class="bg-danger">
                            <?php $sub_total = $total - $bukti_bayar;
                            echo 'Rp. -' . number_format($sub_total, 0, ',', '.'); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php if (isset($tgl_mulai) && isset($tgl_akhir)) { ?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <form class="form mt-5" method="POST" action="<?php echo site_url('admin/Manager/cetak_laporan/') ?>"
                        target="_blank">
                        <div class="row">
                            <div class="col-md-5">
                                <input style="font-size: 12px;" type="hidden" class="form-control datepicker"
                                    name="tanggal_mulai" value="<?php echo $tgl_mulai; ?>">
                            </div>
                            <div class="col-md-5">
                                <input style="font-size: 12px;" type="hidden" class="form-control datepicker"
                                    name="tanggal_akhir" value="<?php echo $tgl_akhir; ?>">
                            </div>
                            <input type="hidden" name="status" value="Semua">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-dark">Cetak (Semua)</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <form class="form mt-5" method="POST" action="<?php echo site_url('admin/Manager/cetak_laporan/') ?>"
                        target="_blank">
                        <div class="row">
                            <div class="col-md-5">
                                <input style="font-size: 12px;" type="hidden" class="form-control datepicker"
                                    name="tanggal_mulai" value="<?php echo $tgl_mulai; ?>">
                            </div>
                            <div class="col-md-5">
                                <input style="font-size: 12px;" type="hidden" class="form-control datepicker"
                                    name="tanggal_akhir" value="<?php echo $tgl_akhir; ?>">
                            </div>
                            <input type="hidden" name="status" value="Sudah Main">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-dark">Cetak (sudah Main)</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <form class="form mt-5" method="POST" action="<?php echo site_url('admin/Manager/cetak_laporan/') ?>"
                        target="_blank">
                        <div class="row">
                            <div class="col-md-5">
                                <input style="font-size: 12px;" type="hidden" class="form-control datepicker"
                                    name="tanggal_mulai" value="<?php echo $tgl_mulai; ?>">
                            </div>
                            <div class="col-md-5">
                                <input style="font-size: 12px;" type="hidden" class="form-control datepicker"
                                    name="tanggal_akhir" value="<?php echo $tgl_akhir; ?>">
                            </div>
                            <input type="hidden" name="status" value="Belum Main">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-dark">Cetak (Belum Main)</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <form class="form mt-5" method="POST" action="<?php echo site_url('admin/Owner/cetak_laporan/') ?>"
                        target="_blank">
                        <div class="row">
                            <div class="col-md-5">
                                <input style="font-size: 12px;" type="hidden" class="form-control datepicker"
                                    name="tanggal_mulai" value="<?php echo $tgl_mulai; ?>">
                            </div>
                            <div class="col-md-5">
                                <input style="font-size: 12px;" type="hidden" class="form-control datepicker"
                                    name="tanggal_akhir" value="<?php echo $tgl_akhir; ?>">
                            </div>
                            <input type="hidden" name="status" value="Tidak Main">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-dark">Cetak (Tidak Main)</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        <?php } ?>
    </div>
</section>