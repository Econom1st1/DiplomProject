@extends('layouts.admin_layout')

@section('title', 'Редактировать статью')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагувати товар: {{ $post['title'] }}</h1>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('post.update', $post['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Назва</label>
                                    <input type="text" value="{{ $post['title'] }}" name="title" class="form-control"
                                        id="exampleInputEmail1" placeholder="Введіть назву статті" required>
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Оберіть категорію</label>
                                        <select name="cat_id" class="form-control" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category['id'] }}" @if ($category['id'] == $post['cat_id']) selected
                                            @endif>{{ $category['title'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Кількість товару</label>
                                    <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $post['quantity'] }}"
                                           placeholder="Введіть кількість товару" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Ціна товару</label>
                                    <input type="number" min="0.01" step="any" name="price" class="form-control" id="price" value="{{ $post['price'] }}"
                                           placeholder="Введіть ціну товару" required>
                                </div>

                                <div class="form-group">
                                    <textarea name="text" class="editor">{{ $post['text'] }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="feature_image">Зображення товара</label>
                                    <img src="{{ $post['img'] }}" alt="" class="img-uploaded"
                                        style="display: block; width: 300px">
                                    <input type="text" value="{{ $post['img'] }}" name="img" class="form-control"
                                        id="feature_image" name="feature_image" value="" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Обрати зображення</a>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранити</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
