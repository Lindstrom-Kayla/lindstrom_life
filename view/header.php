<?php
$nav = GetNavigationItems();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Kayla Lindstrom">
        <title>Lindstrom Life</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/model/css/my.css">

        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js" ></script>
    </head>
    <body>
        <div class="page">
            <img class="logo" src="/images/lindLogo.jpg" alt="website logo" height="223" width="404">
            <nav>
                <ul>
                    <?php foreach ($nav as $action => $text) : ?>
                        <li>
                            <a href='/index.php?action=<?php echo $action ?>' title='<?php echo $text; ?>'><?php echo $text ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>