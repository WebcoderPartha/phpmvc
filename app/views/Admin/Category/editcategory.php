<h2>Edit Category
    <a href="<?php echo BASE_URL; ?>/admin/category" style="border:none; float: right; overflow: hidden; padding:5px 10px; color:#fff;border: 1px solid #999999; text-decoration: none;background:green" >Back</a>
</h2>
<hr>
<?php
//if (!empty($_GET['msg'])){
//    $msg = unserialize(urldecode($_GET['msg']));
//    foreach ($msg as $value){
//        echo "<b style='color:#ff0000'>$value</b>";
//    }
//}
//?>
<?php
    if (isset($postErrors)){
        echo "<div style='color:red; border: 1px solid red; padding:5px 10px'>";
        foreach ($postErrors as $key => $value){
            switch ($key){
                case 'name':
                    foreach ($value as $val){
                        echo 'Title: '.$val.'</br>';
                    }
                    break;
                case 'email':
                    foreach ($value as $val){
                        echo 'Phone: '.$val.'</br>';
                    }
                    break;
                case 'phone':
                    foreach ($value as $val){
                        echo 'Phone: '.$val.'</br>';
                    }
                    break;
                case 'address':
                    foreach ($value as $val){
                        echo 'Address: '.$val.'</br>';
                    }
                    break;
                default:
                    break;
            }
        }
        echo '</div>';
    }
?>
<?php
if ($data){
    foreach ($student as $value){ ?>
<form method="POST" action="<?php echo BASE_URL; ?>/admin/updateCategory/<?php echo $value['id']; ?>">


<table>
    <tr>
        <td>Name:</td>
        <td><input type="text" name="name" value="<?php echo $value['name']; ?>" placeholder="Name"></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input type="email" name="email" value="<?php echo $value['email']; ?>" placeholder="Email"></td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td><input type="text" name="phone" value="<?php echo $value['phone']; ?>" placeholder="Phone"></td>
    </tr>
    <tr>
        <td>Address:</td>
        <td><textarea name="address" cols="30" rows="10"><?php echo $value['address']; ?></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Update"></td>
    </tr>
</table>
</form>

<?php     }
}
?>