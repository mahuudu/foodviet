<?php
require_once('templates/layout/headerAdmin.php');
?>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Nhà Sản xuất</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt=0;
        while ($row= mysqli_fetch_assoc($result)) {
            $stt++;
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['producer_name'] ?></td>
                <td>
                    <a href="?action=editProducerAdmin&id=<?php echo $row['id'] ?>" class="btn btn-primary"></i>
                        Edit
                    </a>
                </td>
                <td>
                   <a  onclick="return confirm('delete?');" class="btn btn-danger
                   " href="?action=deleteProducerAdmin&id=<?= $row['id']?>"> DELETE </a>
               </td>
           </tr>
           <?php
       }
       ?>
   </tbody>
</table>
<?php
require_once('templates/layout/footerAdmin.php');
?>
