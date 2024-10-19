// Password Change Confirmation Logic
document.getElementById("confirmPasswordChange").onclick = function() {
    var confirmation = confirm("Bạn có chắc chắn muốn đổi mật khẩu không?");
    if (confirmation) {
        // Let the form be submitted to PHP for handling password change
        document.querySelector('#passwordChange form').submit();
    }
};

// Function to handle inline edits
function toggleEdit(field) {
    var displayElement = document.getElementById(field + "Display");
    var inputElement = document.getElementById(field + "Input");
    var saveButton = document.getElementById("save" + capitalizeFirstLetter(field) + "Btn");
    var editIcon = displayElement.nextElementSibling; // Arrow icon
    var cancelIcon = displayElement.nextElementSibling.nextElementSibling; // Cancel (X) icon

    displayElement.style.display = "none";   // Hide the current display
    inputElement.style.display = "block";    // Show the input field
    saveButton.style.display = "inline-block"; // Show the save button
    editIcon.style.display = "none";         // Hide the edit arrow icon
    cancelIcon.style.display = "inline-block"; // Show the cancel (X) icon
}

// Function to cancel edit
function cancelEdit(field) {
    var displayElement = document.getElementById(field + "Display");
    var inputElement = document.getElementById(field + "Input");
    var saveButton = document.getElementById("save" + capitalizeFirstLetter(field) + "Btn");
    var editIcon = displayElement.nextElementSibling; // Arrow icon
    var cancelIcon = displayElement.nextElementSibling.nextElementSibling; // Cancel (X) icon

    inputElement.value = "";  // Reset input field
    inputElement.style.display = "none";  // Hide input
    saveButton.style.display = "none";    // Hide save button
    cancelIcon.style.display = "none";    // Hide cancel icon (X)
    editIcon.style.display = "inline-block"; // Show the edit arrow icon
    displayElement.style.display = "block";  // Show the current display text
}

// Function to save the edit
document.querySelectorAll('.save-btn').forEach(function(button) {
    button.onclick = function() {
        var field = this.id.replace('save', '').replace('Btn', '').toLowerCase();
        var confirmation = confirm("Bạn có chắc chắn muốn lưu thay đổi không?");
        if (confirmation) {
            // Submit the form to the server-side PHP for handling the edit
            this.form.submit();
        }
    }
});

// Logout Button Functionality
document.getElementById("logoutBtn").onclick = function () {
    var confirmation = confirm("Bạn có chắc chắn muốn đăng xuất không?");
    if (confirmation) {
        document.querySelector('#logoutForm').submit();  // Submit logout form to PHP
    }
};

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}