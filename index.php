<!DOCTYPE html>
<html>
<head>
    <title>Bakery Login Page</title>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-image: url('https://github.com/AngeliqueCampo/HTML-and-CSS-Fundamentals-4/raw/main/GhibliGIF2.gif'); 
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px solid #333;
        }
        h2 {
            color: #333;
            font-size: 24px;
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
        }
        label {
            color: #555;
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            color: #555;
            font-size: 14px;
            text-align: center;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="index.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (empty($username) || empty($password)) {
                echo "<p>Please fill in all fields.</p>";
            } else {
                $conn = new mysqli('localhost', 'root', '', 'bakery');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($stored_password);

                if ($stmt->num_rows > 0) {
                    $stmt->fetch();
                    if ($password === $stored_password) {
                        session_start();
                        $_SESSION['username'] = $username;
                        header("Location: order_taker.php");
                    } else {
                        echo "<p>Invalid username or password.</p>";
                    }
                } else {
                    echo "<p>Invalid username or password.</p>";
                }

                $stmt->close();
                $conn->close();
            }
        }
        ?>
    </div>
</body>
</html>
