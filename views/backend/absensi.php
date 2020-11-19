<div class="page-header">
	<h1>
		Absensi
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			RealTime Absensi
		</small>
	</h1>
</div><!-- /.page-header -->


<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<div class="row">
			<div class="col-xs-12">
				<a href="<?= base_url('admin/absen'); ?>" role="button" data-toggle="modal" class="act-btn">
					<span class="ace-icon fa fa-refresh"></span>
				</a>
				<table id="simple-table" class="table  table-bordered table-hover">
					<thead>
						<tr>
							<th>Nip</th>
							<th>nama</th>
							<th>Email</th>
							<th>
								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
								Waktu
							</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($record as $rc) : ?>
							<tr>
								<td>
									<a href="#"><?= $rc['nip']; ?></a>
								</td>
								<td><?= $rc['name']; ?></td>
								<td><?= $rc['email']; ?></td>

								<td class="hidden-480">
									<?= $rc['time']; ?>
								</td>

								<td>
									<div class="hidden-sm hidden-xs btn-group">


										<a href="#hapus" id="hapus" data-id="<?= $rc['ID']; ?>" class="btn btn-xs btn-danger">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</a>


									</div>

									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>