@extends('admin.layouts.default')

{{--*/ $title = trans('notes::label.title.notes') /*--}}

@section('page-header')
    {{ $title }}
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
            </div>
        </div>
    </div>
@stop