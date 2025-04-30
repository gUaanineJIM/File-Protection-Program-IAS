<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Protection Program</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <header>
            <h1>File Protection Program</h1>
            <p class="subtitle">Easily encrypt files and verify their integrity.</p>


        </header>

        <div class="forms-container">
            <div class="form-card">
                <div class="card">
                    <div class="card-title">
                        <span class="number">1</span>
                        <h2>Encrypt File</h2>
                    </div>

                    <form action="encrypt.php" method="post" enctype="multipart/form-data" id="encrypt-form">
                        <div class="form-group file-input-container">
                            <label for="fileToEncrypt">Select a file to encrypt:</label>
                            <div class="custom-file-input" id="encrypt-file-drop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <p>Drag & drop file here or click to browse</p>
                            </div>
                            <input type="file" name="fileToEncrypt" id="fileToEncrypt" required>
                            <p class="file-name" id="encrypt-file-name"></p>
                        </div>

                        <div class="form-group">
                            <label for="encryptKey">Secret Key:</label>
                            <input type="text" name="key" id="encryptKey" placeholder="Enter your secret key" required>
                        </div>

                        <button type="submit" name="encrypt">Encrypt File</button>
                    </form>
                </div>
            </div>

            <div class="form-card">
                <div class="card">
                    <div class="card-title">
                        <span class="number">2</span>
                        <h2>Verify Integrity</h2>
                    </div>

                    <form action="verify.php" method="post" enctype="multipart/form-data" id="verify-form">
                        <div class="form-group file-input-container">
                            <label for="originalFile">Upload original file:</label>
                            <div class="custom-file-input" id="original-file-drop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <p>Original file</p>
                            </div>
                            <input type="file" name="originalFile" id="originalFile" required>
                            <p class="file-name" id="original-file-name"></p>
                        </div>

                        <div class="form-group file-input-container">
                            <label for="encryptedFile">Upload the encrypted file:</label>
                            <div class="custom-file-input" id="encrypted-file-drop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <p>Encrypted file to verify</p>
                            </div>
                            <input type="file" name="encryptedFile" id="encryptedFile" required>
                            <p class="file-name" id="encrypted-file-name"></p>
                        </div>

                        <div class="form-group">
                            <label for="verifyKey">Secret Key:</label>
                            <input type="text" name="key" id="verifyKey"
                                placeholder="Enter same secret key used for encryption" required>
                        </div>

                        <button type="submit" name="verify">Verify Integrity</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="info-section">
        <h2>How the Program Works</h2>
        <p>This File Protection Program helps users <strong>encrypt a file</strong> using a secret key and later
            <strong>verify its integrity</strong> by comparing the original and encrypted versions. It uses a simple XOR
            cipher technique that ensures any tampering will be detected.
        </p>
        <ol>
            <li><strong>Encryption:</strong> The user uploads a text file and enters a secret key. The program encrypts
                the content using XOR logic and lets the user download the encrypted file.</li>
            <li><strong>Verification:</strong> The user uploads both the original and the encrypted files along with the
                secret key. The system re-encrypts the original using the key and checks if it matches the uploaded
                encrypted file.</li>
            <li><strong>Output:</strong> The user receives a message indicating whether the file was not altered or altered and the
                secret key was incorrect.</li>
            
                
        </ol>

        <h2>User Manual</h2>
        <h3>1. Encrypting a File</h3>
        <ul>
            <li>Go to the "Encrypt File" section.</li>
            <li>Click to browse or drag your file into the box.</li>
            <li>Enter a secret key (
                <pre><code>ex. janine11</code></pre>).
            </li>
            <li>Click <strong>Encrypt File</strong>. Your encrypted file will download automatically.</li>
        </ul>

        <h3>2. Verifying a File</h3>
        <ul>
            <li>Go to the "Verify Integrity" section.</li>
            <li>Upload the original (plaintext) file.</li>
            <li>Upload the previously encrypted file.</li>
            <li>Enter the same secret key used during encryption.</li>
            <li>Click <strong>Verify Integrity</strong>.</li>
            <li>A message will appear showing whether the file is intact or altered.</li>
        </ul>

        <h3>3. Error Messages & Tips</h3>
        <ul>
            <li><strong>"Your File is NOT ALTERED!"</strong> – The encrypted file matches the original file exactly. It
                is verified successfully.</li>
            <li><strong>"Your File has been ALTERED or the KEY is INCORRECT!"</strong> – Either the encrypted file was
                changed, or the secret key used is incorrect.</li>
            <li>Always keep your secret key safe. If lost, the encrypted file cannot be verified or recovered.</li>
        </ul>

        <h2>How the Algorithm Works (XOR Cipher Explained)</h2>
        <p>The program uses a simple but effective encryption technique called the <strong>XOR Cipher</strong>. Here's
            how it works:</p>
        <ul>
            <li>Each character in the file is processed one-by-one.</li>
            <li>The secret key is repeated if it's shorter than the file.</li>
            <li>Each character from the file is XORed with a character from the key:
                <pre><code>encrypted_char = original_char ^ key_char</code></pre>
            </li>
            <li>During verification, the original file is XORed again with the same key to produce a re-encrypted
                version. If it matches the uploaded encrypted file, the file is valid and untampered.</li>
        </ul>
        <p><strong>Note:</strong> XORing the same character twice with the same key returns the original character. This
            is why XOR is both encrypting and decrypting in this logic.</p>
    </section>

    <footer style="text-align: center; padding: 20px; background-color: #f2f2f2; font-family: Arial, sans-serif;">
        <p class="subtitle">Prepared by: <strong>Janine Ishe M. Matamorosa</strong></p>
        <p class="subtitle">&copy; 2025 Janine Ishe M. Matamorosa. All rights reserved.</p>
        <p class="subtitle">
            <a href="https://github.com/gUaanineJIM" target="_blank">GitHub</a> |
            <a href="https://www.facebook.com/livinglifeasjimrg/" target="_blank">Facebook</a>
        </p>
    </footer>


    <!-- Modal -->
    <div class="modal" id="result-modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h3 class="modal-title" id="modal-title"></h3>
            <p id="modal-message"></p>
            <div class="modal-btn" onclick="closeModal()">Close</div>
        </div>
    </div>

    <script>
        // File input handling
        function handleFileSelect(fileInputId, fileNameId, dropzoneId) {
            const fileInput = document.getElementById(fileInputId);
            const fileName = document.getElementById(fileNameId);
            const dropzone = document.getElementById(dropzoneId);

            // Click on dropzone opens file dialog
            dropzone.addEventListener('click', () => {
                fileInput.click();
            });

            // Drag and drop functionality
            dropzone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzone.style.borderColor = '#4361ee';
                dropzone.style.backgroundColor = 'rgba(67, 97, 238, 0.05)';
            });

            dropzone.addEventListener('dragleave', () => {
                dropzone.style.borderColor = '#e2e8f0';
                dropzone.style.backgroundColor = 'transparent';
            });

            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzone.style.borderColor = '#e2e8f0';
                dropzone.style.backgroundColor = 'transparent';
                fileInput.files = e.dataTransfer.files;
                updateFileName(fileInput, fileName);
            });

            // Update filename when selected through dialog
            fileInput.addEventListener('change', () => {
                updateFileName(fileInput, fileName);
            });
        }

        function updateFileName(fileInput, fileNameElement) {
            if (fileInput.files.length > 0) {
                fileNameElement.textContent = `Selected: ${fileInput.files[0].name}`;
            } else {
                fileNameElement.textContent = '';
            }
        }

        // Modal functionality
        function showModal(type, title, message) {
            const modal = document.getElementById('result-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalMessage = document.getElementById('modal-message');

            modal.className = `modal ${type}`;
            modalTitle.textContent = title;
            modalMessage.textContent = message;

            modal.style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('result-modal').style.display = 'none';
        }

        // Initialize file inputs
        document.addEventListener('DOMContentLoaded', () => {
            handleFileSelect('fileToEncrypt', 'encrypt-file-name', 'encrypt-file-drop');
            handleFileSelect('originalFile', 'original-file-name', 'original-file-drop');
            handleFileSelect('encryptedFile', 'encrypted-file-name', 'encrypted-file-drop');

            // Check if there's a message to display (from PHP)
            <?php
            if (isset($_GET['message']) && isset($_GET['messageType'])) {
                $message = $_GET['message'];
                $messageType = $_GET['messageType'];
                $title = $messageType === 'success' ? 'YAYY! Success!' : 'Oh no! Error!';

                echo "showModal('$messageType', '$title', '$message');";
            }
            ?>
        });
    </script>
</body>

</html>