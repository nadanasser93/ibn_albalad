@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12" style="clear:both">
            <div class="alert delete-alert alert-dismissible" role="alert" style="display:none;color:#fff">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">Ã—</span>
                </button>
            </div>
        </div>
        @if(session('alertMessage'))
            <div class="col-12" style="clear:both;">
                <div class="{{'alert alert-dismissible '.session('alertType')}}" role="alert" style="color:#fff">
                    {{ session('alertMessage') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
            </div>

        @endif

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-body">
                        <div class="card-title">  <h1> All Clients </h1></div>
                        @include('admin.clients.partials.clients-table',['data' => $clients])
                    </div>
                    <div class="card-footer">
                        <div class="row pl-3 pr-3 pl-md-0">

                            <a href="{{ route('client.create') }}" class="btn btn-primary ">
                                Create Client
                            </a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script type="text/javascript">


            $('#clients').DataTable(
                {
                    "order": [[ 5, "desc" ]]
                });


        </script>
    @endpush
@endsection
