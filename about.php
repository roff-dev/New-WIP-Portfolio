<?php include ("inc/nav.php"); ?>

<div class="container">
    <div id="fullpage">
        <div class="section">Section 1 Content</div>
        <div class="section">Section 2 Content</div>
        <div class="section">Section 3 Content</div>
        <div class="section">Section 4 Content</div>
    </div>

    <div id="treasure-map">
        <svg class="path" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 1000">
            <path d="m 0 0 q 249 62 91 100 q -316 64 -93 295 a 1 1 0 0 0 84 -209 a 1 1 0 0 0 43 538 q 121 -31 -102 -132 q -174 -126 52 -92 t 123 347 q -36 39 -174 50" 
                fill="none" stroke="gray" stroke-width="20" stroke-dasharray="20 10" />
        </svg>
        <!-- 
        <svg class="path" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 800">
            <path d="M50 0 Q70 100, 30 200 T50 400 Q70 500, 30 600 T50 800" 
                fill="none" stroke="gold" stroke-width="4" stroke-dasharray="8 4" />
        </svg>
        -->
        <div class="node" data-section="1" style="top: -1%; left: 38%;"></div>
        <div class="node" data-section="2" style="top: 24%; left: 17%;"></div>
        <div class="node" data-section="3" style="top: 48%; left: 25%;"></div>
        <div class="node" data-section="4" style="top: 88%; left: 37%;"></div>
    </div>

    

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.20/fullpage.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // First, set the first node as active immediately
    document.querySelector('.node[data-section="1"]').classList.add('active');

    // Then initialize Fullpage
    new fullpage('#fullpage', {
        autoScrolling: true,
        scrollHorizontally: true,
        
        // IMPORTANT: This ensures section-to-section movement
        continuousVertical: false,
        
        // These help with section tracking
        anchors: ['page1', 'page2', 'page3', 'page4'],
        menu: '#treasure-map',

        // This fires when moving between sections
        afterLoad: function(origin, destination, direction) {
            // Remove active from all nodes first
            document.querySelectorAll('.node').forEach(node => {
                node.classList.remove('active');
            });

            // Add active to the node matching current section
            const currentNode = document.querySelector(`.node[data-section="${destination.index + 1}"]`);
            if (currentNode) {
                currentNode.classList.add('active');
                
                console.log(`Added active to section ${destination.index + 1}`);
            }
        }
    });

    // Optional: Add click handlers to nodes
    document.querySelectorAll('.node').forEach(node => {
        node.addEventListener('click', function() {
            const sectionIndex = this.getAttribute('data-section');
            fullpage_api.moveTo(sectionIndex);
        });
    });
});
</script>
<!-- <script>
    const svgPath = document.querySelector('.path path');
const totalLength = svgPath.getTotalLength();

// Position nodes dynamically along the path
document.querySelectorAll('.node').forEach((node, index) => {
    const point = svgPath.getPointAtLength((index / 3) * totalLength); // Adjust divisor based on node count
    node.style.left = `${point.x}px`;
    node.style.top = `${point.y}px`;
});

</script> -->
<?php include ("inc/footer.php"); ?>