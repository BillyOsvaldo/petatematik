<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Peta Sebaran Data COVID-19 Kabupaten Purbalingga</title>

	<link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/assets/plugins/fontawesome/css/all.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/assets/plugins/leaflet/leaflet.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/assets/css/app.css') ?>">

	<script src="<?= base_url('/assets/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('/assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('/assets/js/slimscroll.min.js') ?>"></script>
	<script src="<?= base_url('/assets/js/init.js') ?>"></script>

	<script src="<?= base_url('/assets/plugins/leaflet/leaflet.js') ?>"></script>
	<script src="<?= base_url('/assets/data/purbalingga.geojson') ?>"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 p-0 map-content">
				<div class="mb-2">
					<h3 class="text-center pt-3 mb-0">
						PETA SEBARAN COVID-19 <br />
						DI KABUPATEN PURBALINGGA <br />
					</h3>
					<p class="text-center">Sumber Data : Dinas Kesehatan Provinsi Jawa Tengah</p>
				</div>

				<div class="card">
					<div class="card-body p-1">
						<div id="map"></div>		
					</div>
				</div>

				<div class="keterangan row mt-1">
					<h4 class="text-red mb-0 col-2">KETERANGAN:</h4>
					<ul class="col-10 mb-2">
						<li>Setiap Titik Merujuk Pada Titik Acak Dalam Area Kecamatan (Bukan titik lokasi tempat tinggal pasien/orang)</li>
						<li>Warna kuning pada peta menunjukan bahwa terdapat kasus Pasien Dalam Pemantauan (PDP) COVID-19 di wilayah kecamatan tersebut.</li>
						<li>Warna Merah pada peta menunjukan bahwa terdapat kasus POSITIF COVID-19 di wilayah kecamatan tersebut</li>
						<li>Data yang ditampilkan dalam peta terus diperbaharui sesuai dengan informasi yang diterima dari Dinas Kesehatan Kabupaten Purbalingga</li>
					</ul>
					<div class="col-12">
						<p class="text-center text-secondary">Dikembangkan oleh DINKOMINFO Kabupaten Purbalingga</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 p-0 px-3 pt-3">
				<h3 class="px-2 pb-2">
					<p class="text-center mb-0">
						<img src="https://upload.wikimedia.org/wikipedia/id/9/9c/Kabupaten_purbalingga.png" alt="logo-purbalingga" width="80px" class="mb-2">
					</p>
					<div class="text-center">
						KASUS COVID-19<br />KABUPATEN PURBALINGGA
					</div>
				</h3>

				<div class="row mb-3">
					<div class="col-12 text-center">
						<a href="<?= site_url() ?>" class="btn btn-outline-secondary btn-sm">
							<p><i class="fa fa-home"></i></p>
						</a>
						<a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target=".info-modal">
							<p><span class="fa fa-info-circle mr-1"></span> Baca Info</p>
						</a>
						<a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target=".data-modal">
							<p><span class="fa fa-info-circle mr-1"></span> Data per Kecamatan</p>
						</a>
					</div>
				</div>

				<div class="row mx-0 mb-1">
					<div class="col-12 px-2">
						<div class="resume px-2 pl-4 py-3 bg-indigo text-right text-white">
							<div class="row">
								<div class="col-2 pt-1">
									<i class="fa fa-frown-open fa-2x"></i>
								</div>
								<div class="col-9">
									<div class="small">Total ODP</div>
									<div class="big"><?= $this->summary->count('odp')->count ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row mx-0 mb-2">
					<div class="col-6 px-1">
						<div class="resume px-1 py-3 bg-rebecca-purple text-center text-white">
							<div class="small">Dalam Pemantauan</div>
							<div class="big"><?= $this->summary->count('dalam_pemantauan')->count ?></div>
						</div>
					</div>
					<div class="col-6 px-1">
						<div class="resume px-1 py-3 bg-info text-center text-white">
							<div class="small">Selesai Pemantauan</div>
							<div class="big"><?= $this->summary->count('selesai_pemantauan')->count ?></div>
						</div>
					</div>
				</div>

				<div class="row mx-0 mb-1">
					<div class="col-12 px-2">
						<div class="resume px-2 pl-4 py-3 bg-orange text-right text-white">
							<div class="row">
								<div class="col-2 pt-1">
									<i class="fa fa-tired fa-2x"></i>
								</div>
								<div class="col-9">
									<div class="small">Total PDP</div>
									<div class="big"><?= $this->summary->count('pdp')->count ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row mx-0 mb-2">
					<div class="col-3 px-1">
						<div class="resume px-1 py-3 bg-purple text-center text-white">
							<div class="small">Negatif</div>
							<div class="big"><?= $this->summary->count('pdp_negatif')->count ?></div>
						</div>
					</div>
					<div class="col-3 px-1">
						<div class="resume px-1 py-3 bg-dark-orange text-center text-white">
							<div class="small">Dirawat</div>
							<div class="big"><?= $this->summary->count('pdp_dirawat')->count ?></div>
						</div>
					</div>
					<div class="col-3 px-1">
						<div class="resume px-1 py-3 bg-forest-green text-center text-white">
							<div class="small">Sembuh</div>
							<div class="big"><?= $this->summary->count('pdp_sembuh')->count ?></div>
						</div>
					</div>
					<div class="col-3 px-1">
						<div class="resume px-1 py-3 bg-tomato text-center text-white">
							<div class="small">Meninggal</div>
							<div class="big"><?= $this->summary->count('pdp_meninggal')->count ?></div>
						</div>
					</div>
				</div>

				<div class="row mx-0 mb-1">
					<div class="col-12 px-2">
						<div class="resume px-2 pl-4 py-3 bg-danger text-right text-white">
							<div class="row">
								<div class="col-2 pt-1">
									<i class="fa fa-sad-tear fa-2x"></i>
								</div>
								<div class="col-9">
									<div class="small">Positif Covid-19</div>
									<div class="big"><?= $this->summary->count('positif')->count ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row mx-0">
					<div class="col-4 px-1">
						<div class="resume px-1 py-3 bg-sandy-brown text-center text-white">
							<div class="small">Dirawat</div>
							<div class="big"><?= $this->summary->count('positif_dirawat')->count ?></div>
						</div>
					</div>
					<div class="col-4 px-1">
						<div class="resume px-1 py-3 bg-success text-center text-white">
							<div class="small">Sembuh</div>
							<div class="big"><?= $this->summary->count('positif_sembuh')->count ?></div>
						</div>
					</div>
					<div class="col-4 px-1">
						<div class="resume px-4 py-3 bg-tomato text-center text-white">
							<div class="small">Meninggal</div>
							<div class="big"><?= $this->summary->count('positif_meninggal')->count ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade info-modal" tabindex="-1" role="dialog" aria-labelledby="info-modal" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<span class="fa fa-info-circle mr-2"></span> Informasi
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php $this->load->view('info-text'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade data-modal" tabindex="-1" role="dialog" aria-labelledby="data-modal" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<span class="fa fa-table mr-2"></span> Data Per Kecamatan
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#ringkasan" role="tab" aria-controls="ringkasan" aria-selected="true">Ringkasan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#odp" role="tab" aria-controls="odp" aria-selected="true">ODP</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#pdp" role="tab" aria-controls="pdp" aria-selected="true">PDP</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#positif" role="tab" aria-controls="positif" aria-selected="false">Positif Covid-19</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="ringkasan" role="tabpanel" aria-labelledby="ringkasan">
							<table class="table table-sm table-bordered table-striped mt-2">
								<thead>
									<tr>
										<th width="30px">No</th>
										<th>Kecamatan</th>
										<th width="80px">ODP</th>
										<th width="80px">PDP</th>
										<th width="80px">Positif</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($this->summary->all() as $key => $val) : ?>
										<tr>
											<td class="text-center"><?= $val->id ?>.</td>
											<td><?= $val->name ?></td>
											<td class="text-right"><?= $val->odp ?></td>
											<td class="text-right"><?= $val->pdp ?></td>
											<td class="text-right"><?= $val->positif ?></td>
										</tr>
									<?php endforeach;?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="2">TOTAL</th>
										<th class="text-right"><?= $this->summary->count('odp')->count ?></th>
										<th class="text-right"><?= $this->summary->count('pdp')->count ?></th>
										<th class="text-right"><?= $this->summary->count('positif')->count ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
						
						<div class="tab-pane fade show" id="odp" role="tabpanel" aria-labelledby="odp">
							<table class="table table-sm table-bordered table-striped mt-2">
								<thead>
									<tr>
										<th rowspan="2" width="30px" class="align-middle align-center">No</th>
										<th rowspan="2" style="vertical-align:middle">Kecamatan</th>
										<th colspan="4" style="text-align:center">ODP</th>
									</tr>
									<tr>
										<th width="100px" style="text-align:center">Selesai Pemantauan</th>
										<th width="100px" style="text-align:center">Dalam Pemantauan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($this->summary->all() as $key => $val) : ?>
										<tr>
											<td class="text-center"><?= $val->id ?>.</td>
											<td><?= $val->name ?></td>
											<td class="text-right"><?= $val->selesai_pemantauan ?></td>
											<td class="text-right"><?= $val->dalam_pemantauan ?></td>
										</tr>
									<?php endforeach;?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="2">TOTAL</th>
										<th class="text-right"><?= $this->summary->count('selesai_pemantauan')->count ?></th>
										<th class="text-right"><?= $this->summary->count('dalam_pemantauan')->count ?></th>
									</tr>
								</tfoot>
							</table>
						</div>

						<div class="tab-pane fade show" id="pdp" role="tabpanel" aria-labelledby="pdp">
							<table class="table table-sm table-bordered table-striped mt-2">
								<thead>
									<tr>
										<th rowspan="2" width="30px" class="align-middle align-center">No</th>
										<th rowspan="2" style="vertical-align:middle">Kecamatan</th>
										<th colspan="4" style="text-align:center">PDP</th>
									</tr>
									<tr>
										<th width="80px" style="text-align:center">Negatif</th>
										<th width="80px" style="text-align:center">Dirawat</th>
										<th width="80px" style="text-align:center">Sembuh</th>
										<th width="80px" style="text-align:center">Meninggal</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($this->summary->all() as $key => $val) : ?>
										<tr>
											<td class="text-center"><?= $val->id ?>.</td>
											<td><?= $val->name ?></td>
											<td class="text-right"><?= $val->pdp_negatif ?></td>
											<td class="text-right"><?= $val->pdp_dirawat ?></td>
											<td class="text-right"><?= $val->pdp_sembuh ?></td>
											<td class="text-right"><?= $val->pdp_meninggal ?></td>
										</tr>
									<?php endforeach;?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="2">TOTAL</th>
										<th class="text-right"><?= $this->summary->count('pdp_negatif')->count ?></th>
										<th class="text-right"><?= $this->summary->count('pdp_dirawat')->count ?></th>
										<th class="text-right"><?= $this->summary->count('pdp_sembuh')->count ?></th>
										<th class="text-right"><?= $this->summary->count('pdp_meninggal')->count ?></th>
									</tr>
								</tfoot>
							</table>
						</div>

						<div class="tab-pane fade" id="positif" role="tabpanel" aria-labelledby="positif">
							<table width="100%" class="table table-sm table-bordered table-striped mt-2">
								<thead>
									<tr>
										<th rowspan="2" width="30px" class="align-middle align-center">No</th>
										<th rowspan="2" style="vertical-align:middle">Kecamatan</th>
										<th colspan="3" style="text-align:center">Positif Covid-19</th>
									</tr>
									<tr>
										<th width="100px" style="text-align:center">Sembuh</th>
										<th width="100px" style="text-align:center">Dirawat</th>
										<th width="100px" style="text-align:center">Meninggal</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($this->summary->all() as $key => $val) : ?>
										<tr>
											<td class="text-center"><?= $val->id ?>.</td>
											<td><?= $val->name ?></td>
											<td class="text-right"><?= $val->positif_sembuh ?></td>
											<td class="text-right"><?= $val->positif_dirawat ?></td>
											<td class="text-right"><?= $val->positif_meninggal ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="2">TOTAL</th>
										<th class="text-right"><?= $this->summary->count('positif_sembuh')->count ?></th>
										<th class="text-right"><?= $this->summary->count('positif_dirawat')->count ?></th>
										<th class="text-right"><?= $this->summary->count('positif_meninggal')->count ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('/assets/js/app.js') ?>"></script>
</body>
</html>