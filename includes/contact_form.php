<?php
// Process form submission
$formSubmitted = false;
$formError = false;
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_submit'])) {
    // Validate form inputs
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($message)) {
        $formError = true;
        $errorMessage = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formError = true;
        $errorMessage = 'Please enter a valid email address.';
    } else {
        // Process the valid form submission
        // In a real-world scenario, you might send an email, save to database, etc.
        // For this example, we'll just display a success message
        
        $to = "contact@videoprocessor.com";
        $subject = "New Contact Form Submission";
        $email_body = "Name: $name\n";
        $email_body .= "Email: $email\n\n";
        $email_body .= "Message:\n$message";
        $headers = "From: $email";
        
        // Uncomment to actually send the email in production
        // mail($to, $subject, $email_body, $headers);
        
        $formSubmitted = true;
    }
}
?>

<!-- Contact Form -->
<div class="contact-form-container">
    <?php if ($formSubmitted): ?>
        <div class="alert alert-success">
            <h4>Thank you for contacting us!</h4>
            <p>We've received your message and will respond to you shortly.</p>
            <button class="btn btn-sm btn-outline-success mt-2" onclick="resetContactForm()">Submit Another Message</button>
        </div>
    <?php else: ?>
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h3 class="card-title mb-4">Get in Touch</h3>
                
                <?php if ($formError): ?>
                    <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                <?php endif; ?>
                
                <form id="contactForm" method="post" action="#contactForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    </div>
                    <button type="submit" name="contact_submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
function resetContactForm() {
    // Use JavaScript to reload the page to show the form again
    window.location.href = window.location.pathname;
}
</script>
