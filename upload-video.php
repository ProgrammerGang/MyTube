<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>MyTube - Upload a Video</title>
<link rel="icon" href="MyTube.svg" alt="icon">
<link rel="stylesheet" href="style.css" type="text/css">
<script>
function validateFile() {
var fileInput = document.getElementById("video");
var maxFileSize = 50.5 * 1024 * 1024; // 50MB in bytes
var errorText = document.getElementById("errorText");

if (fileInput.files.length > 0) {
var fileSize = fileInput.files[0].size;
if (fileSize > maxFileSize) {
errorText.innerText = "Error: File size exceeds the limit (50MB). Please upload a smaller video.";
fileInput.value = ''; // Clear the file input
return false;
} else {
errorText.innerText = ''; // Clear any previous error message
}
}
}
</script>
</head>
<body>
<h1>MyTube</h1>
<button onclick="location.href='https://d292393d-07b9-48bd-97ec-902f153561be-00-w00ru12tawt3.kirk.replit.dev'">Home</button>
<button onclick="location.href='https://d292393d-07b9-48bd-97ec-902f153561be-00-w00ru12tawt3.kirk.replit.dev/videos.php'">Videos</button>
<form action="upload.php" method="post" enctype="multipart/form-data" onsubmit="return validateFile();">
<label for="video">Choose a video (max 50MB):</label>
<input type="file" name="video" id="video" accept="video/*" required>
<p id="errorText" style="color: red;"></p>
<br>
<label for="name">Uploader:</label>
<input type="text" name="name" id="name" required>
<br>
<label for="videoName">Video Name:</label>
<input type="text" name="videoName" id="videoName" required>
<br>
<label for="description">Video Description:</label>
<textarea name="description" id="description"></textarea>
<br>
<input type="submit" value="Upload Video">
</form>
</body>
</html>