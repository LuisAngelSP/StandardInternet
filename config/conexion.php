<?php  

//     session_start();



// /**INCIAMOS CLASE CONECTAR */
// class Conectar{

//     protected $dbh;
//     /**FUNCION PROTEGIDA DE LA CADENA DE CONEXION */
//     protected function conexion(){
//         // try{
//         //     //Primera base de datos
//         //     $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=bdestandar","root","");
//         //     return $conectar;
//         // }catch(Exception $e){
//         //     print "Error en la conexión: ".$e->getMessage()."<br>";
//         //        die();
        
//         // 
//             try{
//                 $conectar= $this->dbh= new PDO("mysql:local=estandarinternet.com; dbname=bdestandarv2","user1bdstdv2","user1bdestandar12345");
//                 return $conectar;
//             }catch(Exception $e2){
//                 // Si hay error en ambas conexiones, se imprime el error
//                 print "Error en la conexión: ".$e2->getMessage()."<br>";
//                 die();
//             }
        



//     }
//     /**PARA IMPEDIR QUE TENGAMOS PROBLEMAS CON LA Ñ O TILDES */
//     public function set_names(){

//         return $this->conexion()->query("SET NAMES 'utf8'");
//     }
//     /**RUTA PRINCIPLA DEL PROYECTO */
//     public static function ruta() {
//         return "http://estandarinternet.com/Standar_Internet/";
//      //return "http://estandarinternet.com/Prueba/";

//     }
// }

  // session_start();
   class Conectar{
   	   protected $dbh;
        public function estaLocalmente(){
          $isLocalRunning = false;
          if ($isLocalRunning){
            return 1;
          }else{
            return 0;
          }
        }
   	   protected function conexion(){
        
        $isLocalRunning = true;
        if ($isLocalRunning){
          $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=bdestandar","root","");
        }else{
          $conectar= $this->dbh= new PDO("mysql:local=estandarinternet.com; dbname=bdestandarv2","user1bdstdv2","user1bdestandar12345");
        }
        return $conectar;
   	   }

   	   public function set_names(){

   	   	 return $this->dbh->query("SET NAMES 'utf8'");
   	   }

   	  
        public function ruta(){

          $isLocalRunning = true;
          if ($isLocalRunning){
            return "http://localhost/Standar_Internet/";
          }else{
            // return "http://estandarinternet.com/Prueba/";
          }          
          //return "http://localhost:90/wispv2/";
          //return "http://estandarinternet.com/wispV2/";


          /* if($this->variableEsLocal==1){
            return "http://localhost:90/wispv2/";
          }else{
            return "http://estandarinternet.com/wispV2/";

          } */
        }
       
       

    }



?>