<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>


<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= Url('/'); ?></loc>
        <priority>1</priority>
    </url>

    @foreach($products as $product)
        <url>
            <loc>{{ route('shop.show',['id' => '321'.'-'.$product->id.'-'.str_replace(" ","-",$product->name)]) }}</loc>
            <lastmod>{{$product->updated_at}}</lastmod>
            <priority>1</priority>
        </url>
    @endforeach

    @foreach($tests as $test)
        <url>
            <loc>{{ route('front.test',['id' => '321-'.$test->id.'-'.str_replace(" ","-",$test->title)]) }}</loc>
            <lastmod>{{$test->updated_at}}</lastmod>
            <priority>0.9</priority>
        </url>
    @endforeach

    @foreach($contents as $content)
        <url>
            <loc><?= Url('/content/show/'.'324-'.$content->id.'-'.str_replace(" ","-",$content->title)); ?></loc>
            <lastmod>{{$content->updated_at}}</lastmod>
            <priority>0.9</priority>
        </url>
    @endforeach


</urlset>