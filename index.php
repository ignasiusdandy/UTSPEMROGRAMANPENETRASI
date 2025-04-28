<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pentes Lab - Dummy Site Scanner</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    padding: 20px;
  }

  input[type=text] {
    width: 300px;
  }

  pre {
    background-color: #f4f4f4;
    padding: 10px;
    border: 1px solid #ccc;
  }
  </style>
</head>

<body>
  <h2>Pentest Edukatif - Scanner Sederhana</h2>
  <form method="post">
    <label>Masukkan URL atau IP(Dummy site):</label> <br>
    <input type="text" name="target" required placeholder="http://example.com">
    <button type="submit" name="scan">Mulai Scan</button>
  </form>

  <?php
  if (isset($_POST['scan'])) {
    $target = escapeshellarg($_POST['target']);
    echo "<h3>Hasil Scan</h3>";

    // 1. WhatWeb
    echo "<h4>[+] WhatWeb:</h4><pre>";
    echo htmlspecialchars(shell_exec("whatweb $target 2>&1"));
    echo "</pre>";

    // 2. Nikto
    echo "<h4>[+] Nikto:</h4><pre>";
    echo htmlspecialchars(shell_exec("nikto -h $target 2>&1"));
    echo "</pre>";

    // 3. Nmap (basic TCP scan)
    echo "<h4>[+] Nmap (Port Terbuka):</h4><pre>";
    echo htmlspecialchars(shell_exec("nmap -sS -Pn $target 2>&1"));
    echo "</pre>";
  }
  ?>
</body>

</html>