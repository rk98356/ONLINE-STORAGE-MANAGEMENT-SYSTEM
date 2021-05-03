/*        function validation()
        {
            //alert(1);
            var usern = $('#name_check').val();
            var mob = $('#mobileno_check').val();
            var email = $('#email_check').val();
           /* $('#namespan').html("");
            $('#mobileno_span').html("");
            $('#email_span').html("");*/
          /*  if (usern == "" || usern==null)
            {
                $('#namespan').html("*Please Fill The Name!");
                return false;
            }

            if (mob == "" || mob==null)
            {
                $('#mobileno_span').html("*Please Fill The Mobile No!");
                return false;
            }

            if (email == "" || email==null)
            {
                $('#email_span').html("*Please Fill The Email!");
                return false;
            }

            /*if ((usern.length<=2) || (usern.length>25))
            {
                $('#namespan').html("*Name Must Be Valid!");
                return false;
            }*/

           /* if (!isNaN(usern))
            {
                $('#namespan').html("*Only Charactert Is Allowed!");
                return false;
            }

            if (mob.length!=10)
            {
                $('#mobileno_span').html("*Number Must Be Of 10 Digit!");
                return false;
            }

            if (email.indexOf('@')<=0)
            {
                $('#email_span').html("*@ Is Not At Right Position");
                return false;
            }

            /*if ((email.charAt(email.length-4)!='.') || (email.charAt(email.length-3)!='.'))
            {
                document.getElementById('email_span').innerHTML = "*. Is Not At Right Position";
                return false;
            }*/
       /* }
            function InputNumber(evt)
        {
                    
            var ch = String.fromCharCode(evt.which);
            $('#mobileno_span').html("");
      
            if(!(/[0-9]/.test(ch)))
            {
                evt.preventDefault();
                $('#mobileno_span').html("Only Digits Are Allowed!");
            }
                    
        } 

            function Inputtext(evt)
        {
                    
            var ch = String.fromCharCode(evt.which);
            $('#namespan').html("");
                    
            if(!(/[a-z,A-Z]/.test(ch)))
            {
                evt.preventDefault();
                $('#namespan').html("Only Character Are Allowed!");
            }
                    
        } 
        $(document).on('click','#submit_btn',function(){
            validation();
            
        });

        $(document).on('keypress','#mobileno_check',function(){
            InputNumber(event);
        });*/
