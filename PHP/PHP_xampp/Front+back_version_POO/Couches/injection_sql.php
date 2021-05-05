<?php

include_once(__DIR__ . "Service/EmployeService.php");

// Controller

if ($_POST) {
    $employeDao = new EmployeDAO();
    $data = $employeDao->searchByNoemp($_POST['noemp']);

    print_r($data);
} else {

?>
    <form action="" method="POST">
        <label for="noemp">Saisissez votre référence :</label>
        <input type="text" name="noemp">
        <input type="submit" value="Search">
    </form>
<?php
}


?>