<form method="POST" action="<?php echo URL .$pagepath ?>status">
    <div class="modal fade" id="user_change_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Status change </h4>
                </div>
                <div class="modal-title-message">
                    <h5> zomaar tekst</h5>
                </div>
                <div class="modal-body">
                    <h4>Status change</h4>
                    
                        <table class="table table-hover table-condensed">
                            <tr>
                                <td>
                                    <label for="login_id">User ID</label>
                                </td>
                                <td>
                                    <input name="login_id" type="text" class="form-control span6" id="login_id" readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="login_status">Change status to :</label>
                                </td>
                                <td>
                                    <input name="login_status" type="text" class="form-control span6" id="login_status" readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="status_change">Reason:</label>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
