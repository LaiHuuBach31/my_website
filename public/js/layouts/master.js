// header
const header = document.getElementById("header")

window.addEventListener('scroll', () => {

    document.documentElement.scrollTop > 0 ? header.classList.add('sticky') : header.classList.remove('sticky');

})

const header_1024 = document.getElementById("header_1024");

window.addEventListener("scroll" , () => {
    document.documentElement.scrollTop > 0 ? header_1024.classList.add("sticky_1024") : header_1024.classList.remove("sticky_1024");
})

// scroll top
let mybutton = document.getElementById("myBtn");

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// login
$check = true;

function show_pass() {
    if ($check) {
        document.getElementById('eye_pass').setAttribute('class', 'fa-solid fa-eye');
        document.getElementById('ip_pass').setAttribute('type', 'text');
        $check = false;
    } else {
        document.getElementById('eye_pass').setAttribute('class', 'fa-solid fa-eye-slash');
        document.getElementById('ip_pass').setAttribute('type', 'password');
        $check = true;
    }
}

function press_pass() {
    // if(document.getElementById('ip_pass').value == ''){
    //     document.getElementById('eye_pass').classList.remove('show_iconeye');
    // }
    document.getElementById('eye_pass').classList.add('show_iconeye');
}

