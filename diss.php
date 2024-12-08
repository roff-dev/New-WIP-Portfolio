<?php include ("inc/nav.php"); ?>



<div class="container">
  <div class="pdf-container">  
    <div id="iframe-container" style="height: 100vh;">
      <iframe src="img/Dissertation.pdf" width="100%" title="My Dissertation PDF"></iframe>
    </div>
  </div>
</div>


<script>
  const iframe = document.querySelector('#iframe-container iframe');

  iframe.onload = function() {
    const containerHeight = document.getElementById('iframe-container').offsetHeight;
    iframe.style.height = containerHeight + 'px';
  };
</script>

<?php include ("inc/footer.php"); ?>