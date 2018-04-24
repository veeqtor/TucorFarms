<div class="side-nav">
    <ul class="side-nav-links">
        <li class="{{url()->route('dashboard') == url()->current() ? 'active' : ''}}">
            <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
        </li>
        <li class="{{url()->route('dashboard.category') == url()->current() ? 'active' : ''}}">
            <a href="{{route('dashboard.category')}}"><i class="fa fa-cog"></i>&nbsp;&nbsp;Category</a>
        </li>
        <li class="{{url()->route('dashboard.products') == url()->current() ? 'active' : ''}}">
            <a href="{{route('dashboard.products')}}"><i class="fa fa-product-hunt"></i>&nbsp;&nbsp;Products</a>
        </li>
        <li class="{{url()->route('dashboard.order') == url()->current() ? 'active' : ''}}">
            <a href="{{route('dashboard.order')}}"><i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;Orders</a>
        </li>
    </ul>
</div>