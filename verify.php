<?php
if (isset($_POST['verify'])) {
    $key = $_POST['key'];
    $original = file_get_contents($_FILES['originalFile']['tmp_name']);
    $encrypted = file_get_contents($_FILES['encryptedFile']['tmp_name']);

    // Re-encrypt the original file content using the provided key
    $reEncrypted = '';
    for ($i = 0; $i < strlen($original); $i++) {
        $reEncrypted .= $original[$i] ^ $key[$i % strlen($key)];
    }

    // Compare re-encrypted content with uploaded encrypted file
    if ($reEncrypted === $encrypted) {
        // Files match – integrity is intact
        $message = "Your File is NOT ALTERED! The encrypted file matches the original file.";
        $messageType = "success";
    } else {
        // Files differ – possible alteration
        $message = "Your File has been ALTERED or the KEY is INCORRECT! The encrypted file no longer matches the original.";
        $messageType = "error";
    }

    // Redirect back to index.php with the message
    $message = urlencode($message); 
    header("Location: index.php?message=$message&messageType=$messageType");
    exit;
}
?>
