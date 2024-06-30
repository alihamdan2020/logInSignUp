<!-- first of all, get the values of session inside an array -->
<?php
session_start();
$errorsArray = $_SESSION["errors"] ?? [];
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>sign up</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
<h1 class="error"><?php echo $errorsArray["existMail"] ?? ""?></h1>
    <form action="signupcode1.php" method="post" novalidate>
        <!-- since i set required for email input you must set novalidate for the form -->
        <!-- novalidate is as preventDefault, ignore that the email field should be an eamil -->
        <div>
            <label for="name">user name</label>
            <input type="text" name="username" id="name">
            <span class="error">
                <?php echo ($errorsArray["uname"] ?? ""); ?>
            </span>
        </div>
        <div>
            <label for="email">email</label>
            <input type="email" name="email" id="email">
            <span class="error">
                <?php echo ($errorsArray["email"] ?? ""); ?>
            </span>
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password" id="password">
            <span class="error">
                <?php echo ($errorsArray["password"] ?? ""); ?>
            </span>
        </div>
        <div>
            <label for="confirmPassword">confirm password</label>
            <input type="password" name="confirm_password" id="confirmPassword">
            <span class="error">
            <?php echo ($errorsArray["password"] ?? ""); ?>
        </div>
        <div>
            <button>submit</button>
        </div>
    </form>
</body>

</html>