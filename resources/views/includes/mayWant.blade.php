<div class="card card-body shadow mt-5">
    <h4 class="text-center">Recent products</h4>
</div>
<div class="maywant owl-carousel">
    @foreach($aProducts as $aproduct)
        <div class="wow shadow zoomIn" data-wow-duration="1s">
            <div class="products-list">
                <img height="150px" src="{{$aproduct->thumbNail->thumbName}}" alt="">
                <h5>{{$aproduct->item}}</h5>
                <div class="lead py-2">
                    <p>
                        &#8358;&nbsp;{{$aproduct->price}}/<small>{{$aproduct->per}}</small>
                    </p>
                </div>
                <div class="py-2">
                    <a class="add-to-cart btn btn-sm btn-custom"
                       data-item="{{$aproduct->item}}"
                       data-id="{{$aproduct->id}}" data-price="{{$aproduct->price}}"
                       href="javascript:void(0)">
                        <i class="fa fa-cart-plus">&nbsp</i>Add to cart</a>
                </div>
            </div>
        </div>
    @endforeach

</div>