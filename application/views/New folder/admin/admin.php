<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mx-auto">
                <h4 style="color: red;">Adminpanel</h4>
                <p style="color: #000;" class="mb-4"><b>Home</b></p>
                <div class="row">
                    <div class="col">
                        <a href="#">
                            <div class="card text-white bg-danger mb-3" style="max-width: 50rem;">
                                <div class="card-body text-center">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $hari_ini = date('d-m-Y');
                                    $hari = date('Y-m-d');
                                    $jml = 0;
                                    $total = 0;
                                    foreach ($bukti as $key) {
                                        $tanggal = date('Y-m-d', strtotime($key->tgl_bayar)); // ambil tanggal saja
                                        if ($tanggal == $hari) {
                                            $tot_b = $key->tot_biaya;
                                            $total += $tot_b; // menambahkan nilai $tot_b ke variabel $total
                                            $jml++;
                                        }
                                    }
                                    ?>
                                    <h7 style="color: #fff;" class="mb-4 mt-4 card-title">Pendapatan Hari Ini <br>
                                        <span>
                                            <?php echo '(' . $hari_ini . ')'; ?>
                                        </span>
                                    </h7>
                                    <p style="color: #fff;" class="mt-4">
                                        <?php echo 'Rp. ' . number_format($total, 0, ',', '.'); ?>
                                    </p>
                                    <p style="color: #fff;" class="mb-4 mt-4">Transaski :
                                        <?php echo $jml; ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#">
                            <div class="card text-white bg-danger mb-3" style="max-width: 50rem;">
                                <div class="card-body text-center">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $bulan_ini = date('m-Y'); // ambil bulan dan tahun saja
                                    $bulan = date('Y-m');
                                    $jml = 0;
                                    $total = 0;
                                    foreach ($bukti as $key) {
                                        $tanggal = date('Y-m', strtotime($key->tgl_bayar)); // ambil bulan dan tahun saja
                                        if ($tanggal == $bulan) {
                                            $tot_b = $key->tot_biaya;
                                            $total += $tot_b;
                                            $jml++;
                                        }
                                    }
                                    ?>
                                    <h7 style="color: #fff;" class="mb-4 mt-4 card-title">Pendapatan Bulan Ini <br>
                                        <span>
                                            <?php echo '(' . $bulan_ini . ')'; ?>
                                        </span>
                                    </h7>

                                    <p style="color: #fff;" class="mt-4">
                                        <?php echo 'Rp. ' . number_format($total, 0, ',', '.'); ?>
                                    </p>
                                    <p style="color: #fff;" class="mb-4 mt-4">Transaski :
                                        <?php echo $jml; ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>