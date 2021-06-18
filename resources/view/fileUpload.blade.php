<!DOCTYPE html>
<html>
<head>
    <title>Bobb</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
  
<body>
<div class="container">
   
    <div class="panel panel-primary"></br>
      <div class="panel-heading"><h2>Import plików DWG.</h2></div></br>
      <div class="panel-body">
   
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  
        <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
  
                <div class="col-md-6">
                    <input type="file" name="file" class="form-control">
                </div>
   
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Import</button>
                </div>
   
            </div>
        </form>

        </br></br>

        <form action="ForgeConnect" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <select class="custom-select" name="choosefile">
                        <option selected>Wybierz plik do odczytu</option>
                        
                        @foreach ($files1 as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Wyślij do Forge</button>
                </div>
            </div>
        </form>
  
      </div>
    </div>
</div>
</body>
  
</html>