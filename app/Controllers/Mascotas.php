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
        $mascotas = $db->query("select * from mascota_informacion;")->getResultArray();


        $data = [
            'title' => 'Mascotas',
            'especies' => $especies,
            'razas' => $razas,
            'dietas' => $dietas,
            'mascotas' => $mascotas
        ];

        return view("mascota/mascota", $data);
    }

    public function agregar()
    {
        $mascotas = model("MascotaModel");
        $data = [
            'nombre' => $_POST['nombre'],
            'fecha_nacimiento' => $_POST['fecha_nacimiento'],
            'especie' => $_POST['especie'],
            'raza' => $_POST['raza'],
            'dieta' => $_POST['dieta'],
        ];

        $mascotas->insert($data);

        return redirect('mascotas');
    }

    public function eliminar($id)
    {
        $db = \Config\Database::connect();

        // Iniciar la transacción
        $db->transBegin();

        try {
            $query = $db->query("SELECT id FROM mascotas_adoptadores WHERE id_mascota = $id");
            $adoptadorId = $query->getRow()->id;

            $db->query("DELETE FROM mascotas_adoptadores WHERE id = $adoptadorId");
            $db->query("DELETE FROM mascotas WHERE id = $id");

            $db->transCommit(); // Confirmar la transacción
        } catch (\Exception $e) {
            $db->transRollback(); // Revertir la transacción en caso de error
            throw $e;
        }

        return redirect('mascotas');
    }

    public function editar($id)
    {
        $db = \Config\Database::connect();
        $especies = model('EspecieModel')->findAll();
        $razas = model('RazaModel')->findAll();
        $dietas = model('DietaModel')->findAll();
        $mascota = $db->query("select * from mascota_informacion where id = {$id};")->getResultArray();
        $mascotas = $db->query("select * from mascota_informacion;")->getResultArray();

        $data = [
            'title' => 'Mascotas',
            'especies' => $especies,
            'razas' => $razas,
            'dietas' => $dietas,
            "mascota" => $mascota,
            "mascotas" => $mascotas
        ];
        return view('mascota/editar', $data);
    }

    public function actualizar()
    {
        $mascotas = model('MascotaModel');

        $data = [
            'nombre' => $_POST['nombre'],
            'fecha_nacimiento' => $_POST['fecha_nacimiento'],
            'especie' => $_POST['especie'],
            'raza' => $_POST['raza'],
            'dieta' => $_POST['dieta']
        ];

        $mascotas->update($_POST['id_mascota'], $data);
        return redirect('mascotas');
    }

    public function mostrarDieta($id)
    {
        $db = \Config\Database::connect();
        $dietaInfo = $db->query("select * from dieta_informacion where id = $id;")->getResultArray();
        $especies = model('EspecieModel')->findAll();
        $razas = model('RazaModel')->findAll();
        $dietas = model('DietaModel')->findAll();
        $mascotas = $db->query("select * from mascota_informacion;")->getResultArray();

        $data = [
            'title' => 'Mascotas',
            'dietaInfo' => $dietaInfo,
            'especies' => $especies,
            'razas' => $razas,
            'dietas' => $dietas,
            'mascotas' => $mascotas
        ];

        return view('mascota/dieta', $data);
    }

    public function mostrarAdoptador($ida, $idm)
    {
        $db = \Config\Database::connect();
        $especies = model('EspecieModel')->findAll();
        $razas = model('RazaModel')->findAll();
        $dietas = model('DietaModel')->findAll();
        $mascotas = $db->query("select * from mascota_informacion")->getResultArray();
        $adoptadorInfo = $db->query("select * from adoptadores_info where id_m = {$idm} and id_a = {$ida};")->getResultArray();

        $data = [
            'title' => 'Mascotas',
            'especies' => $especies,
            'razas' => $razas,
            'dietas' => $dietas,
            'mascotas' => $mascotas,
            'adoptadorInfo' => $adoptadorInfo
        ];

        return view('mascota/adoptador', $data);
    }

    public function adoptar()
    {
        $db = \Config\Database::connect();

        $adoptador = model('AdoptadorModel');

        $data = [
            'nombre' => $_POST['nombre'],
            'apellido_paterno' => $_POST['apellido_paterno'],
            'apellido_materno' => $_POST['apellido_materno'],
            'sexo' => $_POST['sexo'],
            'estado' => $_POST['estado'],
            'municipio' => $_POST['municipio'],
            'localidad' => $_POST['localidad'],
            'calle' => $_POST['calle'],
            'numero_casa' => $_POST['numero_casa'],
            'telefono' => $_POST['telefono'],
            'correo' => $_POST['correo']
        ];

        $idMascota = $_POST['idMascota'];

        // Iniciar la transacción
        $db->transBegin();

        try {
            $adoptador->insert($data);
            $idAdoptador = $db->insertID(); // Obtener el ID del adoptador insertado

            // Insertar en la tabla mascotas_adoptadores
            $db->table('mascotas_adoptadores')->insert([
                'id_mascota' => $idMascota,
                'id_adoptador' => $idAdoptador,
                'fecha_adopcion' => date('Y-m-d H:i:s') // Usar la fecha actual
            ]);

            $db->transCommit(); // Confirmar la transacción
        } catch (\Exception $e) {
            $db->transRollback(); // Revertir la transacción en caso de error
            throw $e;
        }

        return redirect('mascotas');
    }
}