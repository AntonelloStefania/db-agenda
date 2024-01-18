<?php
include '../../class/Obligation.php';
include '../../class/ObligationDAO.php';
include '../../controller/ObligationController.php';
include '../../server.php';
include '../../head.php';

$obligationDao = new ObligationDAO($connection);
$obligationController = new ObligationController($obligationDao);
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $obligationId = $_POST['id'] ?? null;
    $obligationController->delete($obligationId);
}

$obligations = $obligationController->index();
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">



<body>



    <div class="wrapper">
        <?php include '../../sidebar.php' ?>
        <div id="content">

            <div class="col-12 text-center">
                <h1 class="mt-5">Agenda</h1>
            </div>
            <table class="table col-8 offset-2 text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Periodo</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($obligations as $obligation): ?>
                        <tr data-id="<?php echo $obligation['id']; ?>">
                            <td>
                                <?php echo $obligation['name']; ?>
                            </td>
                            <td>
                                <?php echo $obligation['start']; ?>
                            </td>

                            <td>
                                <a href="<?php echo "edit.php?id={$obligation['id']}" ?>">Modifica</a>
                            </td>
                            <td>
                                <form method='post' action='index.php' onclick="return confirm('Are you sure?')">
                                    <input type='hidden' name='action' value='delete'>
                                    <input type='hidden' name='id' value='<?php echo $obligation['id']; ?>'>
                                    <button type='submit'>Cancella</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content p-4">
                        <!-- show.php -->
                    </div>
                </div>
            </div>
            <div class="col-12 text-center my-5">

                <a href="create.php" class="btn btn-primary">Create New Obligation</a>
            </div>
        </div>
    </div>
</body>


</html>

<script>
    $(document).ready(function () {
        // Quando clicchi su una riga della tabella
        $('table').on('click', 'tr[data-id]', function () {
            var obligationId = $(this).data('id');

            // Carica la tua vista tramite AJAX
            $.ajax({
                url: 'show.php?id=' + obligationId,
                type: 'GET',
                success: function (data) {
                    // Inserisci il contenuto nella modale
                    $('#myModal .modal-content').html(data);
                    // Mostra la modale
                    $('#myModal').modal('show');
                }
            });
        });
    });


</script>

<style>

</style>