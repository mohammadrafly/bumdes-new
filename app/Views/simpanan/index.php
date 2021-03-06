<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-bs-toggle="tab" role="tab" aria-controls="overview" aria-selected="true"><?= $pages; ?> <p name="nik"><?= $user['name'] ?></p></a>
                    </li>
                    <li class="nav-item">
                    <?php if (!empty(session()->getFlashdata('error_penarikan'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error_penarikan'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    </li>
                  </ul>
                  <div>
                  <?php if(session()->get('role') === 'superadmin'): ?>

                  <?php elseif(session()->get('role') === 'admin'): ?>
                    <div class="btn-wrapper">
                      <a href="<?= base_url('dashboard/transaksi/simpanan/add/'.$user['nik']); ?>" 
                        class="btn btn-otline-dark align-items-center"><i class="icon-plus"></i> Add simpanan</a>
                    </div>
                  <?php endif ?>

                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID simpanan</th>
                                <th>Nominal</th>
                                <th>Jenis simpanan</th>
                                <th>Kode Penarikan</th>
                                <th>Status simpanan</th>
                                <th>Tanggal</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($content): ?>
                            <?php 
                            $no = 1;
                            foreach($content as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->id_simpanan; ?></td>
                                <td><?= number_to_currency($row->nominal, 'IDR'); ?></td>
                                <td><?= $row->jenis_simpanan; ?></td>
                                <td><?= $row->kode_deposit; ?></td>
                                <td>
                                    <?php if($row->status_simpanan === 'TELAH DEPOSIT'): ?>
                                      <span class="badge bg-success text-white"><?= $row->status_simpanan ?></span>
                                    <?php elseif($row->status_simpanan === 'BELUM DEPOSIT'): ?>
                                      <span class="badge bg-warning text-white"><?= $row->status_simpanan ?></span>
                                    <?php endif ?>
                                </td>
                                <td><?= $row->created_at ?></td>
                                <td>
                                <?php if(session()->get('role') === 'superadmin'): ?>
                                    <a href="<?= base_url('dashboard/transaksi/simpanan/view/'.$row->id_simpanan); ?>" class="btn-sm btn-primary text-white"><i class="mdi mdi-eye"></i></a>
                                <?php elseif(session()->get('role') === 'admin'): ?>
                                    <a href="<?= base_url('dashboard/transaksi/simpanan/edit/'.$row->id_simpanan.'/'.$nik); ?>" class="btn-sm btn-warning text-white"><i class="mdi mdi-table-edit"></i></a>
                                    <a href="<?= base_url('dashboard/transaksi/simpanan/delete/'.$row->id_simpanan.'/'.$nik); ?>" class="btn-sm btn-danger text-white"><i class="mdi mdi-delete-forever"></i></a>
                                    <a href="<?= base_url('dashboard/transaksi/simpanan/view/'.$row->id_simpanan.'/'.$nik); ?>" class="btn-sm btn-primary text-white"><i class="mdi mdi-eye"></i></a>
                                    <a href="<?= base_url('dashboard/transaksi/penarikan/add/'.$row->id_simpanan.'/'.$row->nominal.'/'.$nik); ?>" 
                                      class="btn-sm btn-secondary text-black"><i class="icon-plus"></i> Add Penarikan</a>
                                    <a href="<?= base_url('dashboard/transaksi/penarikan/simpanan/'.$row->id_simpanan); ?>" 
                                      class="btn-sm btn-secondary text-black"><i class="icon-credit-card"></i>Penarikan</a>
                                <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?= $this->endSection() ?>