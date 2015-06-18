<table>
    <tr>
        <td colspan="2">
           Welcome to this website <?php echo $name ?>. 
        </td>
    </tr>
    <tr>
        <td>
           You are registered with the username:
        </td>
        <td>
            <?php echo $username ?>
        </td>
    </tr>
    <tr>
        <td>
            Your verificationnumber is:
        </td>
        <td>
            <?php echo $verificationnumber ?>
        </td>
    </tr>
    <tr>
        <td>
            Please use the following link to verify your accoun :
        </td>
        <td>
            <a href="<?php echo $verificationlink ?>">Verify your account</a>
        </td>
    </tr>
</table>