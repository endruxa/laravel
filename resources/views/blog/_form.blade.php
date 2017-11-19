
    echo Form::open(['route' => 'blog.store'])
    echo Form::open(['action' => 'BlogController@store'])
    echo Form::label('email', 'E-Mail Address');







{{--<form action="{{route('blog.store')}}" method="post" >
    <div class="form-group">
        <label for="title">Fresh News</label>
        <input name="title" type="text" class="form-control" id="title" placeholder="Fresh News">
    </div>
    <div class="form-group">
        <label for="description">Content</label>
        <textarea  name="description" class="form-control" id="description" rows="3"></textarea>
    </div>


    <button type="submit" class="btn btn-primary">Create</button>
</form>--}}
