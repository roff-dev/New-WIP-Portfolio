<?php include ("inc/nav.php"); ?>

<div class="container">
<div id="treasure-map">
    <svg class="path" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 800">
        <path d="M50 0 Q70 100, 30 200 T50 400 Q70 500, 30 600 T50 800" 
              fill="none" stroke="gold" stroke-width="4" stroke-dasharray="8 4" />
    </svg>
    <div class="node" data-section="1" style="top: 0%; left: 50%;"></div>
    <div class="node" data-section="2" style="top: 25%; left: 30%;"></div>
    <div class="node" data-section="3" style="top: 50%; left: 50%;"></div>
    <div class="node" data-section="4" style="top: 75%; left: 30%;"></div>
</div>

</div>

<script>
    const svgPath = document.querySelector('.path path');
const totalLength = svgPath.getTotalLength();

// Position nodes dynamically along the path
document.querySelectorAll('.node').forEach((node, index) => {
    const point = svgPath.getPointAtLength((index / 3) * totalLength); // Adjust divisor based on node count
    node.style.left = `${point.x}px`;
    node.style.top = `${point.y}px`;
});

</script>
<?php include ("inc/footer.php"); ?>