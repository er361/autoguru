@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div>
            <h2 class="text-center">Login</h2>
            @if ($errors->any())
                <div class="alert alert-danger" style="width: 300px">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{route('login')}}">
                @csrf
                <div class="mb-3">
                    <input required name="email" type="email" class="form-control" placeholder="name@example.com">
                </div>

                <div class="mb-3">
                    <input required name="password" type="password" class="form-control" placeholder="Password">
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
        </div>
    </div>
@endsection

