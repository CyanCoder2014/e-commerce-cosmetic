@extends('layouts.layout')
@section('title')
    {!! \Illuminate\Support\Str::words($product->name , $words = 6, $end = '...') !!}
@endsection
@section('header')

@endsection

@section('script')

@endsection

@section('content')

    {{--<div class="view">

        <img src="pic/Wide-promo-compact-powder.png" class="w-100 heightScreen" alt="placeholder">
        <div class="mask waves-effect waves-light">
            <h1 class="white-text display-3 font-weight-bold titlePos">strong overlay</h1>
        </div>
    </div>
    <div class="openCarousel pt-3 pr-3"><i class="fas fa-search fa-3x"></i></div>
    <!--/.Carousel Wrapper-->
    <div class="carouselPlace animated fadeInDown">
        <div class="closeCarousel mt-3 mr-3 mb-5"><i class="fas fa-times fa-3x text-white fa-3x"></i></div>
        <div class="w-75 mx-auto mt-5">
            <img src="pic/Wide-promo-compact-powder.png" class="w-100" alt="placeholder">
        </div>
    </div>--}}
    <div class="bg-second-index mt-menu"
         style="background-image: url('/pic/Graeme MacDonald - productsLifstyle Aug 16 2018 16-1.jpg');clip-path: none">
        <div class="cover_bg-second"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div>
                        <ul class="nav nav-tabs justify-content-end py-5" id="productTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home"
                                   aria-selected="true">first</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile"
                                   aria-selected="false">second</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                   aria-controls="contact"
                                   aria-selected="false">third</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active animated slideInLeft" id="home" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title2</div>
                                    <div class="text-gray">something2</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title2</div>
                                    <div class="text-gray">something2</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title2</div>
                                    <div class="text-gray">something2</div>
                                </div>
                            </div>
                            <div class="tab-pane animated slideInLeft" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title3</div>
                                    <div class="text-gray">something3</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title3</div>
                                    <div class="text-gray">something3</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title3</div>
                                    <div class="text-gray">something3</div>
                                </div>
                            </div>
                            <div class="tab-pane animated slideInLeft" id="contact" role="tabpanel"
                                 aria-labelledby="contact-tab">
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title4</div>
                                    <div class="text-gray">something4</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title4</div>
                                    <div class="text-gray">something4</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title4</div>
                                    <div class="text-gray">something4</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-white">
                    <h1 class="display-2">Light mask</h1>
                    <p>Inspiring. Surprising. Different. The architects Ando, Kuma, Mayne and Zumthor have created
                        astonishing rooms.</p>
                    <a href="#" class="text-white border-bottom">more detail</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-black p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white">
                    <h1 class="display-2">Light mask</h1>
                    <p>Inspiring. Surprising. Different. The architects Ando, Kuma, Mayne and Zumthor have created
                        astonishing rooms.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur aut beatae culpa
                        deserunt dolorem excepturi harum iusto magnam, omnis pariatur quaerat quia quis quo rem
                        veritatis voluptatum. Corporis, eos?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur, dolorem,
                        doloremque dolorum eligendi eveniet, molestias mollitia nulla odit pariatur quas quasi quibusdam
                        quos repellendus sunt totam voluptates! Consectetur, quam!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, doloremque dolores doloribus
                        est exercitationem fuga fugiat illum iste iure libero molestias non placeat possimus quaerat
                        quis recusandae reiciendis tempora veritatis.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis culpa deleniti deserunt
                        dolorem earum enim fugit, harum impedit magni, molestiae molestias nam nisi non possimus ratione
                        similique sit tempora vero.
                    </p>
                    <a href="#" class="text-white border-bottom">more detail</a>
                </div>
                <div class="col-md-6">
                    <img src="pic/WhatsApp%20Image%202.jpeg" class="w-100" alt="">
                </div>
            </div>
            <div class="row row-form">
                <div class="col">
                    <div class="p-3">
                        <select class="browser-default custom-select custom-select-lg mb-3 dir-r">
                            <option selected>select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 py-3 border-right">
                    <div class="font-small text-center text-white">DEPARTURE</div>
                    <input class="persianDate w-100" placeholder="1398/3/6">
                    <div class="text-center"><i class="fas fa-chevron-down text-gray fa-2x"></i></div>
                </div>
                <div class="col-md-6 py-3 ">
                    <div class="font-small text-center text-white">DEPARTURE</div>
                    <input class="persianDate w-100" placeholder="1398/3/6">
                    <div class="text-center"><i class="fas fa-chevron-down text-gray fa-2x"></i></div>
                </div>
                <div class="col-md-6 py-3 border-top">
                    <div class="font-small text-center text-white">DEPARTURE</div>
                    <select class="browser-default custom-select mySelect custom-select-lg">
                        <option selected>02</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <div class="text-center"><i class="fas fa-chevron-down text-gray fa-2x"></i></div>
                </div>
                <div class="col-md-6 py-3 border-top border-left">
                    <div class="font-small text-center text-white">DEPARTURE</div>
                    <select class="browser-default custom-select mySelect custom-select-lg">
                        <option selected>02</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <div class="text-center"><i class="fas fa-chevron-down text-gray fa-2x"></i></div>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-white btn-block text-black mt-4">Primary</button>
                </div>
            </div>
        </div>
    </div>
@endsection

