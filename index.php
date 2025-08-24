<?php
// Simple tools array, could be loaded from DB in real use
$tools = [
    ['name' => 'AI Chatbot', 'desc' => 'Conversational AI for customer support.'],
    ['name' => 'Image Generator', 'desc' => 'Create unique images from text prompts.'],
    ['name' => 'Text Summarizer', 'desc' => 'Summarize articles and documents instantly.'],
    ['name' => 'Code Assistant', 'desc' => 'Helps write and debug code efficiently.']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Tools Workshop</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <div class="logo">AI<span class="accent">Workshop</span></div>
        <nav>
            <a href="#tools">Tools</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h1>Unlock the Power of AI Tools</h1>
            <p class="tagline">Minimalist. Unique. Engaging.<br>Join our workshop and build the future.</p>
            <button onclick="document.getElementById('contact').scrollIntoView({behavior:'smooth'})">Get Started</button>
            <canvas id="hero-canvas"></canvas>
        </section>
        <section id="tools" class="tools">
            <h2>Featured AI Tools</h2>
            <div class="tools-list">
                <?php foreach($tools as $tool): ?>
                <div class="tool-card">
                    <div class="tool-name"><?= htmlspecialchars($tool['name']) ?></div>
                    <div class="tool-desc"><?= htmlspecialchars($tool['desc']) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section id="about" class="about">
            <h2>About Workshop</h2>
            <p>AI Tools Workshop is a hands-on event where you explore, learn, and build with cutting-edge AI tools. Whether you're a beginner or a pro, join us to unlock new possibilities!</p>
        </section>
        <section id="contact" class="contact">
            <h2>Contact Us</h2>
            <form id="contact-form" method="post" action="">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send</button>
            </form>
            <div id="form-msg"></div>
        </section>
    </main>
    <footer>
        &copy; <?= date('Y') ?> AI Tools Workshop. Crafted with minimalism.
    </footer>
    <script src="assets/script.js"></script>
</body>
</html>
