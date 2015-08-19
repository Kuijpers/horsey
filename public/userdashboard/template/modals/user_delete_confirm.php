<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $lang['USERS_INDEX_MODAL_TITLE']; ?></h4>
            </div>
            <div class="modal-body">
                <?php echo $lang['USERS_INDEX_MODAL_DELETE_CONFIRM']; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang['DASH_CANCEL']; ?></button>
                <a class="btn btn-danger btn-ok"><?php echo $lang['DASH_DELETE']; ?></a>
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
