<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mascotas extends BaseController
{


    public function index()
    {
        $db = \Config\Database::connect();
        $especies = model('EspecieModel')->findAll();
        $razas = model('RazaModel')->findAll();
        $dietas = model('DietaModel')->findAll();
        $mascotas = $db->query("select m.id, m.nombre as nombre, m.fecha_nacimiento as fecha_nacimiento,YEAR(CURDATE()) - YEAR(fecha_nacimiento) -
        (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(fecha_nacimiento, '%m%d')) AS edad , e.nombre as especie, r.nombre as raza, d.nombre as dieta
        from dietas d
            join mascotas m on d.id = m.dieta
            join razas r on m.raza = r.id
            join especies e on m.especie = e.id order by id asc;")->getResultArray();


        $data = [
            'title' => 'Mascotas',
            'especies' => $especies,
            'razas' => $razas,
            'dietas'=> $dietas,
            'mascotas' => $mascotas
        ];

        return view("mascota/mascota", $data);
    }

    public function agregar(){
        $mascotas = model("MascotaModel");
        $data = [
            'nombre' => $_POST['nombre'],
            'fecha_nacimiento'=> $_POST['fecha_nacimiento'],
            'especie'=> $_POST['especie'],
            'raza'=> $_POST['raza'],
            'dieta'=> $_POST['dieta'],
        ];

        $mascotas->insert($data);

        return redirect('mascotas');
    }

    public function eliminar($id){
        $mascotas = model("MascotaModel");
        $mascotas->delete($id);
        return redirect('mascotas');
    }
    
    public function editar($id){
        $db = \Config\Database::connect();
        $especies = model('EspecieModel')->findAll();
        $razas = model('RazaModel')->findAll();
        $dietas = model('DietaModel')->findAll();
        $mascota = model("MascotaModel") -> find($id);
        $mascotas = $db->query("select m.id, m.nombre as nombre, m.fecha_nacimiento as fecha_nacimiento,YEAR(CURDATE()) - YEAR(fecha_nacimiento) -
        (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(fecha_nacimiento, '%m%d')) AS edad , e.nombre as especie, r.nombre as raza, d.nombre as dieta
        from dietas d
            join mascotas m on d.id = m.dieta
            join razas r on m.raza = r.id
            join especies e on m.especie = e.id order by id asc;")->getResultArray();

        $data = [
            'title' => 'Mascotas',
            'especies' => $especies,
            'razas' => $razas,
            'dietas'=> $dietas,
            "mascota"=> $mascota,
            "mascotas"=> $mascotas
        ];
        return view('mascota/editar', $data);
    } 
    public function actualizar(){
        $mascotas = model('MascotaModel');

        $data = [
            'nombre' => $_POST['nombre'],
            'fecha_nacimiento'=> $_POST['fecha_nacimiento'],
            'especie'=> $_POST['especie'],
            'raza'=> $_POST['raza'],
            'dieta'=> $_POST['dieta']
        ];

        $mascotas->update($_POST['id_mascota'], $data);
        return redirect('mascotas');
    }
}