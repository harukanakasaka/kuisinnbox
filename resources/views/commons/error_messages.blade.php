@if (count($errors) > 0)
    <ul class="alert alert-danger error" role="alert">
        @foreach ($errors->all() as $error)
            <li class="ml-4"><i class="fas fa-check mr-2 icon"></i>{{ $error }}</li>
        @endforeach    
    </ul>
@endif    