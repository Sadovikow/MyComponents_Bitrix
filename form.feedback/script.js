
function sendFeedbackForm_rarus(form_id)
{
     setTimeout(function(){
        if(!$('input').is('.error')) {
            $.ajax({
                url:     '/local/components/rarus/form.feedback/ajax.php', // URL отправки запроса
                type:     "POST",
                dataType: "html",
                data: $('#'+form_id).serialize(), // Возвращаем строчку URL формата из всех заполненных данных формы
                success: function(response) { // Если Данные отправлены успешно
                    var result = $.parseJSON(response);
                    if(result == 1){ // Если всё чётко, то выполняем действия, которые показывают, что данные отправлены :)
                         $('#'+form_id+' input[type=submit]').prop('disabled', true);
                         $('#'+form_id+' input[type=submit]').val('Отзыв отправлен!');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){ // Если ошибка, то выкладываем печаль в консоль
                    console.log('Error: '+ errorThrown);
                }
             });
        }
    }, 100);
    return false; // Отменяем перезагрузку страницы
}

function validateForm_rarus(form_id)
{
    $('#'+form_id).validate({
         rules:{
              fio:{
                  required: true,
              },
              email:{
                  required: true,
                  email: true,
              },
              company:{
                  required: true,
              },
              phone:{
                  required: true,
              },
              text:{
                  required: true,
              },
         },
         messages:{
              fio:{
                  required: "",
              },
              email:{
                  required: "",
                  email: "",
              },
              company:{
                  required: "",
              },
              phone:{
                  required: "",
              },
              text:{
                  required: "",
              },
         }
      });
}
