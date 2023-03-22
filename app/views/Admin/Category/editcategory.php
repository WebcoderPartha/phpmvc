<h2>Edit Category
    <a href="<?php echo BASE_URL; ?>/admin/category" style="border:none; float: right; overflow: hidden; padding:5px 10px; color:#fff;border: 1px solid #999999; text-decoration: none;background:green" >Back</a>
</h2>
<hr>
<?php
//if (isset($msg)){
//    echo $msg;
//}
//?>
<?php
if ($data){
    foreach ($data as $value){ ?>
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
        <td>Phone:</td>
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