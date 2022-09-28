<?php

//header file is included
include 'inc/header.php';

//user file is included here
include 'lib/user.php';
$user = new user;

session::userSession();

?>

<!-- body area started from here -->

<div class="container mt-5">
    <table class="table table-hover">
    <thead class="text-white bg-info">
        <tr>
        <th scope="col">User Id</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
<?php

$userlist = new user;
$result = $userlist->userList();

if($result){
    foreach($result as $data){ ?>
        <tr>
            <th scope="row"><?php echo $data['id']; ?></th>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['user_name']; ?></td>
            <td><?php echo $data['user_email']; ?></td>
            <td><a href="profile.php?id=<?php echo $data['id']; ?>"><button class="btn btn-info btn-sm">View</button></a></td>
        </tr>
<?php }
} ?>
    </tbody>
    </table>
</div>

<?php
    include 'inc/footer.php';
?>