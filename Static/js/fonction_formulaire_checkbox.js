
function updateFormSubmit() {
    var checkbox = document.getElementById("rechercheES");
    var additionalForm = document.getElementById("additionalForm");
    var additionalCheckbox = document.getElementById("additionalCheckbox");
    if (checkbox) {
        // Mettez à jour la valeur du champ caché dans le formulaire additionnel
        additionalCheckbox.value = checkbox.checked ? "1" : "0";
        // Soumettez le formulaire additionnel
        additionalForm.submit();
    }
}
function updateFormSubmitTaxa(taxonId) {
    var form = $('#Add' + taxonId); // Assuming your form has an id like "Add$taxonI"
    var statutInput = form.find('[name="statut"]');
    var idUtilisateurInput = form.find('[name="idUtilisateur"]');
    var idTaxonInput = form.find('[name="id"]');
    var fullNameHtmlInput = form.find('[name="fullNameHtml"]');
    var addTaxonCheckbox = form.find('#AddTaxon');


    // Update the inputs with the values you need
    idTaxonInput.val(taxonId);

    // Check if statusInput is defined and is an input element
    if (addTaxonCheckbox.prop('checked')) {
        statutInput.val(true);
    } else {
        statutInput.val(false);
    }
    if (addTaxonCheckbox) {

        // Envoyer les données au serveur via AJAX
        $.ajax({
            type: 'POST',
            url: '../View/AjoutTaxonDB.php',
            data: form.serialize(),
            success: function(response) {
                // Gérer la réponse du serveur si nécessaire
                // Afficher un message à l'utilisateur si vous le souhaitez
                start_Toast(statutInput.val(),fullNameHtmlInput.val());
                console.log(response);
                return response;
            },
            error: function(error) {
                // Gérer les erreurs si nécessaire
                console.error(error);
            }
        });;


        // Empêcher le formulaire de se soumettre normalement
        return false;
    }
}
