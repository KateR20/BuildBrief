<?php
$appName = "BuildBrief";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $appName; ?> | Website Planning</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1><?php echo $appName; ?></h1>

        <nav aria-label="Main navigation">
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="#get-started">Get Started</a>
        </nav>
    </header>

    <main>
        <section id="about">
            <h2>Website Planning Made Simple</h2>
            <p>
                Not sure what your website needs?
                BuildBrief helps you plan your website
                one step at a time.
            </p>
        </section>

        <section id="get-started">
            <h2>Ready to Plan Your Website?</h2>
            <p>
                Answer a few simple questions to create
                your own website project brief.
            </p>
            <button type="button" disabled>
                Coming Soon
            </button>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> BuildBrief</p>
    </footer>

</body>
</html>