<style>
    .container {
        position: relative;

    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
        z-index: -1;
        background: #e67817;
    }

    .middle {
        opacity: 1;
        transition: .5s ease;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        display: none!important;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;

    }
    i{
        color: #fff!important;
    }
    img:hover{
        opacity: 0.5;
    }
    .overlay:hover  {
        opacity: 0.5;
        background: #e67817;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
    .fancybox-outer,.fancybox-inner{
        width:500px!important; ;
        height: 400px!important;
    }
    .fancybox-skin{
        width:500px!important; ;
        height: 400px!important;
        padding: 0!important;
        margin-left: -5em!important;
    }
    .col-4:hover .middle{
        display: block!important;
    }

    .middle:hover .middle{
        display:block!important ;
    }
    .image-item{
        cursor:grab;
    }
    .white{
        color:#fff;
    }
    a.main_image i {
        color:yellow !important;
    }
    .image.main_image{
        box-shadow: 0 7px 16px rgba(0,0,0,.6);
        -webkit-box-shadow: 0 7px 16px rgba(0,0,0,.6);
        -moz-box-shadow: 0 7px 16px rgba(0,0,0,.6);
        -ms-box-shadow: 0 7px 16px rgba(0,0,0,.6);
        -o-box-shadow: 0 7px 16px rgba(0,0,0,.6);
    }

</style>
<div class="card">
    <div class="card-header">{{ __('Gallery') }}</div>
    <div class="card-body ">
        <div class="row images" id="orderable">
         @if($company->photos)
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

    <!-- Change /upload-target to your upload address -->
    <form method="post" action="{{ route('image.store') }}" enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        @csrf
        <input type="hidden" name="stories_id" value="{{$story}}">
        <input type="file" class="form-control" name="photos" multiple>
    </form>

    
</div>
