<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

require_once('config.php');

$user = $pwd = $hash = $hashed_pwd = $user_err = $pwd_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["user"]) && !empty(trim($_POST["user"]))){
        $user = trim($_POST["user"]);
    } else{
        $user_err = "Please enter a username.";
    }

    if(isset($_POST["pwd"]) && !empty(trim($_POST["pwd"]))){
        $pwd = trim($_POST["pwd"]);
        $hashed_pwd = hash("sha512", $pwd);
    } else{
        $pwd_err = "Please enter a password.";
    }

    if(empty($user_err) && empty($pwd_err)){
        $sql = "SELECT id_admin, user, pwd FROM admin WHERE user = :user";

        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":user", $param_user, PDO::PARAM_STR);

            $param_user = trim($_POST["user"]);

            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id_admin"];
                        $user = $row["user"];
                        $hash = $row["pwd"];
                        if ($hashed_pwd == $hash){
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["user"] = $user;
                            header("location: welcome.php");
                        } else{
                            $pwd_err = "The password you entered is not valid.";
                        }
                    }
                } else{
                    $user_err = "No account found with this username.";
                }
            } else{
                echo "Oops, something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    }

    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>Login - ENAC-Quiz !</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<nav>
			<div class="container">
				<a href="index_en.php"><img src="../media/epfl.jpg" alt="Logo EPFL" class="logo"></a>
				<a href="index_en.php">Home</a>
				<a href="new_test_en.php">Test</a>
				<a href="scores_en.php">Scores</a>
                <a href="admin_login_en.php">Login</a>
			</div>
			<div class="language-selector">
				<select name="language" id="language">
                    <option value="EN">EN</option>
				    <option value="FR">FR</option>
				</select>
			</div>
		</nav>
	</header>
	<main>
		<div class="content">
			<form action="" method="POST">
				<table class="login">
					<h2>Administrator login :</h2>
					<tr class="form-group <?php echo (!empty($user_err)) ? 'has-error' : ''; ?>">
						<td><label for="user">User</label></td>
						<td><input type="text" name="user" class=form-control id="user" placeholder="johndoe69" required/></td>
						<td><span class="help-block"><?php echo $user_err; ?></span></td>
					</tr>
					<tr class="form-group <?php echo (!empty($pwd_err)) ? 'has-error' : ''; ?>">
						<td><label for="pwd">Password</label></td>
						<td><input type="password" name="pwd" class=form-control id="pwd" required/></td>
						<td><span class="help-block"><?php echo $pwd_err; ?></span></td>
					</tr>
				</table>
				<br>
				<input type="submit" name="login" value="Connexion">
			  </form>
		</div>
	</main>
	<footer>
		<div class="container">
			<p>© 2023 EPFL, all rights reserved</p>
		</div>
	</footer>
	<script src="../js/script.js"></script>
</body>
</html>