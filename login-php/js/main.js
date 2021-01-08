$(document).ready(function(e){
//    let $uploadImage =document.getElementById("uploadProfile")
    let $uploadImage = $("#register .upload-profile-image input[type='file']")
    
    $uploadImage.change(function() {
        readURL(this)
    })
    $("#reg-form").submit(function(e){
        let $password = $("#password")
        let $confirmPassword = $("#confirmPassword")
        let $confirm_error = $("#confirm_error")

        if($password.val() === $confirmPassword.val()) {
            return true
        }else{
            $confirm_error.text('Password not match')
            e.preventDefault()
        }
    })
})

function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader()
        reader.onload = function(e) {
            $("#register .upload-profile-image .img").attr('src', e.target.result)
            $("#register .upload-profile-image .camera-icon").css({display: "none"})
        }
        reader.readAsDataURL(input.files[0])
    }
}