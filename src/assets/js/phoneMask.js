const phoneInput = document.getElementById('tel');
const maskOptions = {
    mask: '+{7}(000)000-00-00'
}

const phoneMask = new IMask(phoneInput, maskOptions);