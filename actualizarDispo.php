<?php 
require_once 'includes/funcionesDisponibilidad.php';
require_once 'includes/helpers.php';

$funciones = new funcionesDisponibilidad();



$id = $_POST['id'];
$economico = $_POST['economico'];
$sucursal = $_POST['sucursal'];
$fechaIngreso = $_POST['fechaIngreso'];
$fechaPromesa = $_POST['fechaPromesa'];
$fechaEntrega = $_POST['fechaEntrega'];
$motivo = $_POST['motivo'];
$taller = $_POST['talleres'];
$folio = $_POST['folio'];
$costo = $_POST['costo'];
$motivo2 = $_POST['estatus'];
$comentarios = $_POST['comentario'];

//variables

$funciones->update($id,$economico,$sucursal,$fechaIngreso,$fechaPromesa,$fechaEntrega,$motivo,$taller,$folio,$costo,$motivo2,$comentarios);

header("location:disponibilidad.php");