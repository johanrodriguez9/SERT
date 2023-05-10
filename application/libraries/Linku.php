<?php

class Linku {
  
    public function __construct()
    {
        
    }

//    public function menus()
//    {
//        $ion = new Ion_auth();
//        
//        $menus = array();      
//        if ($ion->in_group('admin'))
//        {   
//       $menus=  array_merge($menus, $this->menu_admin());      
//        }
//        if ($ion->in_group('jefatura'))
//        {
//           $menus=   array_merge($menus, $this->jefatura());
//        }
//        if ($ion->in_group('tecnico'))
//        { 
//          $menus=   array_merge($menus, $this->menu_tecnico());
//        }
//        if ($ion->in_group('archivo'))
//        { 
//           $menus=    array_merge($menus, $this->menu_archivo());
//        } 
//        if ($ion->in_group('members'))
//        { 
//           $menus=    array_merge($menus, $this->menu_members());
//        } 
//        return $menus;
//    }
//
//    private function menu_admin()
//    {
//        $data = [
//            "ADdministrador" => [
//                "admin" => base_url('setings/formu'),
//            ],
//        
//             "Administrar Usuarios" => [
//           
//                "Listar Usuarios" => site_url('Auth/listar_usuarios'),
//                "create_user" => site_url('Auth/create_user'),
//                "edit_user" => site_url('Auth/edit_user'),
//                "change_password" => site_url('Auth/change_password'),
//                "forgot_password" => site_url('Auth/forgot_password'),
//                "reset_password" => site_url('Auth/reset_password'),
//                "activate" => site_url('Auth/activate'),
//                "deactivate" => site_url('Auth/deactivate'),
//                "create_group" => site_url('Auth/create_group'),
//                "edit_group" => site_url('Auth/edit_group'),
//            ],
//        ];
////        if (Usuario::me()->id_carrera == 25)
////        {
////            $data["Acta de CalifiaciÃ³n"]["Importar Actas de Ingenieria"] = "170";
////        }
//        return $data;
//    }
//
//    private function jefatura()
//    {
//        $data = [
//        
//            "Imprimir Titulos " => [
//                "Rejistrar-e- imprimir" => base_url('titulado_diploma/titulo_diploma_controller/listar_titulado'),
//                "Subir-e-Archivos " => base_url('titulado_diploma/titulo_diploma_controller/subir_archivo'),
//                "Registrar firmas" => base_url('administrador/titulaciones/imprimir_licenciatura'),
//               
//                "<span style='font-size:10px'> Listar Titulados </span>" => "145",
//               
//                "Total titulados" => "214"],
//                "primer sub menuu" => [
//                "SUPERADMIN" => base_url('setings/formu'),
//                "Reporte" => site_url('setings/reporte'),
//                "menu  3" => "103",
//            ],
//         
//        ];
////        if (Usuario::me()->id_carrera == 25)
////        {
////            $data["Acta de CalifiaciÃ³n"]["Importar Actas de Ingenieria"] = "170";
////        }
//
//        return $data;
//    }
//
//    private function menu_tecnico()
//    {
//        $data = [
//            "Revision" => [
//                "1ra Verificacion de Documentos (REQUISITOS)" =>  base_url('RevisionController'),
//                "2da Revision de Documentos (REQUISITOS)" => base_url('Segunda_RevisionController'),
//                "3ra Revision de Documentos con Form. UTD-B" =>  base_url('Tercera_RevisionController'),
//                "Reporte de Revision"=>  base_url('Reporte_RevisionController'),
//            ],        
//        ];
//
//        return $data;
//    }
//
//    private function menu_archivo()
//    {
//        $data = [
//            "Archivos Impresiones" => [
//                
//                "archivista 100" => 'rrrrrrrrr',
//                "Reporte" => site_url('setings/reporte'),
//                "menu  3" => "103",
//            ],
//        ];
//
//        return $data;
//    }
//
//     private function menu_members()
//    {
//        $data = [
//            "Usuario Default" => [
//                "archivista 100" => 'rrrrrrrrr',
//                "Reporte" => site_url('setings/reporte'),
//                "menu  3" => "103",
//            ],
//        ];
//
//        return $data;
//    }
//
//    
//    
    
