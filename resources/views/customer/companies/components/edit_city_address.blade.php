<div class="card-body" id="address{{$address->id}}del" style="border: 1px lightgray">
    <input type="hidden" name="address_id" value="{{$address->id}}">
    <div class="form-group">
        <label for="exampleInputName1">City</label>
        <select  name="city[]" class=" js-example-tags form-control sel" id="sel{{$address->id}}" >
                @foreach($cities as $city)
                   <option value="{{$city->id}}" {{$city->id==$address->city_id?'selected':''}}>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
   <!-- <div class="form-group">
        <label for="exampleInputName1">Job</label>
        <select  name="job[]" class="form-control js-example-disabled sel" id="sel{{$address->id}}1" >
                @foreach($jobs as $job)
                   <option value="{{$job->id}}" {{$job->id==$address->job_id?'selected':''}}>{{$job->name}}</option>
                @endforeach
            </select>
        </div>-->
    <div class="form-group">
           <label for="exampleInputName1">Street</label>
          <input type="text" name="street[]"  value="{{$address->street}}" class="form-control" id="exampleInputName1" placeholder="Street">
        </div>
    <div class="form-group">
            <label for="exampleInputName1">House Number</label>
           <input type="text" name="house_number[]"  value="{{$address->house_number}}" class="form-control" id="exampleInputName1" placeholder="House Number">
        </div>
    <div class="form-group">
           <label for="exampleInputName1">Post Code</label>
           <input type="text" name="post_code[]"  value="{{$address->post_code}}" class="form-control" id="exampleInputName1" placeholder="Post Code">
        </div>
    <a href="#" class="btn btn-danger"  onclick="delaccount(event,{{$address->id}})">-</a>
    </div>
