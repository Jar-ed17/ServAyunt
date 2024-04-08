<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concentrado;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    public function CreateData (Request $request) {        
        $validated = $request->validate([
            'Sm_Av' => 'required',
            'Circuito' => 'required',
        ]);
            
        try {                        
            Concentrado::create($request->all());                                      
            return response()->json(['result' => '1', 'msg' => 'Datos guardados correctamente']);
        } catch (\Throwable $th) {                        
            return response()->json(['result' => '0', 'msg' => 'Error al guardar los datos']);
        }        
    }
    
    public function UpdateData (Request $request) {
        $data = $request->except('Latitud', 'Longitud', '_token');
        // return $data;    
        try {
            Concentrado::where('id', $request->id)->update($data);    
            return response()->json(['result' => '1', 'msg' => 'Datos actulizados correctamente']);
        } catch (\Throwable $th) {            
            return response()->json(['result' => '0', 'msg' => 'Error al actualizar los datos']);
        }
        
    }

    public function table () {        
        $a_data = Concentrado::select('id', 'Sm_Av', 'Latitud', 'Longitud',
        'Circuito', 'Etiqueta', 'Luminarias', 'created_at', 'NumMedidor', 
        'Observaciones')->get();   
        foreach ($a_data as $data) {
            $fecha  = Carbon::parse($data->created_at)->format('d/m/Y');            
            $data->show_fecha = $fecha;            
            $data->boton = '<button id="btn_show" class="block px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" type="button">Editar</button>';
        }        
        return response()->json(['data' => $a_data]);        
    }

    public function ShowData(Request $request) {      
        /* cambiar los procesos el seelct para que pueda traer datos que se ingresaron a mano */  
        $a_data =  Concentrado::select()->where('id', $request->id)->get();
        return $a_data;
    }

    public function ExcelConcentrado() {
        
        $a_data = Concentrado::select(
        'concentrado.Sm_Av',
        'concentrado.Latitud', 
        'concentrado.Longitud', 
        'concentrado.Circuito', 
        'concentrado.Etiqueta', 
        'concentrado.Luminarias', 
        DB::raw('COALESCE(medidas.Descripcion, concentrado.id_medida_fk) AS Medida'), 
        DB::raw('COALESCE(lamparas.descripcion, concentrado.id_lampara_fk) AS lamparatecnologia'), 
        DB::raw('COALESCE(potencia.descripcion, concentrado.id_potencia_fk) AS potencia'), 
        DB::raw('COALESCE(tipoposte.descripcion, concentrado.id_poste_fk) AS poste'),
        DB::raw('COALESCE(dependencia.descripcion, concentrado.id_dependencia_fk) AS dependencia'), 
        DB::raw('COALESCE(altura.descripcion, concentrado.id_altura_fk) AS altura'),
        DB::raw('COALESCE(estatus.descripcion, concentrado.id_estatus_fk) AS estatus'), 
        DB::raw('COALESCE(transformador.Voltaje, concentrado.id_transformador_fk) AS voltaje'),        
        'concentrado.NumMedidor',
        'concentrado.Observaciones')
        ->leftjoin('medidas','concentrado.id_medida_fk','=','medidas.id_medida')
        ->leftjoin('lamparas','concentrado.id_lampara_fk','=','lamparas.id_lampara')
        ->leftjoin('potencia','concentrado.id_potencia_fk','=','potencia.id_potencia')
        ->leftjoin('tipoposte','concentrado.id_poste_fk','=','tipoposte.id_poste')
        ->leftjoin('dependencia','concentrado.id_dependencia_fk','=','dependencia.id_dependencia')
        ->leftjoin('altura','concentrado.id_altura_fk','=','altura.id_altura')
        ->leftjoin('estatus','concentrado.id_estatus_fk','=','estatus.id_estatus')
        ->leftjoin('transformador','concentrado.id_transformador_fk','=','transformador.id_transformador')
        // ->where('shoppingcart.idUsuario_fk', $id_user)
        ->get();   

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="concentrado.xlsx"');
        header('Cache-Control: max-age=0');
        $val = 2;
        $index = 1;

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        /* head del documento */
        $activeWorksheet->setCellValue('A1', 'No.');
        $activeWorksheet->setCellValue('B1', 'Sm/Av');
        $activeWorksheet->setCellValue('C1', 'Latitud');
        $activeWorksheet->setCellValue('D1', 'Longitud');
        $activeWorksheet->setCellValue('E1', 'Estatus tension');
        $activeWorksheet->setCellValue('F1', 'Circuito');
        $activeWorksheet->setCellValue('G1', 'Luminarias instaladas');
        $activeWorksheet->setCellValue('H1', 'Tipo de luminaria');
        $activeWorksheet->setCellValue('I1', 'Tecnologia');
        $activeWorksheet->setCellValue('J1', 'Potencia watts');
        $activeWorksheet->setCellValue('K1', 'Etiqueta');        
        $activeWorksheet->setCellValue('L1', 'Tipo Poste');
        $activeWorksheet->setCellValue('M1', 'Dependencia');
        $activeWorksheet->setCellValue('N1', 'Altura metros');        
        $activeWorksheet->setCellValue('O1', 'Num Medidor');
        $activeWorksheet->setCellValue('P1', 'Observaciones');
        $activeWorksheet->setCellValue('Q1', 'Estatus');        
        /* define el tamaño de las columnas */
        $activeWorksheet->getColumnDimension('A')->setWidth(25);
        $activeWorksheet->getColumnDimension('B')->setWidth(25);
        $activeWorksheet->getColumnDimension('C')->setWidth(25);
        $activeWorksheet->getColumnDimension('D')->setWidth(25);
        $activeWorksheet->getColumnDimension('E')->setWidth(25);
        $activeWorksheet->getColumnDimension('F')->setWidth(25);
        $activeWorksheet->getColumnDimension('G')->setWidth(25);
        $activeWorksheet->getColumnDimension('H')->setWidth(25);
        $activeWorksheet->getColumnDimension('I')->setWidth(25);
        $activeWorksheet->getColumnDimension('J')->setWidth(25);
        $activeWorksheet->getColumnDimension('K')->setWidth(25);
        $activeWorksheet->getColumnDimension('L')->setWidth(25);
        $activeWorksheet->getColumnDimension('M')->setWidth(25);
        $activeWorksheet->getColumnDimension('N')->setWidth(25);
        $activeWorksheet->getColumnDimension('O')->setWidth(25);
        $activeWorksheet->getColumnDimension('P')->setWidth(25);
        $activeWorksheet->getColumnDimension('Q')->setWidth(25);    
        /* imprime los datos */
        foreach ($a_data as $row){
            $activeWorksheet->setCellValue('A'. $val, $index);
            $activeWorksheet->setCellValue('B'. $val, $row->Sm_Av);
            $activeWorksheet->setCellValue('C'. $val, $row->Latitud);
            $activeWorksheet->setCellValue('D'. $val, $row->Longitud);
            $activeWorksheet->setCellValue('E'. $val, $row->Medida);
            $activeWorksheet->setCellValue('F'. $val, $row->Circuito);
            $activeWorksheet->setCellValue('G'. $val, $row->Luminarias);
            $activeWorksheet->setCellValue('H'. $val, $row->lamparatecnologia);
            $activeWorksheet->setCellValue('I'. $val, $row->lamparatecnologia);
            $activeWorksheet->setCellValue('J'. $val, $row->potencia);
            $activeWorksheet->setCellValue('K'. $val, $row->Etiqueta);
            $activeWorksheet->setCellValue('L'. $val, $row->poste);
            $activeWorksheet->setCellValue('M'. $val, $row->dependencia);
            $activeWorksheet->setCellValue('N'. $val, $row->altura);
            $activeWorksheet->setCellValue('O'. $val, $row->NumMedidor);     
            $activeWorksheet->setCellValue('P'. $val, $row->Observaciones);     
            $activeWorksheet->setCellValue('Q'. $val, $row->estatus);       
            $val ++;     
            $index++;
        }
        // Obtener el rango de celdas que cubren todas las columnas
        $lastColumn = $activeWorksheet->getHighestColumn();
        $range = 'A1:' . $lastColumn . $activeWorksheet->getHighestRow();
        // Alinear el texto a la izquierda en todas las columnas
        $alignment = $activeWorksheet->getStyle($range)->getAlignment();
        $alignment->setHorizontal(Alignment::HORIZONTAL_LEFT);
        
        /* descarga el excel */
        $writer = new Xlsx($spreadsheet);        
        $writer->save('php://output'); 
        
        //agrega formulas
        // $activeWorksheet->setCellValue('D2', '=SUM(A2:C2)');
        // Establecer el color de fondo de una celda
        // $activeWorksheet->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        // Establecer el color de fuente de una celda
        // $activeWorksheet->getStyle('A1')->getFont()->getColor()->setARGB('FF0000');
        // select('shoppingcart.id', 'productos.Nombre', 'shoppingcart.Cantidad', 'shoppingcart.Precio', 'shoppingcart.Extra', 'categorias.Categoria')
        // ->leftjoin('productos','productos.id','=','shoppingcart.IdProducto_fk')
        // ->leftjoin('categorias','productos.idCategoria_fk','=','categorias.id')
        // ->where('shoppingcart.idUsuario_fk', $id_user)
        // ->get();
    } 
}
