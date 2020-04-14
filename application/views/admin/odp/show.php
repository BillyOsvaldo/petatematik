<div class="row">
    <ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Data ODP</li>
	</ol>
</div><!--/.row-->
		
<div class="row">
	<div class="col-lg-12">
        <h1 class="page-header">Data ODP Kab. Purbalingga</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="<?= site_url('/admin/odp') ?>" class="btn btn-sm btn-default">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </div>
            <div class="panel-body p-0">
                <table class="table table-hover mb-0">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="5px">:</th>
                        <td><?= md5($people->id) ?></td>
                    </tr>
                    <tr>
                        <th width="25%">NAMA ODP</th>
                        <th width="5px">:</th>
                        <td><?= $people->nama ?></td>
                    </tr>
                    <tr>
                        <th width="25%">JENIS KELAMIN</th>
                        <th width="5px">:</th>
                        <td><?= $people->jenis_kelamin ?></td>
                    </tr>
                    <tr>
                        <th width="25%">UMUR</th>
                        <th width="5px">:</th>
                        <td><?= $people->umur ?></td>
                    </tr>
                    <tr>
                        <th width="25%">NO TELP / HP</th>
                        <th width="5px">:</th>
                        <td><?= $people->no_hp ?></td>
                    </tr>
                    <tr>
                        <th width="25%">KECAMATAN</th>
                        <th width="5px">:</th>
                        <td><?= $people->subdistrict_name ?></td>
                    </tr>
                    <tr>
                        <th width="25%">KELURAHAN / DESA</th>
                        <th width="5px">:</th>
                        <td><?= $people->village_name ?></td>
                    </tr>
                    <tr>
                        <th width="25%">ALAMAT</th>
                        <th width="5px">:</th>
                        <td><?= $people->alamat ?></td>
                    </tr>
                    <tr>
                        <th width="25%">RIWAYAT PERJALANAN</th>
                        <th width="5px">:</th>
                        <td><?= $people->riwayat_perjalanan_negara ?></td>
                    </tr>
                    <tr>
                        <th width="25%">TANGGAL SAMPAI DI DAERAH</th>
                        <th width="5px">:</th>
                        <td><?= explode(" ", $people->tgl_sampai_di_indonesia)[0] ?></td>
                    </tr>
                    <tr>
                        <th width="25%">GEJALA</th>
                        <th width="5px">:</th>
                        <td><?= $people->gejala ?></td>
                    </tr>
                    <tr>
                        <th width="25%">KONDISI UMUM AKHIR</th>
                        <th width="5px">:</th>
                        <td><?= $people->kondisi_umum_akhir ?></td>
                    </tr>
                    <tr>
                        <th width="25%">TANGGAL PEMANTAUAN AWAL</th>
                        <th width="5px">:</th>
                        <td><?= $people->pemantauan_awal ?></td>
                    </tr>
                    <tr>
                        <th width="25%">TANGGAL PEMANTAIAN AKHIR</th>
                        <th width="5px">:</th>
                        <td><?= $people->pemantauan_akhir ?></td>
                    </tr>
                    <tr>
                        <th width="25%">KETERANGAN</th>
                        <th width="5px">:</th>
                        <td><?= $people->keterangan ?></td>
                    </tr>
                    <tr>
                        <th width="25%">TERDAFTAR PADA</th>
                        <th width="5px">:</th>
                        <td><?= $people->created_at ?></td>
                    </tr>
                    <tr>
                        <th width="25%">TERAKHIR DIUBAH</th>
                        <th width="5px">:</th>
                        <td><?= $people->updated_at ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>