<?php
include_once("database/connect.php");
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");

output_head("Smooth As Silk");
?>
<body>
    <?php output_header(); ?>
    <div class="edit-profile-picture-container">
        <img id="edit-profile-picture" src="./assets/user_profile.png" alt="profile picture">
        <input type="file" id="profile-picture-upload" style="display: none;">
        <button onclick="document.getElementById('profile-picture-upload').click()">EDIT PROFILE PICTURE</button>
    </div>
    <section id="profile-page">
        <div class="profile-info">

            <div class="field-container">
                <p><strong><span class="username" id="username" onclick="handleFieldClick('username')">Username</span></strong>
                    <button id="edit-username" class="edit-button" onclick="editField('new-username')" style="display: none;">Edit</button>
                </p>
                <!-- Input field for editing username -->

                <input type="text" id="new-username" style="display: none;">
            </div>
            <div class="field-container">
                <p><strong><span class="name" id="name" onclick="handleFieldClick('name')">Name</span></strong>
                    <button id="edit-name" class="edit-button" onclick="editField('new-name')" style="display: none;">Edit</button>
                </p>
                <!-- Input field for editing name -->
                <input type="text" id="new-name" style="display: none;">
            </div>
            <div class="field-container">
                <p><strong><span class="email" id="email" onclick="handleFieldClick('email')">Email</span></strong>
                    <button id="edit-email" class="edit-button" onclick="editField('new-email')" style="display: none;">Edit</button>
                </p>
                <!-- Input field for editing email -->
                <input type="email" id="new-email" style="display: none;">
            </div>
            <div class="field-container">
                <p><strong><span class="password" id="password" onclick="handleFieldClick('password')">Password</span></strong>
                    <button id="edit-password" class="edit-button" onclick="editField('new-password')" style="display: none;">Edit</button>
                </p>
                <!-- Input field for editing username -->
                <input type="password" id="new-password" style="display: none;">
            </div>
        </div>
        <div class="profile-actions">
            <button onclick="saveChanges()">Save Changes</button>
        </div>
    </section>
    
    <?php output_footer(); ?>
    
    <script>
        function editUsername() {
            document.getElementById('new-username').style.display = 'block';
        }
        
        function editName() {
            document.getElementById('new-name').style.display = 'block';
        }
        
        function editEmail() {
            document.getElementById('new-email').style.display = 'block';
        }

        function editPassword() {
            document.getElementById('new-password').style.display = 'block';
        }

        function showEditButton(buttonId) {
            document.getElementById(buttonId).style.display = 'inline-block';
            document.getElementById(buttonId).previousSibling.style.textDecoration = 'underline';
        }
        
        function hideEditButton(buttonId) {
            document.getElementById(buttonId).style.display = 'none';
            document.getElementById(buttonId).previousSibling.style.textDecoration = 'none';
        }
        
        function editField(fieldId) {
            document.getElementById(fieldId).style.display = 'block';
            document.getElementById(fieldId).focus();
        }
        
        function hideField(fieldId) {
            document.getElementById(fieldId).style.display = 'none';
        }

        function handleFieldClick(fieldId) {
            var field = document.getElementById(fieldId);
            var editButton = document.getElementById('edit-' + fieldId);

            if (document.getElementById('new-' + fieldId).style.display === 'block') {
                hideField('new-' + fieldId);
            } else {
                editField('new-' + fieldId);
            }
        }

        function saveChanges() {
            // TODO: Implement functionality to save changes to the database
            alert('Changes saved!');
        }
    </script>
</body>
</html>