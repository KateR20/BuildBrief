<?php
$appName = "BuildBrief";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $businessName = trim($_POST["business_name"] ?? "");
    $industry = trim($_POST["industry"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $websitePurpose = trim($_POST["website_purpose"] ?? "");
    $allowedGoals = [
    "Attract new customers",
    "Showcase products or services",
    "Sell products online",
    "Accept bookings",
    "Share information"
];

$submittedGoals = $_POST["goals"] ?? [];
$allowedPages = [
    "Home",
    "About",
    "Services",
    "Gallery",
    "Testimonials",
    "Contact",
    "FAQ"

    ];

$allowedFeatures = [
    "Contact form",
    "Online booking",
    "Photo gallery",
    "Customer testimonials",
    "Social media links",
    "Online payments",
    "Newsletter signup"

];

$allowedStyles = [
    "Modern",
    "Minimalist",
    "Elegant",
    "Bold",
    "Playful",
    "Professional"
];

$allowedFeels = [
    "Clean",
    "Creative",
    "Welcoming",
    "Corporate"
];





$goals = is_array($submittedGoals)
    ? array_values(array_intersect($allowedGoals, $submittedGoals))
    : [];
$submittedPages = $_POST["pages"] ?? [];

$pages = is_array($submittedPages)
    ? array_values(array_intersect($allowedPages, $submittedPages))
    : [];

$submittedFeatures = $_POST["features"] ?? [];

$features = is_array($submittedFeatures)
    ? array_values(array_intersect($allowedFeatures, $submittedFeatures))
    : [];

$submittedStyle = $_POST["website_style"] ?? "";
$websiteStyle = is_string($submittedStyle) &&
    in_array($submittedStyle, $allowedStyles, true)
    ? $submittedStyle : "";

$submittedFeel = $_POST["website_feel"] ?? "";
$websiteFeel = is_string($submittedFeel) &&
    in_array($submittedFeel, $allowedFeels, true)
    ? $submittedFeel : "";

$submittedColours = $_POST["preferred_colours"] ?? "";
$preferredColours = is_string($submittedColours)
    ? trim($submittedColours) : "";


    if (
        $businessName !== "" &&
        $industry !== "" &&
        $description !== "" &&
        $websitePurpose !== ""
    ) {
        $message = "Your information was received successfully!";



    if (!empty($goals)) {
        $message .= " Selected goals: " . implode(", ", $goals);
    }

    if (!empty($pages)) {
        $message .= " Selected pages: " . implode(", ", $pages);
    }

if (!empty($features)) {
    $message .= " Selected features: " . implode(", ", $features);
}

if ($websiteStyle !== "") {
    $message .= " Website style: " . $websiteStyle;
}

if ($preferredColours !== "") {
    $message .= " Preferred colours: " . $preferredColours;
}

if ($websiteFeel !== "") {
    $message .= " Overall feel: " . $websiteFeel;
}



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


                      <fieldset class="website-goals">
    <legend>What would you like your website to achieve?</legend>

    <label>
        <input type="checkbox" name="goals[]" value="Attract new customers">
        Attract new customers
    </label>

    <label>
        <input type="checkbox" name="goals[]" value="Showcase products or services">
        Showcase products or services
    </label>

    <label>
        <input type="checkbox" name="goals[]" value="Sell products online">
        Sell products online
    </label>

    <label>
        <input type="checkbox" name="goals[]" value="Accept bookings">
        Accept bookings or appointments
    </label>

    <label>
        <input type="checkbox" name="goals[]" value="Share information">
        Share information
    </label>
</fieldset>
            
<fieldset class="website-goals">
    <legend>Which pages would you like on your website?</legend>

    <label>
        <input type="checkbox" name="pages[]" value="Home">
        Home
    </label>

    <label>
        <input type="checkbox" name="pages[]" value="About">
        About
    </label>

    <label>
        <input type="checkbox" name="pages[]" value="Services">
        Services
    </label>

    <label>
        <input type="checkbox" name="pages[]" value="Gallery">
        Gallery
    </label>

    <label>
        <input type="checkbox" name="pages[]" value="Testimonials">
        Testimonials
    </label>

    <label>
        <input type="checkbox" name="pages[]" value="Contact">
        Contact
    </label>

    <label>
        <input type="checkbox" name="pages[]" value="FAQ">
        FAQ
    </label>
</fieldset>

<fieldset class="website-goals">
    <legend>What features would you like on your website?</legend>

    <label>
        <input type="checkbox" name="features[]" value="Contact form">
        Contact form
    </label>

    <label>
        <input type="checkbox" name="features[]" value="Online booking">
        Online booking or appointments
    </label>

    <label>
        <input type="checkbox" name="features[]" value="Photo gallery">
        Photo gallery
    </label>

    <label>
        <input type="checkbox" name="features[]" value="Customer testimonials">
        Customer testimonials
    </label>

    <label>
        <input type="checkbox" name="features[]" value="Social media links">
        Social media links
    </label>

    <label>
        <input type="checkbox" name="features[]" value="Online payments">
        Online payments
    </label>

    <label>
        <input type="checkbox" name="features[]" value="Newsletter signup">
        Newsletter signup
    </label>
</fieldset>


<fieldset class="website-goals">
    <legend>Design & Style Preferences</legend>

    <label for="website_style">
        What style would you like for your website?
    </label>
    <select id="website_style" name="website_style">
        <option value="">Select a style</option>
        <option value="Modern">Modern</option>
        <option value="Minimalist">Minimalist</option>
        <option value="Elegant">Elegant</option>
        <option value="Bold">Bold</option>
        <option value="Playful">Playful</option>
        <option value="Professional">Professional</option>
    </select>

    <label for="preferred_colours">
        Do you have any preferred colours?
    </label>
    <input type="text" id="preferred_colours"
           name="preferred_colours"
           placeholder="e.g. Navy blue, teal, white">

    <label for="website_feel">
        How would you like your website to feel?
    </label>
    <select id="website_feel" name="website_feel">
        <option value="">Select an overall feel</option>
        <option value="Clean">Clean</option>
        <option value="Creative">Creative</option>
        <option value="Welcoming">Welcoming</option>
        <option value="Corporate">Corporate</option>
    </select>
</fieldset>


<button type="submit">Save Information</button>

        </form>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> BuildBrief</p>
</footer>

</body>
</html>