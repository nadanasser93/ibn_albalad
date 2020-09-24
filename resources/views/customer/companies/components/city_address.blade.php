'<div class="card-body" id="address'+x+'" style="border: 1px lightgray">'+
'<div class="form-group">'+
    '<label for="exampleInputName1">City</label>'+
    '<select  name="city[]" class="js-example-tags form-control select2-hidden-accessible sel" id="sel'+x+'" >'+
    '    @foreach($cities as $city)'+
     '       <option value="{{$city->id}}">{{$city->name}}</option>'+
    '    @endforeach'+
    '</select>'+
'</div>'+
    '<div class="form-group">'+
        '<label for="exampleInputName1">Job</label>'+
        '<select  name="job[]" class="js-example-tags form-control select2-hidden-accessible sel" id="sel'+x+'1" >'+
            '    @foreach($jobs as $job)'+
            '       <option value="{{$job->id}}">{{$job->name}}</option>'+
            '    @endforeach'+
            '</select>'+
        '</div>'+
'<div class="form-group">'+
 '   <label for="exampleInputName1">Street</label>'+
  '  <input type="text" name="street[]"  value="" class="form-control" id="exampleInputName1" placeholder="Street">'+
'</div>'+
'<div class="form-group">'+
'    <label for="exampleInputName1">House Number</label>'+
 '   <input type="text" name="house_number[]"  value="" class="form-control" id="exampleInputName1" placeholder="House Number">'+
'</div>'+
'<div class="form-group">'+
 '   <label for="exampleInputName1">Post Code</label>'+
 '   <input type="text" name="post_code[]"  value="" class="form-control" id="exampleInputName1" placeholder="Post Code">'+
'</div>'+
    '<a href="#" class="button button-red" style="    background: red;" onclick="remove(event)">-</a>' +
'</div>'
