

<div class="content_left">

    <div class="blog_post">
        <div class="blog_postcontent">
            <div class="image_frame"><a href="#"><img style="max-height: 650px" src="<?= Url('/post-img/'.$product->image); ?>" alt="" /></a></div>
            <h3><a href="">{{$product->name}}</a></h3>
            <ul class="post_meta_links">
                <li><a href="#" class="date">{!! until_time($product->created_at) !!} </a></li>

                <!--
                <li class="post_by"><i>by:</i> <a href="#">Adam Harrison</a></li>
                <li class="post_categoty"><i>in:</i> <a href="#">Web tutorials</a></li>
                <li class="post_comments"><i>note:</i> <a href="#">18 Comments</a></li>
                -->


            </ul>
            <div class="clearfix"></div>
            <div class="margin_top1"></div>




            <div class="about_author" style="margin-top: 10px;margin-bottom: 20px">

                <img src="images/blog/avatar.jpg" alt="" />

                {!! $product->details !!}                </div><!-- end about author -->



            <p> {!! $product->text !!}</p>
        </div>
    </div><!-- /# end post -->




    <div class="clearfix divider_line9 lessm"></div>

    <div class="clearfix margin_top7"></div>

    <div class="one_half">
        <div class="popular-posts-area">
            <h5 class="caps">آخرین مطالب </h5>
            <div class="clearfix margin_bottom1"></div>

            <ul class="recent_posts_list">
                @foreach($contentsL as $item)
                    <li>
                        <span><a href="<?= Url('/content/show/'.'324-'.$item->id.'-'.str_replace(" ","-",$item->title)); ?>"><img style="width: 50px; height: 50px" src="<?= Url('/post-img/'.$item->image); ?>" alt="" /></a></span>
                        <a href="<?= Url('/content/show/'.'324-'.$item->id.'-'.str_replace(" ","-",$item->title)); ?>">{!! \Illuminate\Support\Str::words($item->title , $words = 5, $end = '...') !!}</a>
                        <i>{!! until_time($item->created_at) !!}</i>
                    </li>
                @endforeach
            </ul>

        </div>
    </div><!-- end recent posts -->


    <div class="one_half last">
        <div class="popular-posts-area">
            <h5 class="caps">مطالب مرتبط </h5>
            <div class="clearfix margin_bottom1"></div>

            <ul class="recent_posts_list">


                @foreach($contentsR as $item)
                    <li>
                        <span><a href="<?= Url('/content/show/'.'324-'.$item->id.'-'.str_replace(" ","-",$item->title)); ?>"><img style="width: 50px; height: 50px"  src="<?= Url('/post-img/'.$item->image); ?>" alt="" /></a></span>
                        <a href="<?= Url('/content/show/'.'324-'.$item->id.'-'.str_replace(" ","-",$item->title)); ?>">{!! \Illuminate\Support\Str::words($item->title , $words = 5, $end = '...') !!}</a>
                        <i>{!! until_time($item->created_at) !!}</i>
                    </li>
                @endforeach

            </ul>

        </div>
    </div><!-- end popular posts -->

    <div class="clearfix divider_line9 lessm"></div>

    <h5>نظرات</h5>
    <div class="mar_top_bottom_lines_small3"></div>
    <div class="comment_wrap">
        <div class="gravatar"><img src="images/blog/people_img.jpg" alt="" /></div>
        <div class="comment_content">
            <div class="comment_meta">

                <div class="comment_author" >محمد - <i> 12/12/123</i></div>

            </div>
            <div class="comment_text">
                <p>تست</p>
                <a href="#">پاسخ</a>
            </div>
        </div>
    </div><!-- end section -->

    <div class="comment_wrap chaild">
        <div class="gravatar"><img src="images/blog/people_img.jpg" alt="" /></div>
        <div class="comment_content">
            <div class="comment_meta">

                <div class="comment_author">رضا - <i>12/15</i></div>

            </div>
            <div class="comment_text">
                <p>تست 21312</p>
            </div>
        </div>
    </div><!-- end section -->




    <div class="comment_form">

        <h5>ارسال نظر  </h5>

        <form action="#" method="post">
            <input type="text" name="yourname" id="name" class="comment_input_bg" />
            <label for="name">نام*</label>

            <input type="text" name="email" id="mail" class="comment_input_bg" />
            <label for="mail">ایمیل*</label>


            <textarea name="comment" class="comment_textarea_bg" rows="20" cols="7" ></textarea>
            <div class="clearfix"></div>
            <input style="float: left" name="send" type="submit" value="ارسال " class="comment_submit"/>
            <p></p>


        </form>

    </div><!-- end comment form -->

    <div class="clearfix mar_top2"></div>

</div><!-- end content left side -->


<!-- right sidebar starts -->
<div class="right_sidebar">

    <div class="sidebar_widget">

        <div class="sidebar_title"><h4 class="caps"  style="float: right;text-align: right">مطالب پربازدید </h4></div>


    </div><!-- end section -->

    <div class="sidebar_widget">

        <div id="tabs">


            <div class="tab_container">
                <div id="tab1" class="tab_content">

                    <ul class="recent_posts_list">


                        @foreach($contentsV as $item)
                            <li>
                                        <span><a href="<?= Url('/content/show/'.'324-'.$item->id.'-'.str_replace(" ","-",$item->title)); ?>">
                                                <img style="width: 50px; height: 50px"  src="<?= Url('/post-img/'.$item->image); ?>" alt="" /></a></span>
                                <a href="<?= Url('/content/show/'.'324-'.$item->id.'-'.str_replace(" ","-",$item->title)); ?>">{!! \Illuminate\Support\Str::words($item->title , $words = 5, $end = '...') !!}</a>
                                <i>{!! until_time($item->created_at) !!}</i>
                            </li>
                        @endforeach

                    </ul>

                </div><!-- end popular posts -->



                <div class="sidebar_widget" style="margin-top: 30px">

                    <div class="sidebar_title"><h4 class="caps"  style="float: right;text-align: right">دسته بندی ها  </h4></div>

                </div><!-- end section -->
                <div id="tab3" class="tab_content">
                    <ul class="tags">


                        @foreach($contentCats as $cat)
                            <li><a href="<?= Url('/content/category/'.'324-'.$cat->id.'-'.str_replace(" ","-",$cat->title)); ?>"><b>{{$cat->title}}</b></a></li>
                            @foreach($cat->subs($cat->id) as $sub)
                                <li><a style="color: inherit" href="<?= Url('/content/category/'.'324-'.$sub->id.'-'.str_replace(" ","-",$sub->title)); ?>">{{$sub->title}}</a></li>

                            @endforeach
                        @endforeach

                    </ul>
                </div>

            </div>

        </div>

    </div><!-- end section -->

    <div class="clearfix margin_top4"></div>



    <div class="sidebar_widget">

        <div class="sidebar_title"><h4 style="float: right">آرشیو </h4></div>

        <ul class="list2">
            <li><a href="#"><i class="fa fa-caret-right"></i>  1395</a></li>

        </ul>

    </div><!-- end section -->


</div><!-- end right sidebar -->
