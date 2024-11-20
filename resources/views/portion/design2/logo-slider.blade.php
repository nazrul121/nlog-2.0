@inject('client','App\Models\Client')

<section class="section-two bg-light">
    <div class="container">
        <div class="row">
            @if($client->slider('main_menu',$menu_id)->count()>0)
            <div class="col-lg-12 p-0">
                <div class="slider autoplay">
                    @foreach($client->slider('main_menu',$menu_id) as $row)
                        <div><img src="/{{$row->client->logo}}" class="mx-auto d-block img-fluid" alt="img-missing"></div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
