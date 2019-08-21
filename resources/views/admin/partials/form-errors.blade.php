@if(count($errors)>0)
    <div class="alert alert-danger" style="direction: rtl;">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif