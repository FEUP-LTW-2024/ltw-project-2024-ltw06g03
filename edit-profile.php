<?php
include_once("database/connect.php");
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");

output_head("Smooth As Silk");
?>
<body>
    <?php output_header(); ?>
    <div class="profile-picture-container">
        <img id="profile-picture" src="./assets/user_profile.png" alt="profile picture">
        <input type="file" id="profile-picture-upload" style="display: none;">
        <button onclick="uploadProfilePicture()">Change Picture</button>
    </div>
    <section id="profile-page">
        <h2>Edit Profile</h2>
        <div class="profile-info">
            <p><strong>Username:</strong> <!-- TODO: Display username from database -->
                <button onclick="editUsername()">Edit</button>
            </p>
            <!-- Input field for editing username -->
            <input type="text" id="new-username" style="display: none;">
            
            <p><strong>Name:</strong> <!-- TODO: Display name from database -->
                <button onclick="editName()">Edit</button>
            </p>
            <!-- Input field for editing name -->
            <input type="text" id="new-name" style="display: none;">
            
            <p><strong>Email:</strong> <!-- TODO: Display email from database -->
                <button onclick="editEmail()">Edit</button>
            </p>
            <!-- Input field for editing email -->
            <input type="email" id="new-email" style="display: none;">
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
        
        function uploadProfilePicture() {
            document.getElementById('profile-picture-upload').click();
        }
        
        function saveChanges() {
            // Implement functionality to save changes to the database
            alert('Changes saved!');
        }
    </script>
</body>
</html>
