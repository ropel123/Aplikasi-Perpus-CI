<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="clearfix"></div>
<footer class="main-footer">
  <div id="mycredit"><strong> Copyright &copy; <?php echo date('Y'); ?> Kelompok 3
    </strong> All rights | Page rendered in <strong>{elapsed_time}</strong> seconds.
    <div class="pull-right">
      <span class="pol">
        <p id='mw'></p>
      </span>
    </div>
  </div>
</footer>

<div id="logout"></div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_style/assets/plugins/summernote/summernote-lite.js"></script>

<script>
  $('#summernotehal').summernote({
    height: 150,
    tabsize: 1,
    direction: 'rtl',
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['view', ['fullscreen', 'help']],
      ['table', ['table']],
    ],
  });
</script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
  // Restricts input for each element in the set of matched elements to the given inputFilter.
  (function($) {
    $.fn.inputFilter = function(inputFilter) {
      return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        }
      });
    };
  }(jQuery));
  // Install input filters.
  $("#uintTextBox").inputFilter(function(value) {
    return /^\d*$/.test(value);
  });
  // Install input filters.
  $("#uintTextBox2").inputFilter(function(value) {
    return /^\d*$/.test(value);
  });
  $("#uintTextBox3").inputFilter(function(value) {
    return /^\d*$/.test(value);
  });
</script>
<script>
  // notifikasi gagal di hide
  //$("#notifikasi").hide();
  var logingagal = function() {
    $("#notifikasi").fadeOut('slow');
  };
  setTimeout(logingagal, 4000);
</script>
<script>
  //fungsi waktu

  var time = $('#coldon');
  if (time.length) {
    countdown(time.data('akhr'));
  }
  //fungsi logout
  $('#logout').on('click', function(e) {
    e.preventDefault();
    const pol = $(this).attr('href');
    Swal.fire({
      title: "Logout",
      text: "Anda yakin ingin logout?",
      type: "question",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Logout!'
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: "Berhasil",
          text: "Berhasil Logout",
          type: "success",
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Berhasil'
        }).then((result) => {
          if (result.value) {
            location.href = pol;
          }
        });
      }
    });
  });

  //fungsi jam
  $(document).ready(function() {
    setInterval(function() {
      var date = new Date();
      var h = date.getHours(),
        m = date.getMinutes(),
        s = date.getSeconds();
      h = ("0" + h).slice(-2);
      m = ("0" + m).slice(-2);
      s = ("0" + s).slice(-2);
      var time = h + ":" + m + ":" + s;
      $('.jam').html(time);
    }, 1000);


  })
  //fungsi hapus admin

  //fungsi Hapus Pengembalian
  $('.hps').on('click', function(e) {
    e.preventDefault();
    const tol = $(this).attr('href');
    Swal.fire({
      title: 'Apakah Anda Yakin?',
      text: "Data Akan Dihapus",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya,hapus saja'
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: 'Dihapus',
          text: 'Anda Menghapus akun',
          type: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            location.href = tol;
          }
        })
      }
    });
  });
  ///hapus anggota
  $('.hapus').on('click', function(e) {
    e.preventDefault();
    const pol = $(this).attr('href');
    Swal.fire({
      title: 'Apakah Anda Yakin?',
      text: "Data Akan Dihapus",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya,hapus saja'
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: 'Dihapus',
          text: 'Anda Menghapus akun',
          type: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            location.href = pol;
          }
        })
      }
    });
  });

  $(document).ready(function() {
    setInterval(function() {
      var date = new Date();
      var h = date.getHours(),
        m = date.getMinutes(),
        s = date.getSeconds();
      h = ("0" + h).slice(-2);
      m = ("0" + m).slice(-2);
      s = ("0" + s).slice(-2);
      var time = h + ":" + m + ":" + s;
      $('.jam').html(time);
    }, 1000);


  })
  /// Hapus Kategori
  $(document).ready(function() {
    $('.hapusb').on('click', function(e) {
      e.preventDefault();
      const cc = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Akan Dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya,hapus saja'
      }).then((result) => {
        if (result.value) {
          location.href = cc;
        }
      });
    });
  });
</script>
<!-- custom jQuery -->
<script src="<?php echo base_url(); ?>assets_style/assets/dist/js/custom.js"></script>
<script src="<?php echo base_url('assets_style/assets/dist/js/pol.js'); ?>"></script>

<!-- Logout Ajax -->
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets_style/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets_style/assets/dist/js/demo.js"></script>
<!-- PACE -->
<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/PACE/pace.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets_style/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url('js/main.js') ?>"></script>
<script src="<?= base_url('sweetalert2/dist/sweetalert2.all.min.js') ?>"> </script>
<script src="<?= base_url('sweetalert2/dist/sweetalert2.min.js'); ?>"> </script>
<script>
  const pol = $('.error').data('error');
  const nama = $('.error').data('gambar');
  if (pol) {
    Swal.fire({
      width: 600,
      imageUrl: './assets_style/image/buku/gundar.jpg',
      imageWidth: 400,
      imageHeight: 200,
      title: 'Selamat Datang Di Aplikasi GOLearn ' + nama,
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      },
      showConfirmButton: false,
      timer: 2000
    })
  }

  ///////Kode Buku

  $(document).ready(function() {
    var tol = document.getElementById('buku_idd').value;
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('transaksi/buku'); ?>",
      data: 'kode_buku=' + tol,
      beforeSend: function() {
        $("#result_buku").html("");
        $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
      },
      success: function(html) {
        $("#result_buku").load("<?= base_url('transaksi/buku_list'); ?>");
        $("#result_tunggu_buku").html('');
      }
    });
  });
</script>
</body>

</html>