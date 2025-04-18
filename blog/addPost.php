<?php
require_once __DIR__ . '/includes/db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    $created_at = date('Y-m-d H:i:s'); // Current timestamp in MySQL format

    try {
        // Insert the post into the database
        $stmt = $pdo->prepare("INSERT INTO posts (title, content, user_id, created_at) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $content, $user_id, $created_at]);
        header('Location: viewBlog.php'); // Redirect to the blog view page after success
        exit();
    } catch (PDOException $e) {
        die("Error saving post: " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../css/blog.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/preview.css">

</head>
<body>
    <nav>
        <script src="../js/toggle_darkmode.js"></script>
        <div class="dark-mode-toggle">
            <button id="dark-mode-toggle" aria-label="Toggle dark mode">
                <svg class="sun" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
                <svg class="moon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
            </button>
        </div>

        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="home.php#portfolio">Portfolio</a></li>
            <li><a href="home.php#contact">Contact Me</a></li>
            <li><a href="viewBlog.php">Blog</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

        <script src="../js/hamburger_menu.js"></script>
        <button style="background : none;" class="hamburger" id="hamburger">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>

        <div class="right-menu" id="right-menu">
        <ul>
                <li><a href="home.php">Home</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="home.php#portfolio">Portfolio</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="home.php#cv">Download CV</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="#skills">Skills</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="#contact">Contact Me</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="viewBlog.php">Blog</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="logout.php">Logout</a></li>
                <div class="underline2" style="width: 90%;"></div>
            </ul>
        </div>
        <script src="../js/anti-scroll-menu.js"></script>
    </nav>

    <section>
        
        <form action="addPost.php" method="POST">
            <h1 style="font-size: 3rem; text-align: center;">Blog</h1>
            <br><br>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Title" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" placeholder="Enter your text here"></textarea>

            <div class="button">
                <button type="submit">Post</button>
                <button type="button" id="previewBtn">Preview</button>
                <button type="button" id="clearBtn">Clear</button>
            </div>
        </form>

        <div id="previewContainer" class="blog-container">
            <article class="blog-post" id="previewPost">
                <small class="date">
                    <span class="time-icon">🕒</span>
                    <span id="previewDate">Just now</span>
                </small>
                
                <h2 id="previewTitle"></h2>
                <div class="underline2"></div>
                <div id="previewContent" class="blog-content"></div>
                
                <div class="preview-actions">
                    <button id="editBtn" class="preview-btn preview-btn-edit">Edit Post</button>
                    <button id="publishBtn" class="preview-btn preview-btn-publish">Publish Now</button>
                </div>
            </article>
        </div>
        <script src="../js/features/preview_blog.js"></script>
    
    </section>
    <p id="statusMessage"></p>
    <script src="../js/blog-clear.js"></script>
</body>
</html>

