@include('partials._localization',['model' => \App\Models\Program::class])

<label for="discount_limit">Discount Limit</label>
<input type="number" name="discount_limit" id="discount_limit" class="form-control"
       value="{{isset($coupon) ? $coupon->discount_limit : old('discount_limit')}}" placeholder="Enter Discount Limit">
@error('discount_limit')
<span class="text-danger">{{$message}}</span>
@enderror

<label for="value">Value</label>
<input type="number" name="value" id="value" class="form-control"
       value="{{isset($coupon) ? $coupon->value : old('value')}}" placeholder="Enter Value">
@error('value')
<span class="text-danger">{{$message}}</span>
@enderror

<label for="start_date">Start Date</label>
<input type="date" name="start_date" class="form-control" id="start_date"
       value="{{isset($coupon) ? $coupon->start_date : old('start_date')}}">
@error('start_date')
<span class="text-danger">{{$message}}</span>
@enderror

<label for="start_date">End Date</label>
<input type="date" name="end_date" class="form-control" id="end_date"
       value="{{isset($coupon) ? $coupon->end_date : old('end_date')}}">
@error('end_date')
<span class="text-danger">{{$message}}</span>
@enderror

<label for="value">Usage limit per user</label>
<input type="number" name="usage_limit_per_user" id="value" class="form-control"
       value="{{isset($coupon) ? $coupon->usage_limit_per_user : old('usage_limit_per_user')}}"
       placeholder="Usage limit per user">
@error('usage_limit_per_user')
<span class="text-danger">{{$message}}</span>
@enderror

<label for="value">Usage limit</label>
<input type="number" name="usage_limit" id="value" class="form-control"
       value="{{isset($coupon) ? $coupon->usage_limit : old('usage_limit')}}" placeholder="Usage limit">
@error('usage_limit')
<span class="text-danger">{{$message}}</span>
@enderror

<label for="value">Minimum amount to use</label>
<input type="number" name="minimum_using" id="value" class="form-control"
       value="{{isset($coupon) ? $coupon->minimum_using : old('minimum_using')}}" placeholder="Minimum amount to use">
@error('minimum_using')
<span class="text-danger">{{$message}}</span>
@enderror

<label for="value">Notes</label>
<textarea class="form-control" name="notes">{{isset($coupon) ? $coupon->notes : old('notes')}}</textarea>
@error('notes')
<span class="text-danger">{{$message}}</span>
@enderror
@error('status')
<strong class="text-danger d-block">{{$message}}</strong>
@enderror
<label for="active">Active</label>
<input type="radio" name="status"
       {{ isset($coupon) ? $coupon->status  === 'active' ? 'checked' : old('status') : ''}} value="active" id="active">

<label for="archived">Archived</label>
<input type="radio" name="status" value="archived"
       {{ isset($coupon) ? $coupon->status  === 'archived' ? 'checked' : old('status') : ''}} id="archived">

<button type="submit" class="btn btn-success w-100 ">Submit</button>
