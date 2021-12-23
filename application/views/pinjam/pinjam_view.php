<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-edit" style="color:green"> </i> <?= $title_web; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web; ?></li>
		</ol>
	</section>
	<?php if ($this->session->userdata('level') == 'Anggota') { ?>
		<section class="content-header">
			<div class="col-sm-3">
				<div class="alert bg-yellow">
					<h4>Tanggal<i class="pull-right fa fa-calendar"></i></h4>
					<span class="d-block"> <?= strftime('%A, %d %B %Y') ?></span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert bg-red">
					<h4>Jam<i class="pull-right fa fa-clock-o"></i></h4>
					<span class="d-block"> <span class="jam"><?= date('H:i:s') ?></span></span>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php if ($this->session->userdata('pwsn') == 'notif') {
		$d = $this->db->query("SELECT * FROM tbl_login WHERE id_login = '$idbo'")->row();
	?>
		<div class="error" data-error="<?= $this->session->userdata('pwsn'); ?>" data-gambar="<?= $d->nama ?>"></div>

	<?php $this->session->set_userdata('pwsn', '');
	} ?>
	<section class="content">
		<?php if (!empty($this->session->flashdata())) {
			echo $this->session->flashdata('pesan');
			$this->session->set_flashdata('pesan', '');
		} ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border"><?php if ($this->session->userdata('level') == 'Petugas') { ?>
							<a href="transaksi/pinjam"><button class="btn btn-primary">
									<i class="fa fa-plus"> </i> Tambah Pinjam</button></a><?php } ?>

					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<br />
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped table" width="100%">
								<thead>
									<tr>
										<?php if ($this->session->userdata('level') == 'Petugas') { ?>

											<th>No</th>
											<th>No Pinjam</th>
											<th>ID Anggota</th>
											<th>Nama</th>
											<th>Pinjam</th>
											<th>Balik</th>
											<th style="width:10%">Status</th>
											<th>Denda</th>
											<th>Aksi</th>
										<?php } else { ?>
											<th>No</th>
											<th>Nama Buku</th>
											<th>Kode Buku</th>
											<th>Pinjam</th>
											<th>Balik</th>
											<th>Denda</th>
											<th>Aksi</th>

										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pinjam->result_array() as $isi) {
										$anggota_id = $isi['anggota_id'];
										$ang = $this->db->query("SELECT * FROM tbl_login WHERE anggota_id = '$anggota_id'")->row();
										$pinjam_id = $isi['pinjam_id'];
										$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
										$total_denda = $denda->row();
										echo $this->session->userdata('anggota_id');
									?>
										<tr>
											<?php if ($this->session->userdata('level') == 'Petugas') { ?>

												<td><?= $no; ?></td>
												<td><?= $isi['pinjam_id']; ?></td>
												<td><?= $isi['anggota_id']; ?></td>
												<td><?= $ang->nama; ?></td>
												<td><?= $isi['tgl_pinjam']; ?></td>
												<td><?= $isi['tgl_balik']; ?></td>
												<td><?= $isi['status']; ?></td>
											<?php } else {
												$idb = $isi['buku_id'];
												$pol = $this->db->query("SELECT * FROM tbl_buku WHERE buku_id='$idb'")->row();
											?>

												<td><?= $no; ?></td>
												<td><?= $pol->title ?></td>
												<td><?= $isi['buku_id']; ?></td>
												<td><?= $isi['tgl_pinjam']; ?></td>
												<td><?= $isi['tgl_balik']; ?></td>


											<?php } ?>
											<td>
												<?php
												if ($isi['status'] == 'Di Kembalikan') {
													echo $this->M_Admin->rp($total_denda->denda);
												} else {
													$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
													$date1 = date('Ymd');
													$date2 = preg_replace('/[^0-9]/', '', $isi['tgl_balik']);
													$diff = $date1 - $date2;
													if ($diff > 0) {
														echo $diff . ' hari';
														$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
														echo '<p style="color:red;font-size:18px;">
												' . $this->M_Admin->rp($jml * ($dd->harga_denda * $diff)) . ' 
												</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
													} else {
														echo '<p style="color:green;">
												Tidak Ada Denda</p>';
													}
												}
												?>
											</td>

											<td style="text-align:left;">
												<?php if ($this->session->userdata('level') == 'Petugas') { ?>
													<?php if ($isi['tgl_kembali'] == '0') { ?>
														<a href="<?= base_url('transaksi/kembalipinjam/' . $isi['pinjam_id']); ?>" class="btn btn-warning btn-sm" title="pengembalian buku">
															<i class="fa fa-sign-out"></i> Kembalikan</a>
													<?php } else { ?>
														<a href="javascript:void(0)" class="btn btn-success btn-sm" title="pengembalian buku">
															<i class="fa fa-check"></i> Dikembalikan</a>
													<?php } ?>
													<a href="<?= base_url('transaksi/detailpinjam/' . $isi['pinjam_id'] . '?pinjam=yes'); ?>" class="btn btn-primary btn-sm" title="detail pinjam"><i class="fa fa-eye"></i></button></a>
													<a href="<?= base_url('transaksi/prosespinjam?pinjam_id=' . $isi['pinjam_id']); ?>" class="hpsa">
														<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
												<?php } else { ?>

													<a href="<?= base_url('transaksi/detailpinjam/' . $isi['pinjam_id']); ?>" class="btn btn-primary btn-sm" title="detail pinjam">
														<i class="fa fa-eye"></i> Detail Pinjam</a>
													<a href="<?= base_url('transaksi/download/' . $isi['buku_id']); ?>" class="btn btn-primary btn-sm" title="detail pinjam">
														<i class="fa fa-download"></i> Download Buku</a>
												<?php } ?>
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
		</div>
	</section>
</div>

<script src="<?= base_url('assets_style/assets/dist/js/pol.js') ?>"> </script>