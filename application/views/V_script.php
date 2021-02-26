<!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace.min.js"></script>

    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/chart.js"></script>

    <!-- Sweetalert -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>

    <!-- Data Table Plugin -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
      $('#sampleTable').DataTable();

      CKEDITOR.replace('ckeditor', {height : 250})

      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>

    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>

    <!-- PROFILE -->
    <script type="text/javascript">
      function showNotify(msg, state) {
        var header;
        var button;
        var icon;

        if (state == 'success') {
          header = 'Success!';
          button = 'btn btn-success btn-rounded';
          icon = 'success';
        } else if (state == 'danger') {
          header = 'Oops!';
          button = 'btn btn-danger btn-rounded';
          icon = 'error';
        }

        swal({
            title: header,
            text: msg,
            type: icon,
            timer: 2000,
            showConfirmButton: false
        });
      }
      
        $('#chg_pic_btn').on('click', function() {
          $('#profile').trigger('click');
        });

        $('#profile').on('change', function() {
          var property = document.getElementById("profile").files[0];
          var form_data = new FormData();
          form_data.append('file', property);

        $('#chg_pic_btn').html('Changing profile picture...').css({ color: '#888' });

        $.ajax({
          url: '<?php echo base_url('change_profile_pic') ?>',
          method: 'POST',
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          dataType: 'json'
        }).done(function(res) {
          if (res.msg == 'ok') {
            showNotify('Profile image changed', 'success');
            $('#profile_img').attr('src', res.path);
            $('#navbar_profile_img').attr('src', res.path);
            $('#navbar_profile_img2').attr('src', res.path);
          } else {
            showNotify(res.msg, 'danger');
          }

          $('#chg_pic_btn').html('Change').css({ color: '#1572e8' });
        });
      });

      $("#imgProfile").change(function() {
          readURL(this);
        });

        function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#thumb-preview').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      } 
    </script>

    <!-- Checked -->
    <script type="text/javascript">
      $(function () {
        $("#chkWork").click(function () {
          if ($(this).is(":checked")) {
            $("#dvTO").hide();
          } else {
            $("#dvTO").show();
          }
        });

        $("#chkWorkEdit").click(function () {
          if ($(this).is(":checked")) {
            $("#dvTOedit").hide();
          } else {
            $("#dvTOedit").show();
          }
        });
      });

      function toggleExp(id){
        if ($('#chkWorkEdit_'+id).is(":checked")) {
          $("#dvTOedit_"+id).hide();
        } else {
          $("#dvTOedit_"+id).show();
        }
        console.log(id);
      }
    </script>