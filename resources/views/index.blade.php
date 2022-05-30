<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devices Status</title>
</head>
<body>
    <h1>Devices Status</h1>

    <div id="app">
        @foreach($rooms as $room)
            <room-view :id="{{ $room->id }}"></room-view>
            <!-- Neve:  <br> -->
        @endforeach
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
<!--
<script>
    import RoomView from "../js/components/RoomView";
    export default {
        components: {RoomView}
    }
</script>
-->
