<?php
include_once("../../class/Contact.php");
include_once("../../class/ContactDAO.php");
include_once("../../controller/ContactController.php");
include_once("../../server.php");
include_once("../../head.php");

$contactDao = new ContactDAO($connection);
$contactController = new ContactController($contactDao);
$contactController->create();

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <div class="row">
        <div class="col-12">
            <div class=" mb-4">

                <div class="">
                    <form method="POST" id="yourFormId">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example1" class="form-control" name="name" required />
                                    <label class="form-label" for="form7Example1">First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example2" class="form-control" name="surname" />
                                    <label class="form-label" for="form7Example2">Last name</label>
                                </div>
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form7Example3" class="form-control" />
                            <label class="form-label" for="form7Example3">Company name</label>
                        </div>

                        <!-- Text input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form7Example4" class="form-control" />
                            <label class="form-label" for="form7Example4">Address</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form7Example5" class="form-control" name="email" />
                            <label class="form-label" for="form7Example5">Email</label>
                        </div>

                        <!-- Number input -->
                        <div class="form-outline mb-4">
                            <input type="number" id="form7Example6" class="form-control" name="phone" />
                            <label class="form-label" for="form7Example6">Phone</label>
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form7Example7" rows="4" name="note"></textarea>
                            <label class="form-label" for="form7Example7">Additional information</label>
                        </div>
                        <div class="form-outline mb-4">
                            <button type="submit" data-bs-dismiss="modal">Add Contact</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Aggiungi questo script per gestire la chiamata AJAX
        $('form#yourFormId').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'create.php',
                data: $(this).serialize(),
                success: function (data) {
                    // Aggiorna la tabella dei contatti
                    $('#contactTableContainer').html(data);
                }
            });
        });
    });
</script>