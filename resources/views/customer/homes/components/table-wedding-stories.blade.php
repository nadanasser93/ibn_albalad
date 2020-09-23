<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">{{ trans('admin.wedding_stories.main_image') }}</th>
            <th class="p-3">{{ trans('admin.wedding_stories.name.ar') }}</th>
            <th class="p-3">{{ trans('admin.wedding_stories.name.nl') }}</th>
            <th class="p-3">{{ trans('admin.wedding_stories.description.ar') }}</th>
            <th class="p-3">{{ trans('admin.wedding_stories.description.nl') }}</th>
            <th class="p-3">{{ trans('admin.wedding_stories.created_at') }}</th>
            <th class=""></th>

        </tr>
        </thead>

        <tbody>

        @foreach($stories as $key => $story)

            <tr>
                <td class="p-3">
                   <img src="{{$story->main_image!=null? asset('storage/images/'.$story->main_image->name) :'' }}" style="width:150px; height:100px">
                </td>
                <td class="p-3">{{$story->name->ar ?? ''}}</td>
                <td class="p-3">{{$story->name->nl ?? ''}}</td>
                <td class="p-3">{{$story->description->ar ?? ''}}</td>
                <td class="p-3">{{$story->description->nl ?? ''}}</td>
                <td class="p-3">{{$story->created_at}}</td>

                <td>
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a href="{{ route('image.gallery',$story) }}" class="dropdown-item" id="{{$story->id}}">
                            Story Images
                        </a>
                        <a href="{{ route('links.youtube',$story) }}" class="dropdown-item" id="{{$story->id}}">
                            Add New Vedio
                        </a>
                        <a href="{{ route('wedding_stories.edit',$story) }}" class="dropdown-item" id="{{$story->id}}">
                            Edit
                        </a>

                        <a href="{{ route('wedding_stories.destroy' ,$story) }}" class="dropdown-item" id="{{$story->id}}">
                            Delete
                        </a>
                              <a class="dropdown-item"><input id="show{{$story->id}}" type="checkbox" onchange="select_show(event,{{$story->id}})" name="home_show"{{$story->home_show==1?'checked':''}}> Select Story
</a>

                    </div>
                </div>
             </td>
            </tr>
        @endforeach


    </table>


</div>
@push('footer-scripts')
    <script>
  function select_show(e,id) {
                var isChecked = $('#show'+id).is(":checked") ? 1:0;
                $.ajax({
                    type:'POST',
                    url:'{{asset('dashboard/wedding_stories/update_selected_show')}}/'+id,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "home_show" : isChecked },
                    success: function(data){
                        console.log(data)

                            swal(data);

                    },
                    error: function (data) {
                        console.log("error", data);
                        swal(data.result);

                    }
                });
            }
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
