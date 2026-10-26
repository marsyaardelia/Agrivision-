<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Database Error</title>
    <style>
        body { background:#f8f8f8; font-family:sans-serif; padding:40px; }
        .error-box { background:#fff; border-left:5px solid #e53e3e; padding:24px 32px; border-radius:8px; max-width:800px; margin:auto; box-shadow:0 2px 8px rgba(0,0,0,.08); }
        h1 { color:#e53e3e; margin:0 0 12px; font-size:22px; }
        p { color:#555; line-height:1.7; }
        .detail { background:#f3f4f6; padding:14px; border-radius:6px; font-family:monospace; font-size:13px; color:#333; word-break:break-all; }
    </style>
</head>
<body>
<div class="error-box">
    <h1>🗄️ <?php echo $heading; ?></h1>
    <?php foreach ($message as $line): ?>
    <div class="detail"><?php echo $line; ?></div>
    <?php endforeach; ?>
</div>
</body>
</html>
