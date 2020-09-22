<div class="row overflow-auto w-100 ">
    <table id="users" style="width: 100%!important;"  class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <td></td>
            <th class="p-3">Name</th>
            <th class="p-3">Period</th>
            <th class="p-3">Most Chosen</th>
            <th class="p-3">Order Type</th>
            <th class="p-3">Price Incl</th>
            <th class="p-3">Price Excl</th>
            <th class="p-3">Description</th>
            <th class="p-3">{{ trans('admin.subscriptions.created_at') }}</th>
            <th class=""></th>
            <th class=""></th>
        </tr>
        </thead>

        <tbody>

        @foreach($subscriptions as $key => $subscription)

            <tr>
                <td class="p-3">{{$subscription->image}}</td>
                <td class="p-3">{{$subscription->name}}</td>
                <td class="p-3">{{$subscription->period!=null?$subscription->period->name:""}}</td>
                <td class="p-3">{{$subscription->most_chosen}}</td>
                <td class="p-3">{{$subscription->order_type}}</td>
                <td class="p-3">{{$subscription->price_incl}}</td>
                <td class="p-3">{{$subscription->price_excl}}</td>
                <td class="p-3">{{$subscription->description}}</td>
                <td class="p-3">{{$subscription->created_at}}</td>

                <td class=" p-2" ><a href="{{ route('subscriptions.edit',$subscription) }}"><i class="fas fa-edit"></i></a></td>
                <td class=" p-2" ><a href="{{ route('subscriptions.destroy' ,$subscription) }}"><i class="fas fa-trash"></i></a> </td>


            </tr>
        @endforeach


    </table>


</div>
@push('footer-scripts')
    <script>
            $(document).ready( function () {
                $('#users').DataTable();
            } );



    </script>
    @stack('script-filter')
@endpush
<style>
    .dataTables_wrapper{
        width:100%;
        padding:3em
    }
</style>
