@extends('admin.layouts.default')

{{--*/ $title = trans('notes::label.title.notes') /*--}}

@section('page-header')
    {{ $title }}
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body">
                    <a href="{{ $authorizeUrl }}?response_type={{ $responseType }}&client_id={{ $clientId }}&redirect_uri={{ $redirectUri }}" target="__blank" class="btn btn-primary">{{ trans('notes::message.authorize') }}</a>
                </div>
            </div>
        </div>
    </div>
@stop