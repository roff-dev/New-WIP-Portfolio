<?php include ("inc/nav.php"); ?>

<!-- MAIN CONTAINER -->
<div class="container">
    <!-- code snippet container -->
    <div class="snippets-list">
        <div class="code-snippet">
            <div class="snippet-header">
                <div class="snippet-title"><h3>Project 1 - User Authenticate</h3></div>
                <div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
            </div>
            <pre class="code-block hidden">
                <code class="language-javascript">//Using web tokens to authenticate users
const jwt = require("jsonwebtoken");
const jwtSecret =
  "4715aed3c946f7b0a38e6b534a9583628d84e96d10fbc04700770d572af3dce43625dd";

exports.adminAuth = (req, res, next) => {
  const token = req.cookies.jwt;
  if (token) {
    jwt.verify(token, jwtSecret, (err, decodedToken) => {
      if (err) {
        return res.status(401).json({ message: "Not authorized" });
      } else {
        if (decodedToken.role !== "admin") {
          return res.status(401).json({ message: "Not authorized" });
        } else {
          next();
        }
      }
    });
  } else {
    return res
      .status(401)
      .json({ message: "Not authorized, token not available" });
  }
};
exports.userAuth = (req, res, next) => {
  const token = req.cookies.jwt;
  if (token) {
    jwt.verify(token, jwtSecret, (err, decodedToken) => {
      if (err) {
        return res.status(401).json({ message: "Not authorized" });
      } else {
        if (decodedToken.role !== "Basic") {
          return res.status(401).json({ message: "Not authorized" });
        } else {
          next();
        }
      }
    });
  } else {
    return res
      .status(401)
      .json({ message: "Not authorized, token not available" });
  }
};</code></pre>
        </div>
        <div class="code-snippet">
            <div class="snippet-header">
                <div class="snippet-title"><h3>Project 2 - Each function</h3></div>
                <div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
            </div>
            <pre class="code-block hidden">
                <code class="language-css">
@each $key, $color in $colors {
  .link-#{$key} {
      span{
        color: $color; 
      }
      &:hover {
          background-color: $color; 
          span {
            color: white;
        }
      }
      //nav triangle color
      &::after {
        border-top: 10px solid $color; 
        color: $color; 
    }
  }
}
                </code></pre>
        </div>

    </div>

</div>
<script src="js/prism.js"></script>
<script src="js/codeblock.js"></script>
<?php include ("inc/footer.php"); ?>