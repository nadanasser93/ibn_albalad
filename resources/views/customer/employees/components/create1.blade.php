
    '<style>\n' +
    '    .select2 {\n' +
    '        width: 100%!important;\n' +
    '    }\n' +
    '</style>\n' +
    '    <div class="container">\n' +
    '        <div class="row justify-content-center">\n' +
    '            <div class="col-md-8">\n' +
    '                <div class="card">\n' +
    '                    <div class="card-header">{{ __('global.employees.create') }}</div>\n' +
    '\n' +
    '                    <div class="card-body">\n' +
    '\n' +
    '\n' +
    '                        <form method="POST" id="employee_form" action="{{ route('employees.store') }}" enctype="multipart/form-data">\n' +
    '                            @csrf\n' +
    '                            <input type="hidden" name="user_id" value="{{$customer!=null?$customer->id:''}}">\n' +
    '                            <input type="hidden" name="employee_id" value="{{$employee->id}}">\n' +
    '                            <div class="form-group">\n' +
    '                                <label for="exampleInputName1">Title</label>\n' +
    '                                <input type="text" name="title"  value="" class="form-control" id="exampleInputName1" placeholder="Title">\n' +
    '                            </div>\n' +
    '                            <div class="form-group">\n' +
    '                                <label for="exampleInputName1">Phone</label>\n' +
    '                                <input type="text" name="phone"  value="" class="form-control" id="exampleInputName1" placeholder="Phone">\n' +
    '                            </div>\n' +
    '                            <div class="form-group">\n' +
    '                                <label for="exampleInputName1">Email</label>\n' +
    '                                <input type="text" name="email"  value="" class="form-control" id="exampleInputName1" placeholder="Email">\n' +
    '                            </div>\n' +
    '                            <div class="form-group">\n' +
    '                                <label for="exampleInputName1">Contacter Name</label>\n' +
    '                                <input type="text" name="contactor_name"  value="" class="form-control" id="exampleInputName1" placeholder="Contacter Name">\n' +
    '                            </div>\n' +
    '                            <div class="form-group">\n' +
    '                                <label for="exampleInputName1">Main Image</label>\n' +
    '                                <div class="dropzone" id="main_photo"></div>\n' +
    '                            </div>\n' +
    '\n' +
    '                            <div class="form-group">\n' +
    '                                <label for="exampleInputName1">Description</label>\n' +
    '                                <textarea   class="form-control" id="exampleInputName1" name="description"></textarea>\n' +
    '                            </div>\n' +
    '\n' +
    '\n' +
    '                            <div class="card-body" id="addressdel" style="border: 1px lightgray">\n' +
    '\n' +
    '                                <div class="form-group">\n' +
    '                                    <label for="exampleInputName1">City</label>\n' +
    '                                    <select  name="city" class="form-control js-example-disabled sel" >\n' +
    '                                        @foreach($cities as $city)\n' +
    '                                            <option value="{{$city->id}}">{{$city->name}}</option>\n' +
    '                                        @endforeach\n' +
    '                                    </select>\n' +
    '                                </div>\n' +
    '                                <div class="form-group">\n' +
    '                                    <label for="exampleInputName1">Street</label>\n' +
    '                                    <input type="text" name="street"  value="" class="form-control" id="exampleInputName1" placeholder="Street">\n' +
    '                                </div>\n' +
    '                                <div class="form-group">\n' +
    '                                    <label for="exampleInputName1">House Number</label>\n' +
    '                                    <input type="text" name="house_number"  value="" class="form-control" id="exampleInputName1" placeholder="House Number">\n' +
    '                                </div>\n' +
    '                                <div class="form-group">\n' +
    '                                    <label for="exampleInputName1">Post Code</label>\n' +
    '                                    <input type="text" name="post_code"  value="" class="form-control" id="exampleInputName1" placeholder="Post Code">\n' +
    '                                </div>\n' +
    '                            </div>\n' +
    '                            <div class="form-group row mb-0 mt-2 mb-1">\n' +
    '                                <div class="col-md-12 offset-md-4">\n' +
    '                                    <button type="submit" class="btn btn-primary" onclick="stepper1.next()">\n' +
    '                                        {{ __('button.general.save') }}\n' +
    '                                    </button>\n' +
    '                                </div>\n' +
    '\n' +
    '                            </div>\n' +
    '\n' +
    '                        </form>\n' +
    '                    </div>\n' +
    '                </div>\n' +
    '            </div>\n' +
    '        </div>\n' +
    '    </div>'

