document.addEventListener('keyup', function (e) {
    if(e.key === 'Enter'){
        sendData();
    }
});
window.addEventListener('load', function () {
    let submit = document.getElementById('submit');
    submit.addEventListener('click', sendData());
});

function sendData() {
    let form = document.getElementById('editProfileForm');
    let firstName = document.getElementById('firstName');
    let name = document.getElementById('name');
    let location = documnt.getElementById('location');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    let confirmPasswd = document.getElementById('confirmPasswd');
    var token = form.elements._token.value;

    let data = new FormData();
    data.append('firstName', firstName.value);
    data.append('name', name.value);
    data.append('location', location.value);
    data.append('email', email.value);
    data.append('password', password.value);
    data.append('confirmPasswd', confirmPasswd.value);
    data.append('_token', token);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/editProfile', true);
    xhr.onload = function(){
        console.log(this.responseText);
    };
    xhr.send(data);
}
