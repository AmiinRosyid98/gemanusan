

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-9">
                        <div class="card-body">
                          <h5 class="card-title text-primary"><?= $lang['welcome']; ?> <?= $user->nama ?>! 🎉</h5>
                          <p class="mb-4">
                            <?= $lang['you_can_see_progress']; ?>
                          </p>

                          <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
                        </div>
                      </div>
                      <div class="col-sm-3 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?= base_url() ?>assets/admin/assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                  <div class="col-lg-3">
                    <div class="card card-border-shadow-primary h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                          <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-primary"><i class="fas fa-tag"></i></span>
                          </div>
                          <h4 class="mb-0"><?= $jum_produk ?></h4>
                        </div>
                        <p class="mb-2"><b><?= $lang['product'] ?></b></p>
                        <p class="mb-0">
                          <a href="<?= base_url() ?>admin/produk"><span class="text-heading fw-medium me-2"><?= $lang['see_more'] ?></span></a>
                      
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="card card-border-shadow-success h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                          <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-success"><i class="fas fa-list-alt"></i></span>
                          </div>
                          <h4 class="mb-0"><?= $jum_kategori ?></h4>
                        </div>
                        <p class="mb-2"><b><?= $lang['category'] ?></b></p>
                        <p class="mb-0">
                          <a href="<?= base_url() ?>admin/kategori"><span class="text-heading fw-medium me-2"><?= $lang['see_more'] ?></span></a>
                      
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="card card-border-shadow-info h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                          <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-info"><i class="fas fa-images"></i></span>
                          </div>
                          <h4 class="mb-0"><?= $jum_galeri ?></h4>
                        </div>
                        <p class="mb-2"><b><?= $lang['gallery'] ?></b></p>
                        <p class="mb-0">
                          <a href="<?= base_url() ?>admin/galeri"><span class="text-heading fw-medium me-2"><?= $lang['see_more'] ?></span></a>
                      
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="card card-border-shadow-warning h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                          <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-warning"><i class="fas fa-video"></i></span>
                          </div>
                          <h4 class="mb-0"><?= $jum_video ?></h4>
                        </div>
                        <p class="mb-2"><b><?= $lang['videos'] ?></b></p>
                        <p class="mb-0">
                          <a href="<?= base_url() ?>admin/video"><span class="text-heading fw-medium me-2"><?= $lang['see_more'] ?></span></a>
                      
                        </p>
                      </div>
                    </div>
                  </div>
                
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 mb-4 mt-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <h5 class="card-header m-0 me-2 pb-3" style="float:left;">Total Visitor</h5>

                            <div class="dropdown" style="float:right; margin-top: 15px; margin-right: 15px;">
                              <button
                                class="btn btn-sm btn-outline-primary dropdown-toggle btn-filter-visitor"
                                type="button"
                                id="growthReportId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <?= $lang['last_7_days']; ?>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                <a class="dropdown-item filter-visitor" value="week" text="<?= $lang['last_7_days']; ?>" href="javascript:void(0);"><?= $lang['last_7_days']; ?></a>
                                <a class="dropdown-item filter-visitor" value="month" text="<?= $lang['last_1_month']; ?>" href="javascript:void(0);"><?= $lang['last_1_month']; ?></a>
                                <a class="dropdown-item filter-visitor" value="year" text="<?= $lang['last_1_year']; ?>" href="javascript:void(0);"><?= $lang['last_1_year']; ?></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-8 py-3 px-3">
                            <canvas id="myLineChart"></canvas>
                          </div>
                          <div class="col-lg-4">
                            <canvas id="donutChart"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- / Content -->

            