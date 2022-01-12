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
                <h3 class="card-title">Contatos:</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                <thead>                  
                    <tr>
                    <th style="width: 10px">Id</th>
                    <th>Name</th>
                    <th style="width: 200px">#</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                    <td>{{$contact->id ?? ''}}</td>
                    <td>{{$contact->name ?? ''}}</td>
                    <td>
                        <div class="row">
                            <div class="col-4">
                                <form role="form" action="{{ route('viewContact') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$contact->id ?? ''}}">
                                    <button style="width: 60px" type="submit" class="btn btn-block btn-warning btn-xs"><i class="fa fa-search"></i> View</button>
                                </form>
                            </div>
                           
                            
                        </div>
                        
                        
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>    
            </div>
        </div>
    </div>
@endsection
