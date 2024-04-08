import $, { parseJSON } from "jquery";
import 'flowbite';
import DataTable from 'datatables.net-dt';
import TomSelect from "tom-select";
import 'tom-select/dist/css/tom-select.css';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import 'tom-select/dist/js/tom-select.complete'

/* menu */
let btn_navbar = document.getElementById('btn-navbar');
let content_menu = document.getElementById('navbar-default');

$(document).ready(function () {

    let table = new DataTable('#table', {
        reponsive: true,
        processing: true,   
        searching: true,     
        // serverSide: true,
        ajax: {
            url: '/gettable',
            dataSrc: 'data'
        },
        "columnDefs":[
            {
            "targets": [0, 8], // Índice de la columna que deseas ocultar (comienza desde 0)
            "visible": false, // Establece esta columna como no visible
            "searchable": false
           }           
        ],
        "columns":[ 
            { data: 'id'},
            { data: 'boton'},            
            { data: 'Sm_Av'},
            { data: 'Latitud'},
            { data: 'Longitud'},
            { data: 'Circuito'},
            { data: 'Etiqueta'},
            { data: 'Luminarias'},         
            { data: 'created_at'},
            { data: 'show_fecha'},
            { data: 'NumMedidor'},
            { data: 'Observaciones'},            
        ]
    });

    $('#table tbody').on('click', '#btn_show', function() {
        var rowData = table.row($(this).closest('tr')).data(); // Obtener los datos de la fila
        var id = rowData.id; // Obtener el valor de la columna 'id' de los datos de la fila        
        $("#Modal_static").removeClass('hidden')  
        $("#Modal_static").addClass('flex')        
        $("#id").val(id);
        ShowData(id)    
    });

    /* CIERRAN EL MODAL */
    $("#btn_close_modal").on('click', function () {        
        $("#Modal_static").addClass('hidden')
    })

    $("#btn_cancelar_modal").on('click',  function () {
        $("#Modal_static").addClass('hidden')
    })

    /* MUESTRA LOS DATOS EN EL MODAL */
    function ShowData(id) {                
        $.ajax({
            type: 'GET',
            url: '/ShowData', 
            data:{
                id: id                        
            },                    
            success: function(data){  

                data.forEach(element => {                               
                    $("#Sm_Av").val(element.Sm_Av)
                    $("#Latitud").val(element.Latitud)
                    $("#Longitud").val(element.Longitud)
                    $("#Id_medida_fk").val(element.Id_medida_fk)
                    $("#Id_transformador_fk").val(element.Id_transformador_fk)
                    $("#Circuito").val(element.Circuito)
                    $("#NumMedidor").val(element.NumMedidor)
                    $("#Luminarias").val(element.Luminarias)
                    $("#Id_estatus_fk").val(element.Id_estatus_fk)
                    $("#Id_lampara_fk").val(element.Id_lampara_fk)
                    $("#id_tipoLuminaria_fk").val(element.id_tipoLuminaria_fk)
                    $("#Id_potencia_fk").val(element.Id_potencia_fk)
                    $("#Etiqueta").val(element.Etiqueta)
                    $("#Id_poste_fk").val(element.Id_poste_fk)
                    $("#Id_dependencia_fk").val(element.Id_dependencia_fk)
                    $("#Id_altura_fk").val(element.Id_altura_fk)
                    $("#Observaciones").val(element.Observaciones)
                });                
            },
            error: function(xhr, status, error){        
                console.error(error)                
            }
        });
    }

    let  id_medida = document.getElementById("Id_medida_fk");
    let  id_lampara = document.getElementById("Id_lampara_fk");
    let Id_potencia_fk  = document.getElementById("Id_potencia_fk");
    let  Id_poste_fk = document.getElementById("Id_poste_fk");
    let Id_dependencia_fk  = document.getElementById("Id_dependencia_fk");
    let  Id_altura_fk = document.getElementById("Id_altura_fk");
    let  Id_transformador_fk = document.getElementById("Id_transformador_fk");
    let  Id_estatus_fk = document.getElementById("Id_estatus_fk");
    let  id_tipoLuminaria_fk = document.getElementById("id_tipoLuminaria_fk");


    if (id_medida) {
        new TomSelect("#Id_medida_fk", {            
            create: true,        
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (id_lampara) {
        new TomSelect("#Id_lampara_fk", {
            create: true,        
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    
    if (Id_potencia_fk) {
        new TomSelect("#Id_potencia_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_poste_fk) {
        new TomSelect("#Id_poste_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_dependencia_fk) {
        new TomSelect("#Id_dependencia_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_altura_fk) {
        new TomSelect("#Id_altura_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_transformador_fk) {
        new TomSelect("#Id_transformador_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_estatus_fk) {
        new TomSelect("#Id_estatus_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    
    if (id_tipoLuminaria_fk) {
        new TomSelect("#id_tipoLuminaria_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    $("#form-data").on('submit', function (e) {
        e.preventDefault();        
        var formData = $(this).serialize();        
        $.ajax({
            type: 'POST',
            url: '/CreateData', 
            data: formData,                     
            success: function(data){                       
                var result = data.result
                if (result == 1) {
                    $(".hidden_msg").addClass('hidden');
                    alert(data.msg)                   
                }
            },
            error: function(xhr, status, error){        
                let errors  = xhr.responseJSON.errors;  
                console.error(error)
                if (errors.Circuito) {
                    $("#msg_error_circuito").removeClass('hidden')
                    $("#msg_error_circuito").text(errors.Circuito)           
                } else {
                    $("#msg_error_circuito").addClass('hidden')
                    $("#msg_error_circuito").text('')
                }

                if (errors.Sm_Av) {                    
                    $("#msg_error_sm_av").removeClass('hidden')
                    $("#msg_error_sm_av").text(errors.Sm_Av)            
                } else {
                    $("#msg_error_sm_av").addClass('hidden')
                    $("#msg_error_sm_av").text('')  
                }      
            }
        });
    });

    $("#form_update").on('submit', function (e) {
        e.preventDefault();        
        var formData = $(this).serialize();        
        $.ajax({
            type: 'POST',
            url: '/UpdateData', 
            data: formData,                     
            success: function(data){                       
                var result = data.result
                if (result == 1) {                    
                    table.ajax.reload()
                    alert(data.msg)                   
                }
            },
            error: function(xhr, status, error){                        
                console.error(error)                   
            }
        });
    });
})

btn_navbar.addEventListener('click', DisplayMenu);

function DisplayMenu() {
    if (content_menu.classList.contains('hidden')) {
        content_menu.classList.remove('hidden')    
    } else {
        content_menu.classList.add('hidden')    
    }
}

/* obtiene la ubicacion actual del usuario */
const options = {
    enableHighAccuracy: false,
    timeout: 5000,
    maximumAge: 0,
};
  
var latitud
var longitud

function success(pos) {
    const crd = pos.coords;        
    latitud =  crd.latitude
    longitud =  crd.longitude

    $("#Latitud").val(crd.latitude)
    $("#Longitud").val(crd.longitude)
    // latitud.value = crd.latitude;
    // longitud.value = crd.longitude;
}
  
function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

navigator.geolocation.getCurrentPosition(success, error, options);     

/* ejemplo por si el suario uno tiene internet */
if (navigator.onLine) {
    alert("se restablecio el nternet :)");
} else {
   alert(`en este momento no tiene internet :( pero puedes guardar datos de manera local latitud = ${latitud}   longitud = ${longitud}`);
}

/* GUARDAR DATOS */
// form_data.addEventListener('keydown', keydowOff)
// function keydowOff(e) {
//     if (e.key === 'Enter') {
//         e.preventDefault(); // Evitar la acción predeterminada del Enter
//     }
// }
// console.log("Tu ubicación actual es:");
// console.log(`Latitud : ${crd.latitude}`);
// console.log(`Longitud: ${crd.longitude}`);
// console.log(`Más o menos ${crd.accuracy} metros.`);