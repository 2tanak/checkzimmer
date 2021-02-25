<div id="application">
    <Single/>
</div>
<script>
    window.myCenter = { lat: {{$hotel->lat}}, lng: {{$hotel->lng}} };
    window.myCenter2 = { lat: {{$hotel->lat}}, lng: {{$hotel->lng}} };
    window.myTrip = [{lat:{{$hotel->lat}}, lng:{{$hotel->lng}}}];
    window.myTrip2 = [{lat:{{$hotel->lat}}, lng:{{$hotel->lng}}}];
    window.hotel = {id: {{$hotel->id}}};
    window.hotel_price = {{$hotel->price}};
</script>

