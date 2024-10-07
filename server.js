const express = require('express');
const multer = require('multer');
const path = require('path');

const app = express();
const port = 3000; // Use any available port of your choice

// Set up the destination folder for file uploads
const uploadDir = path.join(__dirname, 'uploads');

// Configure multer to handle file uploads
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, uploadDir);
  },
  filename: (req, file, cb) => {
    cb(null, file.originalname);
  }
});

const upload = multer({ storage });

// Define a route to handle the file upload
app.post('/upload', upload.single('videoFile'), (req, res) => {
  // File upload successful
  res.send('File uploaded successfully.');
});

// Start the server
app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
