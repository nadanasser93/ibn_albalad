<div class="col-md-12 mx-auto  grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Payment Data</h4>
            @include('customer.components.order-table')
            <button class="btn btn-primary" onclick="stepper1.to(1)">Start</button>
        </div>
    </div>
</div>



