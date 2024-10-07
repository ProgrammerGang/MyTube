document.getElementById('uploadButton').addEventListener('click', function() {
  let fileInput = document.getElementById('fileToUpload');
  let file = fileInput.files[0];

  if (!file) {
    alert('Please select a video file.');
    return;
  }

  let formData = new FormData();
  formData.append('fileToUpload', file);

  fetch('upload.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(result => {
    alert(result); // Display the server response
  })
  .catch(error => {
    console.error('Error:', error);
  });
});