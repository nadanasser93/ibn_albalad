<style>
    .fa,.fas{
        color: #000!important;
    }
</style>
<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">{{ trans('global.employees.main_image') }}</th>
            <th class="p-3">{{ trans('global.employees.title') }}</th>
            <th class="p-3">{{ trans('global.employee.city') }}</th>
            <th class="p-3">{{ trans('global.employee.description') }}</th>
            <th class="p-3">{{ trans('global.employee.street') }}</th>
            <th class="p-3">{{ trans('global.employee.house_number') }}</th>
            <th class="p-3">{{ trans('global.employee.post_code') }}</th>
            <th class="p-3">{{ trans('global.employee.created_at') }}</th>
            <th class=""></th>
            <th class=""></th>

        </tr>
        </thead>

        <tbody>

        @foreach($employees as $key => $employee)

            <tr>
                <td class="p-3">
                    @if($employee->employee_image&&$employee->employee_image->getFullUrl()!=null)
                    <img style="max-height: 300px" id="{{$employee->employee_image->id}}" class="image"  src="{{str_replace('storage','public/storage',$employee->employee_image->getFullUrl()) }}" />
               @endif
                </td>
                <td class="p-3">{{$employee->title ?? ''}}</td>
                <td class="p-3">{{$employee->city->name ?? ''}}</td>
                <td class="p-3">{{$employee->description ?? ''}}</td>
                <td class="p-3">{{$employee->street ?? ''}}</td>
                <td class="p-3">{{$employee->house_number ?? ''}}</td>
                <td class="p-3">{{$employee->post_code ?? ''}}</td>
                <td class="p-3">{{$employee->created_at}}</td>


                <td class=" p-2" ><a href="{{ route('employees.edit',$employee) }}" style="color: black!important;"><i class="fas fa-edit" style="color: black!important;"></i></a></td>
                <td class=" p-2" ><a href="{{ route('employees.destroy' ,$employee) }}" style="color: black!important;"><i class="fas fa-trash" style="color: black!important;"></i></a> </td>

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

