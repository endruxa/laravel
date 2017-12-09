<div class="container">
    <div class="content">
        <h3>Загрузка файла</h3>

        <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
            <div class="image-preview-block">
                <div class="image-preview-image"></div>
            {!! Form::file('image', ['class' => 'image-preview-input']) !!}

            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </div>
        </form>

    </div>
</div>