<!DOCTYPE html>
<html lang="en">

<head>
    <title>AdminLTE 3 | DataTables</title>
    <?php include 'partials/head.php' ?>
    <?php
    $email = "";
    $password = "";
    $name = "";
    $role = "";
    $created_at = date('Y-m-d');
    $emailErr = "";
    $passwordErr = "";
    $nameErr = "";
    $roleErr = "";
    $errMsg = "";
    $successMsg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }
        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
        }
        if (empty($_POST["role"])) {
            $roleErr = "role is required";
        } else {
            $role = test_input($_POST["role"]);
        }


        //Database Connection
        $conn = mysqli_connect("localhost", "root", "", "rent_a_car") or die("Connection Error: " . mysqli_error($conn));
        $sql = "INSERT INTO users (name, email, password, role, created_at) VALUES('$name', '$email','$password','$role', '$created_at');";
        try {
            $result = $conn->query($sql);
        } catch (\Throwable $th) {
            $errMsg = $th->getMessage();
        }
        $conn->close();

        if ($result === TRUE) {
            $successMsg = "User is successfully created";
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Navbar -->
    <?php include 'partials/header.php' ?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include 'partials/sidebar.php' ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Advanced Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Advanced Form</li>
                        </ol>
                    </div>
                    <p style="color: green;"><?php echo $successMsg ?></p>
                    <p style="color: red;"><?php echo $errMsg ?></p>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Select2 (Default Theme)</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input required type="name" name="name" class="form-control" id="inputName" placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input required type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input required type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select required class="form-control select2" style="width: 100%;" name="role">
                                            <option disabled>Select</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>

                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>

    </div>
    </div>
    </section>
    </div>
</body>

</html>