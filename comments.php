<?php

ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $text = htmlspecialchars($_POST['text']);
    $current_file = htmlspecialchars($_POST['current_file']);

    // Create the new comment HTML
    $comment_id = time(); // Unique ID for the comment
    $new_comment = "<div class=\"comment\">\n<h3>$username</h3><p>$text</p>\n</div>\n";

    // Load the current content of the comments div
    $file_path = __DIR__ . '/' . $current_file;
    $file_contents = file_get_contents($file_path);

    // Find the position of the opening <div id="comments" class="comments">
    $comments_div_start = strpos($file_contents, '<div id="comments" class="comments">');
    if ($comments_div_start !== false) {
        // Insert the new comment just after the opening <div id="comments" class="comments">
        $insert_position = $comments_div_start + strlen('<div id="comments" class="comments">');
        $file_contents = substr_replace($file_contents, $new_comment, $insert_position, 0);
ob_end_clean();

        // Save the updated content back to the file
        ob_end_clean();
        file_put_contents($file_path, $file_contents);
    }

    // Redirect back to the original file
    ob_end_clean();
    header("Location: $current_file");
    exit;
}
?>

