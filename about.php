<?php include ("inc/nav.php"); ?>

<div class="container">
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