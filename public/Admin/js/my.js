/**
 * ajax func
 */

function ajax() {
    var xhr = new XMLHttpRequest;
    xhr.open('POST', '/index.php?a=check');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (JSON.parse(xhr.responseText).status) {
                document.location.href = "/index.php?p=admin&&c=Manager&&a=index";
            } else {
                document.querySelector('.info').className = 'info text-danger';
            }
        }
    }
    var user = document.querySelector('#user').value;
    var pass = document.querySelector('#pass').value;
    xhr.send('user=' + user + '&pass=' + pass);
}
function logout() {
    var xhr = new XMLHttpRequest;
    xhr.open('get', '/index.php?c=manager&a=logout');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.location.href = "/index.php";
        }
    }
    xhr.send(null);
}



document.querySelector('#submin').onclick = function () { ajax() };
document.querySelector('#pass').onfocus = function () {
    document.querySelector('.info').className = 'info d-none';
};