<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">Name</th>
            <th class="p-3">Number</th>
            <th class="p-3">{{ trans('admin.periods.created_at') }}</th>
            <th class=""></th>
            <th class=""></th>
        </tr>
        </thead>

        <tbody>

        @foreach($periods as $key => $period)

            <tr>
                <td class="p-3">{{$period->name}}</td>
                <td class="p-3">{{$period->number}}</td>
                <td class="p-3">{{$period->created_at}}</td>

                <td class=" p-2" ><a href="{{ route('periods.edit',$period) }}"><i class="fas fa-edit"></i></a></td>
                <td class=" p-2" ><a href="{{ route('periods.destroy' ,$period) }}"><i class="fas fa-trash"></i></a> </td>


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
