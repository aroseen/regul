@extends('layouts.app')

@section('content')
    <div class="container">
        <vform :show-spinner="showSpinner" :processing="processing" id="single-form" fields-data="{{$fields}}" form-title="Отправка формы" method="POST" action="/"
               button-text="Отправить" is-ajax></vform>
    </div>
@endsection
