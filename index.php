<?php
session_start();

/* 🔒 Passwort hier festlegen */
$PASSWORD = '(füge hier das Passwort ein)';

/* Falls Formular abgeschickt */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (hash_equals($PASSWORD, $_POST['password'] ?? '')) {
        // Optional: Session setzen
        $_SESSION['access'] = true;

        // Weiterleitung zu externer Seite
        header('Location: (füge hier den Link ein)');
        exit;
    } else {
        $error = 'Falsches Passwort';
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Privater Onlineshop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
            width: 300px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Privater Onlineshop</h2>

    <form method="post">
        <input type="password" name="password" placeholder="Passwort eingeben" required>
        <button type="submit">Weiter</button>
    </form>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
</div>

</body>
</html>
