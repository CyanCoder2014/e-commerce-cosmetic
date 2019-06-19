<ul style="display: none;">
    @foreach($categories as $category)
        <?php $child =$category->childs() ?>
    <li class="cutom-parent-li">
        <a href="{{ route('shop.category',['id' => '234-'.$category->id.'-'.str_replace(' ','-',$category->name[App::getlocale()])]) }}" class="cutom-parent @if($cat->id == $category->id) active @endif">{{ $category->name[App::getlocale()] }}
            @if(count($child) > 0 ) <span class="dcjq-icon"></span> @endif
        </a> @if(count($child) > 0 ) <span class="down"></span> @endif
        @if(count($child) > 0 )
            @include('shopmodule::category.recursive-menu',['categories' => $child])
        @endif
    </li>
    @endforeach
</ul>