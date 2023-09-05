@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add Subjects') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="class-add-form" action="{{isset($data) ? route('admin.subject.update') : route('admin.subject.store') }}" method="POST">
            @csrf
            @isset($data)
            <input type="hidden" name="id" value="{{encrypt($data->id)}}">
            @endisset
            <div class="card-body">
                <div>
                    <div class="form-group mb-2">
                        <label for="name">{{ __('Subject Name') }}</label>
                        <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" id="name" name="name" placeholder="Subject Name" value="{{@old('name',$data->name)}}">
                    </div>
                    @error('name')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label>Class</label>
                        <div class="select2-purple">
                            <select class="form-control @error('class') {{ 'is-invalid' }} @enderror" name="classes" id="class" multiple="multiple" data-placeholder="Select Classes" data-dropdown-css-class="select2-purple">
                                <option value="">Select Classes</option>
                                @for($i=1;$i<=12;$i++) <option value="{{$i}}" @isset($data) @if($data['classes']==$i ) {{"selected"}} @endif @endisset>{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        @error('class')
                        <div>
                            <label class="error fail-alert  mt-1">{{ $message }}</label>
                        </div>
                        @enderror
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


@push("footer_extras")
<script>
    $("#class").select2({
        multiple: true
    });
</script>

@endpush
