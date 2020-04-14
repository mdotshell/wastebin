
<div class="toast" id="errtoast">
  <div class="toast-header bg-danger">
    <strong class="mr-auto text-white">Error!</strong>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body text-center">
    <?php echo validation_errors(); ?>
  </div>
</div>
<script>
    $('#errtoast').toast({delay: 5000});
    $('#errtoast').toast('show');
</script>