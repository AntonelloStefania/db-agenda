<?php
include_once("../../class/Contact.php");
include_once("../../class/ContactDAO.php");
include_once("../../controller/ContactController.php");
include_once("../../server.php");
include_once("../../head.php");

$contactDao = new ContactDao($connection);
$contactController = new ContactController($contactDao);

// if ($SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "delete") {
//     $contactId = $_POST["id"] ?? null;
//     $contactController->delete($contactId);
// }

$contacts = $contactController->index();
$connection->close();

?>

<!DOCTYPE html>
<html lang="en">



<body>
    <div class="wrapper" id="contactTableContainer">
        <?php include '../../sidebar.php' ?>
        <div id="content">
            <div class="col-12 text-center">
                <h1 class="mt-5">Rubrica</h1>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Contact List <span class="text-muted fw-normal ms-2">(834)</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                            <div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-target=".add-new" class="btn btn-primary"><i class="bx bx-plus me-1"></i>
                                    Add New</a>
                            </div>
                            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php include 'create.php' ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <?php foreach ($contacts as $contact): ?>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">

                                    <div class="d-flex align-items-center">
                                        <div><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""
                                                class="avatar-md rounded-circle img-thumbnail" /></div>
                                        <div class="flex-1 ms-3">
                                            <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">
                                                    <?php echo $contact['name'], $contact['surname'] ?>
                                                </a>
                                            </h5>
                                            <span class="badge badge-soft-success mb-0">Full Stack Developer</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 pt-1">
                                        <p class="text-muted mb-0"><i
                                                class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary"></i>
                                            <?php echo $contact['phone'] ?>
                                        </p>
                                        <p class="text-muted mb-0 mt-2"><i
                                                class="mdi mdi-email font-size-15 align-middle pe-2 text-primary"></i>
                                            <?php echo $contact['mail'] ?>
                                        </p>
                                        <p class="text-muted mb-0 mt-2"><i
                                                class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-primary"></i>
                                            80 South Street MONKW 7BR</p>
                                    </div>
                                    <div class="d-flex gap-2 pt-4">
                                        <button type="button" class="btn btn-soft-primary btn-sm w-50"><i
                                                class="bx bx-user me-1"></i> Profile</button>
                                        <button type="button" class="btn btn-primary btn-sm w-50"><i
                                                class="bx bx-message-square-dots me-1"></i> Contact</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content p-4">
                        <!-- show.php -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>


</html>


<style scoped>
    .card {
        margin-bottom: 24px;
        box-shadow: 0 2px 3px #e4e8f0;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #eff0f2;
        border-radius: 1rem;
    }

    .avatar-md {
        height: 4rem;
        width: 4rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .img-thumbnail {
        padding: 0.25rem;
        background-color: #f1f3f7;
        border: 1px solid #eff0f2;
        border-radius: 0.75rem;
    }

    .avatar-title {
        align-items: center;
        background-color: #3b76e1;
        color: #fff;
        display: flex;
        font-weight: 500;
        height: 100%;
        justify-content: center;
        width: 100%;
    }

    .bg-soft-primary {
        background-color: rgba(59, 118, 225, .25) !important;
    }

    a {
        text-decoration: none !important;
    }

    .badge-soft-danger {
        color: #f56e6e !important;
        background-color: rgba(245, 110, 110, .1);
    }

    .badge-soft-success {
        color: #63ad6f !important;
        background-color: rgba(99, 173, 111, .1);
    }

    .mb-0 {
        margin-bottom: 0 !important;
    }

    .badge {
        display: inline-block;
        padding: 0.25em 0.6em;
        font-size: 75%;
        font-weight: 500;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.75rem;
    }
</style>