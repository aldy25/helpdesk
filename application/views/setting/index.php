<div class="container-fluid">
	<h1 class="h3 mb-3 text-gray-800 font-weight-bold"><?= $title; ?></h1>

	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('status') ?>"></div>

	<!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="100">#</th>
							<th>Grup</th>
                            <th>Variable</th>
                            <th>Value</th>
                            <th>Deskripsi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($setting as $row) { ?>
							<tr>
								<td><?= $no ?></td>
                                <td><?= $row->group_setting ?></td>
								<td><?= $row->variable_setting ?></td>
                                <td><?= $row->value_setting ?></td>
                                <td><?= $row->deskripsi_setting ?></td>
								<td>
									<a href="<?= site_url('setting/edit/' . $row->id) ?>" data-toggle="tooltip" title="Edit Pengaturan" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i>
									</a>
									
								</td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	const flashData = $('.flash-data').data('flashdata');
	if (flashData) {
		Swal.fire(
			'Sukses!',
			'Pengaturan berhasil ' + flashData,
			'success'
		)
	}
</script>