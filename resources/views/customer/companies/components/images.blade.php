
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<div class="card">
    <div class="card-header">{{ __('Gallery') }}</div>
    <div class="card-body ">
        <div class="row images" id="orderable">
         @if($company!=null&&$company->photos)
            @foreach($company->photos as $image)
                <div class="modal fade" id="editImage{{$image->id}}" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="" action="" method="post" >
                                @csrf

                                <div id="photo{{$image->id}}"></div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="window.location.reload();"  data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary crop_image" type="button" onclick="crop(event,{{$image->id}},false)">Edit Image</button>
                                    <a class="btn btn-primary rotate"  type="button" data-deg="90">Rotate</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4 image-item" data-order="{{$image->order}}" id="{{$image->id}}">
                    <div class="overlay mx-3 my-3" style="width: 200px;height: 200px;">

{{$image}}

                        <div class="middle row ml-1">

                            <a class="fancybox-thumb btn btn-dark" rel="fancybox-thumb" href="{{ asset('storage/images/'.$image->name)  }}"  style="margin-top: 0.5em;"><i class="fa fa-eye"></i></a>
                            <a class=" btn btn-dark" data-toggle="modal" onclick="croppi('photo{{$image->id}}','{{$image->name}}')" data-target="#editImage{{$image->id}}" style="important;margin-top: 0.5em;color: #fff"><i class="fa fa-edit"></i></a>
                            <a class=" btn btn-dark"  onclick="im_delete('{{$image->id}}')"  style="margin-top: 0.5em;color: #fff"><i class="fa fa-trash"></i></a>
                            <a class="btn btn-dark white @if($image->is_main) main_image @endif"   onclick="selectAsMain('{{$image->id}}')" title="select this image as main image" style="margin-top: 0.5em"><i id="star{{$image->id}}" class="fa fa-star"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
         @endif
        </div>
    </div>

        <input type="file" class="form-control" name="photos" multiple>



</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
