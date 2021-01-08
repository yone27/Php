// Funcionalidad para ocultar y mostrar los formularios, ademas del progress bar
$(document).ready(function () {

    $("#next-1").click(function (e) {
        e.preventDefault()
        // limpiar errores
        for (const iterator of $(".form-text.text-danger")) {
            iterator.innerHTML = ''
        }

        if ($('#name').val() == '') {
            $('#nameError').html('* Name is required')
            return false
        } else if ($('#name').val().length < 3) {
            $('#nameError').html('* Name must be of more than 3 characters.')
            return false
        } else if (!isNaN($('#name').val())) {
            $('#nameError').html('* Numbers are not allowed')
            return false
        } else if (!isNaN($('#username').val())) {
            $('#usernameError').html('* Username is required')
            return false
        } else if ($('#username').val().length < 4) {
            $('#usernameError').html('* Username must be of more than 4 characters.')
            return false
        }

        $("#second").show()
        $("#first").hide()
        $("#progressBar").css('width', '60%')
        $("#progressText").html('Step - 2')

    })

    $("#next-2").click(function () {
        for (const iterator of $(".form-text.text-danger")) {
            iterator.innerHTML = ''
        }

        if ($('#email').val() == '') {
            $('#emailError').html('* Email is required')
            return false
        } else if ($('#phone').val() == '') {
            $('#phoneError').html('* Phone is required')
            return false
        } else if (isNaN($('#phone').val() == '')) {
            $('#phoneError').html('* Only numbers are allowed')
            return false
        }

        $("#third").show()
        $("#second").hide()
        $("#progressBar").css('width', '100%')
        $("#progressText").html('Step - 3')
    })

    $("#prev-2").click(function () {
        $("#first").show()
        $("#second").hide()
        $("#progressBar").css('width', '20%')
        $("#progressText").html('Step - 1')
    })

    $("#prev-3").click(function () {
        $("#third").hide()
        $("#second").show()
        $("#progressBar").css('width', '60%')
        $("#progressText").html('Step - 2')
    })

    $("#submit").click(function (e) {
        e.preventDefault()

        for (const iterator of $(".form-text.text-danger")) {
            iterator.innerHTML = ''
        }

        if ($('#pass').val() == '') {
            $('#passError').html('* password is required')
            return false
        } else if ($('#pass').val().length < 6) {
            $('#passError').html('* Name must be of more than 6 characters.')
            return false
        } else if ($('#cpass').val() == '') {
            $('#cPassError').html('* confirm password is required')
            return false
        } else if ($('#cpass').val().length < 6) {
            $('#cPassError').html('* Name must be of more than 6 characters.')
            return false
        } else if ($('#cpass').val() != $('#pass').val()) {
            $('#cPassError').html('* Confirm password did not matched with above password.')
            return false
        }else{
            $.ajax({
                url: 'action.php',
                method: 'post',
                data: $('#form-data').serialize(),
                success: function(res) {
                    $("#result").show()
                    $("#result").html(res)
                    $("#form-data")[0].reset()
                }
            })
        }
    })
})

