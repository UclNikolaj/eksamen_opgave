
function getLength(box) {
    var ln = 0;
    for (var i = 0; i < box.length; i++) {
        if (box[i].checked)
            ln++
    }
    return ln;
}
/* Form validation */
function validateForm() {
    let errors = 0;

    /* RADIO BOXES VALIDATION */
    // callback function
    const radioBoxes = ['understandment_measure', 'readyment'];
    radioBoxes.forEach(function (name, index) {
        document.querySelector('#' + name + '_error_msg').classList.add('d-none');
        let element = getLength(document.getElementsByName(name));
        if (element !== 1) {
            document.querySelector('#' + name + '_error_msg').classList.remove('d-none');
            errors++;
        }
    });

    if (errors >= 1) {
        document.querySelector('.showLoader').style.display = 'none';
        return false;
    } else {
        // loader
        setTimeout(() => {
            document.querySelector('.showLoader').style.display = 'none';
        }, 800)
        document.querySelector('.showLoader').style.display = 'block';

        // success message with jquery
        $('#success_flash').delay(850).fadeIn('fast').delay(3500).fadeOut('fast');

        // return false, since we dont want to "submit" the data, also reset the form
        document.forms["registrationForm"].reset();
        return false;
    }
}
