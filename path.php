<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Path to htpasswd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS-Styles */
        body {
            align-items: center;
            background: #212529;
            color: white;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
        }
        .container {
            text-align: left;
            height: 100%;
        }
        .list-group-item {
            background: #212529;
            border: 1px solid #495057;
            color: white;
        }
        .copy-button {
            cursor: pointer;
        }
        .highlight-current {
            color: #5097ff;
            font-weight: bold;
        }
        .highlight-path {
            color: #5097ff;
            font-weight: bold;
        }
        .example-config {
            border-radius: 10px;
            border: 1px solid #495057;
            margin-top: 20px;
            padding: 20px;
        }
        .example-config span {
            color: #5097ff;
            display: block;
            font-family: monospace;
        }
        .password-form {
            margin-top: 20px;
            padding: 20px;
            background-color: #343a40;
            border-radius: 10px;
            border: 1px solid #495057;
            width: 100%;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            color: #5097ff;
        }
        .form-group input {
            border: 1px solid #495057;
            background-color: #343a40;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            width: 100%;
        }
        .btn-submit {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
        }
        .output-box {
            margin-top: 20px;
            padding: 20px;
            background-color: #343a40;
            border-radius: 10px;
            border: 1px solid #495057;
            color: #5097ff;
            font-family: monospace;
            display: none;
        }
        .mb-3 {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Paths:</h1>
        <div class="list-group">
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <span><span class="highlight-current">Current Path:</span> <?php echo dirname(__FILE__); ?></span>
                <button class="btn btn-primary copy-button" data-path="<?php echo dirname(__FILE__); ?>">Copy</button>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <span><span class="highlight-path">Path to htpasswd:</span> <?php echo dirname(__FILE__) . '/.htpasswd'; ?></span>
                <button class="btn btn-primary copy-button" data-path="<?php echo dirname(__FILE__) . '/.htpasswd'; ?>">Copy</button>
            </div>
        </div>
        <div class="example-config">
            <h2 class="mb-3">Example .htaccess Configuration:</h2>
            <span>AuthType Basic</span>
            <span>AuthName "Passwortgeschützter Bereich"</span>
            <span>AuthUserFile <?php echo dirname(__FILE__) . '/.htpasswd'; ?></span>
            <span>Require valid-user</span>
        </div>
        <form class="password-form" onsubmit="generateHash(); return false;">
            <h2 class="mb-3">Generate Password Hash:</h2>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-submit">Generate Hash</button>
        </form>
        <div class="output-box" id="outputBox">
            <h2 class="mb-3">Generated Password Hash:</h2>
            <span id="generatedHash"></span>
        </div>
        <div class="output-box" id="htpasswdBox">
            <h2 class="mb-3">Your .htpasswd should now have the following content:</h2>
            <span id="htpasswd"></span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function generateHash() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const combinedString = username + ':' + password;
            const hashedPassword = md5(combinedString);
            document.getElementById('generatedHash').textContent = hashedPassword;
            const htpasswd = username + ':' + hashedPassword;
            document.getElementById('htpasswd').textContent = htpasswd;
            document.getElementById('outputBox').style.display = 'block';
            document.getElementById('htpasswdBox').style.display = 'block';
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.18.0/js/md5.min.js"></script>
</body>
</html>
