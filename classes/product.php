<?php

require_once('MySql.php');

class Products extends MySql{
    //getAll
    public function getAll(){
        $query ="SELECT * FROM products";
        $result = $this->connect()->query($query);
        $product = [];
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                array_push($product, $row);
            }
        }
        return $product;
    }
    //getOne
    public function getOne($id)
    {
        $query = "SELECT * FROM products 
        WHERE id='$id'";
        $result=$this->connect()->query($query);
        $product = null;

        if($result->num_rows ==1 )
        {
            $product = $result->fetch_assoc();
        }
        return $product;
    }

    //Store // create
    public function store(array $data)
    {
        $data['name']=mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc']=mysqli_real_escape_string($this->connect(), $data['name']); // دي عشان لو في اي فواصل وكده تدخل في الداتا عادي
        $query = "INSERT INTO products (`name` , `desc` , price , img , created_at)
        VALUES('{$data['name']}','{$data['desc']}','{$data['price']}','{$data['img']}',CURRENT_TIME())";
        $result = $this->connect()->query($query);

        if($result==true){
            return true;
        }else{
            return false;
        }

    }

    //edit
    public function update($id , array $data)
    {
        $query="UPDATE products SET
         `name` = '{$data['name']}',
         `desc` = '{$data['desc']}',
        --  `img` = '{$data['img']}',
         `price` = '{$data['price']}'
         WHERE id ='$id'";

        $result = $this->connect()->query($query);

        if($result==true){
            return true;
        }else{
            return false;
        }

    }
    //delet

    public function delete($id)
    {
        $query = "DELETE FROM products 
        WHERE id=$id ";
       $result = $this->connect()->query($query);

       if($result==true){
           return true;
       }else{
           return false;
       }

    }
}