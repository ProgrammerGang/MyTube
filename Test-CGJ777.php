<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Test1 - MyTube</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <h1>MyTube</h1>
  <button onclick="location.href='https://d292393d-07b9-48bd-97ec-902f153561be-00-w00ru12tawt3.kirk.replit.dev'">Home</button>
  <button onclick="location.href='https://d292393d-07b9-48bd-97ec-902f153561be-00-w00ru12tawt3.kirk.replit.dev/videos.php'">Videos</button>
  <h1>‎</h1>
  <video src="uploads/Test1.mp4" controls></video>
  <h2>Test1</h2>
  <div>
    <p id="page-view-count">Page views: 0</p>
  </div>

  <script>
    // Function to increment page views and update the display
    function incrementPageViews() {
      // Retrieve the current page views from localStorage
      let pageViews = localStorage.getItem('pageViews') || 0;

      // Increment the page views
      pageViews++;

      // Update the page views in localStorage
      localStorage.setItem('pageViews', pageViews);

      // Update the display
      document.getElementById('page-view-count').innerText = `Page views: ${pageViews}`;
    }

    // Function to load page views from localStorage on page load
    function loadPageViews() {
      let pageViews = localStorage.getItem('pageViews') || 0;
      document.getElementById('page-view-count').innerText = `Page views: ${pageViews}`;
    }

    // Attach the loadPageViews function to the window.onload event
    window.onload = loadPageViews;
  </script>

  <nav>
  <h3>Upload Date: September 23, 2023</h3>
  <h3>Description:</h3>
   <p>This is the first video on MyTube</p>
  <h3>Uploader: ThongaLonger69</h3>
  </nav>


  <script src="script.js"></script>
</body>

</html>