@extends('layouts.app')

@section('content')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Contacts Registration:</h3>
            </div> 
            <form role="form"action="{{ route('saveContact') }}" method='POST'>
            @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Contact Name:</label>
                        <input type="text" class="form-control" name ="name" value="{{$contact->name ?? ''}}" minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label for="">Contact E-mail:</label>
                        <input type="text" class="form-control" name="email" value="{{$contact->email ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="">Contact:</label>
                        <input type="text" class="form-control" minlength="9" maxlength="9" name="contact" value="{{$contact->contact ?? ''}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$contact->id ?? ''}}">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
                
    </div>
@endsection
