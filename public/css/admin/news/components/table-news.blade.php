<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-striped table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3"></th>
            <th class="p-3">{{ trans('admin.news.title') }}</th>
            <th class="p-3">{{ trans('admin.news.date') }}</th>
            <th class="p-3">{{ trans('admin.news.description') }}</th>
            <th class=""></th>
            <th class=""></th>
        </tr>
        </thead>

        <tbody>

        @foreach($news as $key => $new)

            <tr>
                <td class="p-3"><img src="{{  str_replace('storage', 'public/storage',asset('storage/images/news/'.$new->main_image))}}" style="    height: 100px;
    width: 100px;
    border-radius: 50%;"></td>
                <td class="p-3">{{$new->title}}</td>
                <td class="p-3">{{$new->date}}</td>
                <td class="p-3">{{$new->content}}</td>


                <td class=" p-2" ><a href="{{ route('new.edit',$new) }}"><i class="fas fa-edit"></i></a></td>
                <td class=" p-2" ><a href="{{ route('new.destroy' ,$new) }}"><i class="fas fa-trash"></i></a> </td>


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
