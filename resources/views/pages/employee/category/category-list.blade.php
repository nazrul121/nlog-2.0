<div class="table-responsive user-status">
    <table class="table table-bordernone">
        <thead>
        <tr>
            <th scope="col">Title</th> <th scope="col">Descrition</th>
            <th scope="col">Employees</th> <th scope="col">Status</th>
            <th class="text-right"></th>
        </tr>
        </thead>
        <tbody>
        @if($categories->count()>0)
            @foreach($categories as $key=>$cat)
            <tr>                                   
                <td>{{$cat->name}}</td>
                <td>{{mb_substr(strip_tags($cat->description),0,40)}} <a href="#">...</a></td>
                <td><b>{{$cat->employees->count()}}</b> employees</td>
                <td>
                    @if($cat->status=='1') Active @else Inactive @endif
                </td>
                <td class="text-right"><a href="/access/employee/category/edit/{{$cat->id}}"><i class="fa fa-edit"></i></a></td>
            </tr> @endforeach
            @endif
        </tbody>
    </table>
</div>