<form method="POST" action="<?php echo URL .$pagepath ?>status">
    <div class="modal fade" id="user_change_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php  echo $lang['USERS_INDEX_MODAL_STATUS_CHANGE']; ?></h4>
                </div>
                <div class="modal-title-message">
                    <h5>This line of text will be replaced on output</h5>
                </div>
                <div class="modal-body">
                    
                        <table class="table table-hover table-condensed">
                            <tr>
                                <td>
                                    <label for="login_id"><?php  echo $lang['USERS_INDEX_MODAL_STATUS_CHANGE_USERID']; ?></label>
                                </td>
                                <td>
                                    <input name="login_id" type="text" class="form-control span6" id="login_id" readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="login_status"><?php  echo $lang['USERS_INDEX_MODAL_STATUS_CHANGE_STATUS']; ?></label>
                                </td>
                                <td>
                                    <input name="login_status" type="text" class="form-control span6" id="login_status" readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="status_change"><?php  echo $lang['USERS_INDEX_MODAL_STATUS_CHANGE_REASON']; ?></label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <textarea name="login_status_change" class="form-control" rows="5" id="status_change"></textarea>
                                </td>
                            </tr>
                        </table>
                    <input type="text" name="user" hidden value="<?php echo $_SESSION['login_id'] ?>"/>
                    <?php $token->input_form() ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php  echo $lang['DASH_CANCEL']; ?></button>
                    <button type="submit" class="btn btn-primary"><?php  echo $lang['DASH_CONFIRM']; ?></button>
                </div>
            </div>
        </div>
    </div>
    </form>
<script type="text/javascript">
$('#user_change_status').on('show.bs.modal', function(e) {
    
    $title = $(e.relatedTarget).attr('data-title-message');;
      $(this).find('.modal-title-message').text($title)
      
     $(this).find('#login_id').attr('value', $(e.relatedTarget).data('id')); 
     
     $(this).find('#login_status').attr('value', $(e.relatedTarget).data('status')); 
    
    
    
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>
