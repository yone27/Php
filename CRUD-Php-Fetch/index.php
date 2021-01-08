<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application Using OPP PDO Mysql & Fetch API of ES6</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <!-- Add User modal start -->
    <div class="modal fade" tabindex="-1" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" id="modal1" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control form-control-lg" name="fname" placeholder="Enter First Name" required>
                                <div class="invalid-feedback">First name is required!</div>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-control-lg" name="lname" placeholder="Enter Last Name" required>
                                <div class="invalid-feedback">Last name is required!</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter eamil" required>
                            <div class="invalid-feedback">email is required!</div>
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Enter phone" required>
                            <div class="invalid-feedback">phone is required!</div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Add User modal end -->
    <!-- Edit User modal start -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit this User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" id="modal2" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" class="p-2" novalidate>
                        <input type="hidden" name="id" id="id">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control form-control-lg" name="fname" id="fname" placeholder="Enter First Name" required>
                                <div class="invalid-feedback">First name is required!</div>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-control-lg" name="lname" id="lname" placeholder="Enter Last Name" required>
                                <div class="invalid-feedback">Last name is required!</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter eamil" required>
                            <div class="invalid-feedback">email is required!</div>
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter phone" required>
                            <div class="invalid-feedback">phone is required!</div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Edit User" class="btn btn-primary btn-block btn-lg" id="edit-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Edit User modal end -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-primary">All users in the database!</h4>
                </div>
                <div>
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Add new user</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>