$(document).ready(function() { 
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $(".select2").select2({
        width: '100%',
        dropdownParent: $('#formCustomer')
    }).on('change', function() {
        if($(this).valid() == true)
            $(this).next('span').removeClass('error');
        else
            $(this).next('span').addClass('error'); 
    });
    var url_redirect = $('#customers_redirect_url').val();
    $("#formCustomer").validate({
        ignore: [],
        rules: {
            fname: {
                required: true,
            },
            lname: {
                required: true,
            },
            phone: {
                required: true,
            },
            email: {
                required: true,
                remote:{
                    type: 'post',
                    url: $('#route_email_exist').val(),
                    data:{
                        'email': function () { return $('#email').val(); },
                        'customers_id': function () { return $('#customers_id').val(); },
                    }
                }
            },
            gender: {
                required: true,
            },
            address: {
                required: true,
            },
            zipcode: {
                required: true,
            },
            username: {
                required: true,
                maxlength: 50,
            },
            password: {
                required: true,
                minlength: 4,
                maxlength: 50,
            },
        },
        messages: { 
            fname: {
                required: 'First Name is Required',
            },
            lname: {
                required: 'Last Name is Required',
            }, 
            phone: {
                required: 'Phone Number is Required',
            },
            email: {
                required: 'Email is Required',
                remote: 'Email Already Exist',
            },
            gender: {
                required: 'Gender is Required',
            }, 
            address: {
                required: 'Address is Required',
            },
            zipcode: {
                required: 'Zipcode is Required',
            },   
            username: {
                required: 'Username is Required',
                maxlength: 'Maximum 50 characters',
            },
            password: {
                required: 'Password is Required',
                minlength: 'Minimum 4 characters',
                maxlength: 'Maximum 50 characters',
            },                    
        },    
        submitHandler: function (form) {
            var url_to_store = $('#url_to_store').val();
            var form = $("#formCustomer");
            var formdata = false;
            if (window.FormData) {
                formdata = new FormData(form[0]);
            }
            $.ajax({
                url: url_to_store,
                data: formdata ? formdata : form.serialize(),
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                complete: function() {
                },
                beforeSend: function(request) {
                },
                success: function (data) {
                    swal("", data.msg, (data.status == 'success' ? 'success' : 'error'));
                    if(data.status == 'success')
                        setTimeout(function(){
                            window.location.href= url_redirect;
                        }, 2000);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("", 'Something went wrong. Please try again.', "Error");
                }
            });
        }
    });
});