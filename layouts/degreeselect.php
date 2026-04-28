<?php
    require_once '../database/database.php';
    $degree_subjects = new datamodel();


  if(isset($_GET['degree_id'])){
        $degreeSubjects = $degree_subjects->getData('bachelor_departments',' * ', ' WHERE degree_id ='.$_GET['degree_id'] );
        $i=5;
    }
?>

    <?php foreach($degreeSubjects as $subjects){?>
    <option value="<?= $subjects['id'] ?>"><?= $subjects['department_name'] ?></option>
    <?php } ?>
    
