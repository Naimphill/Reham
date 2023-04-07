<br><br><br><br><br>
<div class="container">
    <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="section-heading">
            <div class="row">
                <div class="col-md-5">
                    <button class="btn btn-secondary" onclick="goBack()"> <i class="fa fa-arrow-left"></i>
                        Kembali</button>
                </div>
                <div class="col">
                    <h2>Sewa Lapangan</h2>
                </div>
            </div>
            <!-- <h2>Silahkan Pilih <em>Lapangan</em></h2> -->
        </div>
    </div>
    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form class="form" enctype="multipart/form-data" method="POST"
                        action="<?php echo site_url('Sewa/save_sewa'); ?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ID Sewa</label>
                            <input type="text" name="id_sewa" class="form-control" name="" value="<?php echo $ids; ?>"
                                readonly>
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
                            <input type="text" class="form-control" name="tanggal" value="<?php echo $tgl; ?>" readonly>
                        </div>
                        <?php foreach ($jam as $key) {
                            if ($key->id_jam == $idj) { ?>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jam</label>
                                    <input type="text" class="form-control" name="jam" value="<?php echo $key->jam; ?>"
                                        readonly>
                                    <input type="hidden" class="form-control" name="id_jam" value="<?php echo $key->id_jam; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Total Bayar</label>
                                    <input type="text" class="form-control" name=""
                                        value="<?php echo "Rp. " . number_format($key->harga, 0, ',', '.'); ?>" readonly>
                                    <input type="hidden" class="form-control" name="bayar" value="<?php echo $key->harga; ?>">
                                </div>
                            <?php }
                        } ?>
                        <div class="form-group">
                            <label for="exampleFormControlFile1"><b>Upload Bukti DP (Rp. 50.000)</b></label>
                            <input type="file" name="bukti" class="form-control-file" id="exampleFormControlFile1"
                                required>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Kirim</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-success">
                            <h4 style="color:#fff ;">Silahkan lakukan pembayaran DP untuk memboking lapangan</h4>
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