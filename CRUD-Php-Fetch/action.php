<?php
require_once 'db.php';
require_once 'util.php';

$db = new Database;
$util = new Util;

// handle add new user ajax request
if (isset($_POST['add'])) {
    $fname = $util->testInput($_POST['fname']);
    $lname = $util->testInput($_POST['lname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);

    if ($db->insert($fname, $lname, $email, $phone)) {
        echo $util->showMessage('success', 'User inserted successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}
// handle fetch all users request
if (isset($_GET['read'])) {
    $users = $db->read();
    $output = '';
    if ($users) {
        foreach ($users as $row) {
            $output .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['first_name'] . '</td>
                <td>' . $row['last_name'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>
                    <button id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill editLink" data-toggle="modal"  data-target="#editUserModal">Edit</button>
                    <button type="button" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill deleteLink">Delete</button>
                </td>
            </tr>';
        }
        echo $output;
    } else {
        echo '
        <tr>
            <td colspan="6">No users found in the database!</td>
        </tr>
        ';
    }
}

// handle edit user fetch request
if (isset($_GET['edit'])) {
    $id = $_GET['id'];
    $user = $db->readOne($id);
    echo json_encode($user);
}

// handle update user fetch request
if (isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $fname = $util->testInput($_POST['fname']);
    $lname = $util->testInput($_POST['lname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);

    if ($db->update($id, $fname, $lname, $email, $phone)) {
        echo $util->showMessage('success', 'User update sucessfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}

// handle delete user fetch request
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $user = $db->delete($id);
    if ($user) {
        echo $util->showMessage('info', 'User deleted sucessfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}
