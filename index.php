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
                <!-- PROJECT 1 -->
                <div class="card">
                    <div class="front">
                        <!-- <div class="flip-tag">Click to Flip</div> -->
                        <img src="img/disspic1.png"  alt="">
                        <h3>Project 1 - Dissertation Project</h3>
                        <a href="diss.php">See Project</a>
                        <span class="fold"></span>
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

                <!-- PROJECT 2 -->
                <div class="card">
                    <div class="front">
                        <!-- <div class="flip-tag">Click to Flip</div> -->
                        <img src="img/project1.png" alt="">
                        <h3>Project 2 - Create Netmatters Hompepage</h3>
                        <div class="card-btns">
                            <a href="http://netmatters.kieron-oates.netmatters-scs.co.uk" target="_blank">See Project</a>
                            <a href="https://github.com/roff-dev/NetMatters-HTML-and-CSS-Assessment" target="_blank">See Github</a>
                        </div>
                        <span class="fold"></span>
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

                <!-- PROJECT 3 -->
                <div class="card">
                    <div class="front">
                        <!-- <div class="flip-tag">Click to Flip</div> -->
                        <img src="img/js-array-image.png" alt="">
                        <h3>Project 3 - Javascript Array</h3>
                        <div class="card-btns">
                            <a href="http://js-array.kieron-oates.netmatters-scs.co.uk" target="_blank">See Project</a>
                            <a href="https://github.com/roff-dev/js-array" target="_blank">See Github</a>
                        </div>
                        <span class="fold"></span>
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

                <!-- PROJECT 4 -->
                <div class="card">
                    <div class="front">
                        <!-- <div class="flip-tag">Click to Flip</div> -->
                        <img src="img/laravel.png" alt="">
                        <h3>Project 4 - Laravel Admin Page</h3>
                        <div class="card-btns">
                            <a href="http://laravel.kieron-oates.netmatters-scs.co.uk/" target="_blank">See Project</a>
                            <a href="https://github.com/roff-dev/admin-dashboard" target="_blank">See Github</a>
                        </div>
                        <span class="fold"></span>
                    </div>
                    <div class="back">
                    <h3>Laravel Admin Dashboard</h3>
                        <h4>Time to complete: <span>80h</span></h4>
                        <ul class="skills-req">
                            <h4>Skills required:</h4>
                            <li>Laravel</li>
                            <li>Blade</li>
                            <li>Breeze</li>
                            <li>Tailwind</li>
                            <li>Sqlite</li>
                            <li></li>
                        </ul>
                        <a href="code.php">Code Snippets</a>
                    </div>
                </div>

                <!-- PROJECT 5 -->
                <div class="card">
                    <div class="front">
                        <img src="img/placeholder.svg" alt="">
                        <h3>Project 5</h3>
                        <div class="card-btns">
                            <a href="#" target="_blank">See Project</a>
                            <a href="#" target="_blank">See Github</a>
                        </div>
                        <span class="fold"></span>
                    </div>
                    <div class="back">
                        <h3>Coming Soon</h3>
                    </div>
                </div>

                <!-- PROJECT 6 -->
                <div class="card">
                    <div class="front">
                        <img src="img/placeholder.svg" alt="">
                        <h3>Project 6</h3>
                        <div class="card-btns">
                            <a href="#" target="_blank">See Project</a>
                            <a href="#" target="_blank">See Github</a>
                        </div>
                        <span class="fold"></span>
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
        <div class="background">
            <div class="container">
                <div class="screen">
                    <div class="screen-header">
                        <div class="screen-header-left">
                        <div class="screen-header-button close"></div>
                        <div class="screen-header-button maximize"></div>
                        <div class="screen-header-button minimize"></div>
                        </div>
                        <div class="screen-header-right">
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                        </div>
                    </div>
                    <div class="screen-body">
                        <div class="screen-body-item left">
                            <div class="app-title">
                                <span>CONTACT</span>
                                <span>US</span>
                            </div>
                            <div class="alert alert-success">
                                <button onclick="removeAlert(event)">x</button>
                            </div>
                            <div class="alert alert-error">
                                <button onclick="removeAlert(event)">x</button>
                            </div>
                            <div class="app-contact">CONTACT INFO : kieronoates@gmail.com</div>
                        </div>
                        <div class="screen-body-item">
                            <div class="app-form">
                                <form id="form" action="inc/process_contact.php" method="POST">
                                    <div class="app-form-group">
                                        <input class="app-form-control" placeholder="NAME" name="name" id="name">
                                    </div>
                                    <div class="app-form-group">
                                        <input class="app-form-control" placeholder="EMAIL" name="email" id="email">
                                    </div>
                                    <div class="app-form-group">
                                        <input class="app-form-control" placeholder="SUBJECT" name="subject" id="subject">
                                    </div>
                                    <div class="app-form-group message">
                                        <input class="app-form-control" placeholder="MESSAGE" name="message" id="message">
                                    </div>
                                    <div class="app-form-group buttons">
                                        <button class="app-form-button" type="submit">CANCEL</button>
                                        <button class="app-form-button">SEND</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/contact.js"></script>
<?php

include ("inc/footer.php");

?>