<?php

//namespace App\Controllers;

//use CodeIgniter\Controller;
//use Config\Database;

//class PruebaDB extends Controller
//{
   // public function index()
   // {
       // try {
          //  $db = Database::connect();
          //  if ($db->connID) {
           //     echo "✅ Conexión a la base de datos desde CodeIgniter exitosa.";
          //  } else {
         //       echo "❌ No se pudo conectar desde CodeIgniter.";
        //    }
       // } catch (\Exception $e) {
       //     echo "❌ Error de conexión: " . $e->getMessage();
      //  }
  //  }
//} 
?>
<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class PruebaDb extends Controller
{
    public function index()
    {
        return "👋 Hola, este es el índice del controlador PruebaDb";
    }

    public function insertar()
    {
        $db = Database::connect();

        $datos = [
            'nombre' => 'Firulais',
            'especie' => 'Perro'
        ];

        $builder = $db->table('mascotas');
        $exito = $builder->insert($datos);

        if ($exito) {
            return "✅ Inserción exitosa";
        } else {
            return "❌ Error al insertar";
        }
    }
}