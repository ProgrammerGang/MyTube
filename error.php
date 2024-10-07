<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Error - MyTube</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>Error</h1>
    <img src="fucku.png" alt="Fuck You">
    <h2>Video file upload failed</h2>
    <?php
    // Check if the file upload failed due to exceeding the file size limit
    if ($_FILES['video']['error'] === UPLOAD_ERR_INI_SIZE) {
        echo '<p>The video file size exceeds the server\'s limit. Please upload a smaller video.</p>';
    } elseif ($_FILES['video']['error'] === UPLOAD_ERR_FORM_SIZE) {
        echo '<p>The video file size exceeds the limit set by the form. Please upload a smaller video.</p>';
    } elseif ($_FILES['video']['error'] === UPLOAD_ERR_PARTIAL) {
        echo '<p>The video file was only partially uploaded. Please try again.</p>';
    } elseif ($_FILES['video']['error'] === UPLOAD_ERR_NO_FILE) {
        echo '<p>No video file was uploaded. Please choose a video file to upload.</p>';
    } elseif ($_FILES['video']['error'] === UPLOAD_ERR_NO_TMP_DIR) {
        echo '<p>Missing a temporary folder. Please contact the website administrator.</p>';
    } elseif ($_FILES['video']['error'] === UPLOAD_ERR_CANT_WRITE) {
        echo '<p>Failed to write the video file to disk. Please contact the website administrator.</p>';
    } elseif ($_FILES['video']['error'] === UPLOAD_ERR_EXTENSION) {
        echo '<p>A PHP extension stopped the file upload. Please try again.</p>';
    } else {
        echo '<p>We\'re sorry, but there was an error uploading the video file. Please try again later. This may be caused by a corrupted file.</p>';
    }
    ?>
    <button onclick="location.href='index.php'">Go back to Home</button>
</body>
</html>