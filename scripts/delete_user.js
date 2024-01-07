function showConfirmation() {
    var deleteButton = document.getElementById('delete-button');
    var confirmationSection = document.getElementById('delete-confirm');

    deleteButton.style.display = 'none';
    confirmationSection.style.display = 'block';
}

function cancelDeletion() {
    var deleteButton = document.getElementById('delete-button');
    var confirmationSection = document.getElementById('delete-confirm');

    deleteButton.style.display = 'block';
    confirmationSection.style.display = 'none';
}