<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Styles -->
        

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <!-- FORM STARTS HERE -->
        <div class="col-md-4">
            <form method="POST" action="/" novalidate>
                @csrf

                <div class="form-group">
                    <label for="name">Amount of loan</label>
                    <input required pattern="[0-9]+([,\.][0-9]+)?" type="text" id="amount" class="form-control" name="amount" placeholder="50000">
                </div> 
                
                <div class="form-group">
                    <label for="name">Intrest (%)</label>
                    <input required pattern="[0-9]+([,\.][0-9]+)?" type="text" id="interest" class="form-control" name="interest" placeholder="12.35">
                </div>
                
                <div class="form-group">
                    <label for="name">Duration (Months)</label>
                    <input required pattern="[0-9]+" type="text" id="duration" class="form-control" name="duration" placeholder="24">
                </div>
                
                <button type="submit" class="btn btn-success">Calculate!</button>

            </form>
        </div>
    </body>
</html>
