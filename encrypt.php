<?php
//encrypt button was pressed
if (isset($_POST['encrypt'])) {
    $key = $_POST['key'];
    $file = $_FILES['fileToEncrypt']['tmp_name'];

    //get the original file name for naming the encrypted output
    //Original File name is (Activity)
    //encrypted filr name will be (encrypted_Activity)
    $filename = $_FILES['fileToEncrypt']['name'];

    //validate if the key is empty
    if (empty($key)) {
        //display error and exit if key is not provided
        echo "❌ Error: Encryption key is required.<br><a href='index.php'>Back</a>";
        exit;
    }

    //read content of the uploaded file into a string
    $input = file_get_contents($file);

    //prep an empty string to store the encrypted content
    $encrypted = '';

    //loop sa bawat character inside the txt file including space and new line
    for ($i = 0; $i < strlen($input); $i++) {
        $encrypted .= $input[$i] ^ $key[$i % strlen($key)];
    }
    //XOR each chacter with its corresponding character in the key 
    //MODULO ensures the encryption key repeats correctly across the entire plaintext
    
    // first we have plain text and we get the ASCII value of the plain text and yung BINARY VALUE
    // and then we get the ASCII value of the key and we get the BINARY VALUE of the key
    // and then we XOR the two binary values of the plain text and the key
    // and then we get the BINARY VALUE of the XOR result and we get the ASCII value of the XOR result


    $encryptedFilename = 'encrypted_' . basename($filename);

    $savePath = 'uploads/' . $encryptedFilename;

    if (!is_dir('uploads')) {
        mkdir('uploads');
    }

    file_put_contents($savePath, $encrypted);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $encryptedFilename . '"');
    header('Content-Length: ' . filesize($savePath));

    readfile($savePath);

    exit;
}
?>
