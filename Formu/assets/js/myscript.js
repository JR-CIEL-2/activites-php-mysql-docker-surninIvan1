function verifierFormulaire() {
    const name = document.querySelector("input[name='name']");
    const prenom = document.querySelector("input[name='prénom']");
    const email = document.querySelector("input[name='email']");
    const password = document.querySelector("input[name='password']");
    const message = document.querySelector("textarea[name='message']");
    const ageCheckbox = document.querySelector("#formCheck-1");

    let isValid = true;

    // Réinitialisation des états
    [name, prenom, email, password, message].forEach(input => {
        input.classList.remove("input-error", "input-success");
    });
    document.querySelector(".text-danger").classList.add("invisible");

    // Validation des champs
    if (!name.value.trim()) {
        name.classList.add("input-error");
        isValid = false;
    } else {
        name.classList.add("input-success");
    }

    if (!prenom.value.trim()) {
        prenom.classList.add("input-error");
        isValid = false;
    } else {
        prenom.classList.add("input-success");
    }

    if (!email.value.trim()) {
        email.classList.add("input-error");
        isValid = false;
    } else {
        email.classList.add("input-success");
    }

    if (!password.value.trim() || password.value.length < 8) {
        password.classList.add("input-error");
        document.querySelector(".text-danger").classList.remove("invisible");
        isValid = false;
    } else {
        password.classList.add("input-success");
    }

    if (!message.value.trim()) {
        message.classList.add("input-error");
        isValid = false;
    } else {
        message.classList.add("input-success");
    }

    if (!ageCheckbox.checked) {
        alert("Vous devez confirmer que vous êtes majeur.");
        isValid = false;
    }

    // Si le formulaire est valide, envoyer les données via AJAX
    if (isValid) {
        const formData = new FormData(document.getElementById("signup-form"));
        $.ajax({
            type: "POST",   // Assurez-vous que "POST" est utilisé
            url: "traitement.php",  // Assurez-vous que l'URL du script est correcte
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById("form-feedback").innerHTML = response;
            },
            error: function(xhr, status, error) {
                console.log("Erreur AJAX : ", xhr.status, xhr.statusText);
                alert("Une erreur est survenue : " + status + " - " + error);
            }
        });
        
    }
}
