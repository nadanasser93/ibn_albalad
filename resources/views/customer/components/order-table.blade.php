<div class="row overflow-auto w-100 ">
    <table id="orders" class="table table table-bordered display w-100 ">

        <thead>
        <tr class="">
            <th class="p-3">{{ trans('global.customer') }}</th>
            <th class="p-3">{{ trans('global.company') }}</th>
            <th class="p-3">{{ trans('global.service') }}</th>
            <th class="p-3">{{ trans('global.phone') }}</th>
            <th class="p-3">{{ trans('global.email') }}</th>
            <th class="p-3">{{ trans('subscription') }}</th>
            <th class="p-3">{{ trans('price_encl') }}</th>
            <th class="p-3">{{ trans('price_excl') }}</th>
            <th class="p-3">{{ trans('admin.companies.created_at') }}</th>

        </tr>
        </thead>

        <tbody>

        </tbody>

    </table>


</div>
@push('footer-scripts')
    <script>

        $(document).ready( function () {
            //$('#orders').DataTable();
        } );



    </script>
    @stack('script-filter')
@endpush
