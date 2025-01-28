@extends('layouts.plantilla')

@section('content')
<section>
  <div class="container">
    <div class="row">
      <!-- Lista de grupos -->
      <div class="col-md-4">
        <div class="chat-list-box">
          <div class="head-box">
            <ul class="list-inline text-left d-inline-block float-left">
              <li> <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px"> </li>
            </ul>
            <ul class="flat-icon list-inline text-right d-inline-block float-right">
              <li><a href="#"> <i class="fas fa-search"></i> </a></li>
              <li>
                <a href="#" id="toggleMenu"><i class="fas fa-ellipsis-v"></i></a>
                <div id="newGroupMenu" style="display: none;">
                  <ul class="list-inline">
                    <li><a href="#">Nuevo grupo</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
          <div class="chat-person-list">
            <ul class="list-inline">
              @foreach($grupos as $grupo)
                <li class="flip"
                  data-id = "{{$grupo->id}}"
                  data-nombre="{{ $grupo->nombre }}" 
                  data-foto="https://i.ibb.co/fCzfFJw/person.jpg"> <!-- FOTO DINÁMICA -->
                >
                  <a href="#" 
                    <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="Foto del grupo" width="40px">
                    <span>{{ $grupo->nombre }}</span>
                    <span class="chat-time">{{ $grupo->updated_at->format('h:i A') }}</span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

      <!-- Caja de mensajes -->
      <div class="col-md-8 ">
        <div class="message-box" > <!-- style="display: none;"Ocultar al inicio -->
          <div class="head-box-1 titulo">
            
            <div class="nombreGrupo">
              <ul class="msg-box list-inline text-left d-inline-block float-left ">
                <li><i class="fas fa-arrow-left" id="back"></i></li>
                <li>
                  <img id="grupo-imagen" src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px">
                  <span id="grupo-nombre">Naveen Mandwariya</span> <br>
                  <small class="timee" id="grupo-hora">12:45 PM</small>
                </li>
              </ul>
            </div>


            <div class="iconos">
              <ul class="flat-icon list-inline text-right d-inline-block float-right">
                <li><a href="#"> <i class="fas fa-video"></i> </a></li>
                <li><a href="#"> <i class="fas fa-camera"></i> </a></li>
                <li>
                  <a href="#" id="dset"><i class="fas fa-ellipsis-v"></i></a>
                  <div class="setting-drop">
                    <ul class="list-inline">
                      <li><a href="#">Salir del grupo</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>

          </div>


          <!-- Mensajes -->
          <div class="msg_history">
            <div class="incoming_msg" id="contenedor_mensajes">
              <div class="incoming_msg_img">
                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
              </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Hi, How are you?</p>
                  <span class="time_date">11:01 AM | June 9</span>
                </div>
              </div>

            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Hello, I am fine thank you, what about you?</p>
                <span class="time_date">11:01 AM | June 9</span>
              </div>
            </div>
          </div>
          
          <!-- Input de mensaje -->
          <div class="send-message">
            <div class="input-container">
              <textarea class="form-control" placeholder="Type your message here ..."></textarea>
              <a href="#" id="attach"><i class="fas fa-paperclip"></i></a>
              <a href="#" id="send"><i class="fas fa-paper-plane"></i></a>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Al hacer clic en un grupo
    

    $(".flip").click(function(e) {
      e.preventDefault();

      // Obtener datos del grupo
      let idGrupo = $(this).data("id");
      var grupoNombre = $(this).data("nombre");
      var grupoFoto = $(this).data("foto");
      var hora = $(this).find(".chat-time").text();
   
      let url = `{{route('getMensajes',['id' => '__ID__'])}}`.replace('__ID__',idGrupo)
      console.log(url)
    
      const response = fetch(url,{
        method: "GET",
        headers : {
          'X-CSRF-TOKEN' : "{{csrf_token()}}"
        }
      }).then(response=>{
        if(!response.ok){

        }
        return response.json()
      }).then(data=>{
        console.log(data.mensajes);
        data.mensajes.forEach(mensaje => {
             console.log(mensaje.texto)
          });

      })
       
    
    
      // Actualizar la caja de mensajes
      $("#grupo-nombre").text(grupoNombre);
      $("#grupo-imagen").attr("src", grupoFoto);
      $("#grupo-hora").text(hora);

      // Mostrar la caja de mensajes
      $(".message-box").show();
    });

    // Ocultar caja de mensajes
    $("#back").click(function() {
      $(".message-box").hide();
    });

    // Mostrar adjuntos
    $("#attach").click(function() {
      $(".attachement").toggle();
    });

    // Mostrar opciones de configuración
    $("#dset").click(function() {
      $(".setting-drop").toggle();
    });

    // Menú para nuevo grupo
    $("#toggleMenu").click(function() {
      $("#newGroupMenu").toggle();
    });
  });
</script>
@endsection
