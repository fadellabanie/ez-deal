<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Ez Deal</title>
    <style type="text/css">
        body {
            padding: 25px 0;
            font-family: Helvetica;
        }

        td {
            padding: 0 10px 0 0;
        }

        * {
            float: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4 well">
                <table>
                    <tr>
                        <td class="pull-right">
                            <strong>Account</strong>
                        </td>
                        <td>
                            {{ $report->user->email }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pull-right">
                            <strong>Date</strong>
                        </td>
                        <td>
                            {{ $report->created_at->format("F jS, Y"); }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Invoice {{ $report->track_id }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Packeg</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                {{ $report->package->ar_name }}
                            </td>

                            <td>
                                {{ $report->amt }}
                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <strong>Total</strong>
                            </td>
                            <td>
                                <strong>{{ $report->amt }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>