function showForm(formId) {
    // Ukryj wszystkie formularze
    var forms = document.getElementsByTagName('form');
    for (var i = 0; i < forms.length; i++) {
        forms[i].style.display = 'none';
    }

    // Pokaż wybrany formularz
    document.getElementById(formId).style.display = 'block';
}