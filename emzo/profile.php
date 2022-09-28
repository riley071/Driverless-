<?php

//header file is included here
include 'inc/header.php';

//user file is included here
include_once 'lib/user.php';
$user = new user;

//catching the id which is thrown from index page

$id = null;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

//user update function is created here
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $userupdate = $user->userUpdate($id, $_POST);
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $userupdate = $user->userDelete($id, $_POST);
}
?>

<!-- body area started form here -->

<div class="container w-50 mt-5">
    <div class="card">
        <div class="card-header bg-info>
            <h5 class="text-white">change your details</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST">
<?php

if(isset($userupdate)){
    echo $userupdate;
}

$userdata = $user->userById($id);

if($userdata){
    foreach($userdata as $data){ ?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>" id="name">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $data['user_name'] ?>" id="username">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $data['user_email'] ?>" id="email">
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="<?php echo $data['user_dob'] ?>" id="dod">
                </div>
                <div class="form-group">
                    <label for="pc">Postal Code</label>
                    <input type="number" name="pc" class="form-control" value="<?php echo $data['user_pc'] ?>" id="pc">
                </div>
                <div class="form-group">
                    <label for="pa">Postal Adress</label>
                    <input type="text" name="pa" class="form-control" value="<?php echo $data['user_pa'] ?>" id="pa">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $data['user_password'] ?>" id="password">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="text" name="cpassword" class="form-control" value="<?php echo $data['user_password'] ?>" id="cpassword">
                </div>
                
                <button type="submit" name="submit" class="btn btn-sm btn-info mt-4">Submit</button>
                <a href=""><button type="submit" name="delete" class="btn btn-sm btn-danger mt-4">Delete</button></a>
    <?php }
} ?>
            </form>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>