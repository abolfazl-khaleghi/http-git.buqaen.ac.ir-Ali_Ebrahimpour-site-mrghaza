@extends('layouts.base')

@section('body')
<!-- results -->
<div class="container">
    <div class="row">
        <div class="col-md-12 dir-rtl text-justify py-5">
            @foreach($contents as $content)
                {!! $content->description !!}
            @endforeach
        </div>
    </div>
</div>
@endsection
