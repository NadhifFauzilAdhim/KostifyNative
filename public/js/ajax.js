
document.addEventListener('DOMContentLoaded', function() {
var toggleVisibilityButtons = document.querySelectorAll('.toggle-visibility');

toggleVisibilityButtons.forEach(function(button) {
var initialVisibility = button.getAttribute('data-visibility');
updateButtonAppearance(button, initialVisibility);

button.addEventListener('click', function() {
    var postId = this.getAttribute('data-id');
    var currentVisibility = this.getAttribute('data-visibility');
    var newVisibility = currentVisibility == 1 ? 0 : 1;
    var button = this; 
    updateButtonAppearance(button, newVisibility);
    button.setAttribute('data-visibility', newVisibility);

    // AJAX request to server
    fetch('<?= BASEURL ?>dashboard/visibility', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'postid=' + postId + '&visibility=' + newVisibility
    })
    .then(response => response.json())
    .then(data => {
        if (!data.success) {
            // If the update failed, revert the button to the previous state
            updateButtonAppearance(button, currentVisibility);
            button.setAttribute('data-visibility', currentVisibility);
            alert('Error updating visibility');
        } else {
            // Update other elements if necessary
            var statusElement = document.querySelector('#status-' + postId);
            if (statusElement) {
                statusElement.textContent = newVisibility == 1 ? 'Public' : 'Private';
            }
        }
    })
    .catch(error => {
       
        console.error('Error:', error);
    });
});
});

function updateButtonAppearance(button, visibility) {
var icon = button.querySelector('i');
var text = button.querySelector('span');

if (visibility == 1) {
    icon.className = 'bi bi-eye me-1';
    text.textContent = 'Public';
    button.className = 'btn btn-sm btn-info toggle-visibility';
} else {
    icon.className = 'bi bi-eye-slash me-1';
    text.textContent = 'Private';
    button.className = 'btn btn-sm btn-danger toggle-visibility';
}
}
});

