<form method="POST" action="<?php echo URL .$mainpage ?>passchange">
    <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change password </h4>
                </div>
                <div class="modal-body">
                    <h3>Please change the password</h3>
                    
                        <table class="table table-hover table-condensed">
                            <tr>
                                <td>
                                    <label for="user_id">User ID</label>
                                </td>
                                <td>
                                    <input name="user_id" type="text" class="form-control span6" id="user_id" value="<?php echo $userdata[0]['user_id'] ;?> " readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="user_id">User name</label>
                                </td>
                                <td>
                                    <input name="user_name" type="text" class="form-control span6" id="user_id" value="<?php echo $userdata[0]['user_firstname']. " " . $userdata[0]['user_lastname'];?> " readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="old_password">Old password  </label>
                                </td>
                                <td>
                                    <input name="old_password" type="text" class="form-control span6" id="old_password" placeholder="Old password">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="new_password1">New password </label>
                                </td>
                                <td>
                                    <input name="new_password1" type="text" class="form-control span6" id="new_password1" placeholder="New password">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="new_password2">Repeat new password  &nbsp;</label>
                                </td>
                                <td>
                                    <input name="new_password2" type="text" class="form-control span6" id="new_password2" placeholder="Repeat new password">
                                </td>
                            </tr>
                        </table>
                    
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
$('#change_pass').on('show.bs.modal', function(e) {
    
    $title = $(e.relatedTarget).attr('data-title');;
      $(this).find('.modal-title').text($title)
    
    
    
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>
