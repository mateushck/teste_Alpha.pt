@extends('layouts.app')

@section('content')
<<<<<<< Updated upstream
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Contatos:</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                <thead>                  
                    <tr>
                    <th style="width: 10px">Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Contact</th>
                    <th style="width: 200px">#</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                    <td>{{$contact->id ?? ''}}</td>
                    <td>{{$contact->name ?? ''}}</td>
                    <td>{{$contact->email ?? ''}}</td>
                    <td>{{$contact->contact ?? ''}}</td>
                    
                    <td>
                        <div class="row">
                            <div class="col-4">
                                <form role="form" action="{{ route('editContact') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$contact->id ?? ''}}">
                                    <button style="width: 60px" type="submit" class="btn btn-block btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button>
                                </form>
                            </div>
                            <div class="col-4">
                                <form role="form" action="{{ route('deleteContact') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$contact->id ?? ''}}">
                                    <button style="width: 70px" type="submit" class="btn btn-block btn-danger btn-xs"><i class="fa fa-edit"></i> Delete</button>
                                </form>
                            </div>
                            
                        </div>
                        
                        
                    </td>
                    </tr>
               
                </tbody>
                </table>
                <br>
                    <a href="{{url('/createcontact')}}">
                    <button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Create Contact</button>
                </a>      
=======
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>
</div>
@endsection
