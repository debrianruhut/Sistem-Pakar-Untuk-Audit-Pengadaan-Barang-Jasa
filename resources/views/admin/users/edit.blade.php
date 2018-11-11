@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
        <!-- breadcumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Users</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <!-- buat form untuk input -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        Edit
                    </div>

                    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
                    @include('admin.users._form')
                    {!! Form::close() !!}
                
                </div>
            </div>
        </div>
       
    </div>
@endsection