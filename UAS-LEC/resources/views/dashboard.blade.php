@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  <main>
    <div class="container">
          @if($users->isEmpty())
              
          @else
             
          @endif
    </div>
  </main>
@endsection