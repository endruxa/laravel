<div class="container">
    <div class="content">
        <h3>Загрузка файла</h3>

        <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
            <input type="file" name="file_name" id="file_name">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </form>

    </div>
</div>