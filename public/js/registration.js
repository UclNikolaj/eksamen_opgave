/* filter */
function searchList(id) {
    var value = $(id + "_search").val().toLowerCase();
    $(id + " div").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
}

/* EDUCATION */
/* show/hide */
$("#see_educations").click(function (e) {
    e.preventDefault();
    $(this).text(function (i, text) {
        return text === "Se alle uddannelser" ? "Skjul uddannelser" : "Se alle uddannelser";
    })
    $("#hidden_educations").toggle(250);

});

/* TOPICS */
/* show/hide */
$("#see_topics").click(function (e) {
    e.preventDefault();
    $(this).text(function (i, text) {
        return text === "Se alle emner" ? "Skjul emner" : "Se alle emner";
    })
    $("#hidden_topics").toggle(250);
});

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
    var errors = 0;
    /* TOPIC SECTION */
    document.querySelector('#topic_error_msg').classList.add('d-none');
    var topicLen = getLength(document.getElementsByName('topic[]'));
    if (topicLen < 1) {
        document.querySelector('#topic_error_msg').classList.remove('d-none');
        errors++;
    }
    /* RADIO BOXES VALIDATION */
    // callback function
    const radioBoxes = ['education', 'inquire_type', 'person_or_group', 'student_or_not'];
    radioBoxes.forEach(function (name, index) {
        document.querySelector('#' + name + '_error_msg').classList.add('d-none');
        var element = getLength(document.getElementsByName(name));
        if (element !== 1) {
            // if current radiobox doesnt have a length that is equal to 1, then display error messsage
            document.querySelector('#' + name + '_error_msg').classList.remove('d-none');
            errors++;
        }
    });
    if (errors >= 1) {
        // if errors is above or equal to 1, then dont display the "loader"
        document.querySelector('.showLoader').style.display = 'none';
        return false;
    } else {
        // loader
        setTimeout(() => {
            document.querySelector('.showLoader').style.display = 'none';
        }, 800)
        document.querySelector('.showLoader').style.display = 'block';
        // success message with jquery
        $('#success_flash').delay(850).fadeIn('fast').delay(2000).fadeOut('fast');
        // return false, since we dont want to "submit" the data, and reset the form
        document.forms["registrationForm"].reset();
        return false;
    }
}