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
        <div class="snippet-search">
            <div class="search-wrapper">
                <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="M21 21l-4.35-4.35"/>
                </svg>
                <input type="text" placeholder="Search code snippets...">
            </div>
            
            <div class="filter-wrapper">
                <button class="filter-button">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                    </svg>
                    Filter
                    <span class="tag-count" style="display: none;">0</span>
                </button>
                
                <div class="filter-dropdown">
                    <label class="tag-option">
                        <input type="checkbox" value="js">
                        <span class="language-tag js">JS</span>
                    </label>
                    <label class="tag-option">
                        <input type="checkbox" value="scss">
                        <span class="language-tag scss">SCSS</span>
                    </label>
                    <label class="tag-option">
                        <input type="checkbox" value="php">
                        <span class="language-tag php">PHP</span>
                    </label>
                </div>
            </div>
        </div>
        <!-- Snippets will be loaded here via JavaScript -->
    </div>
</div>

<script src="js/prism.js"></script>
<script src="js/codeblock.js"></script>
<script src="js/snippetFilter.js"></script>
<?php include ("inc/footer.php"); ?>