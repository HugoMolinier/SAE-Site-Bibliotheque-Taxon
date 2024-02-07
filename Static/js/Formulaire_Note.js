function showNoteForm() {
    document.getElementById('note-form').style.display = 'block';
    document.getElementById('Button_Open').style.display = 'none';
    document.getElementById('Button_delete').style.display = 'block';
    document.getElementById('Note_text').style.display = 'none';
    document.getElementById('note-button').style.display = 'block';
}

function closeForm(){
    document.getElementById('note-form').style.display = 'none';
    document.getElementById('Button_Open').style.display = 'block';
    document.getElementById('Button_delete').style.display = 'none';
    document.getElementById('Note_text').style.display = 'block';
    document.getElementById('note-button').style.display = 'none';
}
function sendEmptyForm() {
    // Mettez à jour la valeur du champ 'note' à une chaîne vide
    document.getElementById('note').value = '';

    // Soumettre le formulaire
    document.getElementById('note-form').submit();
}