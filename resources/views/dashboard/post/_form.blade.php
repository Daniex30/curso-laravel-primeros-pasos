@csrf
<p>
    <label for="title">Titulo</label>
    <input type="text" name="title" value="{{old('title',$post->title)}}"><!--Aca indicamos que guarde lo que escribe el usuario y si no coloca nada se puede colocar un texto por defecto -->
</p>
<p>
    <label for="slug">Slug</label>
    <input type="text" name="slug" value="{{old('slug',$post->slug)}}">
</p>
<p>
    <label for="category_id">Categorias</label>
    <select name="category_id">
        <option value=""></option>
            @foreach ($categories as $title => $id)
                <option {{old ('category_id',$post->category_id) == $id ? 'selected' : ""}} value="{{ $id }}">{{ $title }}</option>
            @endforeach              
    </select>
</p>
<p>
    <label for="posted">Posteado</label>
    <select name="posted">
        <option {{old("posted",$post->posted)== "yes" ? "selected" : ""}} value="yes">Si</option>
        <option {{old("posted",$post->posted)== "not" ? "selected" : ""}} value="not">No</option>
    </select>
</p>
<p>
    <label for="content">Contenido</label>
    <textarea name="content" >{{old('content', $post->content)}}</textarea>
</p>

<p>
    <label for="description">Descripcion</label>
    <textarea name="description" >{{old('description',$post->description)}}</textarea>
</p>
<p>
    @if (isset($task) && $task =="edit")
        <label for="image">Imagen</label>
        <input type="file" name="image">
    @endif
</p>
<button type="submit">Enviar</button>