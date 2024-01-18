<?php
include '../../class/Obligation.php';
include '../../class/ObligationDAO.php';
include '../../controller/ObligationController.php';
include '../../server.php';
include '../../head.php';

$obligationDao = new ObligationDAO($connection);
$obligationController = new ObligationController($obligationDao);

$obligationId = $_GET['id'] ?? null;
$obligation = $obligationDao->getById($obligationId);

// Verifica se il modulo è stato inviato tramite il metodo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Se il modulo è stato inviato, esegui l'aggiornamento
    if ($obligation) {
        $obligationController->update($_POST);
    } else {
        echo "Obligation not found.";
    }

}

?>

<!DOCTYPE html>
<html lang="en">



<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Obligation</h1>


                <form method="post">
                    <div class="mb-3 mt-3">
                        <input type="hidden" name="id"
                            value="<?php echo isset($obligation['id']) ? $obligation['id'] : ''; ?>">
                        <label for="name" class="form-label">name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?php echo isset($obligation['name']) ? $obligation['name'] : ''; ?>" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="start" class="form-label">Start Date:</label>
                        <input type="date" id="start" name="start" class="form-control"
                            value="<?php echo isset($obligation['start']) ? $obligation['start'] : ''; ?>"><br>

                        <label for="end" class="form-label">End Date:</label>
                        <input type="date" id="end" name="end" class="form-control"
                            value="<?php echo isset($obligation['end']) ? $obligation['end'] : ''; ?>"><br>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="comment">Comments:</label>
                        <textarea class="form-control" rows="5" id="comment"
                            name="description"><?php echo isset($obligation['description']) ? $obligation['description'] : ''; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>