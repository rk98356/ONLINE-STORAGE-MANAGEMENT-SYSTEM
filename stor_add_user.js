var flag=0;
function varifynulls(vari, message,span_id) {
    if (vari === null || vari === "" || vari === 'undefined') {
        $(span_id).html(message);
       // alert(message);
        flag++;
        return false;
    }
}

function validateemails(email,span_id) {
    flag=0;
    var atposition = email.indexOf("@");
    var dotposition = email.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
        $(span_id).html("Please enter a valid e-mail address");
        flag++;
        return false;
    }
}
/*function validatemobile(vari, message) {
   //alert(1);
   alert(vari.length);
   if (vari.length!=10) 
    {
        alert(message);
        flag++;  
        return false;
    }
    return true;
}**/

 function validation()
        {
            //alert(1);
            flag=0;//alert(1);
            var usern = $('#name_check').val();
            var mob = $('#mobileno_check').val();
            var email = $('#email_check').val();
           /* $('#namespan').html("");
            $('#mobileno_span').html("");
            $('#email_span').html("");*/
            /*if (usern == "" || usern==null)
            {
                $('#namespan').html("*Please Fill The Name!");
                //return false;
            }

            if (mob == "" || mob==null)
            {
                $('#mobileno_span').html("*Please Fill The Mobile No!");
                //return false;
            }

            if (email == "" || email==null)
            {
                $('#email_span').html("*Please Fill The Email!");
                //return false;
            }*/

            if ((usern.length<=2) || (usern.length>25))
            {
                $('#namespan').append("*Name Must Be Valid!");
                //return false;
                flag++;
            }

            if (!isNaN(usern))
            {
                $('#namespan').append("*Only Charactert Is Allowed!");
                //return false;
                flag++;
            }

            if (mob.length!=10)
            {
                $('#mobileno_span').append("*Number Must Be Of 10 Digit!");
                //return false;
                flag++;
            }

            if (email.indexOf('@')<=0)
            {
                $('#email_span').append("*@ Is Not At Right Position");
                //return false;
                flag++;
            }

            /*if ((email.charAt(email.length-4)!='.') || (email.charAt(email.length-3)!='.'))
            {
                document.getElementById('email_span').innerHTML = "*. Is Not At Right Position";
                //return false;
            }*/ 
        }
            function InputNumber(evt)
        {
            flag=0;      
            var ch = String.fromCharCode(evt.which);
            $('#mobileno_span').html("");
      
            if(!(/[0-9]/.test(ch)))
            {
                evt.preventDefault();
                $('#mobileno_span').append("Only Digits Are Allowed!");
                flag++;
            }
                    
        } 

            function Inputtext(evt)
        {
             flag=0;       
            var ch = String.fromCharCode(evt.which);
            $('#namespan').html("");
                    
            if(!(/[a-z,A-Z,\s]/.test(ch)))
            {
                evt.preventDefault();
                $('#namespan').append("Only Character Are Allowed!");
                flag++;
            }
                    
        } 
        $(document).on('click','#submit_btn',function(){
            validation();
            
        });

        $(document).on('keypress','#mobileno_check',function(){
            InputNumber(event);
        });

        $(document).on('keypress','#name_check',function(){
            Inputtext(event);
        });


$(document).on('blur focusout', '#email_check', function() {
    var email = $('#email_check').val();
    $.ajax({
        method: 'post',
        url: 'stor_register.php',
        data: {
            email: email,
            required: 'emailValidation'
        },
        beforeSend: function(){
            $("#blank").css("display","block");
        },
        complete: function(){
            $("#blank").css("display","none");
        },
        success: function(data) {
            //alert(data);
            if (data == "already") {
                swal("ohhh no", "Email Already exists", "error");
                $("#email").val("");
            } else if (data == "true") {
                //nothingf
            }
            //alert(data);

        }
    });
});

$(document).on('submit', '#doodle_form', function(e) {
    e.preventDefault();
    var name = $('#name_check').val();
    varifynulls(name, "Name must be filled!",'#namespan');
  
    var email = $('#email_check').val();
    validateemails(email,'#email_span');
   
    var mobileno = $('#mobileno_check').val();
    varifynulls(mobileno, "Mobile no. must be filled!",'#mobileno_span');

    validation();
    //validatemobile(mobileno, "Mobile no. must be of 10 digit!");
    
    if (flag === 0) {
        $.ajax({
            method: 'post',
            url: 'stor_register.php',
            data: {
                faizan: 'check',
                namekey: name,
                
                emailkey: email,
               
                mobilenokey: mobileno,
               
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
                            window.location.href = "stor_add_user.php";
                        }
                    })
            }
        });
    } else {
        //alert(flag);
        alert("Error!!!!Please Fill All The Details Properly.");
    }
});