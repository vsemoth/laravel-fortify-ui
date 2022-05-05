<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <form action = 'App\Http\Controllers\PostsController@store' method = 'POST' enctype = 'multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="post_title">Title:</label>
            <input type='text' name='post_title' id='myeditorinstance' class='form-control bg-dark' placeholder='Title' <?php $errors->has('post_title') ? ' is-invalid' : ''; ?>>

            @if ($errors->has('post_title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('post_title') }}</strong>
                </span>
            @endif
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('post_content', 'Body') }}
            <textarea name='post_content' id='mytextarea' class='form-control bg-dark' placeholder='Type here...' <?php $errors->has('post_content') ? ' is-invalid' : ''; ?>>

            </textarea>
            @if ($errors->has('post_content'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('post_content') }}</strong>
                </span>
            @endif
        </div>

        <br>

        <label for='category_id'>Category:</label>

            <select name="category_id" class="form-control">

        @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach

            </select>
        <br>
        <div class="form-group">
            <input type='file' name='cover_image'>
        </div>
        <hr>
            <input type='submit' value='Create Post' class='btn btn-primary'>
    </form>
</div>