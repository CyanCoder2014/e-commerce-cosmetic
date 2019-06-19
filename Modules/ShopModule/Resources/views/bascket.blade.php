
<style>
    .dropdown-menu-shop {
        border-color: #01a161;
        padding: 8px;
        margin: 0;
        z-index: 1011;
        background: #FFF;
        border: 3px solid #3e7cb4;
        border-width: 3px 0px 0px 0px;
        width: 420px;
        border-radius: 0px;
        font-size: 14px;
        float: left;
        text-align: right;
        direction: rtl;
    }
    #cart .dropdown-menu > li > .table > tbody > tr > td {
        border-bottom: 1px solid #ddd;
        border-top: none 0px;
    }
    .img-thumbnail {
        border-radius: 0px;
        padding: 4px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        display: inline-block;
        max-width: 100%;
        height: auto;
    }
    .remove{
        border-radius: 100%;
        padding: 0px 4px;
        line-height: normal;
    }
    .Cart-item > tr{
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }
    .text-right {
        text-align: right;
    }
</style>

<div class="dropdown">
    {{--<button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..." class="heading dropdown-toggle"> <i class="fa fa-shopping-cart fa-lg pull-left flip"></i> <span id="cart-total">سبد خرید</span></button>--}}
    <a href=""
       class="dropdown-toggle" style="margin-top: 4px"> <i class="fa fa-shopping-cart fa-lg"></i>  </a>
    <ul class="dropdown-menu dropdown-menu-shop multilevel" role="menu">
        <li>
            <table class="table">
                <tbody id="Cart-item">
                <?php
                $discount=0;
                ?>
                @foreach(Cart::content() as $item)
                    <tr>
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="{{$item->name['name']}}" alt="{{$item->name['name']}}" src="{{asset($item->name['pic'])}}"></a></td>
                        <td class="text-left"><a href="product.html">{{$item->name['name']}}</a></td>
                        <td class="text-right">x {{$item->qty}}</td>
                        <td class="text-right">
                            <ul>
                                <li >{{$item->subtotal}} تومان</li>
                                <li >تخفیف:{{$item->name['discount']}}</li>
                                <li ></li>
                            </ul>
                        </td>
                        <td class="text-center"><button class="btn btn-danger btn-xs remove cart-delete" title="حذف" id="{{$item->rowId}}" type="button"><i class="fa fa-times"></i></button></td>
                    </tr>
                    <?php
                    $discount+=$item->name['discount'];
                    ?>
                @endforeach
                </tbody>
            </table>
        </li>
        <li>
            <div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="text-right"><strong>جمع کل</strong></td>
                        <td id="subtotal" class="text-right">{{substr(Cart::subtotal(), 0, -3)}} تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>تخفیف</strong></td>
                        <td id="discount" class="text-right">{!! number_format($discount) !!} تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>مالیات</strong></td>
                        <td id="tax" class="text-right">{{substr(Cart::tax(), 0, -3)}} تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>قابل پرداخت</strong></td>
                        <td id="total" class="text-right">{{substr(Cart::total(), 0, -3)}} تومان</td>
                    </tr>
                    </tbody>
                </table>
                <p class="checkout"><a href="{{route('shop.basket')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;<a href="{{route('shop.checkout')}}" class="btn btn-primary"><i class="fa fa-share"></i> تسویه حساب</a></p>
            </div>
        </li>
    </ul>
</div>


