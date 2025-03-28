<?php include ("inc/nav.php"); ?>

<div class="container">
  <div class="terminal-container">
      <div class="terminal-header">
          <div class="terminal-header__controls">
              <span class="terminal-header__btn"></span>
              <span class="terminal-header__btn"></span>
              <span class="terminal-header__btn"></span>
          </div>
          <div class="terminal-header__title">console@kieron-oates:~/scion-coalition-scheme</div>
      </div>
      
      <div class="terminal-content">
          <div class="terminal-prompt">
              <span class="terminal-prompt__user">user@kieron-portfolio</span>:<span class="terminal-prompt__path">~/scs</span>$ <span class="terminal-prompt__command">cat introduction.txt</span>
          </div>
          
          <div class="terminal-output terminal-output--intro animate-typing">
              <h1 class="terminal-output__title"># Scion Coalition Scheme</h1>
              <p class="terminal-output__text">The Scion Coalition Scheme is an intensive, specially tailored training program run by Netmatters in order to give willing candidates the opportunity to enter the industry as web developers. Under the supervision of senior web developers, scions generally aim to complete training within six to nine months. The course is intensive and therefore the level of learning achieved is extensive in a short space of time.</p>
          </div>
          
          <div class="terminal-prompt">
              <span class="terminal-prompt__user">user@kieron-portfolio</span>:<span class="terminal-prompt__path">~/scs</span>$ <span class="terminal-prompt__command">cat treehouse_achievements.txt</span>
          </div>
          
          <div class="terminal-output terminal-output--treehouse animate-typing">
              <h2 class="terminal-output__title"># Treehouse</h2>
              <p class="terminal-output__text">Treehouse is an online learning community, featuring videos covering a number of topics from basic HTML to C# programming, iOS development, data analysis, and more. By completing courses users can earn points, allowing them to track their progress and see how much they've covered in certain areas.</p>
              
              <div class="terminal-treehouse">
                  <div class="terminal-treehouse__score">
                      <pre class="terminal-treehouse__ascii-art">
      ╔════════════════════╗
      ║  TREEHOUSE POINTS  ║
      ╠════════════════════╣
      ║       13440        ║
      ╚════════════════════╝
                      </pre>
                  </div>
                  <a href="https://teamtreehouse.com/profiles/kieronoates2" target="_blank" class="terminal-treehouse__link">
                      <span class="terminal-prompt__command">open treehouse_profile.url</span>
                      <span class="terminal-treehouse__link-arrow">→</span>
                  </a>
              </div>
          </div>
          
          <div class="terminal-prompt">
              <span class="terminal-prompt__user">user@kieron-portfolio</span>:<span class="terminal-prompt__path">~/scs</span>$ <span class="terminal-prompt__command">cat netmatters_info.txt</span>
          </div>
          
          <div class="terminal-output terminal-output--netmatters animate-typing">
              <h2 class="terminal-output__title"># About Netmatters</h2>
              <p class="terminal-output__link">Visit: <a href="https://www.netmatters.co.uk" target="_blank">https://www.netmatters.co.uk</a></p>
              
              <pre class="terminal-output__ascii-border">
  ╔═══════════════════════════════════════════════════════════════╗
  ║                                                               ║
              </pre>
              
              <ul class="terminal-netmatters__list">
                  <li class="terminal-netmatters__list-item">● Established in 2008</li>
                  <li class="terminal-netmatters__list-item">● Norfolk's leading technology company</li>
                  <li class="terminal-netmatters__list-item">● Winner of the Princess Royal Training Award</li>
                  <li class="terminal-netmatters__list-item">● Winner of EDP Skills of Tomorrow Award</li>
                  <li class="terminal-netmatters__list-item">● 80+ staff, 2 locations across Norfolk</li>
                  <li class="terminal-netmatters__list-item">● Digital Marketing, Website & Software development & IT Support</li>
                  <li class="terminal-netmatters__list-item">● Broad spectrum of clients, working nationwide</li>
                  <li class="terminal-netmatters__list-item">● Operate to strict company values</li>
              </ul>
              
              <pre class="terminal-output__ascii-border">
  ║                                                               ║
  ╚═══════════════════════════════════════════════════════════════╝
              </pre>
          </div>
          
          <div class="terminal-prompt">
              <span class="terminal-prompt__user">user@kieron-portfolio</span>:<span class="terminal-prompt__path">~/scs</span>$ <span class="terminal-prompt__cursor"></span>
          </div>
      </div>
      
      <div class="terminal-scroll-indicator">
          <div class="terminal-scroll-indicator__text">Scroll to continue...</div>
          <div class="terminal-scroll-indicator__arrow">↓</div>
      </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  // Animate sections on scroll
  const animatedSections = document.querySelectorAll('.animate-typing');
  
  const observerOptions = {
    rootMargin: '-50px 0px',
    threshold: 0.1
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add('active');
        }, 300); // Small delay for better effect
        
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  animatedSections.forEach(section => {
    observer.observe(section);
  });
  
  // Hide scroll indicator when reaching bottom
  window.addEventListener('scroll', function() {
    const scrollIndicator = document.querySelector('.terminal-scroll-indicator');
    const scrollPosition = window.scrollY;
    const totalHeight = document.body.scrollHeight - window.innerHeight;
    
    if (scrollPosition > 100) {
      scrollIndicator.style.opacity = '0';
    } else {
      scrollIndicator.style.opacity = '1';
    }
    
    // Make the last cursor blink only when near the bottom
    const cursor = document.querySelector('.terminal-prompt__cursor');
    if (scrollPosition > totalHeight - 200) {
      cursor.style.display = 'inline-block';
    } else {
      cursor.style.display = 'none';
    }
  });
  
  // Treehouse score animation
  const treehouseScore = document.querySelector('.terminal-treehouse__ascii-art');
  if (treehouseScore) {
    const scoreText = treehouseScore.textContent;
    let currentIndex = 0;
    
    // Reset the content
    treehouseScore.textContent = '';
    
    // Type effect for the ASCII art
    const typeAsciiArt = setInterval(() => {
      if (currentIndex < scoreText.length) {
        treehouseScore.textContent += scoreText.charAt(currentIndex);
        currentIndex++;
      } else {
        clearInterval(typeAsciiArt);
      }
    }, 10);
  }
});
</script>
<?php include ("inc/footer.php"); ?>