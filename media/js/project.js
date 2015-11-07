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
    $("#analisis").change(function(){
            var analisis_id = $('#analisis').val();

            $.ajax({
                type: "POST",
                url: "/ajax/get_list_statuses",
                dataType: "json",
                data: {
                    analisis_id: analisis_id
                },
                success: function (result) {
                    $("#st").html(result);
                }
            });
        }
    );
});