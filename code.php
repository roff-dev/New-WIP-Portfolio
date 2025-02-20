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
        
      	<div class="code-snippet">
            <div class="snippet-header">
                <div class="snippet-title"><h3>Project 1 - User Authenticate</h3></div>
                <div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
            </div>
            <pre class="code-block hidden">
                <code class="language-javascript">
//Using web tokens to authenticate users
const jwt = require("jsonwebtoken");
const jwtSecret =
  "4715aed3c946f7b0a38e6b534a9583628d84e96d10fbc04700770d572af3dce43625dd"; //unique token for encryption

exports.adminAuth = (req, res, next) => {
  const token = req.cookies.jwt;
  if (token) {
    jwt.verify(token, jwtSecret, (err, decodedToken) => { //verifying token match for admin
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
    jwt.verify(token, jwtSecret, (err, decodedToken) => { //verifying token match for admin
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
                <div class="snippet-title"><h3>Project 1 - Database Schema</h3></div>
                <div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
            </div>
            <pre class="code-block hidden">
                <code class="language-js">
const Mongoose = require("mongoose"); //using mongoose to connect to MongoDB

const StockItemSchema = new Mongoose.Schema({ //creating schema for database structure
  name: { //column name
    type: String, //type of data 
    required: true //is the data required
  },
  points: {
    type: String,
    required: true
  },
  price: {
    type: Number,
    required: true
  },
  quantity: {
    type: Number,
    required: true
  },
  stockId: {
    type: Number,
    required: false
  },
},{ collection: 'Stock' });


const Stock = Mongoose.model("stock", StockItemSchema); //using new schema to create table called stock

module.exports = Stock;
				</code>
			</pre>
		</div>


		<div class="code-snippet">
			<div class="snippet-header">
				<div class="snippet-title"><h3>Project 1 - Routes Controller</h3></div>
				<div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
			</div>
			<pre class="code-block hidden">
				<code class="language-js">
//models and routes needed for connection
const express = require("express");
const connectDB = require("./db");
const app = express();
const cookieParser = require("cookie-parser");
const { adminAuth, userAuth } = require("./middleware/auth.js");
const Stock = require("./model/StockItem"); //models used for data handling
const Deal = require("./model/Deal");
const User = require('./model/User');
const cors = require("cors");


//localhost port
const PORT = 9999; //port used to connect
//engine for views
app.set("view engine", "ejs"); //setting up view engine

connectDB(); //running db connection script
//packaging moving and displaying data
app.use(express.json());
app.use(cookieParser());
app.use(express.static("public"));

//routes
app.use("/api/auth", require("./Auth/route")); //using auth middleware

//pages
app.get("/", (req, res) => res.render("home")); //user routes
app.get('/user1', async (req, res) => {
  try {
      //fetch all stock 
      const allStock = await Stock.find({});
      
      // random stock 
      const randomStock = await Deal.aggregate([{ $sample: { size: 4 } }]); 
      
      const user = await User.findOne({ username:'Andy' });
      // html template
      res.render('user1', { allStock: allStock, randomStock: randomStock, points: user.points });
  } catch (err) {
      res.status(500).send(err.message);
  }
});
app.get('/user2', async (req, res) => {
  try { 
      const allStock = await Stock.find({}); 
      const randomStock = await Deal.aggregate([{ $sample: { size: 4 } }]); 
      const user = await User.findOne({ username:'Bob' });
      res.render('user2', { allStock: allStock, randomStock: randomStock, points: user.points});
  } catch (err) {
      res.status(500).send(err.message);
  }
});
app.get('/user3', async (req, res) => {
  try {
      const allStock = await Stock.find({});
      const randomStock = await Deal.aggregate([{ $sample: { size: 4 } }]); 
      const user = await User.findOne({ username:'Carl' });
      res.render('user3', { allStock: allStock, randomStock: randomStock, points: user.points});
  } catch (err) {
      res.status(500).send(err.message);
  }
});

app.get('/newuser', async (req, res) => {
  try {
      const allStock = await Stock.find({});
      const randomStock = await Deal.aggregate([{ $sample: { size: 4 } }]); 
      res.render('newuser', { allStock: allStock, randomStock: randomStock});
  } catch (err) {
      res.status(500).send(err.message);
  }
});

app.get("/register", (req, res) => res.render("register"));
app.get("/login", (req, res) => res.render("login"));
app.get("/shopping", (req, res) => res.render("shopping"));
app.get("/logout", (req, res) => {
  //checks token
  res.cookie("jwt", "", { maxAge: "1" });
  res.redirect("/");
});
//using Auth check
app.get("/admin", adminAuth, (req, res) => res.render("admin"));
app.get("/user", userAuth, (req, res) => res.render("user"));

//nfc write
app.post('/write-nfc', (req, res) => {
  const { data } = req.body; 
  res.send('Data written to NFC successfully');
  res.status(500).send(err.message);
});
app.get('/write-nfc', (req, res) => {
  res.json({ lists: shoppingLists }); 
});



let shoppingLists = []; // store shopping lists 

app.post('/api/shopping-lists', (req, res) => {
  const { list } = req.body;
  shoppingLists.push(list); // store list
  res.status(200).send('List received');
});
//send list
app.get('/api/shopping-lists', (req, res) => {
  res.json({ lists: shoppingLists }); 
});

const server = app.listen(PORT, () =>
  console.log(`Server Connected to port ${PORT}`)
);

process.on("unhandledRejection", (err) => {
  console.log(`An error occurred: ${err.message}`);
  server.close(() => process.exit(1));
});


				</code>
			</pre>
		</div>

		<div class="code-snippet">
            <div class="snippet-header">
                <div class="snippet-title"><h3>Project 2 - Each function</h3></div>
                <div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
            </div>
            <pre class="code-block hidden">
                <code class="language-css">
@each $key, $color in $colors {
  .link-#{$key} { //targeting classes named "link-" then using loop index as differential
      span{                                     //e.g link-1, link-2
        color: $color; //index of loop matches index of colour map - link-3 gets colour 3
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

		<div class="code-snippet">
			<div class="snippet-header">
				<div class="snippet-title"><h3>Project 2 - News Card Mixin</h3></div>
				<div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
			</div>
			<pre class="code-block hidden">
				<code class="language-css">
				@mixin news { //mixin used to style multiple news cards with different content with same styling
    box-sizing: border-box;
    margin: 10px;
    margin-bottom: 30px;
    border: 1px solid #ccc;
    box-shadow: 0 3px 35px rgba(0, 0, 0, .1);
    display: flex;
    flex-direction: column; 
    height: 100%;
    position: relative;
    z-index: 1;
    
    &:hover {
        transform: translateY(-10px);
        transition: .5s ease;
        cursor: pointer;
    }
    
    h3 {
        @content;
        margin-top: 0;
    }

    img {
        width: 100%;
        
    }
    p {
      font-size: 14px;
      color: #333645;
      margin-bottom: 30px;
    }
    a {
        color: white;
        border-radius: 3px;
        @content; // where variations of styling can be applied
        padding: 10px 15px;
        font-size: 18px;
        text-decoration: none;
        
    }
    .news-info {
        flex: 1;
        padding: 20px 30px 35px;
        
    }

    .news-author {
        display: flex;
        padding: 15px 0;
        margin: 0 30px;
        border-top: 1px solid gray;
        height: 123px;
        z-index: 1;
        ul {
            list-style-type: none;
            padding: 0 0 0 20px;
            li:first-child {
              font-weight: 600;
              padding: 5px 0 3px;
            }
            li {
              font-size: .875rem
            }
            
        }

        img {
            
            margin-top: 20px;
            width: 47px;
            height: 47px;
        }
    }
    .category-tag {
      position: absolute; 
      top: 10px; 
      right: 0; 
      padding: 4px 6px;
      
      color: white; 
      font-size: 0.8em; 
      &.career {
          background-color: $news-2; 
      }
      &.news {
          background-color: $news-1; 
      }
  }
}
				</code>
			</pre>
		</div>

		<div class="code-snippet">
			<div class="snippet-header">
				<div class="snippet-title"><h3>Project 2 - Database Connection</h3></div>
				<div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
			</div>
			<pre class="code-block hidden">
				<code class="language-php">
				< ?php
// Load Composer's autoloader from the project root
require_once __DIR__ . '/../vendor/autoload.php';

// Load .env file from the project root
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Retrieve database credentials from .env
$host = $_ENV['DB_HOST'];  // variables defined in .env file - not visible in source code
$port = $_ENV['DB_PORT'];   // keeps private information private 
$dbname = $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

// Set up DSN and options for PDO
$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);
    //echo "Database connection successful!";
} catch (PDOException $e) {
    // Handle errors
    die("Database connection failed: " . $e->getMessage());
}
//////////////////////////////////////////
//COMMAND TO INSTALL COMPOSTER composer require vlucas/phpdotenv - command used to set up .env
// Fetch data from the 'news' table
try {
    $stmt = $pdo->query("SELECT title, img, category, bodyText, author, authorImg, authorDate FROM news_articles");
    $newsItems = $stmt->fetchAll(); // Fetch all rows as an associative array
} catch (PDOException $e) {
    die("Error fetching news data: " . $e->getMessage());
}
?>

				</code>
			</pre>
		</div>

		<div class="code-snippet">
			<div class="snippet-header">
				<div class="snippet-title"><h3>Project 2 - Contact Form Validation</h3></div>
				<div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
			</div>
			<pre class="code-block hidden">
				<code class="language-php">
				< ?php
require_once 'connection.php'; //tell page to use db connection logic

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { //check if post request can be made before preparing
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

try {
    // Get and sanitize form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $marketing = isset($_POST['Checkbox']) ? 1 : 0;

    // Validate required fields
    if (empty($name) || empty($email) || empty($message) || empty($phone)) {
        throw new Exception('Required fields are missing');
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //POTENTIALLY NEEDS CHANGING FOR MORE STRICT RULES
        throw new Exception('Invalid email format');
    }

    // Validate phone number format
    if (!preg_match('/^(?:(?:\+44\s?|0)(?:1|2|3|7)(?:\d\s?){8,9})$/', $phone)) { //regex code used to check against phone number, detects if digits are in correct spot for UK
        throw new Exception('Invalid UK phone number format');
    }
    
    // Message Length
    if (strlen($message) < 5) {
        throw new Exception('Message must be at least 5 characters');
    }
    // Prepare and execute the SQL query
    $stmt = $pdo->prepare("
        INSERT INTO contact_submissions (name, company, email, phone, message, marketing_consent)
        VALUES (:name, :company, :email, :phone, :message, :marketing)
    ");

    $stmt->execute([
        'name' => $name,
        'company' => $company,
        'email' => $email,
        'phone' => $phone,
        'message' => $message,
        'marketing' => $marketing
    ]);

    echo json_encode(['success' => true, 'message' => 'Form submitted successfully']);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
				</code>
			</pre>
		</div>

		<div class="code-snippet">
			<div class="snippet-header">
				<div class="snippet-title"><h3>Project 3 - Email Validation</h3></div>
				<div class="snippet-dropdown"><a href=""><span class="icon-keyboard_arrow_down"></span></a></div>
			</div>
			<pre class="code-block hidden">
				<code class="language-js">
				//email regex
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; //check if email has @ and . in acceptable places
    
    //email validation rules
    const emailValidationRules = {
        minLength: 5, //email cant be shorter than 5 and longer than 254 characters
        maxLength: 254,
        requireDomain: true,
        bannedDomains: ['test.com', 'example.com'],
        topLevelDomains: ['com', 'org', 'net', 'edu', 'gov', 'mil', 'io', 'co', 'uk', 'ca', 'au', 'de', 'fr'] //accepted domains 
    };

    function validateEmail(email) {
        if (!email || email.length < emailValidationRules.minLength || 
            email.length > emailValidationRules.maxLength) {
            return "Email must be between 5 and 254 characters";
        }

        if (!emailPattern.test(email)) {
            return "Please enter a valid email address";
        }

        const [localPart, domain] = email.split('@'); //splits email string at @ into local and domain
        const tld = domain.split('.').pop().toLowerCase(); //splits that domain string at .
                                            //domain.split('.') → ["example", "co", "uk"] grabs uk and checks if accepted domain

        return null; //valid
    }
				</code>
			</pre>
		</div>

    </div>
</div>
<script src="js/prism.js"></script>
<script src="js/codeblock.js"></script>
<?php include ("inc/footer.php"); ?>