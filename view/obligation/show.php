<?php
include_once '../../class/Obligation.php';
include_once '../../class/ObligationDAO.php';
include_once '../../controller/ObligationController.php';
include_once '../../server.php';
include_once '../../head.php';

$obligationDao = new ObligationDAO($connection);
$obligationController = new ObligationController($obligationDao);

$obligationId = $_GET['id'] ?? null;
$obligation = $obligationDao->getById($obligationId);
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    <?php echo $obligation['name']; ?>
                </h3>
                <div class="mt-4 description-container">
                    <p>
                        <?php echo $obligation['description']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

<style>
    .description-container {
        max-width: 100%;
        /* Imposta la larghezza massima al 100% del contenitore padre */
        word-wrap: break-word;
        /* Abilita il ritorno a capo automatico per le parole lunghe */
    }
</style>