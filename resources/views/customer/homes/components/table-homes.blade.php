<style>
    .fa,.fas{
        color: black!important;
    }
</style>
<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">{{ trans('global.homes.main_image') }}</th>
            <th class="p-3">{{ trans('global.homes.city') }}</th>
            <th class="p-3">{{ trans('global.homes.description') }}</th>
            <th class="p-3">{{ trans('global.homes.street') }}</th>
            <th class="p-3">{{ trans('global.homes.house_number') }}</th>
            <th class="p-3">{{ trans('global.homes.post_code') }}</th>
            <th class="p-3">{{ trans('admin.homes.created_at') }}</th>
            <th class=""></th>
            <th class=""></th>

        </tr>
        </thead>

        <tbody>

        @foreach($homes as $key => $home)

            <tr>
                <td class="p-3">
                    @if($home->main_image&&$home->main_image->getFullUrl()!=null)
                    <img style="max-height: 300px" id="{{$home->main_image->id}}" class="image"  src="{{str_replace('storage','public/storage',$home->main_image->getFullUrl()) }}" />
@endif
                </td>
                <td class="p-3">{{$home->city->name ?? ''}}</td>
                <td class="p-3">{{$home->description ?? ''}}</td>
                <td class="p-3">{{$home->street ?? ''}}</td>
                <td class="p-3">{{$home->house_number ?? ''}}</td>
                <td class="p-3">{{$home->post_code ?? ''}}</td>
                <td class="p-3">{{$home->created_at}}</td>


                <td class=" p-2" ><a href="{{ route('homes.edit',$home) }}" style="color: black!important;"><i class="fas fa-edit" style="color: black!important;"></i></a></td>
                <td class=" p-2" ><a href="{{ route('homes.destroy' ,$home) }}" style="color: black!important;"><i class="fas fa-trash" style="color: black!important;"></i></a> </td>

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

