    <h2>EDIT SCREENSHOT</h2>
    <hr>
    @if (!empty($screenshot))
    {!! Form::open(['action' => ['ScreenshotController@update', $screenshot->id], 'method' => 'screenshot', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::file('cover_image') }}
    </div>

    <br>

    {{ Form::label('category_id', 'Category:') }}

        <select name="category_id" class="form-control">

    @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
    @endforeach

        </select>

    <hr>
        {{ Form::hidden('_method', 'PUT') }}
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('Update screenshot', ['class' => 'btn btn-primary']) }}
      </div>
    {!! Form::close() !!}
    @endif