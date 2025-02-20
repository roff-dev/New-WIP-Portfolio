<?php include ("inc/nav.php"); ?>

<!-- 
CODE SNIPPET FORMAT
		<div class="code-snippet">
			<div class="snippet-header">
				<div class="snippet-title"><h3>Project  - </h3></div>
				<div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
			</div>
			<pre class="code-block hidden">
				<code class="language-"></code>
			</pre>
		</div>
-->


<!-- MAIN CONTAINER -->
<div class="container">
    <!-- code snippet container -->
    <div class="snippets-list">
      <?php
        include 'inc/connection.php'; 

        // Fetch all snippets
        $query = $pdo->query("SELECT * FROM snippets ORDER BY id DESC");
        $snippets = $query->fetchAll(PDO::FETCH_ASSOC);
      ?>
      	<?php foreach ($snippets as $snippet): ?>
          <div class="code-snippet">
              <div class="snippet-header">
                  <div class="snippet-title">
                      <h3><?= htmlspecialchars($snippet['title']); ?></h3>
                  </div>
                  <div class="snippet-dropdown">
                      <a href="#"><span class="icon-keyboard_arrow_down"></span></a>
                  </div>
              </div>
              <pre class="code-block hidden">
                  <code class="language-<?= htmlspecialchars($snippet['language']); ?>">
                      <?= htmlspecialchars($snippet['code']); ?>
                  </code>
              </pre>
          </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="js/prism.js"></script>
<script src="js/codeblock.js"></script>
<?php include ("inc/footer.php"); ?>