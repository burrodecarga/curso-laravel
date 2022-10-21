<div class="mb-4">
    {!! Form::hidden('user_id',auth()->user()->id) !!}

    {!! Form::label('title','nombre del curso') !!}
    {!! Form::text('title',null,['class'=>'form-input block w-full mt-1 rounded'.($errors->has('title') ? ' border-red-600': ''),'autocomplete'=>'off']) !!}
    @error('title')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug','nombre del curso') !!}
    {!! Form::text('slug',null,['class'=>'form-input block w-full mt-1 rounded' .($errors->has('slug') ? ' border-red-600': ''),'readonly'=>'readonly']) !!}
    @error('slug')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle','subtitulo del curso') !!}
    {!! Form::text('subtitle',null,['class'=>'form-input block w-full mt-1 rounded' .($errors->has('subtitle') ? ' border-red-600': '')]) !!}
    @error('subtitle')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description','descripción del curso') !!}
    {!! Form::textarea('description',null,['class'=>'form-input block w-full mt-1 rounded '.($errors->has('description') ? ' border-red-600': '')]) !!}
    @error('description')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-3">
    <div class="mb-4">
        {!! Form::label('category_id','Categoría') !!}
        {!! Form::select('category_id',$categories,null,['class'=>'form-input block w-full mt-1 rounded']) !!}
        @error('category_id')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror

    </div>
    <div class="mb-4">
        {!! Form::label('level_id','Nivel') !!}
        {!! Form::select('level_id',$levels,null,['class'=>'form-input block w-full mt-1 rounded']) !!}
        @error('level_id')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
    </div>
    <div class="mb-4">     @error('price_id')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
        {!! Form::label('price_id','Precio') !!}
        {!! Form::select('price_id',$prices,null,['class'=>'form-input block w-full mt-1 rounded']) !!}

    </div>
</div>
<h1 class="font-bold text-2xl text-gray-600">Imagen del curso</h1>
<div class="grid grid-cols-2 gap-2">
        <figure>
            @isset($course->image)
                 <img id="picture" src="{{Storage::url($course->image->url)}}" alt="" class="w-full h-64 object-cover object-center">
                 @error('image')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
            @else
            <img id="picture" src="{{asset('assets/jobs/bg.jpg')}}" alt="" class="w-full h-64 object-cover object-center">

            @endisset
        </figure>

    <div>
        <p class="mb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur corrupti odit nostrum </p>
       {!! Form::file('image',['class'=>'form-input w-full','id'=>'file','accept'=>'image/*'])!!}
       @error('image')
       <strong class="text-sm text-red-600">{{$message}}</strong>
       @enderror
    </div>
</div>



