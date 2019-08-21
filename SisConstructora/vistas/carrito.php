<?php 
ob_start();
// session_start();
$mensaje = "";

if(isset($_POST['bt-accion'])){

switch ($_POST['bt-accion']) {

    case 'agregar':
    if( is_numeric( openssl_decrypt( $_POST['idstock'],'AES-128-ECB',KEY))){
        $id =  openssl_decrypt( $_POST['idstock'],'AES-128-ECB',KEY);
        // print_r($id); // lo que imprime en la pagina
        $mensaje.= "id correcto".$id;
    }else {
        $mensaje.= "id Error".$id;
    }
    if(is_string( openssl_decrypt( $_POST['nombre'],'AES-128-ECB',KEY) )){
        
        $NOMBRE =  openssl_decrypt( $_POST['nombre'],'AES-128-ECB',KEY);
    }else{
        $mensaje.= "nombre Error".$NOMBRE;
        break;
    }
    if(is_numeric( $_POST['cantidad'] )  &&  $_POST['cantidad'] >0 ){
        
        $CANTIDAD = ($_POST['cantidad'] );
    }else{
        $mensaje = "Cantidad no Valida".$CANTIDAD;
        break;
    }
    if(is_numeric( openssl_decrypt( $_POST['precio'],'AES-128-ECB',KEY) )){
        
        $PRECIO =  openssl_decrypt( $_POST['precio'],'AES-128-ECB',KEY);
    }else{
        $mensaje.= "precio Error".$PRECIO;
        break;
    }

// SI NO existe una variable de secion recupera la infomacion y metela en el arreglo y creas el carrito con esa info
    if(!isset($_SESSION['CARRITO'])){

        $producto= array(
            'id' =>$id,
            'nombre'=> $NOMBRE,
            'cantidad'=>$CANTIDAD,
            'precio'=> $PRECIO
         );

         $_SESSION['CARRITO'][0] = $producto;
         $mensaje = "Producto Ingresado al Carrito";

        }else{ // si existe algo en el carrito cuenta cuantos productos 

            // validacion
            // funcion array colum depositar los id que esta en el carrito
            $idproducto=array_column($_SESSION['CARRITO'],"id");
// 
            if(in_array($id,$idproducto)){
                echo "<script>alert('Este Producto ya a sido Agregado');</script>";
                // echo "<script>alertify.message('Datos Ingresados',3, null);</script>";
                $mensaje="";
            }else {

            $numerodeproductos=count($_SESSION['CARRITO']);
            $producto= array(
                'id' =>$id,
                'nombre'=> $NOMBRE,
                'cantidad'=>$CANTIDAD,
                'precio'=> $PRECIO
             );
             $_SESSION['CARRITO'][$numerodeproductos] = $producto;
             $mensaje = "Producto Ingresado al Carrito";
            }


            }
            // $mensaje = print_r($_SESSION,true);
            // $mensaje = "Producto Ingresado al Carrito";


    break;
    
    case 'borrar' :   
    if( is_numeric ( $_POST['id'])){
        $id =  $_POST['id'];
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            if($producto['id']==$id){
                unset($_SESSION['CARRITO'][$indice]);
                $indice --;
                echo "<script>alert('Borrado con exito');</script>";
                // echo "<script>alert('Este Producto ya a sido Agregado');</script>";
            }

        }


    }else {
        $mensaje.= "id Error".$id;
    }

    break;  
    
}


}

ob_end_flush();
?>