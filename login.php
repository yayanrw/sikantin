
<!-- 
<form action="" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" placeholder="Username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" placeholder="Password"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Login" name="login"></td>
		</tr>
	</table>
</form> -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php 
include_once 'Library.php';
$db = new Library();
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	$cekLogin = $db->cekLogin($username, $password);
}
?>
<div class="login-area">
        <div class="bg-image">
            <div class="login-signup">
                <div class="container">
                    <div class="login-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                          </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="login-details">
                                    <ul class="nav nav-tabs navbar-right">
                                        <!-- <li><a data-toggle="tab" href="#register">AdminLogin</a></li> -->
                                        <li class="active"><a data-toggle="tab" href="#login">LOGIN</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                    <form method="post" action="">
                        <div id="login" class="tab-pane fade in active">
                            <div class="login-inner">
                                <div class="title">
                                    <h1>Welcome <span>DebitCard Canteen Polinema</span></h1>
                                </div>
                                <div class="login-form">
                                    <form>
                                        <div class="form-details">
                                            <label class="user">
                                                <input type="text" name="username" placeholder="Username" id="username">
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="password" placeholder="Password" id="password">
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn" onsubmit="" name="login">Sign In</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                     </form> 
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>