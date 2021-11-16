
!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
    //Basic
    $('#sa-basic').click(function(){
        swal("Here's a message!");
    });

    //A title with a text under
    $('#sa-title').click(function(){
        swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.")
    });

    //Success Message
    $('#sa-success').click(function(){
        swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.", "success")
    });

    //Warning Message
    $('#sa-warning').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "You wants to delete the details",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Deleted!", "Your details has been deleted.", "success"); 
        });
    });

    //Parameter
    $('.own-alert').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "Are you sure want to delete the Client details!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your Client details has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your Client details is safe :)", "error");   
            } 
        });
    });
        
        //Parameter
    $('.own-alert1').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "Are you sure want to delete the Scope details!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your Scope details has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your Scope details is safe :)", "error");   
            } 
        });
    });
		
		 //Parameter
    $('.job-alert').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "Are you sure want to delete the Job details!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your Job details has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your Job details is safe :)", "error");   
            } 
        });
    });
		//Parameter
    $('.remove-pay').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "Are you sure want to remove this Payment!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your Payment details has been removed.", "success");   
            } else {     
                swal("Cancelled", "Your Payment details is safe :)", "error");   
            } 
        });
    });
        
         //Parameter
    $('.own-alert2').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "Are you sure want to delete the System details!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your System Details has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your System Details is safe :)", "error");   
            } 
        });
    });    
        
        

    //Custom Image
    $('#sa-image').click(function(){
        swal({   
            title: "Govinda!",   
            text: "Recently joined twitter",   
            imageUrl: "../plugins/images/users/govinda.jpg" 
        });
    });

    //Auto Close Timer
    $('#sa-close').click(function(){
         swal({   
            title: "Auto close alert!",   
            text: "I will close in 2 seconds.",   
            timer: 2000,   
            showConfirmButton: false 
        });
    });


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);