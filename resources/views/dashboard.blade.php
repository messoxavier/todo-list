@extends('layouts.app')

@section('content')
    <script>window.location = "{{ route('tasks.index') }}";</script>
@endsection
