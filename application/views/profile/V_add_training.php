  <?php
    $this->load->view('V_head');
    $this->load->view('V_sidebar');
  ?>
    <main class="app-content">

      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <div class="app-title">
        <div>
          <h1>Form Tambah Pelatihan</h1>
        </div>
      </div>
      <div class="row">

      	<!-- Start Profile -->
        <div class="col-md-12">
        	<div class="tile">
          	<div class="tile-body">
          		<div class="row">
            		<div class="col-lg-12">
            			<form action="<?= base_url('Training/insert'); ?>" method="post" enctype="multipart/form-data">
                		<div class="form-group">
                  			<label>Nama Kursus / Seminar</label>
                  			<input type="text" class="form-control" name="nama">
                		</div>
                  	<div class="form-group">
                    	<label>Sertifikat (ada/tidak) </label>
                    	<input type="text" name="sertifikat" class="form-control" required autocomplete="off">
                  	</div>
                  	<div class="form-group">
                    	<label>Tahun</label>
                    	<input type="text" name="tahun" class="form-control" required autocomplete="off">
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