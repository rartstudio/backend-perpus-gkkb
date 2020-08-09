<script>
    @if (session('success'))
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: '{{ session('success') }}',
        subtitle: ''
      })
    @endif

    @if (session('info'))
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: '{{ session('info') }}',
        subtitle: ''
      })
    @endif

    @if (session('danger'))
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: '{{ session('danger') }}',
        subtitle: ''
      })
    @endif

</script>
    