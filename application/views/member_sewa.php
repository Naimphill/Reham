<br><br><br><br><br>
<div class="container">
    <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="section-heading">
            <center>
                <h2>Sewa Lapangan</h2>
            </center>
            <!-- <h2>Silahkan Pilih <em>Lapangan</em></h2> -->
        </div>
    </div>
    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form class="form" enctype="multipart/form-data" method="POST"
                        action="<?php echo site_url('Sewa/sv_member_sewa'); ?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ID Sewa</label>
                            <input type="text" name="" class="form-control"
                                value="<?php echo implode(',', $id_sewa); ?>" readonly>
                            <?php foreach ($id_sewa as $sewa): ?>
                                <input type="hidden" name="id_sewa[]" value="<?php echo $sewa; ?>">
                            <?php endforeach; ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" name=""
                                value="<?php echo $this->session->userdata('username'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Lapangan</label>
                            <input type="text" class="form-control" name="" value="<?php echo 'Lapangan ' . $idl; ?>"
                                readonly>
                            <input type="hidden" class="form-control" name="id_lapangan" value="<?php echo $idl; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal</label>
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                                $newTanggal = date('Y-m-d', strtotime($tgl . " +1 week")); ?>

                                <input type="text" class="form-control" name="tanggal" value="<?php echo $tgl; ?>" readonly>
                                <?php $tgl = $newTanggal;
                            }
                            ?>
                        </div>
                        <?php $total = 0;
                        $DP = 0;
                        $nm_jam = ""; // Mulai dengan string kosong
                        foreach ($idj as $val) {
                            foreach ($jam as $key) {
                                if ($key->id_jam == $val) {
                                    $DP_A = 50000;
                                    $DP = $DP + $DP_A;
                                    $total = $total + $key->harga;
                                    $nm_jam .= $key->jam . "|";
                                }
                            }
                        }
                        $total_b = $total * 4;
                        $DP_b = $DP * 4; ?>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jam</label>
                            <input type="hidden" class="form-control" name="id_jam"
                                value="<?php echo implode(',', $idj); ?>">
                            <input type="text" class="form-control" name="jam" value="<?php echo $nm_jam; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Total Bayar (Full Sebulan)</label>
                            <input type="text" class="form-control" name=""
                                value="<?php echo "Rp. " . number_format($total_b, 0, ',', '.'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Total Bayar (Perminggu)</label>
                            <input type="text" class="form-control" name=""
                                value="<?php echo "Rp. " . number_format($total, 0, ',', '.'); ?>" readonly>
                            <input type="text" class="form-control" name="tot_biaya" value="<?php echo $total; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Pembayaran</label>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bayar"
                                            value="<?php echo $DP; ?>" required>
                                        <label class="form-check-label">DP (
                                            <?php echo number_format($DP_b, 0, ',', '.'); ?>)
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bayar"
                                            value="<?php echo $total; ?>" required>
                                        <label class="form-check-label">
                                            <?php echo 'LUNAS (' . number_format($total_b, 0, ',', '.') . ')'; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1"><b>Upload Bukti</b></label>
                            <input type="file" name="bukti" class="form-control-file" id="exampleFormControlFile1"
                                required>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Kirim</button>
                        <a class="btn btn-lg btn-danger" href="<?php echo site_url('Sewa') ?>">Cancel</a>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-success">
                            <h4 style="color:#fff ;">Silahkan lakukan pembayaran DP (Wajib RP.
                                <?php echo number_format($DP_b, 0, ',', '.'); ?>) atau LUNAS
                            </h4>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body bg-danger">
                            <h1 style="color:#fff ;">Transfer Ke : </h1><br>
                            <h4 style="color:#fff ;">BCA : 8030 559 305 a/n Sri Setyo Rahayu</h4><br>
                            <button class="btn btn-primary" onclick="copyText()">Salin No.Rekening</button>
                            <div id="pesan-sukses" style="color:#fff;" class="bg-success"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>


<script>
    function copyText() {
        var text = "8030 559 305"; // ganti dengan teks yang ingin disalin
        navigator.clipboard.writeText(text);
        document.getElementById("pesan-sukses").innerHTML = "No. Rekening berhasil disalin: " + text;
        setTimeout(function () {
            document.getElementById("pesan-sukses").innerHTML = "";
        }, 3000);
    }
</script>