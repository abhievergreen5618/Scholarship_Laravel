//validation

jQuery('#frm').validate({
    rules:{
        name:"required",
        fathername:"required",
        mothername:"required",
        examcentre:"required",
        caddress:"required",
        mobileno:{
            required:true,
            maxlength:10
        },
        paddress:"required",
        email:{
            required:true,
            email:true
        },
        hsmarksheetmatric:"required",
        hsmarksheet:"required",
        applyingfor:"required",
        category:"required"
    },
    messages:{
        examcentre:"Select an option",
        email:{
            required:"Please enter email ID",
            email:"Please enter valid email"
        }
    }
})

jQuery('#docform').validate({
    rules:{
        class_passed:"required",
        class_board:"required",
        class_passing_year:"required",
        class_marks:"required",
        class_max_marks:"required",
        class_percentage:"required",
        class_rollno:"required",
        
        grad_passed:"required",
        grad_board:"required",
        grad_passing_year:"required",
        grad_marks:"required",
        grad_max_marks:"required",
        grad_percentage:"required",
        grad_rollno:"required",
        
        post_grad_passed:"required",
        post_grad_board:"required",
        post_grad_passing_year:"required",
        post_grad_marks:"required",
        post_grad_max_marks:"required",
        post_grad_percentage:"required",
        post_grad_rollno:"required",

        profile_photo:"required",
        sign_photo:"required"
    },
    messages:{
    }
})




