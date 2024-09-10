$(function ($) {
    $('.buy_button').on('click', function (){
        let product = $(this).attr('product')
        $.ajax({
            type: "POST",
            url: "?module=put_product",
            data: {
                id : product
            }

        }).done(function (msg){
            console.log(msg);
        }).fail(function (msg){
            alert('ok')
        });
    });
});

$(function ($) {
    $('.delete_button').on('click', function (){
        let userId = $(this).attr('userId')
        let goodId = $(this).attr('goodId')
        let amount = $(this).attr('amount')
        $.ajax({
            type: "POST",
            url: "?module=delete_from_order",
            data: {
                userId : userId,
                goodId : goodId,
                amount : amount
            }

        }).done(function (msg){
            console.log(msg);
        }).fail(function (msg){
            alert('ok')
        });
    });
});

$(function ($) {
    $('.show_more_button').on('click', function (){
        let counter = $(this).attr('counter')
        $.ajax({
            type: "POST",
            url: "?module=catalogL8",
            data: {
                counter : counter
            }

        }).done(function (msg){
            console.log(msg);
        }).fail(function (msg){
            alert('ok')
        });
    });
});