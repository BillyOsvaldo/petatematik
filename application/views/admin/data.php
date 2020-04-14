<div class="row">
    <ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Edit Data</li>
	</ol>
</div><!--/.row-->
		
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
            Data Kec. <?= $data->name ?>
        </h1>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="<?= site_url('/admin/data/update/' . md5($data->id)) ?>" method="post">
            <table class="table table-striped table-hover">
                <tr>
                    <td colspan="3">
                        <a href="<?= site_url('/admin/dashboard') ?>" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp; SIMPAN
                        </button>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="25%" style="vertical-align:middle">Orang Dalam Pemantauan (ODP)</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="odp" value="<?= $data->odp ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">Selesai Pemantauan (SP)</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="selesai_pemantauan" value="<?= $data->selesai_pemantauan ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">Dalam Pemantauan (DP)</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="dalam_pemantauan" value="<?= $data->dalam_pemantauan ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">Pasien Dalam Pemantauan (PDP)</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="pdp" value="<?= $data->pdp ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">PDP-Negatif</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="pdp_negatif" value="<?= $data->pdp_negatif ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">PDP-Sembuh</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="pdp_sembuh" value="<?= $data->pdp_sembuh ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">PDP-Dirawat</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="pdp_dirawat" value="<?= $data->pdp_dirawat ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">PDP-Meninggal</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="pdp_meninggal" value="<?= $data->pdp_meninggal ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">Positif Covid-19</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="positif" value="<?= $data->positif ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">Positif Dirawat</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="positif_dirawat" value="<?= $data->positif_dirawat ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">Positif Sembuh</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="positif_sembuh" value="<?= $data->positif_sembuh ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td width="25%" style="vertical-align:middle">Positif Meninggal</td>
                    <td width="5px" style="vertical-align:middle">:</td>
                    <td width="25%">
                        <div class="form-group form-group-sm" style="margin-bottom:0">
                            <input type="text" name="positif_meninggal" value="<?= $data->positif_meninggal ?>" class="form-control mb-0">
                        </div>
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</div>