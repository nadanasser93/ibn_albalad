@extends('layouts.admin')

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
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .col-4:hover  {
        opacity: 0.3;
    }

    .col-4:hover .middle {
        opacity: 1;
    }


</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Gallery') }}</div>
                    <div class="card-body ">
                        <div class="row images">

                        @foreach($images as $image)
                                <div class="modal fade" id="editImage{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-4">

                          
                                        <img id="{{$image->id}}" class="image mx-3 my-3"  src="{{  str_replace('storage', 'public/storage',asset('storage/images/'.$image->name))  }}"  style="width: 200px;height: 200px;" />
                                  

                                    <div class="middle row ml-1">

                                        <a class="fancybox-thumb btn btn-dark" rel="fancybox-thumb" href="{{ str_replace('storage', 'public/storage',asset('storage/images/'.$image->name))  }}" title="ID Photo" style="margin-top: 0.5em;"><i class="fa fa-eye"></i></a>
                                        <a class=" btn btn-dark" data-toggle="modal" onclick="croppi('photo{{$image->id}}','{{$image->name}}')" data-target="#editImage{{$image->id}}" style="important;margin-top: 0.5em;color: #fff"><i class="fa fa-edit"></i></a>
                                        <a class=" btn btn-dark"  onclick="im_delete('{{$image->id}}')"  style="margin-top: 0.5em;color: #fff"><i class="fa fa-trash"></i></a>
                            </div>

  </div>
                        @endforeach
                        </div>
                    </div>
                    <!-- Change /upload-target to your upload address -->
                    <form method="post" action="{{ route('image.store') }}" enctype="multipart/form-data"
                          class="dropzone" id="dropzone">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
 <div class="modal fade" id="new_element" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div id="photo"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="window.location.reload();" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary crop_image"  type="button" id="crop_image">Edit Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('footer-scripts')
<script>
    Dropzone.options.dropzone =
        {
            maxFilesize: 12,
            Filesize: 1,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
           maxFilesize: 209715200,
          acceptedFiles: "image/*",
           addRemoveLinks: true,
            dataType: "HTML",
         timeout: 500000,
            init: function () {
                dropzone = this;
            },
            success: function(file, response)
            {
                console.log(response);
              $('#new_element').modal('show');
                croppi('photo',response.name);
                $('#crop_image').click(function () {
                    if ($(".images #"+response.id).length > 0){
                        crop(event,response.id,false);
                    }
                    else
                    crop(event,response.id,true);

                });
               
            },
            error: function(file, response)
            {
                console.log(response)
                return false;
            },
            complete: function(file) {
                dropzone.removeFile(file);
            }
        };
    $(".fancybox-thumb").fancybox({
        prevEffect	: 'none',
        nextEffect	: 'none',
        helpers	: {
            title	: {
                type: 'outside'
            },
            buttons: {
                position: 'top',
               /* tpl     : '<div id="fancybox-buttons"><ul><li><a class="btnPrev" title="Previous" href="javascript:;"></a></li><li><a id="fancybox-rotate-button" title="Rotate" class="btnToggle" data-rotation="0" onclick="fancyboxRotation()"><i class="fa fa-rotate-90"></i></a></li><li><a class="btnNext" title="Next" href="javascript:;"></a></li><li><a class="btnClose" title="Close" href="javascript:jQuery.fancybox.close();"></a></li></ul></div>'*/
            },
            thumbs	: {
                width	: 50,
                height	: 50
            }
        }
    });
    $image_crop=null
    function croppi(id,name) {
        var vEl = document.getElementById(id);
            this.$image_crop = $('#'+id).croppie({
                enableExif:true,
                  viewport:{
                    width:320,
                    height:400,
                },
                boundary:{
                    width:320,
                    height:400
                },
                url: '{{  str_replace('storage', 'public/storage',asset('storage/images'))  }}/'+name,
                showZoomer: true,
              //  enableResize: true,
                enableOrientation: true,
            });

    }

    $('#id_photo').change(function(){
        var reader = new FileReader();

        reader.onload = function(event){
            $image_crop.croppie('bind', {
                url:event.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
    
    function crop(e,id,new_crop) {
        e.preventDefault()
        this.$image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            console.log(response)
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: '{{ asset('dashboard/image/update') }}/'+id,
                type: 'post',
                data: {"image": response, _token: _token},
                dataType: "json",
                success: function (data) {
                    console.log(data)
       if(new_crop===true)
                    {
                        $('.images').append(
                            '<div class="col-4">\n' +
                            '<a class="fancybox-thumb" rel="fancybox-thumb" href="'+data.path.replace('storage', 'public/storage')+'" title="ID Photo">\n'+
                            '<img id="'+data.id+'" class="image"  src="'+data.path.replace('storage', 'public/storage')+'"  style="width: 200px;height: 200px;" />\n' +
                            '</a>\n' +
                            '<div class="middle row">\n' +
                            '<a class="fancybox-thumb btn btn-dark mx-auto" rel="fancybox-thumb" href="'+data.path.replace('storage', 'public/storage')+'" title="ID Photo" style="margin-left:0.5em!important;margin-top: 0.5em;"><i class="fa fa-eye"></i></a>\n' +
                            '<a class=" btn btn-dark" data-toggle="modal" onclick="croppi(photo'+data.id+','+data.name+')" data-target="#new_element" style="important;margin-top: 0.5em;color: #fff"><i class="fa fa-edit"></i></a>\n' +
                            '<a class=" btn btn-dark"  onclick="im_delete('+data.id+')"  style="margin-top: 0.5em;color: #fff"><i class="fa fa-trash"></i></a>'+
                            '</div>'+
                            '</div>'
                        );
                        $(".fancybox-thumb").fancybox({
                            prevEffect	: 'none',
                            nextEffect	: 'none',
                            helpers	: {
                                title	: {
                                    type: 'outside'
                                },
                                buttons: {
                                    //  position: 'top',
                                    /* tpl     : '<div id="fancybox-buttons"><ul><li><a class="btnPrev" title="Previous" href="javascript:;"></a></li><li><a id="fancybox-rotate-button" title="Rotate" class="btnToggle" data-rotation="0" onclick="fancyboxRotation()"><i class="fa fa-rotate-90"></i></a></li><li><a class="btnNext" title="Next" href="javascript:;"></a></li><li><a class="btnClose" title="Close" href="javascript:jQuery.fancybox.close();"></a></li></ul></div>'*/
                                },
                                thumbs	: {
                                    width	: 50,
                                    height	: 50
                                }
                            }
                        });
                        $('#new_element').modal('hide');
                    }
                    else {
                    $('#editImage'+id).modal('hide');
                      $('#new_element').modal('hide');
                    $('body').removeClass().removeAttr('style');$('.modal-backdrop').remove(); 
                    $('#'+id).attr("src", data.path.replace('storage', 'public/storage'))
                 }
                   window.location.reload();
                },
                error: function (data) {
                    console.log("error", data);
                   
                }
            });

        });
    };
   function im_delete(id){
       $.ajax({
           url: '{{ asset('dashboard/image/destroy') }}/'+id,
           type: 'get',
           dataType: "json",
           success: function (data) {
               console.log(data);
               $('#'+id).remove();
           },
           error: function (data) {
               $('#'+id).remove();
               console.log("error", data);
           }
       });
   }
</script>

@endpush
