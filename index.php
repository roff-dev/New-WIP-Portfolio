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
                <div class="text-editor terminal-container">
                    <!-- Top white bar -->
                    <div class="terminal-header">
                        <div class="terminal-header__controls">
                            <span class="terminal-header__btn"></span>
                            <span class="terminal-header__btn"></span>
                            <span class="terminal-header__btn"></span>
                        </div>
                        <div class="terminal-header__title">console@kieron-oates:~/portfolio</div>
                    </div>
                    <div class="text-body terminal-content">
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
                        <img src="img/disspic1.png"  alt="Dissertation Prject Image">
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
                        <img src="img/project1.png" alt="Netmatters Homepage Project Image">
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
                        <img src="img/js-array-image.png" alt="Javascript Array Project Image">
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
                        <img src="img/laravel.png" alt="Laravel Admin Dashboard Project">
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
                        <img src="img/placeholder.svg" alt="placeholder image">
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
                        <img src="img/placeholder.svg" alt="placeholder image">
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
        <div class="background" id="get-in-touch">
            <div class="container">
                <div class="screen terminal-container">
                    <div class="terminal-header">
                        <div class="terminal-header__controls">
                            <span class="terminal-header__btn"></span>
                            <span class="terminal-header__btn"></span>
                            <span class="terminal-header__btn"></span>
                        </div>
                        <div class="terminal-header__title">contact@kieron-oates:~/get-in-touch</div>
                    </div>
                    <div class="screen-body terminal-content">
                        <div class="screen-body-item left">
                            <div class="app-title">
                                <span>CONTACT</span>
                                <span>ME</span>
                            </div>
                            <br>
                            <div class="alert alert-success">
                                <button onclick="removeAlert(event)">x</button>
                            </div>
                            <div class="alert alert-error">
                                <button onclick="removeAlert(event)">x</button>
                            </div>
                            <div class="app-contact"><i class="fa-solid fa-envelope"></i> : kieronoates@gmail.com</div>
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
                                        <textarea class="app-form-control" placeholder="MESSAGE" name="message" id="message" rows="5"></textarea>
                                    </div>
                                    <div class="app-form-group buttons">
                                        <button class="app-form-button">CANCEL</button>
                                        <button class="app-form-button" type="submit">SEND</button>
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
<script src="https://kit.fontawesome.com/80735aad70.js" crossorigin="anonymous"></script>
<!-- Add the GSAP and ScrollToPlugin scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollToPlugin.min.js"></script>

<!-- 
////////////////////////////////// FULLPAGE SCROLL SCRIPT ////////////////////////////////////////
-->
<script>
    // Check if viewport meets minimum dimensions
    function checkViewport() {
        return window.innerWidth > 1220 && window.innerHeight > 860;
    }

    // Smooth scrolling function
    function smoothScroll(target) {
        gsap.to(window, {
            duration: 0.1, // Duration for smoother response
            scrollTo: target, // Target section
            ease: "power2.inOut" // Easing function
        });
    }

    // Handle mouse wheel scrolling with throttling
    const sections = document.querySelectorAll('.hero, .projects, .background'); // Target specific sections
    let isThrottled = false; // Throttle flag

    // Function to determine which section is most visible
    function getMostVisibleSection() {
        let maxVisibility = 0;
        let mostVisibleIndex = 0;

        sections.forEach((section, index) => {
            const rect = section.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            
            // Calculate how much of the section is visible
            const visibleHeight = Math.min(rect.bottom, windowHeight) - Math.max(rect.top, 0);
            const visibility = Math.max(0, visibleHeight / windowHeight);

            if (visibility > maxVisibility) {
                maxVisibility = visibility;
                mostVisibleIndex = index;
            }
        });

        return mostVisibleIndex;
    }

    // Function to scroll to section based on hash
    function scrollToHash() {
        const hash = window.location.hash;
        let targetSection;

        switch(hash) {
            case '#portfolio':
                targetSection = sections[1];
                break;
            case '#get-in-touch':
                targetSection = sections[2];
                break;
            default:
                targetSection = sections[0];
        }

        smoothScroll(targetSection);
    }

    // Only add the event listeners if viewport size meets requirements
    if (checkViewport()) {
        // Handle hash changes
        window.addEventListener('hashchange', scrollToHash);
        
        // Handle initial load with hash
        if (window.location.hash) {
            // Small delay to ensure proper scroll after page load
            setTimeout(scrollToHash, 100);
        }

        // Handle wheel events
        window.addEventListener('wheel', function(e) {
            if (isThrottled) return;
            isThrottled = true;

            e.preventDefault();

            // Get current most visible section
            const currentSection = getMostVisibleSection();
            let targetSection;

            if (e.deltaY > 0) {
                // Scrolling down
                targetSection = Math.min(currentSection + 1, sections.length - 1);
            } else {
                // Scrolling up
                targetSection = Math.max(currentSection - 1, 0);
            }

            smoothScroll(sections[targetSection]);

            setTimeout(() => {
                isThrottled = false;
            }, 500);
        }, { passive: false });
    }

    // Update behavior on window resize
    window.addEventListener('resize', function() {
        location.reload();
    });
</script>
<?php

include ("inc/footer.php");

?>