function validateForm(){
    var form_ok = true;

        if($('#naziv').val().length < 6){
            form_ok = false;
            $('#naziv').parent('div').parent('.form-group').addClass('has-error');
        }else{
            $('#naziv').parent('div').parent('.form-group').removeClass('has-error');
        }
    return form_ok;
}
function init(){
    /*changeAccountType();
    changeCompanyOrigin()*/
}
$(init);
