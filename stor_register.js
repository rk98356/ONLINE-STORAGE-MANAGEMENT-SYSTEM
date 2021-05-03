var flag = 0;
var swal;

function varifynull(vari, message) {
    if (vari === null || vari === "" || vari === 'undefined') {
        alert(message);
        flag++;
    }
}

function validateemail(email) {
    var atposition = email.indexOf("@");
    var dotposition = email.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
        alert("Please enter a valid e-mail address");
        flag++;
    }
}
/*function validatedate(dob,message)
{
	var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
	    if(!dob.match(dateformat)){
	    	alert(message);
	    	flag++;
	    }
}*/

$(document).on('submit', '#doodle', function() {
    var name = $('#name_check').val();
    varifynull(name, "Name must be filled!");
    alert("check");
    var email = $('#email_check').val();
    validateemail(email);
    var mobileno = $('#mobileno_check').val();
    varifynull(mobileno, "Mobile no. must be filled!");
    if (flag === 0) {
        $.ajax({
            method: 'post',
            url: 'stor_register.php',
            data: {
                submit: 'submit',
                namekey: name,
                emailkey: email,
                mobilenokey: mobileno
            },
            beforeSend: function(){
            $("#blank").css("display","block");
            },
            complete: function(){
            $("#blank").css("display","none");
            },
            success: function(data) {
                swal({
                        text: data,
                        type: 'success',
                        title: 'Well Done',
                        button: {
                            text: "OK!",
                            closeModal: false,
                        },
                    })
                    .then(willSearch => {
                        if (willSearch) {
                            window.location.href = "stor_register.php";
                        }
                    })
            }
        });
    } else {
        alert(data);
    }
});
$(document).on('submit','#update_user_details', function(e) {
    e.preventDefault();
    var sno = $('#update_sno').val();

    var fname = $('#update_fname').val();
    varifynull(fname, "Father name must be filled!");
    var mobileno = $('#update_mobileno').val();
    varifynull(mobileno, "Mobile no. must be filled!");
        if (flag === 0) {
            alert("e");
        $.ajax({
            method: 'post',
            url: 'ad_register.php',
            data: {
                submit: 'update',
                snokey: sno,
                fnameKey: fname,
                mobilenokey: mobileno
            },
            beforeSend: function(){
            $("#blank").css("display","block");
            },
            complete: function(){
            $("#blank").css("display","none");
            },
            success: function(data) {
                swal({
                        text: data,
                        type: 'success',
                        title: 'Well Done',
                        button: {
                            text: "OK!",
                            closeModal: false,
                        },
                    })
                    .then(willSearch => {
                        if (willSearch) {
                            window.location.href = "ad_edit_user.php";
                        }
                    })
            }
        });
    } else {
        alert(data);
    }
});
