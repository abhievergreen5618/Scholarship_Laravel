@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add Session') }}</h3>
        </div>
        <!-- /.card-header -->
        <form id="session-add-form" action="{{ isset($data) ? route('admin.session.update') : route('admin.session.store') }}" method="POST">
            @csrf
            @isset($data)
            <input type="hidden" name="id" value="{{ encrypt($data->id) }}">
            @endisset

            <div class="card-body">
                <div>
                    <div class="form-group mb-2">
                        <label for="name">{{ __('Session Name') }}</label>
                        <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" id="name" name="name" placeholder="Name" value="{{@old('name',$data->name)}}">
                        @error('name')
                        <div>
                            <label class="error fail-alert  mt-1" id="class-error">{{ $message }}</label>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Session Duration</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right @error('session_duration') {{ 'is-invalid' }} @enderror" id="reservation" autocomplete="off" name="session_duration" value="{{@old('session_duration',$data->session_duration)}}">
                        </div>
                        @error('session_duration')
                        <div>
                            <label class="error fail-alert  mt-1" id="class-error">{{ $message }}</label>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Exam Date</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="exam_date" autocomplete="off"  id="exam_date" value="{{@old('exam_date',$data->exam_date)}}" />
                        </div>
                        @error('exam_date')
                        <div>
                            <label class="error fail-alert  mt-1" id="class-error">{{ $message }}</label>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1">{{ __('Description') }}</label>
                        <textarea class="form-control @error('description') {{ 'is-invalid' }} @enderror" id="description" name="description" rows="3" placeholder="Enter ...">{{@old('name',$data->description)}}</textarea>
                        @error('description')
                        <div>
                            <label class="error fail-alert  mt-1" id="class-error">{{ $message }}</label>
                        </div>
                        @enderror
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
                            <label class="error fail-alert  mt-1" id="status-error">{{ $message }}</label>
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