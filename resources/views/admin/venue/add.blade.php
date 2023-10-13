@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add Venue') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="district-add-form" action="{{ isset($data) ? route('admin.venue.update') : route('admin.venue.store') }}" method="POST">
            @csrf
            @isset($data)
            <input type="hidden" name="id" value="{{encrypt($data->id)}}">
            @endisset
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <label for="state-dropdown">State</label>
                        <select class="form-control @error('state') {{ 'is-invalid' }} @enderror" id="state-dropdown" name="state">
                            <option value="">Select State</option>
                            @foreach($states as $key => $state)
                            <option value="{{ $key }}" @isset($data) {{($key==$data->statecode) ? 'selected' : '' }} @endisset>{{ $state }}</option>
                            @endforeach
                        </select>
                        @error('state')
                        <div>
                            <label class="error fail-alert mt-1" id="state-error">{{ $message }}</label>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="district-dropdown">District</label>
                        <select class="form-control @error('district') {{ 'is-invalid' }} @enderror" id="district-dropdown" name="district">
                            <option value="">Select District</option>
                            @isset($data)
                                @foreach($district->getDistrictsList($data->statecode) as $key => $district)
                                <option value="{{ $key }}" @isset($data) {{($key==$data->district) ? 'selected' : '' }} @endisset>{{ $district }}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('district')
                        <div>
                            <label class="error fail-alert mt-1" id="district-error">{{ $message }}</label>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">{{ __('Exam Center Name') }}</label>
                        <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" id="name" name="name" value="{{@old('name',$data->name)}}">
                    </div>
                    @error('name')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1">{{ __('Address') }}</label>
                        <textarea class="form-control @error('address') {{ 'is-invalid' }} @enderror" id="address" name="address" rows="3" placeholder="Enter ...">{{@old('address',$data->address)}}</textarea>
                    </div>
                    @error('address')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="">{{ __('Status') }}</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="active" value="active" @isset($data) @if($data['status']=="active" ) {{"checked"}} @endif @endisset>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" @isset($data) @if($data['status']=="inactive" ) {{"checked"}} @endif @endisset>
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
                        @error('status')
                        <div>
                            <label class="error fail-alert  mt-1">{{ $message }}</label>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection