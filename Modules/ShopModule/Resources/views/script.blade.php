<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    var count=0;
    function refresh(data) {
        $('#Cart-item').html('');
        count=0;
        $.each(data['item'],function (i,item) {
            $('#Cart-item').append('<tr>'+
                '<td class="text-center"><a href="'+item['name']['link']+'"><img class="img-thumbnail-bascket" title="'+item['name']['name']+'" alt="'+item['name']['name']+'" src="'+item['name']['pic']+'"></a></td>'+
                '<td class="text-left"><a href="'+item['name']['link']+'">'+item['name']['name']+'</a></td>'+
                '<td class="text-right">x '+item['qty']+'</td>'+
                '<td class="text-right">'+
                '<ul><li >'+item['subtotal']+'تومان</li>'+
                '<li >تخفیف:'+item['name']['discount']*item['qty']+'</li><li ></li> </ul> </td>'+
                '<td class="text-center"><button class="btn btn-danger btn-xs remove cart-delete" id="'+item['rowId']+'" title="حذف" onClick="" type="button"><i class="fa fa-times"></i></button></td> </tr>')
            count+=item['qty'];
        })

        $('#subtotal').html(data['subtotal']+' تومان');
        $('#discount').html(data['discount']+' تومان');
        $('#tax').html(data['tax']+' تومان');
        $('#total').html(data['total']+' تومان');
        $('#cart-total').html(count+' آیتم - '+data['total']+' تومان');
    }
    $(document).ready(function () {
        console.log('first');
        $.ajax({
            type: "GET",
            url: "{{route('cart.get')}}",
            dataType : 'json',
            success: function(data)
            {
//                var response=$.parseJSON(data);
                if ("message" in data)
                    toastr.warning(data["message"]);
                refresh(data);

            },
            error : function(data)
            {
                toastr.warning("ارتباط به اینترنت خود را چک کنید");
                console.log('connection error');
            }
        });
    });


    $(document).on('click', '.cart-delete', function (e) {

        console.log(this.id);
        $.ajax({
            type: "GET",
            url: "{{route('cart.delete')}}",
            data:{
                'rowid':this.id
            },
            dataType : 'json',
            success: function(data)
            {
//                var response=$.parseJSON(data);
                if ("message" in data)
                    toastr.warning(data["message"]);
                else
                    toastr.success("محصول با موفقیت از سبد خرید شما حذف شد");
                refresh(data);

            },
            error : function(data)
            {
                toastr.warning("ارتباط به اینترنت خود را چک کنید");
                console.log('connection error');
            }
        });
    });
    $(document).on('click', '.cart-add', function (e) {

        console.log(this.id);
        $.ajax({
            type: "GET",
            data: {
                'id':this.id,
                'qty':this.qty
            },
            url: "{{route('cart.add')}}",
            dataType : 'json',
            success: function(data)
            {
                if ("message" in data)
                    toastr.warning(data["message"]);
                else
                    toastr.success("محصول با موفقیت به سبد خرید شما اضافه شد");
                refresh(data);

            },
            error : function(data)
            {
                toastr.warning("ارتباط به اینترنت خود را چک کنید");
                console.log('connection error');

            }
        });
    });
</script>