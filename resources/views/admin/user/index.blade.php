@extends('layouts.admin_layout')

@section('title', 'Користувачі')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Всі користувачі</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 5%">
                                ID
                            </th>
                            <th>
                                Ім'я
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Дата додавання
                            </th>
                            <th style="width: 30%">
                                Номер
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                                <tr>
                                <td>
                                    {{ $user['id'] }}
                                </td>
                                <td>
                                    {{ $user['name'] }}
                                </td>
                                <td>
                                    {{ $user['email'] }}
                                </td>
                                <td>
                                    {{ $user['created_at'] }}
                                </td>
                                    <td>
                                        {{ $user['phone'] }}
                                    </td>
                                    @if($user->role_id==1)
                                <td class="project-actions text-right">
                                    <form action="{{ route('user.destroy', $user['id']) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Видалити
                                        </button>
                                    </form>
                                </td>
                                    @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
