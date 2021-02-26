  <?php
    $this->load->view('V_head');
    $this->load->view('V_sidebar');
  ?>
    <main class="app-content">

      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <div class="app-title">
        <div>
          <h1>Form Edit Pendidikan</h1>
        </div>
      </div>
      <div class="row">

      	<!-- Start Profile -->
        <div class="col-md-12">
        	<div class="tile">
          	<div class="tile-body">
          		<div class="row">
            		<div class="col-lg-12">
            			<form action="<?= base_url('Education/update'); ?>" method="post" enctype="multipart/form-data">
                		<div class="form-group">
                  			<label>Jenjang Pendidikan Terakhir</label>
                     <input type="hidden" class="form-control" name="id" value="<?= $educations[0]['id'];?>">
                  			<input type="text" class="form-control" name="jenjang" required autocomplete="off" value="<?= $educations[0]['jenjang'];?>">
                		</div>
                  	<div class="form-group">
                    	<label>Nama Institusi Akademik</label>
                    	<input type="text" name="nama" class="form-control" required autocomplete="off" value="<?= $educations[0]['nama'];?>">
                  	</div>
                  	<div class="form-group">
                    	<label>Jurusan</label>
                    	<input type="text" name="jurusan" class="form-control" required autocomplete="off" value="<?= $educations[0]['jurusan'];?>">
                  	</div>
                  	<div class="form-group">
                    	<label>Tahun</label>
                    	<input type="text" name="tahun" class="form-control" required autocomplete="off" value="<?= $educations[0]['tahun'];?>">
                  	</div>
                  	<div class="form-group">
                    	<label>IPK</label>
                    	<input type="text" name="ipk" class="form-control" required autocomplete="off" value="<?= $educations[0]['ipk'];?>">
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

      </div>
    </main>
    
<!-- Script -->
<?php $this->load->view('V_script'); ?>