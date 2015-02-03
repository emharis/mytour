@extends('front.partials.master')

@section('main-content')
{{str_replace('../', '', $statpage->konten)}}
@stop