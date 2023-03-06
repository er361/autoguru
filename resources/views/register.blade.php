@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div>
            <h2 class="text-center">Register</h2>
            @if ($errors->any())
                <div class="alert alert-danger" style="width: 300px">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{route('register')}}">
                @csrf
                <div class="mb-3">
                    <input required name="email" type="email" class="form-control" placeholder="name@example.com">
                </div>



                <div class="mb-3">
                    <input required name="password" type="password" class="form-control" placeholder="Password">
                </div>

                <div class="mb-3">
                    <input required name="password_confirmation" type="password" class="form-control" placeholder="Confirm password">
                </div>

                <div class="mb-3">
                    <input required name="name" type="text" class="form-control" placeholder="sf7k">
                </div>

                <div class="form-group mb-2">
                    <label for="type">Role:</label>
                    <select class="form-control" id="type" name="role">
                        <option value="seller">Продавец</option>
                        <option value="buyer">Покупатель</option>
                    </select>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
