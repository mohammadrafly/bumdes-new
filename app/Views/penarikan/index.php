<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-bs-toggle="tab" role="tab" aria-controls="overview" aria-selected="true"><?= $pages; ?> <p name="id">ID Simpanan: <?= $user ?></p></a>
                    </li>
                  </ul>
                  <div>
                  <?php if(session()->get('role') === 'superadmin'): ?>

                  <?php elseif(session()->get('role') === 'admin'): ?>
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
                                <th>Nominal</th>
                                <th>Kode Penarikan</th>
                                <th>Status penarikan</th>
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
                                <td><?= number_to_currency($row->nominal, 'IDR'); ?></td>
                                <td><?= $row->kode_penarikan; ?></td>
                                <td>
                                    <?php if($row->status_penarikan === 'TELAH DIAMBIL'): ?>
                                      <span class="badge bg-success text-white"><?= $row->status_penarikan ?></span>
                                    <?php elseif($row->status_penarikan === 'BELUM DIAMBIL'): ?>
                                      <span class="badge bg-warning text-white"><?= $row->status_penarikan ?></span>
                                    <?php endif ?>
                                </td>
                                <td>
                                <?php if(session()->get('role') === 'superadmin'): ?>
                                    <a href="<?= base_url('dashboard/transaksi/penarikan/view/'.$row->id_penarikan); ?>" class="btn-sm btn-primary text-white"><i class="mdi mdi-eye"></i></a>
                                <?php elseif(session()->get('role') === 'admin'): ?>
                                    <a href="<?= base_url('dashboard/transaksi/penarikan/edit/'.$row->id_penarikan); ?>" class="btn-sm btn-warning text-white"><i class="mdi mdi-table-edit"></i></a>
                                    <a href="<?= base_url('dashboard/transaksi/penarikan/delete/'.$row->id_penarikan.'/'.$user); ?>" class="btn-sm btn-danger text-white"><i class="mdi mdi-delete-forever"></i></a>
                                    <a href="<?= base_url('dashboard/transaksi/penarikan/view/'.$row->id_penarikan.'/'.$row->id_simpanan); ?>" class="btn-sm btn-primary text-white"><i class="mdi mdi-eye"></i></a>
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