<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - SmartScope</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            min-height: 100vh;
        }

        .back-link {
            display: inline-block;
            color: #00ff9d;
            text-decoration: none;
            margin: 2rem 0 0 2rem;
            transition: transform 0.3s ease;
        }

        .back-link:hover {
            transform: translateX(-5px);
        }

        .main-content {
            padding: 120px 2rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero {
            text-align: center;
            padding: 3rem 0;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #00ff9d, #00f0ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.2rem;
            color: #ccc;
            max-width: 800px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: #00ff9d;
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(0, 255, 157, 0.3);
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #00ff9d;
            box-shadow: 0 0 10px rgba(0, 255, 157, 0.2);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: #00ff9d;
            border: none;
            border-radius: 5px;
            color: #0f2027;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background: #00cc7d;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 157, 0.3);
        }

        .contact-info {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            text-align: center;
        }

        .contact-info h3 {
            color: #00ff9d;
            margin-bottom: 2rem;
            font-size: 1.5rem;
        }

        .contact-item {
            margin-bottom: 1.8rem;
        }

        .contact-item h4 {
            color: #00ff9d;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .contact-item p {
            color: #ccc;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
            margin-top: 2rem;
            justify-content: center;
        }

        .social-links a {
            color: #00ff9d;
            text-decoration: none;
            width: 45px;
            height: 45px;
            border: 1px solid #00ff9d;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-links a:hover {
            background: rgba(0, 255, 157, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 157, 0.2);
        }
    </style>
</head>
<body>
    <a href="index.html" class="back-link">← Back to Home</a>
    
    <main class="main-content">
        <div class="hero">
            <h1>Contact Us</h1>
            <p>Have questions or feedback? We'd love to hear from you. Reach out to our team using the form below.</p>
        </div>

        <div class="contact-container">
            <div class="contact-form">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>

            <div class="contact-info">
                <h3>Get in Touch</h3>
                <div class="contact-item">
                    <h4><i class="fas fa-envelope"></i> Email</h4>
                    <p>support@smartscope.com</p>
                </div>
                <div class="contact-item">
                    <h4><i class="fas fa-phone"></i> Phone</h4>
                    <p>+1 (555) 123-4567</p>
                </div>
                <div class="contact-item">
                    <h4><i class="fas fa-map-marker-alt"></i> Address</h4>
                    <p>123 Research Avenue<br>Innovation District<br>Tech City, TC 12345</p>
                </div>
                <div class="social-links">
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" title="GitHub"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html> 