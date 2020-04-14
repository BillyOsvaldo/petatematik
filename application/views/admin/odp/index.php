<div class="row">
    <ol class="breadcrumb">
		<li><a href="#"><em class="fa fa-home"></em></a></li>
		<li class="active">Data ODP</li>
	</ol>
</div><!--/.row-->
		
<div class="row">
	<div class="col-lg-8">
        <h1 class="page-header">Data ODP Kab. Purbalingga</h1>
    </div>
    <div class="col-lg-4 text-right pt-5">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import-modal">
            <i class="fa fa-download"></i>&nbsp; IMPORT
        </a>
        <a href="<?= site_url('admin/odp/create') ?>" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i>&nbsp; TAMBAH
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered datatable">
            <thead>
                <tr>
                    <th class="no-sort"></th>
                    <th>Nama</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan/Desa</th>
                    <th class="no-sort">Alamat</th>
                    <th class="no-sort">Kondisi Umum</th>
                    <th>Pemantauan Awal</th>
                    <th>Pemantauan Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($peoples as $key => $val) : ?>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default btn-xs" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= site_url('/admin/odp/show/'.md5($val->id)) ?>"><i class="fa fa-search mr-3"></i>Lihat</a></li>
                                    <?php if ($val->data_id != null) : ?><li><a href="<?= site_url('/admin/odp/edit/'.md5($val->id)) ?>"><i class="fa fa-edit mr-3"></i>Ubah</a></li><?php endif; ?>
                                    <?php if ($val->data_id != null) : ?><li><a href="javascript:" onclick="onDeleted('<?= site_url('/admin/odp/delete/'.md5($val->id)) ?>')"><i class="fa fa-trash-o mr-3"></i>Hapus</a></li><?php endif; ?>
                                </ul>
                            </div>
                        </td>
                        <td><?= $val->nama ?></td>
                        <td><?= $val->subdistrict_name ?></td>
                        <td><?= $val->village_name ?></td>
                        <td><?= $val->alamat ?></td>
                        <td><?= $val->kondisi_umum_akhir ?></td>
                        <td><?= explode(" ", $val->pemantauan_awal)[0] ?></td>
                        <td><?= explode(" ", $val->pemantauan_akhir)[0] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="import-modal" tabindex="-1" role="dialog" aria-labelledby="import-modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= site_url('admin/odp/imported') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="import-modal-label">
                        <i class="fa fa-download mr-2"></i>IMPORT MODAL
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-sm">
                        <input type="file" name="files" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="sumbit" class="btn btn-primary"><i class="fa fa-download mr-2"></i>Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="<?= base_url('assets/plugins/datatables/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet" >
<link href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" >

<script src="<?= base_url('assets/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>

<script type="text/javascript">
$('.datatable').DataTable({});
$('#DataTables_Table_0_filter').addClass('form-group form-group-sm pull-right');

function onDeleted(url) {
    Swal.fire({
        title: 'Hapus Data',
        text: "Apakah anda akan menghapus data?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            location.href=url;
        }
    })
}
</script>

<?php if ($this->session->flashdata('success')) : ?>
<script>Swal.fire('Berhasil','','success')</script>
<?php endif; ?>