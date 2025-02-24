<?php include ("inc/nav.php"); ?>

<div class="container">
<div id="scs-fullpage">
    <div class="scs-section">
        <div class="scs-intro">
            <h1>Scion Coalition Scheme</h1>
            <p>The Scion Coalition Scheme is an intensive, specially tailored training program run by Netmatters in order to give willing candidates the opportunity to enter the industry as web developers. Under the supervision of senior web developers, scions generally aim to complete training within six to nine months. The course is intensive and therefore the level of learning achieved is extensive in a short space of time.</p>
        </div>
    </div>
    <div class="scs-section">
        <div class="scs-treehouse">
            <h1>Treehouse</h1>
            <p>Treehouse is an online learning community, featuring videos covering a number of topics from basic HTML to C# programming, iOS development, data analysis, and more. By completing courses users can earn points, allowing them to track their progress and see how much they've covered in certain areas.</p>
            <?php
                $json = file_get_contents("https://teamtreehouse.com/kieronoates2.json");
                $data = json_decode($json, true);
                $totalPoints = $data['points']['total'];
            ?>
            <span id="treehouse-points">Treehouse Score: <?php echo $totalPoints; ?></span>
            <span><a href="https://teamtreehouse.com/profiles/kieronoates2" target="_blank">View Treehouse Profile <img src="img/treehouse.svg" alt="Treehouse Logo"></a></span>
        </div>
    </div>
    <div class="scs-section">
        <div class="scs-netmatters">
            <h1>About <a href="">Netmatters</a></h1>
            <ul class="net-list">
                <li>Established in 2008</li>
                <li>Norfolk's leading technology company</li>
                <li>Winner of the Princess Royal Training Award</li>
                <li>Winner of EDP Skills of Tomorrow Award</li>
                <li>80+ staff, 2 locations across Norfolk</li>
                <li>Digital Marketing, Website & Software development & IT Support</li>
                <li>Broad spectrum of clients, working nationwide</li>
                <li>Operate to strict company values</li>
            </ul>
        </div>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.20/fullpage.min.js"></script>
<script src="js/scsFullpage.js"></script>
<!-- <script src="js/treehouse.js"></script> -->
<?php include ("inc/footer.php"); ?>