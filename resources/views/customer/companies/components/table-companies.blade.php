<style>
    .fa,.fas{
        color: #000!important;
    }
</style>
<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">{{ trans('global.companies.main_image') }}</th>
            <th class="p-3">{{ trans('global.companies.company_name') }}</th>
            <th class="p-3">{{ trans('global.companies.description') }}</th>
            <!--<th class="p-3">{{ trans('global.companies.kvk') }}</th>-->
            <th class="p-3">{{ trans('global.companies.phone') }}</th>
            <th class="p-3">{{ trans('admin.companies.created_at') }}</th>
            <th class=""></th>
            <th class=""></th>

        </tr>
        </thead>

        <tbody>

        @foreach($companies as $key => $company)

            <tr>
                <td class="p-3">
                    @if($company->main_image&&$company->main_image->getFullUrl()!=null)
                    <img style="max-height: 300px" id="{{$company->main_image->id}}" class="image"  src="{{str_replace('storage','public/storage',$company->main_image->getFullUrl()) }}" />
@endif
                </td>
                <td class="p-3">{{$company->company_name ?? ''}}</td>
                <td class="p-3">{{$company->description ?? ''}}</td>
                <!--<td class="p-3">{{$company->kvk ?? ''}}</td>-->
                <td class="p-3">{{$company->phone ?? ''}}</td>
                <td class="p-3">{{$company->created_at}}</td>


                <td class=" p-2" ><a href="{{ route('companies.edit',$company) }}" style="color: black!important;"><i class="fas fa-edit" style="color: black!important;"></i></a></td>
                <td class=" p-2" ><a href="{{ route('companies.destroy' ,$company) }}" style="color: black!important;"><i class="fas fa-trash" style="color: black!important;"></i></a> </td>

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

