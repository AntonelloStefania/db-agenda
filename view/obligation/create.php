<?php
include '../../class/Obligation.php';
include '../../class/ObligationDAO.php';
include '../../controller/ObligationController.php';
include '../../server.php';
include '../../head.php';

$obligationDao = new ObligationDAO($connection);
$obligationController = new ObligationController($obligationDao);
$obligationController->createFromForm();


?>

<!DOCTYPE html>
<html lang="en">


<body>
    <h1>Create New Obligation</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="start">Start Date:</label>
        <input type="date" id="start" name="start"><br>

        <label for="end">End Date:</label>
        <input type="date" id="end" name="end"><br>

        <button type="submit">Create Obligation</button>
    </form>
</body>

</html>