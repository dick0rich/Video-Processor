<?php
$page_title = "Home";
$active_page = "home";
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; ?>

<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">Transform Your Social Media Videos</h1>
                    <p class="lead my-4">Effortlessly process, enhance, and optimize your videos for all social platforms in one place.</p>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="assets/hero-bg.svg" alt="Video Processing Illustration" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Key Features</h2>
                <p class="section-subtitle">Everything you need to create perfect social media videos</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/feature-1.svg" alt="Powerful Editing">
                        </div>
                        <h3>Powerful Editing</h3>
                        <p>Professional-grade tools accessible to everyone. Trim, crop, add effects, and more.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/feature-2.svg" alt="Multi-Platform Format">
                        </div>
                        <h3>Multi-Platform Format</h3>
                        <p>Automatically optimize your videos for every social platform with one click.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/feature-3.svg" alt="Cloud Processing">
                        </div>
                        <h3>Cloud Processing</h3>
                        <p>Save device resources with our powerful cloud-based processing technology.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works-section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">How It Works</h2>
                <p class="section-subtitle">Three simple steps to perfect social videos</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="step-card text-center">
                        <div class="step-number">1</div>
                        <h3>Upload</h3>
                        <p>Upload your raw video footage from any device</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card text-center">
                        <div class="step-number">2</div>
                        <h3>Process</h3>
                        <p>Apply edits, effects, and platform-specific optimizations</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card text-center">
                        <div class="step-number">3</div>
                        <h3>Share</h3>
                        <p>Download or directly share to your social platforms</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title">Ready to Transform Your Social Media?</h2>
                    <p class="mb-4">Contact us to learn more about how our video processing platform can help you create stunning social media content.</p>
                    <div class="contact-info">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-fill me-2"></i>
                            <span>contact@videoprocessor.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php include 'includes/contact_form.php'; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
</html>
