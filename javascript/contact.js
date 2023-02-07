function contactalert() {
    if(document.getElementById('InputTop').value === "" || document.getElementById('InputCenter').value === "" || document.getElementById('Inputbottem').value === "") {
        alert('Vul alle invoervelden in');
    }
}
contactalert();