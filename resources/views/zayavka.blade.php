<x-head />

<body>
    <x-header />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form action="{{ route('zayavkCreate') }}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Заполните заявку</legend>
                        <div class="mb-3">
                            <label for="TextInput" class="form-label"> Дата</label>
                            <input type="date" id="TextInput" class="form-control" placeholder=" input" name="data">
                            @error('data')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Select" class="form-label">Место</label>
                            <select id="Select" class="form-select" name="place">
                                @isset($places)
                                @foreach ($places as $place)

                                <option value="{{ $place->id }}"> {{ $place->name }}</option>
                                @endforeach
                                @endisset

                            </select>
                            @error('place')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Select" class="form-label">Способ оплаты</label>
                            <select id="Select" class="form-select" name="pay">
                                <option value="beznal">Безнал</option>
                                <option value="nal">Наличные</option>
                            </select>
                            @error('pay')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>






    @isset($zayavki)
    @foreach ($zayavki as $zayavk)
    {{ $zayavk->pay }}
    {{ $zayavk->data }}
    {{ $zayavk->place->name }}
    @endforeach
    @endisset
      




    <x-scripts />
</body>

</html>