<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">{{ trans('admin.users.name') }}</th>
            <th class="p-3">{{ trans('admin.users.email') }}</th>
            <th class="p-3">{{ trans('admin.users.created_at') }}</th>
            <th class=""></th>

        </tr>
        </thead>

        <tbody>

        @foreach($users as $key => $user)

            <tr>
                <td class="p-3">{{$user->name}}</td>
                <td class="p-3">{{$user->email}}</td>
                <td class="p-3">{{$user->created_at}}</td>

                <td class=" p-2" ><a href="{{ route('user.edit',$user) }}"><i class="fas fa-edit"></i></a></td>
                <td class=" p-2" ><a href="{{ route('user.destroy' ,$user) }}"><i class="fas fa-trash"></i></a> </td>
                <!--<td>
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                        <a href="{{ route('user.edit',$user) }}" class="dropdown-item" id="{{$user->id}}">
                            Edit
                        </a>

                        <a href="{{ route('user.destroy' ,$user) }}" class="dropdown-item" id="{{$user->id}}">
                            Delete
                        </a>
                        <!--<a href="{{route('links.index',$user->id)}}" class="dropdown-item" id="{{$user->id}}">
                            Links
                        </a>
                        <a href="{{route('vedios.index',$user->id)}}" class="dropdown-item" id="{{$user->id}}">
                            Vedios
                        </a>
                        <a href="{{route('images.index',$user->id)}}" class="dropdown-item" id="{{$user->id}}">
                            Images
                        </a>

                    </div>
                </div>
             </td>-->
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
