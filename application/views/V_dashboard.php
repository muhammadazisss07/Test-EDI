<?php 
    $this->load->view('V_head');
    $this->load->view('V_sidebar');
?>
    <div id="flash">
    <section class="content">
        <div class="container-fluid">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

        </div>
    </section>
    
<!-- Script -->
<?php $this->load->view('V_script'); ?>