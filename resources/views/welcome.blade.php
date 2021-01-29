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
            <div>
                <div class="page-header">
                    <h1><span class="glyphicon glyphicon-flash"></span> Calcukate EMI!</h1>
                </div>    

                @if (count($errors)  > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>        
                    @endforeach
                </div>
                @endif
            </div>
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
        @if (isset($data) && count($data)  > 0)
            <div class="col-md-8">
                <center> <h1> Your EMI Calculation! </h1> </center>
                <table class="table table-hover table-striped">
                    <tr>
                        <th>SR NO</th>
                        <th>Interest</th>
                        <th>Beginning Balance</th>
                        <th>Principle</th>
                        <th>Total Payment</th>
                        <th>Ending Balance</th>
                    </tr>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{$row['sn']}}</td>
                            <td>{{$row['interest']}}</td>
                            <td>{{$row['beginning_balance']}}</td>
                            <td>{{$row['principle']}}</td>
                            <td>{{$row['total_payment']}}</td>
                            <td>{{$row['ending_balance']}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div><h1>Fill The form to calculate EMI!</h1></div>
        @endif
    </body>
</html>
