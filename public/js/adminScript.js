$(function (){
    $('.del').on('click',function () {
        let selected = [];
        let _token  = $('#csrf').val();
        $(".sel:checked").each(function() {
            selected.push($(this).val());
        });

        if (selected.length > 0){
            $.ajax({
                url: '/admin/delete',
                type: 'post',
                data: {_token : _token ,id: selected},
                cache : false,
                success:function (data){
                    location.reload();
                }
            })
        }
    })

    $('.delete').on('click',function () {
        let selected = [];
        let _token  = $('#csrf').val();
        $(".sel:checked").each(function() {
            selected.push($(this).val());
        });

        if (selected.length > 0){
            $.ajax({
                url: '/admin/country/delete',
                type: 'post',
                data: {_token : _token ,id: selected},
                cache : false,
                success:function (data){
                    location.reload();
                }
            })
        }
    })

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
let en = document.getElementById('e')
let ru = document.getElementById('r')
let arm = document.getElementById('h')
en.addEventListener('click',rem)
ru.addEventListener('click',rem1)
arm.addEventListener('click',rem2)
function rem() {
    ru.classList.remove('active')
    en.classList.add('active')
    arm.classList.remove('active')
    document.querySelector('.ru').style.display = 'none'
    document.querySelector('.arm').style.display = 'none'
    document.querySelector('.en').style.display = 'block'
}
function rem1() {
    ru.classList.add('active')
    en.classList.remove('active')
    arm.classList.remove('active')
    document.querySelector('.ru').style.display = 'block'
    document.querySelector('.arm').style.display = 'none'
    document.querySelector('.en').style.display = 'none'
}
function rem2() {
    ru.classList.remove('active')
    en.classList.remove('active')
    arm.classList.add('active')
    document.querySelector('.ru').style.display = 'none'
    document.querySelector('.arm').style.display = 'block'
    document.querySelector('.en').style.display = 'none'
}
