<ul class="nav navbar-nav nav_1">
@foreach ($categories as $category)

    <li><a href="{{ url('/products?category='.$category->id) }}">{{ $category->title }}</a></li>
                    
@endforeach
</ul>

