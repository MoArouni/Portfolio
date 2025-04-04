<?php
require_once __DIR__ . '/includes/db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mohamad Arouni Webpage</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <script src="../js/toggle_darkmode.js"></script>
        <div class="dark-mode-toggle">
            <input type="checkbox" id="dark-mode-toggle">
            <label for="dark-mode-toggle"></label>
        </div>
        
        <ul class="nav-links">
            <li><a href="#about">Home</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#contact">Contact Me</a></li>
            <li><a href="viewBlog.php">Blog</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="../login.html">Login</a></li>
            <?php endif; ?>
        </ul>

        <script src="../js/hamburger_menu.js"></script>
        <button class="hamburger" id="hamburger">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>

        <div class="right-menu" id="right-menu">
            <ul>
                <li><a href="#about">About Me</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="/home/#hobbies">Hobbies</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="#cv">Download CV</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="#education">Education</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="#projects">Projects</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="#skills">Skills</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="#certifications">Certifications</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="#contact">Contact Me</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <li><a href="viewBlog.php">Blog</a></li>
                <div class="underline2" style="width: 90%;"></div>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="../login.html">Login</a></li>
                <?php endif; ?>
                <div class="underline2" style="width: 90%;"></div>

            </ul>
        </div>
        <script src="../js/anti-scroll-menu.js"></script>
    </nav>

    <section id="hero">
        <div class="hero-container">
            <!-- Left Section: Mission and Languages -->
            <div class="hero-left">
                <div class="section-box social-media links">
                    <section class="footer" id="social-media">
                        <a id = "facebook" href="https://www.facebook.com/mo.arouni/" 
                        class = "social-media-link" target="_blank">Facebook
                        </a>

                        <a id = "instagram" href="https://www.instagram.com/mohamad_arouni/" 
                        class = "social-media-link" target="_blank">Instagram
                        </a>
                        <a id = "linkedin" href="https://www.linkedin.com/in/mohamad-arouni-578168293/" 
                        class = "social-media-link" target="_blank">Linkedin
                        </a>
                        <a id = "github" href="https://github.com/MoArouni" 
                        class = "social-media-link" target="_blank">Github
                        </a>
                    </section>
                </div>  
                <div class="section-box languages">
                    <div class="skill-container">
                        <label for="skill">English</label>
                        <div class="skill-bar">
                            <div id = "languages" class="skill-progress" style="width: 100%;"></div> <!-- Fluent -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">French</label>
                        <div class="skill-bar">
                            <div id = "languages" class="skill-progress" style="width: 100%;"></div> <!-- Fluent -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Arabic</label>
                        <div class="skill-bar">
                            <div id = "languages" class="skill-progress" style="width: 100%;"></div> <!-- Fluent -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Spanish</label>
                        <div class="skill-bar">
                            <div id = "languages" class="skill-progress" style="width: 60%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Middle Section: Profile Picture and About Me -->
            <div id = "about" class="hero-middle">
                <div class="section-box hero-text">
                    <h1 style="text-align: left;">About</h1>
                    <div class="underline" style="width: 4rem;"></div>
                    <p><em>I'm not here to impress, I'm here to improve.</em></p>
                    <div class="hero-image">
                        <img src="/Project/images/about/me/tyre-pic.jpg" alt="Your Profile">
                        <figcaption>Aspiring Computer Scientist</figcaption>
                    </div>
                </div>
            </div>
    
            <!-- Right Section: "Currently Doing..." -->
            <div class="hero-right">
                <div class="section-box mission">
                    <h1>My Mission</h1>
                    <div class="underline" style="width: 6.8rem;"></div> <!-- Small line under the title -->
                    <p style="font-size: 1.1rem;">My mission is to harness the power of technology to create innovative solutions 
                        that solve real-world problems. My career aspirations include seeking work experience, 
                        finishing my project on my Flask application, starting a machine learning project,
                            and working in tech after graduating with a first. I aim to become a software engineer, 
                            delve into artificial intelligence, data analytics, and machine learning, or venture into cybersecurity.</p>
                </div>
            </div>
        </div>
    </section>   


    <section id="hobbies" class="intro-section">
        <h1 style="font-size: 2rem; text-align: center;">Passions and Hobbies</h1>
        <a href="#portfolio" class="cta-button">Skip to my portfolio:</a>
    </section>  

    <section id="hero2">
        <div class="hero-container">
            <div class="hero-left">
                <div id = "chess" class="section-box">
                    <h1>Chess</h1>
                    <div class="underline" style= "width: 3.5rem;"></div>
                    <p>Chess was a casual pastime for me as a kid, but as I grew older, 
                        I started playing for hours every day and became advanced in the game. 
                        It has given me numerous perspectives on life through the analogies you can draw from it.</p>
                    <figure class = "figure-container"> 
                        <img src="/Project/images/about/hobbies/chess.jpg" alt="Chess">
                        <figcaption>Chess Regionals Victory round 1</figcaption>
                    </figure>
                </div>
            </div>
    
            <!-- Middle Section: Swimming -->
            <div class="hero-middle2">
                <div id = "football" class="section-box">
                    <h1 style="text-align: left;">Football</h1>
                    <div class="underline" style="width: 5rem;"></div>
                    <p>Football has always been a major part of my life. 
                        I played in a Sunday league with a football club, 
                        and one of my proudest moments was scoring the winning goal 
                        that secured our promotion.</p>
                        <figure class = "figure-container"> 
                            <img src="/Project/images/about/hobbies/football.jpg" alt="Footabll">
                            <figcaption>Last Match at Hampstead FC</figcaption>
                        </figure>
                </div>

                <div id = "swimming" class="section-box">
                    <h1 style="text-align: left;" >Swimming</h1>
                    <div class="underline" style="width: 6.3rem;"></div>
                    <p>Football is my passion, but swimming is the sport where I truly excelled. 
                        I competed at the national level three times, starting when I was just five years old. 
                        Throughout my journey, I had the opportunity to compete in Lebanon, the UK, and Saudi Arabia, 
                        training twice a day. This intense commitment not only sharpened my athletic skills but also gave  
                        me a level of discipline that drives my success in every aspect of life.</p>
                    <figure class = "figure-container">
                        <img src="/Project/images/about/hobbies/swimming.jpg" alt="Swimming">
                        <figcaption>Nationals 6 and Under In Aramco, Riyadh</figcaption>
                    </figure>
                </div>
            </div>
    
            <!-- Right Section: Chess -->
            <div class="hero-right">
                <div id = "piano" class="section-box">
                    <h1>Piano</h1>
                    <div class="underline" style="width: 3.5rem;"></div>
                    <p>In addition to my studies and work, I enjoy playing the piano. With over 10 years of practice, I recently achieved a distinction in the grade 8 ABRSM piano performance exam.
                    These hobbies help me stay grounded and balanced, as well as active which helps me a lot while pursuing a career 
                    that lacks physical activity.</p>
                    <figure class = "figure-container">
                        <img src="/Project/images/about/hobbies/piano.jpg" alt="Swimming">
                        <figcaption>ABRSM grade 8 piano performance</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>


    <section id="portfolio" class="intro-section">
        <h1 style="font-size: 2rem; text-align: center; margin-right: 5rem;">Portfolio</h1>
        <div class="cv-container">
            <div class="cv-text">
                <p>If you wish to download my CV, you can do so here.</p>
            </div>
            <div id = "cv" class="cv-img">
                <script src="../js/cv_authorise.js"></script>
                <a id="downloadButton" href="javascript:void(0);" download>
                    <img src="/Project/images/about/me/cv.png" alt="Basic Info">
                </a>
            </div>
        </div>
    </section>

    <section id = "education">
        <div class="hero-container2">
            <div class="hero-box">
                <div class = "section-box"> 
                    <h1>Education</h1>
                </div>
                <div class="section-box">
                    <figure class = "figure-container"> 
                        <img src="/Project/images/about/work/school.webp" alt="School">
                        <figcaption>
                            Lycee International De Londres Winston Churchill
                        </figcaption>
                    </figure>
                    <div>
                        <br>
                        <p>Graduated with <strong>Highest Honours with Committee Praise</strong> in the French Baccalaureate.</p>
                        <ul>
                            <li>A* in Mathematics</li>
                            <li>A* in Physics & Chemistry</li>
                            <li>A* in Computer Science</li>
                            <li>A* in Further Mathematics</li>
                        </ul>
                    </div>
                </div>
                <div class="section-box">
                    <figure class = "figure-container"> 
                        <img src="/Project/images/about/work/university.png" alt="University">
                        <figcaption>
                            Queen Mary University of London 
                            EECS school (Electronic Engineering and Computer Science)
                        </figcaption>
                    </figure>
                    <div>
                        <br>
                        <p><strong>Bachelor of Computer Science with Industrial Placement</strong></p>
                        <br>
                        <p>Currently in my <strong>1st year</strong>, expected to graduate with <strong>First-Class Honours</strong>.</p>
                        <p>Relevant Courses:</p>
                        <ul>
                            <li>Procedural & Object-Oriented Programming</li>
                            <li>Systems & Networks (Computing Context)</li>
                            <li>Software Engineering Principles</li>
                        </ul>
                    </div>
                </div>
            </div>

    
            <!-- Right Section: Projects -->
            <div id = "projects" class="hero-box">
                <div class = "section-box"> 
                    <h1>Projects</h1>
                </div>
                <div class="section-box" >
                    <figure class="figure-container"> 
                        <a id="tetris" class="social-media-link" href="https://github.com/MoArouni/Tetris-project" target="_blank">
                            <img src="/Project/images/about/work/tetris.png" alt="Tetris">
                        </a>
                        <figcaption>
                            Tetris Enhacement : Open Source Project
                        </figcaption>
                        <br>
                        <div>
                            <p>Transformed a basic Tetris implementation by introducing a feature-rich menu system and refining gameplay functionalities.</p>
                            <ul>
                                <li>Enhanced user experience with an improved interface and upgraded visuals.</li>
                                <li>Implemented <strong>Object-Oriented Programming</strong> principles for scalability and maintainability.</li>
                            </ul>
                        </div>                    
                    </figure>
                </div>

                <div class="section-box" style = "flex-direction: column;">
                    <figure class = "figure-container"> 
                        <a id = "data-tools" class = "social-media-link" 
                            href="https://github.com/MoArouni/Data_analysis_tools" 
                            target="_blank">
                            <img src="/Project/images/about/work/data-tools.png" alt="Data-tools">
                        </a>
                        <figcaption>
                            Flask Application : Data Analytics for Jewerelly Businesses
                        </figcaption>
                    </figure>
                    <div>
                        <p>
                            Developed a <strong>Flask-based web application</strong> for structured data analysis and management, integrating a modular backend and an intuitive user interface.
                        </p>
                        <ul>
                            <li><strong>Automated Data Processing:</strong> Utilized Pandas for data cleaning and analysis.</li>
                            <li><strong>Dynamic Frontend Rendering:</strong> Implemented Jinja2 for real-time content updates.</li>
                            <li><strong>Secure & Scalable Backend:</strong> Used Object-Oriented Programming for maintainability.</li>
                            <li><strong>Real-Time Data Updates:</strong> Integrated Google Apps Script for automated database management.</li>
                            <li><strong>Security & Authentication (In Progress):</strong> Implementing role-based access, SQL storage, and encryption.</li>
                            <li><strong>Real-Time Data Updates:</strong> Integrated Google Apps Script for automated database management.</li>
                            <li><strong>Local Deployment:</strong> Used ngrok and Render to host the website locally for testing and demonstrations.</li>
                        </ul>
                        <p><em>Currently refining authentication and SQL storage for enhanced security.</em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="skills" class="intro-section">
        <h1 style="font-size: 2rem; text-align: center;">Skills</h1>
    </section> 

    <section id = "skills"> 
        <div class="hero-container2">
            <div class="skills">
                <div class="section-box">
                    <h1>Technical Skills</h1>
                    <br>
                    <div class="skill-container">
                        <label for="skill">Python</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%;"></div> <!-- Fluent -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Java</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">HTML5</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 85%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">CSS3</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">JavaScript</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 30%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">SQL</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 30%;"></div> <!-- Intermediate -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Abstract Thinking</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 100%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Data and Statistical Analysis</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 70%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                </div>
            
                <div class="section-box">
                    <h1>Soft Skills</h1>
                    <br>
                    <div class="skill-container">
                        <label for="skill">Collaboration</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 90%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Communication</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 100%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Problem Solving</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 100%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Time management</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Adaptability</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 90%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                </div>
            
                <div class="section-box">
                    <h1>Libraries and Frameworks</h1>
                    <br>
                    <div class="skill-container">
                        <label for="skill">Pandas</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Matplotlib</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 70%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Flask</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 95%;"></div> <!-- Proficient -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Pygame</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%;"></div> <!-- Intermediate -->
                        </div>
                    </div>
                    <div class="skill-container">
                        <label for="skill">Scikit Learn</label>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 20%;"></div> <!-- Intermediate -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="certifications" class="intro-section">
        <h1 style="font-size: 2rem; text-align: center;">Certifications</h1>
    </section>
    

    <section id="certifications">
        <div class = "hero-container2">
            <div class="certification-grid">
                <div class="certification-card">
                    <img src="/Project/images/about/work/data-certificate.png" alt="Data Analysis with Python">
                    <h3>Data Analysis with Python</h3>
                    <p>Issued by: edX</p>
                    <p>Year: July-August 2023</p>
                </div>
                <div class="certification-card">
                    <img src="/Project/images/about/work/web-certificate.png" alt="Introduction to Web Development with HTML5, CSS3, JavaScript">
                    <h3>Introduction to Web Development with HTML5, CSS3, JavaScript</h3>
                    <p>Issued by: edX</p>
                    <p>Year: August 2023</p>
                </div>
                <div class="certification-card">
                    <img src="/Project/images/about/work/ai-certificate.png" alt="AI for Everyone: Master the Basics">
                    <h3>AI for Everyone: Master the Basics</h3>
                    <p>Issued by: edX</p>
                    <p>Year: August 2023</p>
                </div>
                <!-- Repeat for other certifications -->
            </div>        
        </div>
    </section>

    
    <!-- Contact Section -->
    <section id="contact">
        <form action="https://formspree.io/f/mldgykon" method="POST">
            <h1 style = "font-size: 3rem; text-align: center;">Contact Me</h1>
            <br> 
            <br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required ></textarea>

            <div style="text-align: center;">
                <button class="cta-button" type="submit">Send</button>
            </div>
        </form>
        <script src="js/contact-form.js"></script>
    </section>



    <footer>
        <i>&copy; 2025 Mohamad Arouni. All rights reserved.</i>
    </footer>
</body>
</html>
