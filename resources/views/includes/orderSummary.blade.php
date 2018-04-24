<div class="col-lg-3 mb-3">
    <div class="card wow shadow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
        @if(Auth::check() && Auth::user()->delivery == 'home')
            @php($charge = 1500)
        @else
            @php($charge = 0)
        @endif


        <h5 class="card-header py-4">Order Summary</h5>
        <div class="card-body">
            <p class="text-muted">Shipping and additional costs are calculated based on the values you
                have
                entered.</p>
            <div class="table-responsive">
                <table class="table order-summ">
                    <tbody>
                    <tr>
                        <td class="text-muted">Subtotal</td>
                        <td>&#8358;&nbsp;<span class="sub-total"></span></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Delivery and Handling</td>
                        <td>&#8358;&nbsp;{{$charge}}</td>
                    </tr>

                    <tr>
                        <td class="text-muted">Tax</td>
                        <td>&#8358;&nbsp;0.00</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Total</td>
                        <td>&#8358;&nbsp;<span class="total"></span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>