jQuery(document).ready(function () {

    var elems = document.querySelectorAll('.simpleform.simpleform-reload');

    for (var i = 0; i < elems.length; i++) {
        elems[i].addEventListener("submit", formSubmit, true);
    }
    function formSubmit()
    {
        component = this.querySelector("[name=component]").value;
        component_path = this.querySelector("[name=component_path]").value;
        iblock_id = this.querySelector("[name=IBLOCK_ID]").value;
        jQuery(".preload-ajax").addClass("preload-active");
        var obj = jQuery(this);
        var formData = new FormData(obj.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
        formData.append('signedParamsString', signedParamsStringFS[iblock_id])
        jQuery.ajax({
            type: "POST",
            url: component_path+'/ajax.php?submit=save',
            data: formData,
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            timeout: 30000,
            dataType: "html",
            error: function(request,error) {
                if (error == "timeout") {
                    jQuery(".preload-ajax").removeClass("preload-active");
                    alert('timeout');
                }
                else {
                    jQuery(".preload-ajax").removeClass("preload-active");
                    alert('Error! Please try again!');
                }
            },
            success: function(data) {
                let formWrapper = obj.closest('.simpleform-wrapper');
                if (formWrapper.length) {
                    formWrapper.replaceWith(data);
                } else {
                    obj.parent().replaceWith(data);
                }
                jQuery(".preload-ajax").removeClass("preload-active");
            }
        });
        event.stopPropagation();
        event.preventDefault();
        return false;

    }

    jQuery('body').on('click','.simpleform.simpleform-ajax input[type=submit]',function(){
        component = jQuery(this).closest("form").find("[name=component]").val();
        iblock_id = jQuery(this).closest("form").find("[name=IBLOCK_ID]").val();
        console.log(jQuery(this).closest("form").serialize());
        //jQuery('body').on('click','.flatsave',function(){
        jQuery(".preload-ajax").addClass("preload-active");

        obj = jQuery(this).closest("form").find(".errorForm");
        var query = {
            c: component,
            action: 'submit',
            mode: 'class'
        };

        var data = {
            SITE_ID: 's1',
            //sessid: BX.message('bitrix_sessid')
        };
        jQuery.ajax({
            type: "POST",
            url: '/bitrix/services/main/ajax.php?' + $.param(query, true),
            data: jQuery(this).closest("form").serialize()+"&signedParamsString="+signedParamsStringFS[iblock_id],
            /*cache: false,
                contentType: false,
                processData: false,*/
            timeout: 30000,
            dataType: "json",
            error: function(request,error) {
                if (error == "timeout") {
                    jQuery(".preload-ajax").removeClass("preload-active");
                    alert('timeout');
                }
                else {
                    jQuery(".preload-ajax").removeClass("preload-active");
                    alert('Error! Please try again!');
                }
            },
            success: function(data) {
                console.log(data.data);
                if (data.data.error)
                {
                    text_error = '';

                    $(".input_wrap").each(function () {
                        $(this).removeClass("error");
                    });

                    for (k in data.data.error) {
                        console.log(k);
                        $("input[name='"+k+"']").closest(".input_wrap").addClass("error")
                        console.log(data.data.error[k]);
                        text_error += data.data.error[k]+'<br>';
                    }
                  /*  obj.html('<p class="error_add_form">'+(( data.data.error instanceof Array ) ? data.data.error.join ( '<br>' ) : text_error)+'</p>'); */
                    jQuery(".preload-ajax").removeClass("preload-active");
                }
                else
                {
                    jQuery(".preload-ajax").removeClass("preload-active");
                    obj.html('');
                    //jQuery(".billResult").html(data.data.bill);
                    obj.html('<p class="success_add_form">Заявка №'+data.data.result+' добавлена</p>');

                }
            }
        });
        return false;
    });
})