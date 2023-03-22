<div class="changePasswordForm">
    <h2 style="text-align:center;padding:5px 0;margin: 0"><?php echo $data['username']; ?></h2>
    <?php
        if (!empty($_GET['msg'])){
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $value){
                echo "<b style='color:#ff0000'>$value</b>";
            }
        }
    ?>
    <hr>
    <form method="POST" action="<?php echo BASE_URL ?>/admin/updatePassword">
        <table>
            <tr>
                <td>Old Password:</td>
                <td><input type="password" name="oldPassword" placeholder="Type old password"></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" name="password" placeholder="Type New password"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirmPassword" placeholder="Type confirm password"></td>
            </tr>

            <tr>
                <td><input type="hidden" value="<?php echo $data['id'] ?>" name="userid"></td>
                <td><input type="submit" name="update" value="Change Password"></td>
            </tr>
        </table>
    </form>

</div>