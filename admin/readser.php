 <?php 
 require_once 'connect.php';
    $a= "Select * from `service`";
    $res1 = mysqli_query($con,$a);
            
    $index = 0;
    if(!empty($res1))
        {
        foreach ($res1 as $ct) {
            $index++;
        ?>
        <tr>
            <td><?php echo $index; ?></td>
            <td><?php echo $ct['sname']; ?></td>
            <td>
                <a id="" class="delete_cat" onclick="deletefunc(this)" data-id="<?php echo $ct['sid']; ?>" >Delete</a>
            </td>
        </tr>
        <?php
                }
                
            } else {
                
        ?>
        <tr>
            <td colspan="3">No Service Found</td>
        </tr>
    <?php
                                                                
        }
    ?>