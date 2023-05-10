<?php

class Mapping {

  public static function map(){

        return [

           "1" => "auth@login",
           "2" => "auth@choice",
           "3" => "auth@logout",
           "4" => "auth@logout",
           "5" => "backend/Users@edit",
           "555" => "backend/Password@restablecer_pass",
           "6" => "backend/Password@editas",
           "7" => "home@index",
           "8" => "auth@index",
           

            ///******RUTAS PROYECTO------------------------------

           "20" => "backend/dashboard@index",
           "21" => "backend/users@index",
           "22" => "backend/groups@index",
           "25" => "backend/dashboard@perfil",
           
      
           //modulo comunidad
           "31" => "backend/comunidad/Controller_institucion@admin_institucion",
           "32"=> "backend/comunidad/Controller_institucion@guardar_comunidad",

          //Modulo portada

           "40"=> "backend/comunidad/Controller_portada@index",
           "41" => "backend/comunidad/Controller_portada@guardar_portada",
           "42" => "backend/comunidad/Controller_portada@editar_portada",

          //modulo Usuario

           "26" => "Registrarusuario@index",
           "27" => "Registrarusuario@insertarusuario",
           "28" => "Registrarusuario@confirmaremail",
           "29" => "Registrarusuario@vista_confirmacionemail",
           "30" => "Registrarusuario@vista_reenviar_confirmacionemail",
           "250" => "Registrarusuario@reenviarcodigoconfirmacionemail",

          // Modulo Tienda

          "49"=> "backend/configuraciones/Controller_tienda@productotresd",
          "50"=> "backend/configuraciones/Controller_tienda@index",          
          "51"=> "backend/configuraciones/Controller_tienda@adicionar",
          "52"=> "backend/configuraciones/Controller_tienda@tienda_editar",
          "53"=> "backend/configuraciones/Controller_tienda@editar_producto",
          "54"=> "backend/configuraciones/Controller_tienda@cambiar_estado_producto",
          "55"=> "backend/configuraciones/Controller_tienda@oferta_producto",

          //vista tienda

          "56"=> "Controller_techbo@vista_tienda",
          "61"=> "Controller_techbo@vista_detalle_tienda",

          "62"=> "Controller_techbo@vista_tienda_producto",
          "63"=> "Controller_techbo@vista_tienda_producto_pro",
          "64"=> "Controller_techbo@vista_tienda_producto_temporada",
          
          //inventario
          "65"=> "backend/configuraciones/Controller_tienda@index_inventario",
          "66"=> "backend/configuraciones/Controller_tienda@adicionar_inventario",
          "67"=> "backend/configuraciones/Controller_tienda@editar_inventario",
          "68"=> "backend/configuraciones/Controller_tienda@estado_tienda",

          //productos adquiridos
          "70"=> "backend/configuraciones/Controller_tienda@index_venta",
          "71"=> "backend/configuraciones/Controller_tienda@adicionar_inventario",
          
          //Modulo categoria tienda 

          "86"=> "backend/configuraciones/Controller_categoria@index",
          "87"=> "backend/configuraciones/Controller_categoria@adicionar",
          "88"=> "backend/configuraciones/Controller_categoria@editar",
            
          "100"=> "Controller_techbo@vista_detalle_carrito",
          "101"=> "Controller_techbo@vista_categoria_detalle",


          "110"=> "backend/configuraciones/Controller_tienda@mostrar_reporte",

        //****************************FRONTEND**********************************************


         //ingresar

            "400" => "auth/login",

        //****************************FRONTEND**********************************************   
             "191" => "Controller_techbo@index",
             "188" => "Controller_techbo@tienda",
             "189" => "Controller_techbo@tienda_categoria",
             "190" => "Controller_techbo@producto",
             "191" => "Controller_techbo@investigacion",
             "192" => "Controller_techbo@vista_servicios",
             "193" => "Controller_techbo@vista_servicios_detalle",
             "194" => "Controller_techbo@vista_investigacion_detalle",


                                                               



       ];

   }



public static function menus()  {

  $ion = new Ion_auth();
  if ($ion->in_group('members')){
      $data["members"] ["Te perdiste!!!"] = "00000";
  }

  if ($ion->in_group('admin'))  {
      $data = [
        "Inicio" => [
          "Inicio" =>"20",
        ], 
        "Administración" => [
          "Usuario" => "21",  
          "Seguridad grupo" =>"22",
          // "calendario" =>"245",
        ],
        "Comunidad" => [
          "Portada" => "40",
          "Institucion" => "31",
        ],
        "Inventario" => [
          "Inventario" => "65",
          "Productos Adquiridos" => "70",
          // "Ofertas" => "50",
        ],
        "Tienda" => [
          "Categoria" => "86",
          "Productos" => "50",
        ],

      ];

  }

  if ($ion->in_group('marketing'))  {
    $data = [
        "Inicio" => [
            "Inicio" =>"20",
        ],
        "Diseño" => [
            "Portada" => "40",
            "Institucion" => "31",

        ],
    ];
  }
    

    ////////////////////////////////**************************************///////////////////////////////////////

    if ($ion->in_group('encargado'))  {  

      $data = [

          "Inicio" => [

           "Inicio" =>"20",
          ],
      ];

    }

    return $data;

}

    



    

    public static function iconn()

    {

        $vec_iconos = array(

            'fe fe-airplay',

            'fe fe-airplay',

            'fe fe-database',

            'fe fe-box',

            'fe fe-layout',

            'fe fe-layers',

            'fe fe-package',

        );

        return $vec_iconos;

    }



    

    

}

