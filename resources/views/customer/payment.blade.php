<div class="col-md-12 mx-auto  grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Payment Data</h4>
            @include('customer.components.order-table')
            <button class="btn btn-primary" onclick="stepper1.to(1)">Start</button>
            <button class="btn btn-primary" onclick="OrderMollie()">Buy</button>
        </div>
    </div>
</div>



@push('footer-scripts')
    <script>
        function OrderMollie() {
            order_id=$('#order_id').val()
            _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{asset('customer/order-now/order')}}",
                data:{
                    _token: _token,
                    order_id:order_id,
                },
                success: function(response){
                    //  swal("Thanks For Order Now")
                }
            });
        }
    </script>
@endpush
