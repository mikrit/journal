function change_status(id){
    $.ajax({
        type: "POST",
        url: "/ajax/stat",
        data: {id:id},
        success: function(data){
            document.getElementById(id).innerHTML = data;
        },
        error: function(data){
            alert("Ошибка смены статуса");
        }
    });
}

$(document).ready(function()
{
    $("#login_ajax").click(function()// при нажатии кнопки "Вход"
    {
        $("#error").hide();
        $("#error").empty();

        var l = Ladda.create(this).start();

        var login = $('#login').val();
        var password = $('#password').val();
        var remember = $('input:checkbox:checked').val();

        $.ajax({
            type: "POST",
            url: "auth/login",
            dataType: "json",
            data: {
                login: login,
                password: password,
                remember: remember
            },
            success: function (result) {
                if (result.code == 'error') // если вернулся статус с ошибкой
                {
                    var error = result.error;
                    $("#error").append(error).show(); // показываем блок с сообщением об ошибке
                    l.stop();
                }
                if (result.code == 'success') // если вернулся статус без ошибки
                {
                    window.location.href = 'main';
                }
            }
        });
    });
});