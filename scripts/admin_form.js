function showForm(formId) {
        // Ukryj wszystkie formularze
        var forms = document.getElementsByClassName('form-container');
        Array.from(forms).forEach(function(form) {
            form.style.display = 'none';
        });

        // Pokaż wybrany formularz
        document.getElementById(formId).style.display = 'block';
    }
    
    // Obsługa kliknięcia przycisku "Dodaj zwierzę"
    function showAddAnimalForm() {
        showForm('add-animal-form');
    }