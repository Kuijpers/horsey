<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm deleting user </h4>
            </div>
            <div class="modal-body">
                You really want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    
    $title = $(e.relatedTarget).attr('data-title');;
      $(this).find('.modal-title').text($title)
    
    
    
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>
