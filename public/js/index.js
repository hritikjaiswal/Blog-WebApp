$("#firstName").keydown(function(event){
    onlyalpha(event)
});

$("#address").keydown(function(event){
    onlyalphaNum(event)
});

function onlyalphaNum(event){
    // switch (event.keyCode) {
    //     case 8:  // Backspace
    //     case 9:  // Tab
    //     case 13: // Enter
    //     case 32:
    //     break;
    //     default:
    //     var regex = new RegExp("^[a-zA-Z0-9]+$");
    //     var key = event.key;
    //     if (!regex.test(key)) {
    //         event.preventDefault();
    //         return false;
    //     }
    //     break;
    // }
}
function onlyalpha(event){
    switch (event.keyCode) {
        case 8:  // Backspace
        case 9:  // Tab
        case 13: // Enter
        case 32:
        break;
        default:
        var regex = new RegExp("^[a-zA-Z]+$");
        var key = event.key;
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
        break;
    } 
}
//add student detail

function enableInput(){

    let f_name = document.getElementById('firstName').value;
    let f_email = document.getElementById('username').value;
    let dob = document.getElementById('dob').value;
    let address = document.getElementById('address').value;
    let uplaod_img = document.getElementById('imageUpload').value;
    let pass = document.getElementById('password').value;
    let submit = document.getElementById('addSubmit');
    
    if(f_name != '' && f_email !='' && dob !='' && address!='' && uplaod_img!='' && pass != ''){
        submit.removeAttribute('disabled');
    
    } else{
        submit.setAttribute('disabled', '');
    }
}

$('#imageUpload').bind('change', function () {
    var a = 0;
    var ext = $('#imageUpload').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        $('#error1').slideDown("slow");
        $('#error2').slideUp("slow");
        a = 0;
    } else {
        var picsize = (this.files[0].size);
        if (picsize > 2000000) {
            $('#error2').slideDown("slow");
            a = 0;
        } else {
            a = 1;
            $('#error2').slideUp("slow");
        }
        $('#error1').slideUp("slow");
    }
});

function teacherEnableInput(){

    let f_email = document.getElementById('username').value;
    let pass = document.getElementById('password').value;
    let submit = document.getElementById('teacher-submit');
    
    if(f_email !='' && pass != ''){
        submit.removeAttribute('disabled');
    
    } else{
        submit.setAttribute('disabled', '');
    }
}

function studentEnableInput(){

    let f_email = document.getElementById('username').value;
    let pass = document.getElementById('password').value;
    let submit = document.getElementById('student-login');
    
    if(f_email !='' && pass != ''){
        submit.removeAttribute('disabled');
    
    } else{
        submit.setAttribute('disabled', '');
    }
}

// $('#addSubmit').attr('disabled',true);
//     // $('#firstName').change(function(){
        
//     // })
//     $('#username').change(function(){
//         if($(this).val().length !=0)
//             $('#addSubmit').attr('disabled', false);            
//         else
//             $('#addSubmit').attr('disabled',true);
//     })
//     $('#address').change(function(){
//         if($(this).val().length !=0)
//             $('#addSubmit').attr('disabled', false);            
//         else
//             $('#addSubmit').attr('disabled',true);
//     })
//     $('#password').change(function(){
//         if($(this).val().length !=0)
//             $('#addSubmit').attr('disabled', false);            
//         else
//             $('#addSubmit').attr('disabled',true);
//     })

//     function emptyVal(){
//         if($(this).val().length !=0)
//             $('#addSubmit').attr('disabled', false);            
//         else
//             $('#addSubmit').attr('disabled',true);
//     }

//teacher login
    // $('#teacher-login-email').keyup(function(){
    //     if($(this).val().length !=0)
    //         $('#teacher-login').attr('disabled', false);            
    //     else
    //         $('#teacher-login').attr('disabled',true);
    // })

    // $('#teacher-login-pass').keyup(function(){
    //     if($(this).val().length !=0)
    //         $('#teacher-login').attr('disabled', false);            
    //     else
    //         $('#teacher-login').attr('disabled',true);
    // })

    // //student login

    // $('#student-login-email').keyup(function(){
    //     if($(this).val().length !=0)
    //         $('#student-login').attr('disabled', false);            
    //     else
    //         $('#student-login').attr('disabled',true);
    // })
    
    // $('#student-login-pass').keyup(function(){
    //     if($(this).val().length !=0)
    //         $('#student-login').attr('disabled', false);            
    //     else
    //         $('#student-login').attr('disabled',true);
    // })
    
    ///////////////

    //  $('input[type="submit"]').prop("disabled", true);
    // var a = 0;
    // //binds to onchange event of your input field
    // $('#imageUpload').bind('change', function () {
    //     if ($('input:submit').attr('disabled', false)) {
    //         $('input:submit').attr('disabled', true);
    //     }
    //     var ext = $('#imageUpload').val().split('.').pop().toLowerCase();
    //     if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
    //         $('#error1').slideDown("slow");
    //         $('#error2').slideUp("slow");
    //         a = 0;
    //     } else {
    //         var picsize = (this.files[0].size);
    //         if (picsize > 2000000) {
    //             $('#error2').slideDown("slow");
    //             a = 0;
    //         } else {
    //             a = 1;
    //             $('#error2').slideUp("slow");
    //         }
    //         $('#error1').slideUp("slow");
    //         if (a == 1) {
    //             $('#imageUpload').attr('disabled', false);
    //         }
    //     }
    // });

   