<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/auth_style.css" />
</head>
<body>
    
    <div class="main-container">
        
        <div class="form">
                <div class="logo">
                    <img src="./assets/img/logo.png" alt="site logo" width="100px">
                </div>
                <h1 class="header">Login to your Account.</h1>
                <form action="./login_process.php" method="post">
    
                       <?php include("./alert.php"); ?>

                        <div class="form-group">
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <input type="email" placeholder="Email" id="email" class="input-box" name="email" required>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="icon"><i class="fa fa-lock"></i></div>
                            <input type="password" placeholder="Password" id="password1" class="input-box" name="password" required>
                            <div class="iconeye" id="iconeye1"><i class="fa fa-eye-slash"></i></div>
                        </div>
                        
                        
                        <div class="form-group2">
                            <input type="checkbox" id="r_me"> Remember Me
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" value="Log In" id="Login" name="login" class="btn">
                        </div>
                        <div class="form-group text-white">
                            <p><a href="passwordrecovery.php" class="alink">Forget your password? click here</a></p>
                        </div>
                        <div class="form-group">
                            <p>Don't have an account</p>
                            <p>
                                <a href="signup.php" class="btn">Signup</a>
                            </p>
                        </div>
                        
                </form> 
                        
        </div>

        <div class="bgcontainer">
            <div class="bgcontent">
                <div class="logo">
                    <img src="./assets/img/logo_black.png" alt="" class="ilogo">
                </div>
                <div class="title">
                    <h3>Welcome to Income Members</h3>
                </div>
                <div class="description">
                    <p>The future won’t be built by compromising tomorrow’s earning abilities today.</p>
                </div>
            </div>
        </div>
    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="./assets/js/app.js"></script>
</body>
</html>