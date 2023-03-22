<?php
    if (!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach ($msg as $value){
            echo "<b style='color: #06960E'>$value</b>";
        }
    }
?>
<div class="box_container">
    <div class="box">
        <h2>Student</h2>
        <p>Total: 345</p>
    </div>
    <div class="box">
        <h2>Student</h2>
        <p>Total: 345</p>
    </div>
    <div class="box">
        <h2>Student</h2>
        <p>Total: 345</p>
    </div>
</div>