@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add Scholarship') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="class-add-form" action="{{isset($data) ? route('admin.scholarshiptype.update') : route('admin.scholarshiptype.store') }}" method="POST">
            @csrf
            @isset($data)
            <input type="hidden" name="id" value="{{encrypt($data->id)}}">
            @endisset
            <div class="card-body">
                <div>
                @php
    $selectedId = (!isset($data) || $data['name'] == '') ? null : $data['name'];
    $valueExists = DB::table('scholarship_lists')->where('name', $selectedId)->exists();
@endphp

<input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="feetype" value="{{ is_null($selectedId) ? 'Select Value' : $selectedId }}" readonly>

                    @error('name')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
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



