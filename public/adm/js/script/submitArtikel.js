
function submitForm() {
    var aForm = document.getElementById('formNewArtikel');
    var postUrl = aForm.getAttribute('action');
    document.forms["formNewArtikel"].submit();
}