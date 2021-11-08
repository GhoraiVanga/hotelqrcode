<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QRCODE</title>
 <link rel="icon" href="./QRCODE/qrcode.gif" type="image/gif" sizes="16x16">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- Jquery --->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
<!-- notiflix js  -->
<script src="dist/js/notiflix-2.7.0.min.js" ></script>
<script src="dist/js/notiflix-aio-2.7.0.min.js" ></script>

<!-- Notiflix CSS -->

<link rel="stylesheet" href="dist/css/notiflix-2.7.0.min.css">



  <!-- DataTable -->
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<!-- Toaster Js Notification  -->

<script>
function notificationme(){
  toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "closeEasing" : "linear",
            "showMethod": "show",
            "hideMethod": "hide"
        };

}
</script>

<!-- Notiflix Js Notification -->

<script>
    // Notiflix.Notify.Init({
    //   // closeButton: true,
    //   // cssAnimationStyle: 'zoom',
    //   // cssAnimationDuration: 500,
    //   // messageMaxLength: 20,
    //   // plainText: false,
    //   pauseOnHover: true,
    //   clickToClose: true,
    // });

    // Notiflix.Notify.Init({
    //   useFontAwesome: true,
    // });

    // Notiflix.Report.Init({
    //   width: '640px',
    // });

    // Notiflix.Confirm.Init({
    //   // messageMaxLength: 1000,
    //   // rtl: true,
    //   position: 'center',
    //   distance: '10px',
    //   cssAnimationStyle: 'fade',
    // });

    Notiflix.Loading.Init({
      clickToClose: true,
      customSvgUrl: 'https://www.notiflix.com/content/media/icon/notiflix-loading-notiflix.svg',
    });

    
  </script>
<!-- Select2 -->


