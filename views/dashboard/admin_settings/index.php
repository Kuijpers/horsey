<?php
    $userdata = $this->show_usersdata;
    
?>

<h3> Users </h3>
<hr>
<?php
    if(Session::exsist('owner')){
        echo "<div class='btn-danger'><p><center>";
        echo Session::get('owner');
        echo "</center></p></div>";
        Session::delete('owner');
    }
    if(Session::exsist('updated')){
        echo "<div class='btn-success'><p><center>";
        echo Session::get('updated');
        echo "</center></p></div>";
        Session::delete('updated');
    }
    // Remove slashes for debug
       //Debug::array_list($userdata);
?>
<table class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Adress</th>
        <th>Postcode</th>
        <th>City</th>
        <th>State</th>
        <th>Country</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Usertype</th>
        <th>&nbsp;</th>
    </thead>
    <tbody>
        <?php
                foreach ($userdata as $key => $value) {
                    echo "<tr>\n";
                    echo "      <td>". $value['user_id']  ."</td>\n";
                    echo "      <td>". $value['user_firstname']  ."</td>\n";
                    echo "      <td>". $value['user_lastname']  ."</td>\n";
                    echo "      <td>". $value['user_adress']  ."</td>\n";
                    echo "      <td>". $value['user_postcode']  ."</td>\n";
                    echo "      <td>". $value['user_city']  ."</td>\n";
                    echo "      <td>". $value['user_state']  ."</td>\n";
                    echo "      <td>". $value['user_country']  ."</td>\n";
                    echo "      <td>". $value['user_telephone']  ."</td>\n";
                    echo "      <td>". $value['user_email']  ."</td>\n";
                    echo "      <td>". ucfirst($value['login_usertype'])  ."</td>\n";
                    echo "      <td><a class='btn btn-default' role='button' href='". URL ."admin_settings/userupdate/". $value['Login_login_id']  ."'>Update</a></td>\n";
                    echo "</tr>\n";
                   }
           ?>
        <tr>
            <td colspan="5">
                <a class="btn btn-default" href="<?php echo URL ?>admin_settings/useradd" role="button">Gebruiker toevoegen</a>
            </td>
            <td colspan="7">
                &nbsp;
            </td>
        </tr>
        
    </tbody> 
</table>
