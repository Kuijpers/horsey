<form method="POST" action="<?php echo URL .$mainpage ?>passchange">
    <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><?php echo $lang['USERS_INDEX_MODAL_CHANGEPASS_TITLE'];?></h3>
                </div>
                <div class="modal-body">
                    <h4><?php echo $lang['USERS_INDEX_MODAL_CHANGEPASS_MESSAGE'];?></h4>
                    
                        <table class="table table-hover table-condensed">
                            <tr>
                                <td>
                                    <label for="user_id"><?php echo $lang['USERS_DEFAULT_USERID'];?></label>
                                </td>
                                <td>
                                    <input name="user_id" type="text" class="form-control span6" id="user_id" value="<?php echo $userdata[0]['user_id'] ;?> " readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="user_id"><?php echo $lang['USERS_DEFAULT_USER'];?></label>
                                </td>
                                <td>
                                    <input name="user_name" type="text" class="form-control span6" id="user_id" value="<?php echo $userdata[0]['user_firstname']. " " . $userdata[0]['user_lastname'];?> " readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="old_password"><?php echo $lang['USERS_DEFAULT_CHANGEPASS_OLD'];?></label>
                                </td>
                                <td>
                                    <input name="old_password" type="text" class="form-control span6" id="old_password" placeholder="<?php echo $lang['USERS_DEFAULT_CHANGEPASS_OLD'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="new_password1"><?php echo $lang['USERS_DEFAULT_CHANGEPASS_NEW'];?></label>
                                </td>
                                <td>
                                    <input name="new_password1" type="text" class="form-control span6" id="new_password1" placeholder="<?php echo $lang['USERS_DEFAULT_CHANGEPASS_NEW'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="new_password2"><?php echo $lang['USERS_DEFAULT_CHANGEPASS_REPEAT'];?></label>
                                </td>
                                <td>
                                    <input name="new_password2" type="text" class="form-control span6" id="new_password2" placeholder="<?php echo $lang['USERS_DEFAULT_CHANGEPASS_REPEAT'];?>">
                                </td>
                            </tr>
                        </table>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang['DASH_CANCEL'];?></button>
                    <button type="submit" class="btn btn-primary"><?php echo $lang['DASH_CHANGE'];?></button>
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
