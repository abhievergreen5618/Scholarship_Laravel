@extends('layouts.admin.master')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add Class') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="class-add-form" action="" method="POST">
            @csrf
            @isset($data)
            <input type="hidden" name="id" value="{{encrypt($data->id)}}">
            @endisset
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control">
                            <option>Select Class</option>
                            @for($i=1;$i<=12:$i++)
                                {{$i}}
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
