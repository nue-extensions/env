@extends('layouts.app')
@section('title', "Buat :: $title")

@section('content')

    @include('nue::partials.breadcrumb', ['lists' => [
        'Extensions' => 'javascript:;', 
        $title => route("$prefix.index"), 
        'Create' => 'active'
    ]])

    {!! Form::open(['route' => "$prefix.store"]) !!}
        <div class="card rounded-0 shadow-0 border-top-0">
            <div class="card-header rounded-0 bg-white p-2">
                <h2 class="page-header-title mb-0">Buat {{ $title }}</h2>
                <p class="mb-0">Cukup lengkapi form berikut untuk menambahkan data baru.</p>
            </div>
            @include("$view.form")
        </div>
    {!! Form::close() !!}

@endsection