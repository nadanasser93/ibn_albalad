

<table class="mb-0 table" id="clients" style="border-collapse: collapse!important;font-size: 14px">
    <thead>
    <tr>
        <!-- <th style="max-width: 15px;width:15px:important"></th>-->

        <th>Voor-en Achternaam</th>
        <th>Email</th>
        <th>Telefoonnummer</th>
        <th>Post Code</th>
        <th>Addras</th>
        <th>Bankrekening</th>
        <th>kvk</th>
        <th>Btw</th>
        <th>Created At</th>
        <th ></th>
    </tr>
    </thead>
    <tbody>

    @foreach ($data as $item)
        <tr id="{{$item->id}}">

                <td>
                    {{$item->first_name}} {{$item->last_name}}
                </td>


            <td>{{$item->email}}</td>
           <td>{{$item->phone_number}}</td>
            <td>{{$item->post_code}}</td>
            <td>{{$item->street}}-{{$item->house_number}}</td>

            <td>{{$item->bank_account}}</td>
            <td>{{$item->kvk}}</td>
            <td>{{$item->btw}}</td>
            <td>{{$item->created_at}}</td>
            <td style="text-align:center">
      <div class="dropdown">
                                                            <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="fa fa-cog"></i></span>
                                                            <div class="dropdown-menu dropdown-menu-right">

                                                                <a href="{{asset('dashboard/client/edit/'.$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                                                                    Edit
                                                                </a>

                                                                <a href="{{asset('dashboard/client/delete/'.$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                                                                    Delete
                                                                </a>
                                                                <a href="{{route('links.index',$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                                                                    Vedio Links
                                                                </a>
                                                                <a href="{{route('image_links.index',$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                                                                    Image Links
                                                                </a>
                                                               <!-- <a href="{{route('vedios.index',$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                                                                    Vedios
                                                                </a>
                                                                <a href="{{route('images.index',$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                                                                    Images
                                                                </a>-->

                                                            </div>
                                                        </div>
            <!--<a style="margin:0px 5px;" class="fa fa-pencil-square-o btn btn-outline-info btn-sm" href="{{'/admin/clients/edit/'.$item->id}}"></a>
                <a style="margin:0px 5px;" class="fa fa-trash-o btn btn-outline-danger btn-sm delete" data-action-name="/admin/clients/delete" data-Controller-name="Partners" id="{{$item->id}}"></a>-->
            </td>
        </tr>

    @endforeach
    </tbody>
</table>


