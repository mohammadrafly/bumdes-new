<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0"><?= $pages ?></a>
                    </li>
                  </ul>
                </div>
                <?php if (session()->get('role') === 'superadmin'): ?>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                      <div class="row">
                        <div class="col-sm-12">
                          
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title">Total Pinjaman</p>
                              <?php if($total_pinjaman): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_pinjaman, 'IDR') ;?></h3>
                              <?php elseif(!$total_pinjaman): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>             
                            </div>
                            <div>
                              <p class="statistics-title">Total Simpanan</p>
                              <?php if($total_simpanan): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_simpanan, 'IDR') ;?></h3>
                              <?php elseif(!$total_simpanan): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                            </div>
                            <div>
                              <p class="statistics-title">Total Angsuran</p>
                              <?php if($total_angsuran): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_angsuran, 'IDR') ;?></h3>
                              <?php elseif(!$total_angsuran): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Total Pembayaran</p>
                              <?php if($total_pembayaran): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_pembayaran, 'IDR') ;?></h3>
                              <?php elseif(!$total_pembayaran): ?>
                              <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Total Penarikan</p>
                              <?php if($total_penarikan): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_penarikan, 'IDR') ;?></h3>
                              <?php elseif(!$total_penarikan): ?>
                              <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                            </div>
                          </div>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="col-lg-12 d-flex flex-column">
                            <div class="row flex-grow">
                              <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                <div class="card bg-primary card-rounded">
                                  <div class="card-body pb-0">
                                    <h4 class="card-title card-title-dash text-white mb-4">Transaksi Terkini</h4>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active btn btn-secondary" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pinjaman</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link btn btn-secondary" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Simpanan</button>
                                                </li>
                                            </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div class="card-body text-white">
                                                        <?php if($pinjaman): ?>
                                                        <?php 
                                                        foreach($pinjaman as $row): ?>
                                                            <h5 class="text white"><?= $row->created_at; ?> => <?= number_to_currency($row->nominal, 'IDR'); ?></h5>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <div class="card-body text-white">
                                                        <?php if($simpanan): ?>
                                                        <?php 
                                                        foreach($simpanan as $row): ?>
                                                            <h5 class="text white"><?= $row->created_at; ?> => <?= number_to_currency($row->nominal, 'IDR'); ?></h5>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php elseif(session()->get('role') === 'customer'): ?>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                      <div class="row">
                        <div class="col-sm-4">
                          
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title">Total Pinjaman Saya</p>
                              <?php if($my_pinjaman): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($my_pinjaman, 'IDR') ;?></h3>
                              <?php elseif(!$my_pinjaman): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>             
                            </div>
                            <div>
                              <p class="statistics-title">Total Simpanan Saya</p>
                              <?php if($my_simpanan): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($my_simpanan, 'IDR') ;?></h3>
                              <?php elseif(!$my_simpanan): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                            </div>
                            <div>
                              <p class="statistics-title">Total Angsuran Saya</p>
                              <?php if($my_angsuran): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($my_angsuran, 'IDR') ;?></h3>
                              <?php elseif(!$my_angsuran): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                            </div>
                          </div>
                        </div>
                      </div> 
                    </div>
                  </div>
                <?php elseif(session()->get('role') === 'admin'): ?>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                      <div class="row">
                        <div class="col-sm-12">
                          
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title">Total Pinjaman</p>
                              <?php if($total_pinjaman): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_pinjaman, 'IDR') ;?></h3>
                              <?php elseif(!$total_pinjaman): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>             
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                            </div>
                            <div>
                              <p class="statistics-title">Total Simpanan</p>
                              <?php if($total_simpanan): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_simpanan, 'IDR') ;?></h3>
                              <?php elseif(!$total_simpanan): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                              <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                            </div>
                            <div>
                              <p class="statistics-title">Total Angsuran</p>
                              <?php if($total_angsuran): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_angsuran, 'IDR') ;?></h3>
                              <?php elseif(!$total_angsuran): ?>
                                <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Total Pembayaran</p>
                              <?php if($total_pembayaran): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_pembayaran, 'IDR') ;?></h3>
                              <?php elseif(!$total_pembayaran): ?>
                              <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                              <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Total Penarikan</p>
                              <?php if($total_penarikan): ?>
                              <h3 class="rate-percentage"><?= number_to_currency($total_penarikan, 'IDR') ;?></h3>
                              <?php elseif(!$total_penarikan): ?>
                              <h3 class="rate-percentage">IDR 0</h3>
                              <?php endif ?>
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                            </div>
                          </div>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="col-lg-12 d-flex flex-column">
                            <div class="row flex-grow">
                              <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                <div class="card bg-primary card-rounded">
                                  <div class="card-body pb-0">
                                    <h4 class="card-title card-title-dash text-white mb-4">Transaksi Terkini</h4>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active btn btn-secondary" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pinjaman</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link btn btn-secondary" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Simpanan</button>
                                                </li>
                                            </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div class="card-body text-white">
                                                        <?php if($pinjaman): ?>
                                                        <?php 
                                                        foreach($pinjaman as $row): ?>
                                                            <h5 class="text white"><?= $row->created_at; ?> => <?= number_to_currency($row->nominal, 'IDR'); ?></h5>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <div class="card-body text-white">
                                                        <?php if($simpanan): ?>
                                                        <?php 
                                                        foreach($simpanan as $row): ?>
                                                            <h5 class="text white"><?= $row->created_at; ?> => <?= number_to_currency($row->nominal, 'IDR'); ?></h5>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
              </div>
            </div>
          </div>
<?= $this->endSection() ?>