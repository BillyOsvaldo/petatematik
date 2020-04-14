<div class="row">
    <ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Dashboard</li>
	</ol>
</div><!--/.row-->
		
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Kasus Covid-19 Kab. Purbalingga</h1>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th rowspan="2" width="3%"></th>
                    <th rowspan="2">Kecamatan</th>
                    <th colspan="3" class="text-center">ODP</th>
                    <th colspan="5" class="text-center">PDP</th>
                    <th colspan="4" class="text-center">POSITIF COVID-19</th>
                </tr>
                <tr>
                    <th width="7%">SP</th>
                    <th width="7%">DP</th>
                    <th width="7%">Jumlah</th>
                    
                    <th width="7%">Negatif</th>
                    <th width="7%">Sembuh</th>
                    <th width="7%">Dirawat</th>
                    <th width="7%">Meninggal</th>
                    <th width="7%">Jumlah</th>

                    <th width="7%">Dirawat</th>
                    <th width="7%">Sembuh</th>
                    <th width="7%">Meninggal</th>
                    <th width="7%">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $val) : ?>
                    <tr>
                        <td>
                            <a href="<?= site_url('/admin/data/edit/' . md5($val->id)) ?>" class="text-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td><?= $val->name ?></td>
                        <td><?= $val->selesai_pemantauan ?></td>
                        <td><?= $val->dalam_pemantauan ?></td>
                        <td><?= $val->odp ?></td>
                        <td><?= $val->pdp_negatif ?></td>
                        <td><?= $val->pdp_sembuh ?></td>
                        <td><?= $val->pdp_dirawat ?></td>
                        <td><?= $val->pdp_meninggal ?></td>
                        <td><?= $val->pdp ?></td>
                        <td><?= $val->positif_dirawat ?></td>
                        <td><?= $val->positif_sembuh ?></td>
                        <td><?= $val->positif_meninggal ?></td>
                        <td><?= $val->positif ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <th><?= $this->summary->count('selesai_pemantauan')->count ?></th>
                    <th><?= $this->summary->count('dalam_pemantauan')->count ?></th>
                    <th><?= $this->summary->count('odp')->count ?></th>
                    <th><?= $this->summary->count('pdp_negatif')->count ?></th>
                    <th><?= $this->summary->count('pdp_sembuh')->count ?></th>
                    <th><?= $this->summary->count('pdp_dirawat')->count ?></th>
                    <th><?= $this->summary->count('pdp_meninggal')->count ?></th>
                    <th><?= $this->summary->count('pdp')->count ?></th>
                    <th><?= $this->summary->count('positif_dirawat')->count ?></th>
                    <th><?= $this->summary->count('positif_sembuh')->count ?></th>
                    <th><?= $this->summary->count('positif_meninggal')->count ?></th>
                    <th><?= $this->summary->count('positif')->count ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>