<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('css/rank.css') }}">
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rank.js') }}"></script>
    <title>排行榜</title>

</head>
<body>
    <div id="content">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>排名</th>
                    <th>姓名</th>
                    <th>金额</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>
    <div>
        <button id="addRank">提升名次</button>
    </div>
</body>
</html>