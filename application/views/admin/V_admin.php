  <?php
    $this->load->view('V_head');
    $this->load->view('V_sidebar');
  ?>
    <main class="app-content">

      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <div class="app-title">
        <div>
          <h1>DATA PELAMAR</h1>
        </div>
      </div>
      <div class="row">
        <!-- Start Education -->
        <div class="col-md-12">
          <div class="tile">
            <div class="table-responsive">
              <table class="table" id="sampleTable">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Tempat, Tanggal lahir</th>
                    <th>Posisi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $count = 1;

                      if(empty($admins['id'])){
                          $data = 0;
                      }else{
                          $data = count($admins['id']);
                      }
                      for ($i=0; $i < $data; $i++) { 
                          $id = $admins['id'][$i];
                          $email = $admins['email'][$i];
                          $nama = $admins['nama'][$i];
                          $lahir = $admins['lahir'][$i];
                          $posisi = $admins['posisi'][$i];
                  ?>
                  <tr>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $lahir; ?></td>
                    <td><?php echo $posisi; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>Admin/detail/<?= $id; ?>" class="btn btn-primary delete-btn">
                          <i class="fa fa-lg fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                      $count++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Education -->
      </div>
    </main>
    
<!-- Script -->
<?php $this->load->view('V_script'); ?>