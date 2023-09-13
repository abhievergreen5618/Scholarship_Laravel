@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Edit Fee') }}</h3>
        </div>
        <!-- /.card-header -->
            <form id="class-add-form" action="{{ isset($data) ? route('admin.fee.update') : route('admin.fee.store') }}" method="POST">
    @csrf

    @isset($data)
    <input type="hidden" name="id" value="{{ encrypt($data->id) }}">
    @endisset 

            <div class="card-body">
                <div>
                    <div class="form-group">
                        <label>Fee Type</label>
                        @php
    $selectedId = (!isset($data) || $data['feetype'] == '') ? null : $data['feetype'];
    $valueExists = DB::table('fee_details')->where('feetype', $selectedId)->exists();
@endphp

<select class="form-control @error('feetype') {{ 'is-invalid' }} @enderror" name="feetype">
    <option value="" {{ is_null($selectedId) ? 'selected' : '' }} @if ($valueExists) disabled @endif>
        {{ $valueExists ? 'Value Exists' : 'No Value' }}
    </option>
</select>


                        @error('feetype')
                        <div>
                            <label class="error fail-alert  mt-1">{{ $message }}</label>
                        </div> 
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1">{{ __('Fee') }}</label>
                        <input type="number" class="form-control @error('fee') {{ 'is-invalid' }} @enderror" id="fee" name="fee" rows="3" placeholder="Enter Fee Amount"  value="{{@old('name',$data->fee)}}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1">{{ __('Description') }}</label>
                        <textarea class="form-control @error('description') {{ 'is-invalid' }} @enderror" id="description" name="description" rows="3" placeholder="Enter ...">{{@old('name',$data->description)}}</textarea>
                    </div>
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
