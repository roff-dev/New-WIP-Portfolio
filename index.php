<?php

include ("inc/nav.php");
include ("inc/connection.php");

?>

    <!-- 
    <html>
    <body> 
    -->
    <!-- 
    ///////////////////////////////////// HERO CONSOLE ////////////////////////////////////////////
    -->
    <div class="container">
        <div class="hero">
            <section>
                <div class="text-editor">
                    <!-- Top white bar -->
                    <div class="white-bar">
                        <div class="window-controls">
                            <span class="close"></span>
                            <span class="minimize"></span>
                            <span class="fullscreen"></span>
                        </div>
                        <div class="terminal-file-name">
                            <span class="icon-folder"></span>
                            <span class="terminal-window-name">Portfolio V1.2</span>
                        </div>
                    </div>
                    <div class="text-body">
                        $&nbsp;<span id="typed"></span>
                    </div>
                </div>
                <div class="bottom-arrow">
                    <a href="#portfolio"><span class="icon-keyboard_arrow_down no-status-url" data-url="#portfolio"></span></a>
                </div> 
            </section>
        </div>
        <!-- 
        /////////////////////////////////////////////////////////////////////////////////////
        -->
        <!-- 
        ///////////////////////////////////// PROJECTS ////////////////////////////////////////////
        -->
        <div class="wrapper">
            <div class="projects" id="portfolio">
                <div class="card">
                    <div class="front">
                        <div class="flip-tag">Click to Flip</div>
                        <img src="img/disspic1.png"  alt="">
                        <h3>Project 1 - Dissertation Project</h3>
                        <a href="diss.php">See Project</a>
                    </div>
                    <div class="back">
                        <h3>Title: Contactless Mobile Web Reward System To Enhance Customer Engagement.</h3>
                        <h4>Grade: 72/100 - <span>First Class Honours</span></h4>
                        <h4>Skills required:</h4>
                        <ul class="skills-req">
                            <li>HTML, CSS & JavaScript</li>
                            <li>MongoDB Database</li>
                            <li>Entity Relationships</li>
                            <li>SQL</li>
                            <li>Authentication Tokens</li>
                            <li>NFC Connectivity</li>
                        </ul>
                        <a href="Dissertation.pdf" download>Download PDF</a>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <div class="flip-tag">Click to Flip</div>
                        <img src="img/project1.png" alt="">
                        <h3>Project 2 - Create Netmatters Hompepage</h3>
                        <a href="http://netmatters.kieron-oates.netmatters-scs.co.uk" target="_blank">See Project</a>
                    </div>
                    <div class="back">
                        <h3>Create Netmatters Hompepage</h3>
                        <h4>Time to complete: <span>80h</span></h4>
                        <h4>Skills required:</h4>
                        <ul class="skills-req">
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>Sass</li>
                            <li>Flexbox</li>
                            <li>Grid</li>
                            <li>Mobile First Approach</li>
                        </ul>
                        <a href="code.php">Code Snippets</a>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <div class="flip-tag">Click to Flip</div>
                        <img src="img/js-array-image.png" alt="">
                        <h3>Project 3 - Javascript Array</h3>
                        <a href="http://js-array.kieron-oates.netmatters-scs.co.uk" target="_blank">See Project</a>
                    </div>
                    <div class="back">
                        <h3>JS Array and Fetch API</h3>
                        <h4>Time to complete: <span>40h</span></h4>
                        <ul class="skills-req">
                            <h4>Skills required:</h4>
                            <li>JavaScript</li>
                            <li>API Fetching</li>
                            <li>Form Validation</li>
                            <li>Error Handling</li>
                            <li>State Management</li>
                            <li>Event Handling</li>
                            <li>Data Structure/Management</li>
                        </ul>
                        <a href="code.php">Code Snippets</a>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <img src="img/placeholder.svg" alt="">
                        <h3>Project 4</h3>
                        <a href="#">See Project</a>
                    </div>
                    <div class="back">
                        <h3>Coming Soon</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <img src="img/placeholder.svg" alt="">
                        <h3>Project 5</h3>
                        <a href="#">See Project</a>
                    </div>
                    <div class="back">
                        <h3>Coming Soon</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <img src="img/placeholder.svg" alt="">
                        <h3>Project 6</h3>
                        <a href="#">See Project</a>
                    </div>
                    <div class="back">
                        <h3>Coming Soon</h3>
                    </div>
                </div>
                <div class="bottom-arrow2">
                    <a class="project-arrow"href="#get-in-touch"><span class="icon-keyboard_arrow_down no-status-url" data-url="#get-in-touch"></span></a>
                </div> 
            </div>
        </div>
        <!-- 
        ///////////////////////////////////////////////////////////////////////////////////////
        -->
        <!-- 
        ///////////////////////////////////// GET IN TOUCH ////////////////////////////////////////////
        -->
        <div class="get-in-touch" id="get-in-touch">
            <div class="git-info">
                <h2>Get in Touch</h2>
                <p class="contact-text">Contact me via the form <span class="form-position">below</span></p>
    
            </div>
            <div class="git-form">
                <form id="form" action="inc/process_contact.php" method="POST">
                    <div class="form-name-row">
                        <input type="text" id="firstname" name="firstname" placeholder="First Name">
                        <input type="text" id="lastname" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-email-row">
                        <input type="email" id="email" name="email" placeholder="Email">
                        <input type="text" id="subject" name="subject" placeholder="Subject">
                    </div>
                    <div class="form-message-row">
                        <textarea id="message" name="message" placeholder="Message"></textarea>
                        <button type="submit">Send</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
<script src="js/contact.js"></script>
<?php

include ("inc/footer.php");

?>