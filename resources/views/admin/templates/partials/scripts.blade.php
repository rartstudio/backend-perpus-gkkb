<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

@stack('datatables-js')

<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/js/demo.js') }}"></script>

<script>
  jQuery(document).ready(function($){
      // $('#modal-lg').on('show.bs.modal',function(e){
      //     var button = $(e.relatedTarget);
      //     var modal = $(this);

      //     modal.find('.modal-body').load(button.data("remote"));
      //     modal.find('.modal-title').html(button.data("title"));
      // });
      $('body').on('click', '[data-toggle="modal"]', function(){
        $($(this).data("target")+' .modal-body').load($(this).data("remote"));
        $($(this).data("target")+' .modal-title').html($(this).data("title"));
  }); 
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $('button#accept').on('click', function(e){
        e.preventDefault();

        var href = $(this).attr('href');

        //use sweet alert
        Swal.fire({
            title: 'Apakah kamu yakin akan menerima transaksi ini?',
            text: 'Harap dicek terlebih dahulu sebelum melanjutkan proses ini!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Terima!'
            })
            .then((result) => {
                if(result.value){
                    
                    document.getElementById('acceptForm').action = href;
                    document.getElementById('acceptForm').submit();
                        Swal.fire(
                            'Terima!',
                            'Data Transaksi berhasil diterima',
                            'success'
                        )
                }
        });
    })

</script>

<script>
    $('button#submission').on('click', function(e){
        e.preventDefault();

        var href = $(this).attr('href');

        //use sweet alert
        Swal.fire({
            title: 'Apakah kamu yakin akan menverifikasi user ini?',
            text: 'Harap dicek terlebih dahulu informasi user sebelum melanjutkan proses ini!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Terima!'
            })
            .then((result) => {
                if(result.value){
                    
                    document.getElementById('acceptForm').action = href;
                    document.getElementById('acceptForm').submit();
                        Swal.fire(
                            'Terima!',
                            'Data Transaksi berhasil diterima',
                            'success'
                        )
                }
        });
    })

</script>

@stack('scripts')
