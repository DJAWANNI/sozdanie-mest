<x-head />

<body>
  <x-header />
  @auth
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="bd-title mb-0" id="content">Заявки</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">

        @isset($zayavki)
        @foreach ($zayavki as $zayavk)
        <div class="card mx-1" style="width: 18rem;">
          <img src="{{ $zayavk->place->image }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"> {{ $zayavk->place->name }}</h5>
            <span class="badge text-bg-secondary">{{ $zayavk->pay=='nal'? 'Наличные':'Безналичные'}}</span>
            <span class="badge text-bg-secondary"> {{ $zayavk->data }}</span>
            <span class="badge text-bg-{{ $zayavk->status=='new'? 'secondary':($zayavk->status=='soglasovana' ? 'primary':'success')}}">{{ $zayavk->status=='new'? 'Новый':($zayavk->status=='soglasovana' ? 'Принята':'Завершена')}}</span>
            <p class="card-text"> {{ $zayavk->place->opisanie }}</p>
            <div class="mb-3">
              @if($zayavk->status == 'otklonena')
              <form action="{{ route('otzivCreate', $zayavk->id) }}" method="post">@csrf
                <label for="exampleInputEmail1" class="form-label">Коментарий</label>
                <input type="text" class="form-control mb-2" name="otziv" id="exampleInputEmail1" aria-describedby="emailHelp ">
                <button type="submit" href="#" class="btn mb-2 btn-primary">Добавить</button>
                @error('otziv')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </form>
              

              <!-- коменты нужно условие -->
                    @if($zayavk->otzivi!='[]')
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
                      <p ><strong>
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
              @endif

            </div>


          </div>
        </div>
        @endforeach
        @endisset
      </div>
    </div>
    @endauth
  </div>


  <div class="container mb-5 mt-5">
    <div class="row justify-content-center">


      <h1 class="bd-title mb-0" id="content">Места</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">

        @isset($places)
        @foreach ($places as $place)
        <div class="card mx-1" style="width: 18rem;">
          <img src="{{ $place->image }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"> {{ $place->name }}</h5>
            <p class="card-text"> {{ $place->opisanie }}</p>
            <div class="mb-3">


              <!-- коменты нужно условие -->
              <div class="accordion" id="accordionExample">

              </div>


            </div>


          </div>
        </div>
        @endforeach
        @endisset
      </div>
    </div>

  </div>






  <x-scripts />
</body>

</html>