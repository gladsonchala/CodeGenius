window.onload = function () {
    var form = document.getElementById('registration'); 
    form.onsubmit = function(e) {
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('confirm_password').value;

        if (password != confirm_password) {
            alert('Passwords do not match.');
            e.preventDefault();
        }
    }
}