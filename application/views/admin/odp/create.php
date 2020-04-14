<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><em class="fa fa-home"></em></a></li>
        <li>
            <a href="<?= site_url('/admin/odp') ?>">
                Data ODP
            </a>
        </li>
		<li class="active">Tambah</li>
	</ol>
</div><!--/.row-->
		
<div class="row">
	<div class="col-lg-12">
        <h1 class="page-header">Data ODP Kab. Purbalingga</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-10">
        <form action="<?= site_url('/admin/odp/store') ?>" method="post" class="panel panel-default">
            <div class="panel-heading">
                <a href="<?= site_url('/admin/odp') ?>" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save mr-2"></i>Simpan
                </button>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>DATA PRIBADI</h4>
                        <div class="form-group form-group-sm">
                            <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="jenis-kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-control" require>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group form-group-sm">
                                    <label for="umur">Umur <span class="text-danger">*</span></label>
                                    <input type="text" name="umur" class="form-control" require>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group form-group-sm">
                                    <label for="no-hp">No Telp / HP <span class="text-danger">*</span></label>
                                    <input type="text" name="no_hp" class="form-control phone" require>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-3">DOMISILI</h4>
                        <input type="hidden" name="district_id" value="33345">
                        
                        <div class="form-group form-group-sm">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="subdistrict_id" id="subdistrict_id" class="form-control" required>
                                <option value=""></option>
                                <?php foreach($subdistricts as $val) : ?>
                                    <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group form-group-sm">
                            <label for="kecamatan">Kelurahan / Desa</label>
                            <select name="village_id" id="village_id" class="form-control" disabled></select>
                        </div>

                        <div class="form-group form-group-sm">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="RT 00 RW 00">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>RIWAYAT</h4>
                        <div class="form-group form-group-sm">
                            <label for="riwayat-perjalanan">Riwayat Perjalanan</label>
                            <textarea name="riwayat_perjalanan_negara" class="form-control"></textarea>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="tanggal-sampai-indonesia">Tanggal Sampai di Indonesia / Daerah</label>
                            <input type="date" name="tgl_sampai_di_indonesia" class="form-control">
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="gejala">Gejala <span class="text-danger">*</span></label>
                            <textarea name="gejala" class="form-control" required></textarea>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="kondisi-umum-akhir">Kondisi Umum Akhir <span class="text-danger">*</span></label>
                            <textarea name="kondisi_umum_akhir" class="form-control" required></textarea>
                        </div>

                        <h4 class="mt-5">TINDAKAN</h4>
                        <div class="form-group form-group-sm">
                            <label for="tanggal-pemanatauan-awal">Tanggal Pemantauan Awal <span class="text-danger">*</span></label>
                            <input type="date" name="pemantauan_awal" class="form-control" required>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="tanggal-pemanatauan-akhir">Tanggal Pemantauan Akhir <span class="text-danger">*</span></label>
                            <input type="date" name="pemantauan_akhir" class="form-control" required>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="<?= site_url('/admin/odp') ?>" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
$('#subdistrict_id').on('change', function() {
    $.get('/admin/odp/area?parentId=' + $(this).val(),
        function(data) {
            $('#village_id').removeAttr('disabled');

            $('#village_id').html('');

            var html = $('#village_id').html();
            for (var i = 0; i < data.length; i++) {
                html = html + '<option value="' + data[i].id + '">' + data[i].name + '</option>';
            }
            $('#village_id').html(html)
        })
})
</script>
