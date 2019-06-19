@if($category->parent)
    @include('shopmodule::category.recursive-topbar',['category' => $product->category->parent])
@endif
<li itemscope="" itemtype="">
    <a href="{{ $category->link() }}" itemprop="url">
        <span itemprop="title">{{ $category->name }}</span>
    </a>
</li>