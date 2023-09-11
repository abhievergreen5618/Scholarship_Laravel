//validation

jQuery('#frm').validate({
    rules:{
        name:"required",
        fathername:"required",
        mothername:"required",
        examcentre:"required",
        districtDropdown:"required",
        caddress:"required",
        mobileno:{
            required:true,
            maxlength:10,
            minlength:10
        },
        paddress:"required",
        email:{
            required:true,
            email:true
        },
        applyingfor:"required",
        subjects:"required",
        category:"required"
    },
    messages:{
        examcentre:"Select an option",
        districtDropdown:"Select an option",
        email:{
            required:"Please enter email ID",
            email:"Please enter valid email"
        },
        mobileno:{
            maxlength:"Please enter valid mobile number.",
            minlength:"Please enter valid mobile number."
        }
    },
    submitHandler : function(form,e) {
        e.preventDefault();
        // Create a new FormData object
        var formData = new FormData($(form)[0]);
        if($("#physicallychallengedyes").prop("checked"))
        {
            formData.delete('physicallychallengedproof');
            // Get the image file from the input field
            var imageFile = $('#physicallychallengedproof')[0].files[0];
            if (imageFile) {
            formData.append('physicallychallengedproof', imageFile);
            }
        }
        else
        {
            // Remove the physicallychallengedproof field from the FormData object
            formData.delete('physicallychallengedproof');
        }
        toastr.options = {
            closeButton: true,
            progressBar: true,
            timeOut: 5000,
            extendedTimeOut: 2000,
            positionClass: "toast-top-right",
            preventDuplicates: true
        };


        $.ajax({
            type: 'POST',
            url: $(form).attr("action"),
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                if(result.hasOwnProperty("message"))
                {
                    $("#tab2").attr('disabled',false);
                    $("#tab2").trigger('click');
                    $('[for="tab2"]').find("[data-icon='lock']").remove();
                    $("#education_details_step").removeClass("btn-secondary");
                    $("#education_details_step").addClass("btn-success");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    toastr.success(result.message);
                }
            },
            error : function(xhr, status, error) {
                if(xhr.status == 422)
                {
                    $.each(xhr.responseJSON.error,(index,value) => {
                        $("#"+index+"-error").remove();
                        $("#"+index).parent().append('<label id="'+index+'-error" class="error" for="name">'+value+'</label>');
                        $("#"+index).focus();
                        toastr.error(xhr.responseJSON.message);
                    });
                }
                else{
                    toastr.error("!OOPs Something went wrong");
                }

            }

        });
    }
})



jQuery('#docform').validate({
    rules:{
        classes:"required",
        class_board:"required",
        class_passing_year:"required",
        class_marks:"required",
        class_max_marks:"required",
        class_percentage:"required",
        class_rollno:"required",



        profile_photo:"required",
        sign_photo:"required"
    },
    submitHandler : function(form,e) {
        e.preventDefault();
        // Create a new FormData object
        var formData = new FormData($(form)[0]);


        toastr.options = {
            closeButton: true,
            progressBar: true,
            timeOut: 5000,
            extendedTimeOut: 2000,
            positionClass: "toast-top-right",
            preventDuplicates: true
        };


        $.ajax({
            type: 'POST',
            url: $(form).attr("action"),
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                if(result.hasOwnProperty("message"))
                {
                    $("#tab3").attr('disabled',false);
                    $("#tab3").trigger('click');
                    $('[for="tab3"]').find("[data-icon='lock']").remove();
                    $("#bank_details_step").removeClass("btn-secondary");
                    $("#bank_details_step").addClass("btn-success");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    toastr.success(result.message);
                }            },
            error : function(xhr, status, error) {
                if(xhr.status == 422)
                {
                    $.each(xhr.responseJSON.error,(index,value) => {
                        $("#"+index+"-error").remove();
                        $("#"+index).parent().append('<label id="'+index+'-error" class="error" for="name">'+value+'</label>');
                        $("#"+index).focus();

                        toastr.error(xhr.responseJSON.message);
                    });
                }
                else{
                    toastr.error("!OOPs Something went wrong");
                }
            }
        });
    }
})


jQuery('#bankform').validate({
    rules:{
        accountno:"required",
        cnfrmaccountno:"required",
        holdername:"required",
        ifsccode:"required",
        passbook_photo:"required",
    },
    submitHandler : function(form,e) {
        e.preventDefault();
        // Create a new FormData object
        var formData = new FormData($(form)[0]);


        toastr.options = {
            closeButton: true,
            progressBar: true,
            timeOut: 5000,
            extendedTimeOut: 2000,
            positionClass: "toast-top-right",
            preventDuplicates: true
        };


        $.ajax({
            type: 'POST',
            url: $(form).attr("action"),
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                if(result.hasOwnProperty("message"))
                {
                    $("#tab4").attr('disabled',false);
                    $("#tab4").trigger('click');
                    $('[for="tab4"]').find("[data-icon='lock']").remove();
                    $("#application_summary_step").removeClass("btn-secondary");
                    $("#application_summary_step").addClass("btn-success");
                    debugger;
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    

                    toastr.success(result.message);
                }
            },
            error : function(xhr, status, error) {
                if(xhr.status == 422)
                {
                    $.each(xhr.responseJSON.error,(index,value) => {
                        $("#"+index+"-error").remove();
                        $("#"+index).parent().append('<label id="'+index+'-error" class="error" for="name">'+value+'</label>');
                        $("#"+index).focus();

                        toastr.error(xhr.responseJSON.message);
                    });
                }
                else{
                    toastr.error("!OOPs Something went wrong");
                }
            }
        });
    }
})




$(document).ready(function () {
   $("input[name='physicallychallenged']").change(function (e) {
        if($(this).attr("value") == "yes")
        {
            $("#proofofdocuments").show();
            $("#fee").show();
        }
        else
        {
            $("#proofofdocuments").hide();
            $("#fee").hide();
        }
    });
});




