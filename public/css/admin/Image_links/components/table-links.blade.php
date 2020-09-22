<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">Title</th>
            <th class="p-3">Description</th>
            <th class="p-3">{{ trans('admin.users.created_at') }}</th>
            <th class=""></th>
            <th class=""></th>
        </tr>
        </thead>

        <tbody>

        @foreach($links as $key => $link)

            <tr>
                <td class="p-3">{{$link->title}}</td>
                <td class="p-3">{{$link->description}}</td>
                <td class="p-3">{{$link->created_at}}</td>

                <td class=" p-2" ><a href="{{ route('image_link.edit',$link) }}"><i class="fas fa-edit"></i></a></td>
                <td class=" p-2" ><a href="{{ route('image_link.destroy' ,$link) }}"><i class="fas fa-trash"></i></a> </td>


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

