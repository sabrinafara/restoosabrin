<?php
     session_start();
     include "config/classDB.php";
     if(!empty($_SESSION['cart'])){
        //simpan ke table orders   
        $insertOrder = $dbo->insert("orders(idorder,idpelanggan,tglorder)","null,'".$_SESSION['iduser']."',now()");
        $idorder = $dbo->lastInsert();
        if($insertOrder){
            //simpan ke orderdetail
        foreach($_SESSION['cart'] as $id=>$val){
            $menu = $dbo->select('menu where idmenu='.$id);
            foreach($menu as $row){

            }
            $harga = $row['harga'];
            $insertDetail = $dbo->insert("orderdetail","null, '$idorder', $id,$val,$harga");
            unset($_SESSION['cart'][$id]);
        }
        }
    }
?>
<script>
    location.href='index.php';
</script>    