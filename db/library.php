<?php
class check{
   

    private $data;
    private $row;
    private $table;
    function setCheck($table, $row, $data){
        $this->row = $row;
        $this->data = $data;
        $this->table = $table;
      }
      function getCheck(){
          include('db.php');
          $row = $this->row;
          $data = $this->data;
          $table = $this->table;
          $mys = "SELECT* FROM $table  WHERE $row ='$data' ";
          $query = mysqli_query($conn, $mys);
          $num = mysqli_num_rows($query);
          return $num;
      }
    function generateid($table){
        include('db.php');
        $max =mysqli_query($conn, "SELECT MAX(id) AS lastid FROM $table");
        $gen = mysqli_fetch_array($max);
        $generate = $gen['lastid'];
        return sha1($generate-1);
    }
}

 class person extends check{
    private $name;
    private $email;
    private $username;
    private $password;
    private $phone;
    
    private $profile_picture;

    public function getName(){
        return $this->name;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getImage()
    {
        return $this->profile_picture;
    }

    public function setName($name)
    {
        $this->name = ucwords($name);
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setImage($profile_picture)
    {
        $this->profile_picture = $profile_picture;
    }

 }
 class users extends person{
     private $gender;
     private $phone;
     private $address;
    
     public function setAddress($address){
        $this->address = ucwords($address);
    }
    public function setGender($gender){
        $this->gender = ucwords($gender);
    }
     public function setPhone($phone){
         $this->phone = $phone;
     }
     public function getPhone(){
        return $this->phone;
     }
     
     public function getAddress(){
        return $this->address;
    }
    public function getGender(){
        return $this->gender;
    }
 }



class insert{
    private $table;
    private $data=[];
    private $value =[];
    private $query;
    function insert($table, $data){
        // $q = mysqli_query($conn, "INSERT INTO $table(), ");
        // $this->query = $q;
    }
    function getQuery(){
        return $this->query;
    }
}

class databasedata{
    private $table;
    private $where;
    private $query;
    function setAllSelect($table){
       $this->table = $table;
    }

    public function getAllSelect(){
        include('db.php');
        // $table = $this->table;
        $query= mysqli_query ($conn, "SELECT* FROM category");
        return $this->query;
    }

}
class fund{
    private $add;
    private $balance;
    private $spend;
    private function setBalance($balance){
        $this->balance = $balance;
    }
    public function getBalance(){
        return $this->balance;
    }
    public function fundWallet($amount){
        $this->add = $amount;
        $this->setBalance($this->balance+$this->add);
    }
    public function spend($amount){
        $this->spend = $amount;
        if($this->balance < $this->spend){
            return "Your Balance is too low for this transaction";
        }else{
            $this->setBalance($this->balance-$this->spend);
        }
    }

}
?>