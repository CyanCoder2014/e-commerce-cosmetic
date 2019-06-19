<div class="dropdown-menu">
    <ul>
        @foreach($categories as $category)
        <li><a href="{{ $category->link() }}">{{ $category->name }}
                @if(count($category->childs()) > 0 )
                    <span>&rsaquo;</span>
                @endif
            </a>
            @if(count($category->childs()) > 0 )
                @include('category.recursive_menu',['categories' => $category->childs()])
            @endif
        </li>
        @endforeach
    </ul>
</div>