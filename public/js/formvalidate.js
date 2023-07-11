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