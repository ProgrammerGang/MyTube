<?php
ob_start(); // Start output buffering

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Increase the maximum allowed size for file uploads
    ini_set('upload_max_filesize', '50M');
    ini_set('post_max_size', '50M');

    $uploadDirectory = 'uploads/';
    $maxFileSize = 50.5 * 1024 * 1024; // 50MB in bytes

    // Check if the necessary fields are set
    if (!isset($_POST['name'], $_POST['videoName'])) {
        echo "Error: Missing required fields.";
        exit;
    }

    $name = $_POST['name'];
    $description = isset($_POST['description']) ? $_POST['description'] : ''; // Use empty string if not set
    $videoName = $_POST['videoName'];
    $videoFileName = $_FILES['video']['name'];

    if ($_FILES['video']['size'] > $maxFileSize) {
        echo "Error: File size exceeds the limit (50MB). Please upload a smaller video.";
    } else {
        if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadDirectory . $videoFileName)) {
            // File has been successfully uploaded
            echo "Video file has been uploaded successfully.";

            // Get the creation date of the uploaded video file
            $videoCreationTimestamp = filectime($uploadDirectory . $videoFileName);
            $videoCreationDate = date("F jS, Y", $videoCreationTimestamp);

            // Create the PHP file
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < 7; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }

            $htmlFileName = 'Mt-' . $randomString . '.php';
            $htmlContent = <<<EOD
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>$videoName - MyTube</title>
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
<video src="uploads/$videoFileName" controls></video></section>
<h2>$videoName</h2>
<nav>
<section>
<h3>Uploader: $name</h3>
<h3>Upload Date: $videoCreationDate</h3>
<h3>Description:</h3>
<p>$description</p>
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
                <div id="comments" class="comments">

                </div>
                </nav>
<script src="script.js"></script>
</body>
</html>
EOD;
            file_put_contents($htmlFileName, $htmlContent);

            // Update the videos.php file with a new <button> element inside a <p>
            $videosPage = 'videos.php';
            $videosContent = file_get_contents($videosPage);
            $newButton = '<p><button id="video" onclick="location.href=\'' . $htmlFileName . '\'">' . $videoName . '</button></p>';
            $pos = strpos($videosContent, '<div id="videos">');
            if ($pos !== false) {
                $videosContent = substr_replace($videosContent, '<div id="videos">' . $newButton, $pos, 0);
            }
            file_put_contents($videosPage, $videosContent);

            // Clear the output buffer
            ob_end_clean();

            // Redirect to the created PHP file
            header("Location: $htmlFileName");
            exit; // Make sure to exit after the header redirection
        } else {
            ob_end_clean(); // Clear the output buffer in case of upload failure

            // Redirect to error.php in case of upload failure
            header("Location: error.php");
            exit;
        }
    }
}
?>