    public function iconos()
    {
        $vec_iconos = array(
            'fa fa-home',
            'fa fa-edit',
            'fa fa-desktop',
            'fa fa-table',
            'fa fa-bar-chart-o',
            'fa fa-bug',
            'fa fa-windows',
            'fa fa-laptop',
            'fa fa-user',
            'fa fa-adjust',
            'fa fa-anchor',
            'fa fa-archive',
            'fa fa-area-chart',
            'fa fa-arrows',
            'fa fa-arrows-h',
            'fa fa-arrows-v',
            'fa fa-asterisk',
            'fa fa-at',
            'fa fa-ban',
            'fa fa-bank',
            'fa fa-bar-chart',
            'fa fa-bar-chart-o',
            'fa fa-barcode',
            'fa fa-home',
            'fa fa-edit',
            'fa fa-desktop',
            'fa fa-table',
            'fa fa-bar-chart-o',
            'fa fa-bug',
            'fa fa-windows',
            'fa fa-laptop',
            'fa fa-user',
            'fa fa-adjust',
            'fa fa-anchor',
            'fa fa-archive',
            'fa fa-area-chart',
            'fa fa-arrows',
            'fa fa-arrows-h',
            'fa fa-arrows-v',
            'fa fa-asterisk',
            'fa fa-at',
            'fa fa-ban',
            'fa fa-bank',
            'fa fa-bar-chart',
            'fa fa-bar-chart-o',
            'fa fa-barcode',
            'fa fa-home',
            'fa fa-edit',
            'fa fa-desktop',
            'fa fa-table',
            'fa fa-bar-chart-o',
            'fa fa-bug',
            'fa fa-windows',
            'fa fa-laptop',
            'fa fa-user',
            'fa fa-adjust',
            'fa fa-anchor',
            'fa fa-archive',
            'fa fa-area-chart',
            'fa fa-arrows',
            'fa fa-arrows-h',
            'fa fa-arrows-v',
            'fa fa-asterisk',
            'fa fa-at',
            'fa fa-ban',
            'fa fa-bank',
            'fa fa-bar-chart',
            'fa fa-bar-chart-o',
            'fa fa-barcode',
            'fa fa-home',
            'fa fa-edit',
            'fa fa-desktop',
            'fa fa-table',
            'fa fa-bar-chart-o',
            'fa fa-bug',
            'fa fa-windows',
            'fa fa-laptop',
            'fa fa-user',
            'fa fa-adjust',
            'fa fa-anchor',
            'fa fa-archive',
            'fa fa-area-chart',
            'fa fa-arrows',
            'fa fa-arrows-h',
            'fa fa-arrows-v',
            'fa fa-asterisk',
            'fa fa-at',
            'fa fa-ban',
            'fa fa-bank',
            'fa fa-bar-chart',
            'fa fa-bar-chart-o',
            'fa fa-barcode', 'fa fa-home',
            'fa fa-edit',
            'fa fa-desktop',
            'fa fa-table',
            'fa fa-bar-chart-o',
            'fa fa-bug',
            'fa fa-windows',
            'fa fa-laptop',
            'fa fa-user',
            'fa fa-adjust',
            'fa fa-anchor',
            'fa fa-archive',
            'fa fa-area-chart',
            'fa fa-arrows',
            'fa fa-arrows-h',
            'fa fa-arrows-v',
            'fa fa-asterisk',
            'fa fa-at',
            'fa fa-ban',
            'fa fa-bank',
            'fa fa-bar-chart',
            'fa fa-bar-chart-o',
            'fa fa-barcode'
        );
        return $vec_iconos;
    }

}
