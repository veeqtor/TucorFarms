<ul class="nav nav-tabs nav-justified checkout shadow">
    <li class="{{url()->route('checkout.billing', $user->id) == url()->current() ? 'active' : ''}}"><a
                href="{{route('checkout.billing', $user->id)}}"><i
                    class="fa fa-map-marker"></i><br>Delivery details</a>
    </li>
    <li class="{{url()->route('checkout.delivery', $user->id) == url()->current() ? 'active' : ''}}"><a
                href="{{route('checkout.delivery', $user->id)}}"><i
                    class="fa fa-truck"></i><br>Delivery type</a>
    </li>
    <li class="{{url()->route('checkout.payment', $user->id) == url()->current() ? 'active' : ''}}"><a
                href="{{route('checkout.payment', $user->id)}}"><i
                    class="fa fa-money"></i><br>Payment
            type</a>
    </li>
    <li class="{{url()->route('checkout.review', $user->id) == url()->current() ? 'active' : ''}}"><a
                href="{{route('checkout.review', $user->id)}}"
                class=""><i class="fa fa-eye"></i><br>Order Review</a>
    </li>
</ul>