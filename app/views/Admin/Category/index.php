<?php Session::init();
//    $msg = Session::get('msg');
//    if (isset($msg)){
//        echo $msg;
//    }else{
//        Session::destroy();
//    }
?>
<table border="1" width="80%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $value){ ?>
        <tr>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['phone'] ?></td>
            <td><?php echo $value['address'] ?></td>
            <td><a style="padding:5px 10px; border:none; background:lightgreen; color:#000" href="<?php echo BASE_URL; ?>/Admin/editCategory/<?php echo $value['id']; ?>" >Edit</a></td>
            <td><a style="padding:5px 10px; border:none; background:lightgreen; color:#000" href="<?php echo BASE_URL; ?>/admin/delCategory/<?php echo $value['id']; ?>" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
    <?php }
    ?>
    </tbody>

</table>