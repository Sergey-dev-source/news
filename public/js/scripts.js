$(function (){
    $('.js_language_selector').on('change',function () {
        let lang = $(this).val();
        let _token  = $('#csrf1').val();
        $.ajax({
            url: '/locale',
            type: 'get',
            data: {_token : _token ,lang: lang},
            cache : false,
            success:function (data){
                location.reload();
                // console.log(data)
            }
        })
    })
})
