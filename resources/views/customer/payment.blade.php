<div class="col-md-8 mx-auto  grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <button class="btn btn-primary" onclick="">Pay</button>
            <button class="btn btn-primary" onclick="newServ()">Add New Service</button>
        </div>
    </div>
</div>
@push('footer-scripts')
    <script>
function newServ() {
    $.ajax({
        url: '{{asset("customer/newService")}}',
        type: 'get',
        success: function (response) { //
            console.log(response)
            stepper1.to(2)
        }
    });
}
    </script>
    @stack('script-filter')
@endpush


