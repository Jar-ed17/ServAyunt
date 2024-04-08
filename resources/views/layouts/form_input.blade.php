@csrf
<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Sm_Av" class="block mb-2 text-sm font-medium text-gray-900">Sm/Av.</label>
        <input type="text" id="Sm_Av" name="Sm_Av" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">        
        {{-- ERROR --}}
        <span class="hidden text-red-700 hidden_msg" id="msg_error_sm_av"></span>        
    </div>  
    <input type="hidden" id="Latitud" name="Latitud">
    <input type="hidden" id="Longitud" name="Longitud">
    {{--  --}}                              
    <div class="mb-3 md:w-2/4">
        <label for="Id_medida_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus</label>
        <select id="Id_medida_fk" name="Id_medida_fk">                        
            @if (isset($lamparas))
                @foreach ($medidas as $row)
                    <option value="{{$row->id_medida}}">{{$row->tipo}} {{$row->descripcion}}</option>                                                    
                @endforeach
            @endif
        </select>                    
    </div>
</div>

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Id_transformador_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacidad de transformador</label>
        <select id="Id_transformador_fk" name="Id_transformador_fk">                        
            @if (isset($transformador))
                @foreach ($transformador as $row)
                    <option value="{{$row->id_transformador}}">{{$row->tipo}} {{$row->Voltaje}}</option>                                                    
                @endforeach
            @endif
        </select>                    
    </div>
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Circuito" class="block mb-2 text-sm font-medium text-gray-900">No Circuito</label>
        <input type="text" id="Circuito" name="Circuito" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
        {{-- ERROR --}}
        <span class="hidden text-red-700 hidden_msg" id="msg_error_circuito"></span>
    </div>                                  
</div>

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="NumMedidor" class="block mb-2 text-sm font-medium text-gray-900">No. Medidor</label>
        <input type="text" id="NumMedidor" name="NumMedidor" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>    
    {{--  --}}                                 
    <div class="mb-3 md:w-2/4">
        <label for="Luminarias" class="block mb-2 text-sm font-medium text-gray-900">Luminarias instaladas</label>
        <input type="text" id="Luminarias" name="Luminarias" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500" value="1">
    </div> 
</div>  
          
<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Id_estatus_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus del poste</label>
        <select id="Id_estatus_fk" name="Id_estatus_fk">                        
            @if (isset($estatus))
                @foreach ($estatus as $row)
                    <option value="{{$row->id_estatus}}">{{$row->tipo}} {{$row->descripcion}}</option>                                                    
                @endforeach
            @endif
        </select>                    
    </div>
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Id_lampara_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tecnologia</label>
        <select id="Id_lampara_fk" name="Id_lampara_fk">                        
            @if (isset($lamparas))
                @foreach ($lamparas as $row)
                    <option value="{{$row->id_lampara}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>                                              
</div> 

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="id_tipoLuminaria_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Luminaria</label>
        <select id="id_tipoLuminaria_fk" name="id_tipoLuminaria_fk">                        
            @if (isset($tipo_luminaria))
                @foreach ($tipo_luminaria as $row)
                    <option value="{{$row->id_lampara}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Id_potencia_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potencia (Watts)</label>
        <select id="Id_potencia_fk" name="Id_potencia_fk">                        
            @if (isset($potencia))
                @foreach ($potencia as $row)
                    <option value="{{$row->id_potencia}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
</div>  
  
<div class="justify-around block md:flex">      
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Etiqueta" class="block mb-2 text-sm font-medium text-gray-900">No. de Etiqueta</label>
        <input type="text" id="Etiqueta" name="Etiqueta" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>     
    {{--  --}}   
    <div class="mb-3 md:w-2/4">
        <label for="Id_poste_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de poste</label>
        <select id="Id_poste_fk" name="Id_poste_fk">                        
            @if (isset($tipoposte))
                @foreach ($tipoposte as $row)
                    <option value="{{$row->id_poste}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>                 
</div>   

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Id_dependencia_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dependencia</label>
        <select id="Id_dependencia_fk" name="Id_dependencia_fk">                        
            @if (isset($dependencia))
                @foreach ($dependencia as $row)
                    <option value="{{$row->id_dependencia}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Id_altura_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Altura</label>
        <select id="Id_altura_fk" name="Id_altura_fk">                        
            @if (isset($altura))
                @foreach ($altura as $row)
                    <option value="{{$row->id_altura}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="Observaciones" class="block mb-2 text-sm font-medium text-gray-900">Observaciones</label>
    <textarea name="Observaciones" id="Observaciones" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500" rows="3"></textarea>
</div>            
{{-- <div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="RPU" class="block mb-2 text-sm font-medium text-gray-900">RPU</label>
        <input type="text" id="RPU" name="RPU" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>  
              
    <div class="mb-3 md:w-2/4">
        <label for="Municipalizado" class="block mb-2 text-sm font-medium text-gray-900">Municipalizado</label>
        <input type="text" id="Municipalizado" name="Municipalizado" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>
</div>--}}