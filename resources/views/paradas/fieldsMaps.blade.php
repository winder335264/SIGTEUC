<!-- Ruta-->
<div class="form-group col-sm-6">
    {!! Form::label('idRuta', 'Ruta:') !!}
    {!! Form::text('idRuta', null, ['class' => 'form-control','required']) !!}
</div>
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control','required']) !!}
     
</div>

<!-- latitud Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('latitud', 'Latitud:') !!}
    {!! Form::text('latitud', null, ['class' => 'form-control','required']) !!}
     
</div>

<!-- longitud Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('longitud', 'longitud:') !!}
    {!! Form::text('longitud', null, ['class' => 'form-control','required']) !!}
     
</div>
<!--mapa-->
<div class="form-group col-sm-12">
    <div style=" height: 500px;">
	<div id="map"></div>

</div>
     
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paradas.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script>
     

      function initMap() {
           var map;
      var myLatLng = {lat: 10.277380467784425, lng: -68.00734560695798};
      
       var infowindow = new google.maps.InfoWindow({
             content: 'holaaa'
        });
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          draggable: true,
          zoom: 10,
           
        });
        
         var marker = new google.maps.Marker({
            position: myLatLng,
            draggable: true,
            map: map,
            title:'hola',
        });
         marker.addListener('click', function() {
              var markerLatLng = marker.getPosition();
       
       infowindow.setContent(['latitud: ' +markerLatLng.lat() +' longitud: '+markerLatLng.lng()].join(''))
       var lat=document.getElementById('latitud').value=markerLatLng.lat();
       var lat=document.getElementById('longitud').value=markerLatLng.lng();
            infowindow.open(map, marker);
          });
 
        
      }
     


    </script>
    
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfeCLUhsQEcT3qSGQH3aKM_AknKoy8N3Q&callback=initMap"
    async defer></script>
