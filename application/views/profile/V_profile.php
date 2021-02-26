  <?php
    $this->load->view('V_head');
    $this->load->view('V_sidebar');
  ?>
    <main class="app-content">

      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <div class="app-title">
        <div>
          <h1>BIODATA</h1>
        </div>
      </div>
      <div class="row">

      	<!-- Start Profile -->
        <div class="col-md-12">
        	<div class="tile">
          <center>
          	<h3 class="tile-title">DATA PRIBADI PELAMAR</h3>
            </center>
          	<div class="tile-body">
          		<div class="row">
            		<div class="col-lg-12">
            			<form action="<?= base_url('Profile/update'); ?>" method="post" enctype="multipart/form-data">
                		<div class="form-group">
                  			<label>POSISI YANG DILAMAR</label>
                  			<input type="hidden" class="form-control" name="id" value="<?= $profiles[0]['id']; ?>">
                  			<input type="posisi" class="form-control" name="posisi" value="<?= $profiles[0]['posisi']; ?>">
                		</div>
                  	<div class="form-group">
                    	<label>NAMA</label>
                    	<input type="text" name="nama" class="form-control" required value="<?= $profiles[0]['nama']; ?>">
                  	</div>
                  	<div class="form-group">
                    	<label>No. KTP</label>
                    	<input type="text" name="ktp" class="form-control" required value="<?= $profiles[0]['ktp']; ?>">
                  	</div>
                  	<div class="form-group">
                    	<label>TEMPAT, TANGGAL LAHIR</label>
                    	<input type="text" name="lahir" class="form-control" required value="<?= $profiles[0]['lahir']; ?>">
                  	</div>
                  	<div class="form-group">
                    	<label>JENIS KELAMIN</label><br>
                      <input type="radio" name="kelamin" value="laki-laki" <?php echo $profiles[0]['kelamin'] == 'laki-laki' ? 'checked' : '';?>> Laki-laki <br>
                      <input type="radio" name="kelamin" value="perempuan" <?php echo $profiles[0]['kelamin'] == 'perempuan' ? 'checked' : '';?>> Perempuan
                  	</div>
                  	<div class="form-group">
                    	<label>AGAMA</label>
                    	<input type="text" name="agama" class="form-control" required autocomplete="off" value="<?= $profiles[0]['agama']; ?>">
                  	</div>
                  	<div class="form-group">
                    	<label>GOLONGAN DARAH</label>
                    	<input type="text" name="golongan" class="form-control" required autocomplete="off" value="<?= $profiles[0]['golongan']; ?>">
                  	</div>
                  	<div class="form-group">
                    	<label>STATUS</label>
                    	<input type="text" name="status" class="form-control" required autocomplete="off" value="<?= $profiles[0]['status']; ?>">
                  	</div>
                  	<div class="form-group">
                    	<label>ALAMAT KTP</label>
                      <textarea name="alamat_ktp" class="form-control" rows="5" required autocomplete="off"><?= $profiles[0]['alamat_ktp']; ?></textarea>
                  	</div>
                  	<div class="form-group">
                    	<label>ALAMAT TINGGAL</label>
                      <textarea name="alamat_tinggal" class="form-control" rows="5" autocomplete="off"><?= $profiles[0]['alamat_tinggal']; ?></textarea>
                  	</div>
                  	<div class="form-group">
                    	<label>EMAIL</label>
                    	<input type="text" name="email" class="form-control" required autocomplete="off" value="<?php echo $profiles[0]['email'] == null ? $profiles[0]['email_login'] : $profiles[0]['email'];?>">
                  	</div>
                  	<div class="form-group">
                    	<label>NO. TELP</label>
                    	<input type="text" name="telp" class="form-control" required autocomplete="off" value="<?= $profiles[0]['telp']; ?>">
                  	</div>
                  	<div class="form-group">
                    	<label>ORANG TERDEKAT YANG DAPAT DIHUBUNGI</label>
                    	<input type="text" name="darurat" class="form-control" required autocomplete="off" value="<?= $profiles[0]['darurat']; ?>">
                  	</div>
              			<div class="tile-footer">
                			<button class="btn btn-primary" type="submit">Submit</button>
              			</div>
              		</form>
                </div>
            	</div>
          	</div>
        	</div>
        </div>
        <!-- End Profile -->

        <!-- Start Education -->
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">PENDIDIKAN TERAKHIR</h3>
            <div class="tile-title-w-btn">
              <p><a href="<?php echo base_url('education/add');?>" class="btn btn-primary icon-btn">
                  <i  class="fa fa-plus"></i>
                  Tambah Pendidikan
                </a>
              </p>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Jenjang Pendidikan Terakhir</th>
                    <th>Nama Institusi Akademik</th>
                    <th>Jurusan</th>
                    <th>Tahun</th>
                    <th>IPK</th>`
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $count = 1;

                      if(empty($educations['id'])){
                          $data = 0;
                      }else{
                          $data = count($educations['id']);
                      }
                      for ($i=0; $i < $data; $i++) { 
                          $id = $educations['id'][$i];
                          $jenjang = $educations['jenjang'][$i];
                          $nama = $educations['nama'][$i];
                          $jurusan = $educations['jurusan'][$i];
                          $tahun = $educations['tahun'][$i];
                          $ipk = $educations['ipk'][$i];
                  ?>
                  <tr>
                    <td><?php echo $jenjang; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $jurusan; ?></td>
                    <td><?php echo $tahun; ?></td>
                    <td><?php echo $ipk; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>Education/edit/<?= $id ?>" class="btn btn-primary delete-btn">
                          <i class="fa fa-lg fa-edit"></i>
                      </a>
                      <a href="<?= base_url(); ?>Education/delete/<?= $id ?>" class="btn btn-primary delete-btn">
                          <i class="fa fa-lg fa-trash"></i>
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

        <!-- Start Pelatihan -->
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">RIWAYAT PELATIHAN</h3>
            <div class="tile-title-w-btn">
              <p><a href="<?php echo base_url('training/add');?>" class="btn btn-primary icon-btn">
                  <i  class="fa fa-plus"></i>
                  Tambah Pekerjaan
                </a>
              </p>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Kursus / Seminar</th>
                    <th>Sertifikat (ada/tidak)</th>
                    <th>Tahun</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                      $count = 1;

                      if(empty($trainings['id'])){
                          $data = 0;
                      }else{
                          $data = count($trainings['id']);
                      }
                      for ($i=0; $i < $data; $i++) { 
                          $id = $trainings['id'][$i];
                          $nama = $trainings['nama'][$i];
                          $sertifikat = $trainings['sertifikat'][$i];
                          $tahun = $trainings['tahun'][$i];
                  ?>
                  <tr>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $sertifikat; ?></td>
                    <td><?php echo $tahun; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>Training/edit/<?= $id ?>" class="btn btn-primary delete-btn">
                          <i class="fa fa-lg fa-edit"></i>
                      </a>
                      <a href="<?= base_url(); ?>Training/delete/<?= $id ?>" class="btn btn-primary delete-btn">
                          <i class="fa fa-lg fa-trash"></i>
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
        <!-- End Pelatihan -->

        <!-- Start Experience -->
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">RIWAYAT PEKERJAAN</h3>
            <div class="tile-title-w-btn">
              <p><a href="<?php echo base_url('experience/add');?>" class="btn btn-primary icon-btn">
                  <i  class="fa fa-plus"></i>
                  Tambah Pekerjaan
                </a>
              </p>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Perusahaan</th>
                    <th>Posisi Terakhir</th>
                    <th>Pendapatan Terakhir</th>
                    <th>Tahun</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                      $count = 1;

                      if(empty($experiences['id'])){
                          $data = 0;
                      }else{
                          $data = count($experiences['id']);
                      }
                      for ($i=0; $i < $data; $i++) { 
                          $id = $experiences['id'][$i];
                          $nama = $experiences['nama'][$i];
                          $posisi = $experiences['posisi'][$i];
                          $pendapatan = $experiences['pendapatan'][$i];
                          $tahun = $experiences['tahun'][$i];
                  ?>
                  <tr>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $posisi; ?></td>
                    <td><?php echo $pendapatan; ?></td>
                    <td><?php echo $tahun; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>Experience/edit/<?= $id ?>" class="btn btn-primary delete-btn">
                          <i class="fa fa-lg fa-edit"></i>
                      </a>
                      <a href="<?= base_url(); ?>Experience/delete/<?= $id ?>" class="btn btn-primary delete-btn">
                          <i class="fa fa-lg fa-trash"></i>
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
        <!-- End Experience -->

      </div>
    </main>
    
<!-- Script -->
<?php $this->load->view('V_script'); ?>