<?php
    require_once '../database/database.php';
    $degree = new datamodel();


  if(isset($_GET['degree_level'])){
        $degreelvls = $degree->getData('bachelor_degrees',' * ', ' WHERE degree_level ='.$_GET['degree_level'] );
        
    }
?>

    <?php foreach($degreelvls as $degreelvl){?>
    <option value="<?= $degreelvl['id'] ?>"><?= $degreelvl['degree_name'] ?></option>
    <?php } ?>