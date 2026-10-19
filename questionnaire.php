<?php
$appName = "BuildBrief";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $businessName = trim($_POST["business_name"] ?? "");
    $industry = trim($_POST["industry"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $websitePurpose = trim($_POST["website_purpose"] ?? "");

    if (
        $businessName !== "" &&
        $industry !== "" &&
        $description !== "" &&
        $websitePurpose !== ""
    ) {
        $message = "Your information was received successfully!";
    } else {
        $message = "Please complete all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Questionnaire | BuildBrief</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1><?php echo $appName; ?></h1>

    <nav aria-label="Main navigation">
        <a href="index.php">Home</a>
        <a href="questionnaire.php">Questionnaire</a>
    </nav>
</header>

<main>
    <section>
        <h2>Let's Plan Your Website!</h2>
        <?php if ($message !== ""): ?>
    <p class="form-message">
        <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
    </p>
<?php endif; ?>
        <p>
            Tell us a little about your business and
            the website you would like to create.
        </p>

        <form action="questionnaire.php" method="POST">

            <label for="business_name">Business Name</label>
            <input type="text" id="business_name"
                   name="business_name" required>

            <label for="industry">Business Industry</label>
            <input type="text" id="industry"
                   name="industry" required>

            <label for="description">Describe Your Business</label>
            <textarea id="description"
                      name="description" rows="5"
                      required></textarea>

            <label for="website_purpose">
                What is the main purpose of your website?
            </label>
            <textarea id="website_purpose"
                      name="website_purpose" rows="4"
                      required></textarea>

            <button type="submit">Save Information</button>

        </form>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> BuildBrief</p>
</footer>

</body>
</html>