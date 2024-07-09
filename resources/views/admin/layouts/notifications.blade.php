<style>
  .toast-success {
    background-color: #1fAf2f !important;
    /* رنگ سبز پررنگ */
    color: white !important;
    /* رنگ متن سفید */
  }

  .toast-error {
    background-color: "#ff0000" !important;
    /* رنگ سبز پررنگ */
    color: white !important;
    /* رنگ متن سفید */
  }
</style>
<script>
  @if(session('success'))
  toastr.success("{{ session('success') }}");
  @endif

  @if(session('error'))
  toastr.error("{{ session('error') }}");
  @endif
</script>