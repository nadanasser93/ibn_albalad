<style>
    .fa,.fas{
        color: #000!important;
    }
</style>
<div class="row overflow-auto w-100 ">
    <table id="users" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">{{ trans('global.main_image') }}</th>
            <th class="p-3">Type</th>
            <th class="p-3">{{ trans('global.email') }}</th>
            <th class="p-3">{{ trans('global.phone') }}</th>
            <th class="p-3">{{ trans('global.city') }}</th>
            <th class="p-3">{{ trans('admin.created_at') }}</th>
            <th class=""></th>
            <th class=""></th>

        </tr>
        </thead>

        <tbody>

        @foreach($customer->homes as $key => $home)

            <tr>
                <td class="p-3">
                    @if($home->main_image&&$home->main_image->getFullUrl()!=null)
                        <img style="max-height: 300px;width: 150px;height: 100px;" id="{{$home->main_image->id}}" class="image"  src="{{str_replace('storage','public/storage',$home->main_image->getFullUrl()) }}" />
                    @endif
                </td>
                <td class="p-3">Home</td>
                <td class="p-3">{{$home->email ?? ''}}</td>
                <td class="p-3">{{$home->phone ?? ''}}</td>
                <td class="p-3">{{$home->city->name ?? ''}}</td>
                <td class="p-3">{{$home->created_at}}</td>
                <td class=" p-2" ><a href="{{ route('homes.edit',$home) }}" style="color: black!important;"><i class="fas fa-edit" style="color: black!important;"></i></a></td>
                <td class=" p-2" ><a href="{{ route('homes.destroy' ,$home) }}" style="color: black!important;"><i class="fas fa-trash" style="color: black!important;"></i></a> </td>

            </tr>
        @endforeach
        @foreach($customer->companies as $key => $company)

            <tr>
                <td class="p-3">
                    @if($company->image&&$company->image->getFullUrl()!=null)
                        <img style="max-height: 300px;width: 150px;height: 100px;" id="{{$company->image->id}}" class="image"  src="{{str_replace('storage','public/storage',$company->image->getFullUrl()) }}" />
                    @endif
                </td>
                <td class="p-3">Company</td>
                <td class="p-3">{{$company->emain ?? ''}}</td>
                <td class="p-3">{{$company->phone ?? ''}}</td>
                <td class="p-3">{{$company->addresses->first()->city->name ?? ''}}</td>
                <td class="p-3">{{$company->created_at}}</td>
                <td class=" p-2" ><a href="{{ route('companies.edit',$company) }}" style="color: black!important;"><i class="fas fa-edit" style="color: black!important;"></i></a></td>
                <td class=" p-2" ><a href="{{ route('companies.destroy' ,$company) }}" style="color: black!important;"><i class="fas fa-trash" style="color: black!important;"></i></a> </td>

            </tr>
        @endforeach
        @foreach($customer->employees as $key => $employee)

            <tr>
                <td class="p-3">
                    @if($employee->employee_image&&$employee->employee_image->getFullUrl()!=null)
                        <img style="max-height: 300px;width: 150px;height: 100px;" id="{{$employee->employee_image->id}}" class="image"  src="{{str_replace('storage','public/storage',$employee->employee_image->getFullUrl()) }}" />
                    @endif
                </td>
                <td class="p-3">Employee</td>
                <td class="p-3">{{$employee->email ?? ''}}</td>
                <td class="p-3">{{$employee->phone ?? ''}}</td>
                <td class="p-3">{{$employee->city->name ?? ''}}</td>
                <td class="p-3">{{$employee->created_at}}</td>
                <td class=" p-2" ><a href="{{ route('employees.edit',$employee) }}" style="color: black!important;"><i class="fas fa-edit" style="color: black!important;"></i></a></td>
                <td class=" p-2" ><a href="{{ route('employees.destroy' ,$employee) }}" style="color: black!important;"><i class="fas fa-trash" style="color: black!important;"></i></a> </td>

            </tr>
        @endforeach
        </tbody>


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

