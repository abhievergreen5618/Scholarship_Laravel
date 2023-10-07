@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Email Template') }}</h3>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="card card-lightblue collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Admit Card Notification Template') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: none;">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Attributes</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Student Name</label>
                                            <input type="text" class="form-control" value="[student_name]" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Mother Name</label>
                                            <input type="text" class="form-control" value="[mother_name]" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Father/Husband Name</label>
                                            <input type="text" class="form-control" value="[father_name]" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" value="[student_address]" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>DOB</label>
                                            <input type="text" class="form-control" value="[student_dob]" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Exam Date</label>
                                            <input type="text" class="form-control" value="[exam_date]" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Exam Center</label>
                                            <input type="text" class="form-control" value="[exam_center]" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Exam Venue</label>
                                            <input type="text" class="form-control" value="[exam_venue]" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Admit Card Link</label>
                                            <input type="text" class="form-control" value="[admit_card_link]" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <form action="{{route('admin.emailtemplate.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <div class="card-title">{{__('Edit Email Template')}}</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea class="form-control @error('admitcardtemplate') {{ 'is-invalid' }} @enderror" id="admitcardtemplate" name="admitcardtemplate" rows="3" placeholder="Enter ...">{{@old('name',$admitcardtemplate)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="float-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer_extras')
<script>
    CKEDITOR.replace('admitcardtemplate');
</script>
@endpush