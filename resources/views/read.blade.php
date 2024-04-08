
@extends('layouts.app')

@section('title', '')

@section('meta_description', '')

@section('content')

{{-- @dump($lamparas) --}}

{{-- @dump($data) --}}
<main class="px-5">
    {{-- rtl:text-right  text-left--}}
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">
        <table id="table" class="max-w-full text-sm text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">id</th>              
                    <th scope="col" class="px-6 py-3">Editar</th>
                    <th scope="col" class="px-6 py-3">Sm_Av</th>
                    <th scope="col" class="px-6 py-3">Latitud</th>
                    <th scope="col" class="px-6 py-3">Longitud</th>
                    <th scope="col" class="px-6 py-3">Circuito</th>
                    <th scope="col" class="px-6 py-3">Etiqueta</th>
                    <th scope="col" class="px-6 py-3">Luminarias</th>
                    <th scope="col" class="px-6 py-3">created_at</th>
                    <th scope="col" class="px-6 py-3">Fecha</th>
                    <th scope="col" class="px-6 py-3">NumMedidor</th>
                    <th scope="col" class="px-6 py-3">Observaciones</th>                
                </tr>
            </thead>
            <tbody></tbody>
        </table>    
    </div>

{{-- modal --}}
  <!-- Main modal data-modal-backdrop="static" -->
<div id="Modal_static" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Editar registro
                    </h3>
                    <button type="button" id="btn_close_modal" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
            <form action="" method="post" id="form_update">
                <input type="hidden" id="id" name="id" class="p-0 m-0">{{-- hidden --}}
                <div class="p-4 space-y-4 md:p-2">                    
                    @include('layouts.form_input')                                        
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">      
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Actualizar</button>            
                    <button type="button" id="btn_cancelar_modal" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-700 rounded-lg border border-gray-200 hover:bg-red-500 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
  
  
    
</main>


@endsection