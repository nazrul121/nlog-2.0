@inject('client','App\Models\Client')
@inject('partner','App\Models\Partner')

@if($client->slider('main_menu',$menu_id)->count()>0)
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="brand-content">
                    <div class="brand-items brand-carousel">
                        @foreach($client->slider('main_menu',$menu_id) as $row)
                        <div class="single-brand-item">
                            <a href="#"><img src="/{{$row->client->logo}}" alt="">{{$row->client->name}}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($partner->slider('main_menu',$menu_id)->count()>0)
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="brand-content">
                    <div class="brand-items brand-carousel">
                        @foreach($partner->slider('main_menu',$menu_id) as $row)
                        <div class="single-brand-item">
                            <a href="#"><img src="/{{$row->partner->logo}}" alt=""></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
