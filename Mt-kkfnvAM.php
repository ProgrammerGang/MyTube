<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>👍 - MyTube</title>
<link href="MyTube.svg" alt="icon">
<link href="style.css" rel="stylesheet" type="text/css" />
                <style>
      #comments .comment {
            border: 3px solid white;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 5px;
          margin-top: 5px;
        }
        #comments .comment h3 {
            margin-bottom: 5px; /* Reduce space between h3 and p */
        }
      .reply-form input[type="text"],
        .reply-form textarea {
            color: black; /* Set text color to black */
        }
      .reply-form {
            display: none; /* Hide reply forms initially */
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
      }
  </style>
</head>
<body>
<h1>MyTube</h1>
<section><button onclick="location.href='https://d292393d-07b9-48bd-97ec-902f153561be-00-w00ru12tawt3.kirk.replit.dev'">Home</button>
<button onclick="location.href='videos.php'">Videos</button></section>
<section>
<video src="uploads/agree.mp4.mp4" controls></video></section>
<h2>👍</h2>
<nav>
<section>
<h3>Uploader: 👍</h3>
<h3>Upload Date: July 10th, 2024</h3>
<h3>Description:</h3>
<p>👍</p>
</section>
</nav>
            <h3>Comments</h3>
  <form action="comments.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="text">Text:</label>
                <textarea id="text" name="text" required></textarea>
                <br>
                <input type="hidden" name="current_file" value="<?php echo basename(__FILE__); ?>">
                <input type="submit" value="Submit">
  </form>
                <nav>
                <div id="comments" class="comments"><div class="comment">
<h3>👍</h3><p>👍</p>
</div>


                </div>
                </nav>
<script src="script.js"></script>
</body>
</html>