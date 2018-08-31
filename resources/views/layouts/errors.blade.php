@if (count($errors))
    <div class="form-group">
        <div class="col-md-6 mb-3 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    
                @endforeach
            </ul>
        </div>
    </div>
@endif