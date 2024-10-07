const express = require('express');
const multer = require('multer');
const path = require('path');

const app = express();

// Set up multer for file upload
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, path.join(__dirname, 'uploads/')); // Absolute path to the "uploads" folder
  },
  filename: function (req, file, cb) {
    cb(null, Date.now() + '-' + file.originalname);
  },
});

const upload = multer({ storage });

// Define a route to serve the HTML form
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.php'));
});

// Define a route to handle the video upload
app.post('/upload', upload.single('videoFile'), (req, res) => {
  res.status(200).send('Video uploaded successfully!');
});

app.listen(3000, () => {
  console.log('Server running on port 3000');
});