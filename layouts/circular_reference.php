<?php
    require_once '../database/database.php';
    $circular_reff = new datamodel();


    if(isset($_GET['circular_id'])){
        $circulars = $circular_reff->getData('job_circulars',' * ', ' WHERE id ='.$_GET['circular_id'].' and status = "active"' );    
    }
?>

    <?php
    if(!empty($circulars)){
        foreach($circulars as $circular){
    
    ?>
        <option value="<?= $circular['id'] ?>"><?= $circular['circular_reference'] ?></option>
    <?php }}else{ ?>
        <option>NO Circular Available</option>
    <?php } ?>