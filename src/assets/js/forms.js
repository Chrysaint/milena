const loginRegex = new RegExp('^[a-zA-Z0-9_.-]{6,}$');
const passRegex = new RegExp('^[a-zA-Z0-9_.-]{7,}$');

const registrButton = $("#registerButton");
const loginBtn = $("#login-button");
const changePassBtn = $("#changePassBtn");
const orderBtn = $("#createOrder");


loginBtn.click((e) => {
    const login = $("#login").val();
    const pass = $("#password").val();

    $.ajax({
        url: 'http://beauty/services/login.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: pass,
        },
        success: (data) => {
            if(data.err) {
                return $("#form__error").text(data.err);   
            }
            document.location.href = 'http://beauty/profile.php';
        }
    });      
})

registrButton.click((e) => {
    let errorFlag = false;

    const login = $("#login").val();
    const pass = $("#password").val();
    const name = $("#name").val();
    const surname = $("#surname").val();
    const tel = $("#tel").val();

    if (!loginRegex.test(login)) {
        $("#login").addClass('error');
        $("#login-error").text("Только латинские символы. Длина от 6 символов!")
        errorFlag = true;
    } else {
        $("#login").removeClass("error");
        $("#login-error").text("")
    }

    if (!passRegex.test(pass)) {
        $("#password").addClass('error');
        $("#password-error").text("Только латинские символы. Длина от 7 символов!")
        errorFlag = true;
    } else {
        $("#password").removeClass("error");
        $("#password-error").text("")
    }

    if (!name) {
        $("#name").addClass('error');
    } else {
        $("#name").removeClass('error');
    }

    if (!surname) {
        $("#surname").addClass('error');
    } else {
        $("#surname").removeClass('error');
    }

    if (!tel) {
        $("#tel").addClass('error');
    } else {
        $("#tel").removeClass('error');
    }

    if (!name || !surname || !tel) {
        $("#fields-error").text("Заполните все поля!")
        errorFlag = true;
    } else {
        $("#fields-error").text("")
    }

    if (errorFlag) return;

    $.ajax({
        url: 'http://beauty/services/register.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: pass,
            tel: tel,
            name: name,
            surname: surname,
        },
        success: (data) => {
            if(data.error) {
                return $("#login-error").text(data.error);   
            }
            document.location.href = 'http://beauty/profile.php';
        }
    });      
})

orderBtn.click((e) => {
    e.preventDefault();
    const priceText = $('.header__cart__text')[0].textContent;
    const price = priceText.split(' ')[0];
    const name = $('.cart__form__input[name="name"]').val();
    const phone = $('.cart__form__input[name="phone"]').val();
    const address = $('.cart__form__input[name="address"]').val();

    const dateBuilder = new Date();
    let day = dateBuilder.getDay();
    let month = dateBuilder.getMonth();
    let year = dateBuilder.getFullYear();

    if (day < 10) {
        day = '0' + day;
    }
    
    if (month < 10) {
        month = '0' + month;
    }
    
    const date = `${day}.${month}.${year}`;

    const items = JSON.parse(localStorage.getItem('cart'));

    $.ajax({
        url: 'http://antikvarramir/services/createAnOrder.php',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            phone: phone,
            address: address,
            price: price,
            date: date,
            items: items
        },
        success: (data) => {
            if(data.err) {
                return $("#not-filled-error").text(data.err);   
            }
            localStorage.clear('cart');
            document.location.href = 'http://antikvarramir/profile.php';
        }
    });   
})

changePassBtn.click((e) => {
    e.preventDefault();

    const oldPass = $('#oldPass').val();
    const newPass = $('#newPass').val();
    const newPass2 = $('#newPass2').val();

    $.ajax({
        url: 'http://antikvarramir/services/changePass.php',
        type: 'POST',
        dataType: 'json',
        data: {
            oldPass: oldPass,
            newPass: newPass,
            newPass2: newPass2,
        },
        success: (data) => {
            if(data.err) {
                return $("#change-pass-error").text(data.err);   
            }
            document.location.href = 'http://antikvarramir/profile.php';
        }
    });   
})