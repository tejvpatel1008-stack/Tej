<!DOCTYPE html>
<html>
<head>
    <title>PHP File Operations</title>
</head>
<body>

<h2>PHP File Operations</h2>

<!-- Create / Write File -->
<form method="post">
    <h3>Create / Write File</h3>
    Filename: <input type="text" name="filename"><br><br>
    Content:<br>
    <textarea name="content" rows="5" cols="40"></textarea><br><br>
    <button type="submit" name="write">Write File</button>
</form>
<hr>

<!-- Read File -->
<form method="post">
    <h3>Read File</h3>
    Filename: <input type="text" name="readfile"><br><br>
    <button type="submit" name="read">Read File</button>
</form>
<hr>

<!-- Append File -->
<form method="post">
    <h3>Append to File</h3>
    Filename: <input type="text" name="appendfile"><br><br>
    Content:<br>
    <textarea name="appendcontent" rows="5" cols="40"></textarea><br><br>
    <button type="submit" name="append">Append</button>
</form>
<hr>

<!-- Delete File -->
<form method="post">
    <h3>Delete File</h3>
    Filename: <input type="text" name="deletefile"><br><br>
    <button type="submit" name="delete">Delete File</button>
</form>

<hr>

<?php
// WRITE FILE
if (isset($_POST['write'])) {
    $file = $_POST['filename'];
    $content = $_POST['content'];
    file_put_contents($file, $content);
    echo "<p><b>File written successfully.</b></p>";
}

// READ FILE
if (isset($_POST['read'])) {
    $file = $_POST['readfile'];
    if (file_exists($file)) {
        echo "<h3>File Content:</h3>";
        echo nl2br(file_get_contents($file));
    } else {
        echo "<p><b>File not found.</b></p>";
    }
}

// APPEND FILE
if (isset($_POST['append'])) {
    $file = $_POST['appendfile'];
    $content = "\n" . $_POST['appendcontent'];
    file_put_contents($file, $content, FILE_APPEND);
    echo "<p><b>Content appended successfully.</b></p>";
}

// DELETE FILE
if (isset($_POST['delete'])) {
    $file = $_POST['deletefile'];
    if (file_exists($file)) {
        unlink($file);
        echo "<p><b>File deleted.</b></p>";
    } else {
        echo "<p><b>File does not exist.</b></p>";
    }
}
?>

</body>
</html>