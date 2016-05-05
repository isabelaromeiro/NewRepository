<!DOCTYPE html>
<html lang = 'eng'>
    <head>
        <title>Radford Yard Sale</title>
        <meta charset = 'utf-8' />
        <link rel="stylesheet" href="login-style.css"/>
    </head>
    <body>
        <?php
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            
            $namePattern = "/[A-Za-z]+/";
            $emailPattern = "/[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/";
            $phonePattern = "/[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/";
            
                //name validation
                function validateName () {
                    $valid = true;
            
                if (preg_match($namePattern, $name) === 0 || strlen($name) > 50 ) {
                    $valid = false;
                }
            
                return $valid;
                }
            
            //email 
            function validateEmail() {
                $valid = true;
            
                if (preg_match($emailPattern, $email) === 0) {
                    $valid = false;
                }
            
                return $valid;
            } 
            
            //phone
            function validatePhone() { 
                $valid = true;
            
                if (preg_match($phonePattern, $phone) === 0) {
                    $valid = false;
                }
            
                return $valid;
            }
            
            //password
            function validatePassword() {
                $valid = true;
                $length = strlen($_POST["password"]);
                
                if($length < 6 || $length > 25 || strcmp($_POST["password"], $_POST["confirmPassword"]) != 0) {
                    $valid = false;
                }
            
                return $valid;
            }
            
            if (validateName() && validateEmail() && validatePhone() && validatePassword()) {
                $conn = mysqli_connect('localhost', 'proj6', 'brasil2016', 'proj6');
                if($conn) {
                    echo "conectou";
                } else {
                    echo 'error';
                }

                $hashedPassword = hash("md5", $password);
                $query = "INSERT INTO user (name, email, password, phone_number)
                          VALUES ('$name', '$email', '$hashedPassword', '$phone')";
                $insert = mysqli_query($conn, $query);
            
                if (!$insert) {
                    echo "\nErro " . mysqli_error($conn);
                    exit;
                }
                mysqli_close($conn);
            
                ?>
        <div id='login'>
            <div id='loginFields'>
                <p id='title'>Radford Yard Sale</p>
                <form action='mainPage.php' method='post'>
                    <span>Successfully registered.</span><br/><br/>
                    <input class='button' type='submit' value='Ok'/>
                </form>
            </div>
        </div>
        <?php
            }
            else {
                ?>
        <div id='login'>
            <div id='loginFields'>
                <p id='title'>Radford Yard Sale</p>
                <form action='register.php' method='post'>
                    <span>Error: Could not register. Please, try again.</span><br/><br/>
                    <input class='button' type='submit' value='Try again'/>
                </form>
            </div>
        </div>
        <?php } ?>
        <footer>
            <p>Radford Yard Sale | 2016</p>
            <p>Contact us: <a href='mailto:radfordyarsale@gmail.com'>radfordyardsale@gmail.com</a></p>
        </footer>
    </body>
</html>