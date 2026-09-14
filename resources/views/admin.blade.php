<x-head />

<body>
    <x-header />

    @if(Auth::user()->role == 'admin')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <h3><span class="badge text-bg-secondary">Создание мест</span></h3>
                <form action="{{ route('placeCreate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Название места</label>
                        <input type="text" name="name" class="form-control" id="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="opisanie" class="form-label">Описание</label>
                        <input type="text" class="form-control" id="opisanie" name="opisanie">
                        @error('opisanie')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Фото</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <h3><span class="badge text-bg-secondary">Места</span></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Наличие фото</th>
                            <th>Удаление</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($places)
                        @foreach ($places as $place)
                        <tr>
                            <td>{{ $place->name }}</td>
                            <td>{{ $place->opisanie }}</td>
                            <td>
                                <img src="{{ $place->image }}" class="img-thumbnail" alt="">
                                <!-- @if($place->image)ДА 
                                @else 
                                НЕТ
                                @endif -->
                            </td>
                            <td>
                                <form action="{{ route('destroy', $place) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endisset


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-5">
                <h3><span class="badge text-bg-secondary">Заявки</span></h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Дата</th>
                            <th scope="col">User</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Изменить</th>

                            <th>Принять</th>
                            <th>Коментарии</th>

                        </tr>
                    </thead>
                    <tbody>
                        @isset($zayavki)
                        @foreach ($zayavki as $zayavk)
                        <tr>
                            <td>{{ $zayavk->place->name }}</td>
                            <td>{{ $zayavk->place->opisanie }}</td>
                            <td>{{ $zayavk->data }}</td>
                            <td>{{ $zayavk->user->id }}</td>
                            <td>{{ $zayavk->status=='new'? 'Новый':($zayavk->status=='soglasovana' ? 'Принята':'Завершена')}} </td>
                            <td>
                                <form action="{{ route('status', $zayavk->id) }}" method="post"> @csrf
                                    <select class="form-select w-auto" aria-label="Default select example" name="status">
                                        <option value="new" {{ $zayavk->status=='new' ? 'selected' : '' }}>Новый</option>
                                        <option value="soglasovana" {{ $zayavk->status=='soglasovana' ? 'selected' : '' }}>Принят</option>
                                        <option value="otklonena" {{ $zayavk->status=='otklonena' ? 'selected' : '' }}>Завершен</option>
                                    </select>

                            </td>

                            <td>
                                <button type="submit" class="btn btn-success">Success</button>
                                </form>
                            </td>
                            <td> @if($zayavk->otzivi!='[]')
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <!-- sdsdds -->
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $zayavk->id }}" aria-expanded="false" aria-controls="{{ $zayavk->id }}">
                                                Коментарии
                                            </button>
                                        </h2>


                                        <div id="{{ $zayavk->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <!-- сюда надо будет выписывать коментари -->
                                                <!-- {{ $zayavk->place->opisanie }} -->

                                                @foreach ($zayavk->otzivi as $otziv)
                                                <p><strong>
                                                        Пользователь: </strong> <span class="badge text-bg-secondary">{{ $otziv->user->name }}</span>
                                                </p>
                                                <p class="mx-3">
                                                    {{$otziv->otziv }}
                                                </p>
                                                @endforeach


                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endisset


                    </tbody>
                </table>


            </div>
        </div>
    </div>


    @else
    Вы вообще то не админ
    @endif
    <x-scripts />
</body>

</html>