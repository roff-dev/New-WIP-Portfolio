/* jshint esversion: 6 */
document.addEventListener('DOMContentLoaded', function() {
    // First, set the first node as active immediately
    document.querySelector('.node[data-section="1"]').classList.add('active');

    // Then initialize Fullpage
    new fullpage('#fullpage', {
        sectionSelector: '.about-section',
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