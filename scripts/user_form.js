function showForm(formId) {
    // Ukryj wszystkie formularze
    var forms = document.getElementsByClassName('info');
    Array.from(forms).forEach(function(form) {
        form.style.display = 'none';
    });

    // Pokaż wybrany formularz
    document.getElementById(formId).style.display = 'block';
}