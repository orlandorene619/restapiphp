<?php 

    class Categoria extends Conectar{
        public function get_categoria(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM `categoria` WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categoria_id($cat_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM `categoria` WHERE estado=1 AND cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insertar_cat($cat_nom,$cat_obs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO `categoria` (`cat_id`, `cat_nom`, `cat_obs`, `estado`) VALUES (NULL, ?, ?, '1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function actualizar_cat($cat_id, $cat_nom,$cat_obs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE categoria set cat_nom = ?, cat_obs = ? 
                  WHERE cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->bindValue(3, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function eliminar_cat($cat_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE categoria set estado = '0'
                  WHERE cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>