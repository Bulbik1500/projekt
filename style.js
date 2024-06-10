document.querySelector('#loginForm form').addEventListener('submit', function(e) {
    e.preventDefault();
    // Tutaj powinna być prawdziwa logika logowania
    if (document.querySelector('#email').value && document.querySelector('#password').value) {
        document.querySelector('#loginForm').style.display = 'none';
        document.querySelector('#accountButton').style.display = 'block';
    }
});
