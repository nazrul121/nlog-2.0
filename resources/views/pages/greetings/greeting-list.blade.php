<div class="table-responsive user-status">
    <table class="table table-bordernone">
        <thead>
        <tr>
            <th scope="col">Image</th> <th scope="col">Post Title</th>
            <th scope="col">Description</th> <th scope="col">Status</th>
            <th class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($greetings as $key=>$post)
        <tr>
            <th class="bd-t-none" scope="row"><img src="{{url('/'.$post->photo)}}" style="height:45px"></th>
            <td> 
                @if( strlen($post->title) > 50 )
                    {{mb_substr($post->title,0,50)}} <a href="#">...</a>
                @else
                    {{$post->title}}  
                @endif
            </td>
            <td>{{mb_substr(strip_tags($post->description),0,40)}} <a href="#">...</a></td>
            <td>@if($post->status=='1') Active @else Inactive @endif</td>
            <td class="text-right">
                <a href="{{url('/access/website/greetings/edit/'.$post->id)}}"><i class="fa fa-edit"></i></a> 
            </td>
        </tr> @endforeach
        </tbody>
    </table>
</div>