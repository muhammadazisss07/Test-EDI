  <?php
    $this->load->view('V_head');
    $this->load->view('V_sidebar');
  ?>
    <main class="app-content">

      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <!-- <div class="app-title">
        <div>
          <h1>BIODATA</h1>
        </div>
      </div> -->
      <div class="row">
        
        <!-- Start Profile -->
        <div class="col-md-12">
          <div class="tile">
                <h3 class="tile-title">DATA PELAMAR</h3>
            	<div class="tile-body">
            		<table class="table table-bordered table-striped">
              		<tr>
                			<td>POSISI YANG DILAMAR</td>
                			<td>
                  			<?php echo $profiles[0]['posisi']; ?>    
                			</td>
              		</tr>
              		<tr>
                			<td>NAMA</td>
                			<td>
                 	 			<?php echo $profiles[0]['nama']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>No. KTP</td>
                			<td>
                  			<?php echo $profiles[0]['ktp']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>TEMPAT, TANGGAL LAHIR</td>
                			<td>
                  			<?php echo $profiles[0]['lahir']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>JENIS KELAMIN</td>
                			<td>
                  			<?php echo $profiles[0]['kelamin']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>AGAMAN</td>
                			<td>
                  			<?php echo $profiles[0]['agama']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>GOLONGAN DARAH</td>
                			<td>
                  			<?php echo $profiles[0]['golongan']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>STATUS</td>
                			<td>
                  			<?php echo $profiles[0]['status']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>ALAMAT KTP</td>
                			<td>
                  			<?php echo $profiles[0]['alamat_ktp']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>ALAMAT TINGGAL</td>
                			<td>
                  			<?php echo $profiles[0]['alamat_tinggal']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>EMAIL</td>
                			<td>
                  			<?php echo $profiles[0]['email']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>NO. TELP</td>
                			<td>
                  			<?php echo $profiles[0]['telp']; ?>
                			</td>
              		</tr>
              		<tr>
                			<td>ORANG TERDEKAT YANG DAPAT DIHUBUGI</td>
                			<td>
                  			<?php echo $profiles[0]['darurat']; ?>
                			</td>
              		</tr>
            		</table>
            	</div>
          	</div>
        </div>
        <!-- End Profile -->

      	<!-- Start Education -->
        <div class="col-md-12">
          <div class="tile">
            	<h3 class="tile-title">PENDIDIKAN TERAKHIR</h3>
            	<div class="title-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Jenjang Pendidikan Terakhir</th>
                        <th>Nama Institusi Akademik</th>
                        <th>Jurusan</th>
                        <th>Tahun Lulus</th>
                        <th>IPK</th>
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
      	</div>
        <!-- End Education -->

        <!-- Start Experience -->
      	<div class="col-md-12">
        	<div class="tile">
        		<h3 class="tile-title">RIWAYAT PEKERJAAN</h3>
        		<div class="title-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama Perusahaan</th>
                      <th>Posisi Terakhir</th>
                      <th>Pendapatan Terakhir</th></th>
                      <th>Tahun</th>
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
      	</div>
        <!-- End Experience -->
       
        <div class="col-md-12">
        	<div class="tile">
        		<h3 class="tile-title">RIWAYAT PELATIHAN</h3>
        		<div class="title-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama Kurses / Seminar</th>
                      <th>Sertifikat (ada/tidak)</th>
                      <th>Tahun</th>
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
      	</div>

      </div>
    </main>
    
<!-- Script -->
<?php $this->load->view('V_script'); ?>