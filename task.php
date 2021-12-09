<?php

class Task {
    
    public $id;
    public $text;
    public $finished;

    public function __construct ($text)
    {
        $this->text = $text;
    }

    public function add ()
    {
        $mysql = new mysqli('localhost', 'root', '', 'fullstack');  //connect to DB
        $query = "INSERT INTO tasks (text) VALUES ('$this->text')"; //insert values into DB
        $mysql->query($query); //execute the query
        $mysql->close();  // close connection      
    }

    public function del ()
    {        
                 
        $mysql = new mysqli('localhost', 'root', '', 'fullstack');  //connect to DB       
        $id = $_POST['id'];  // Establish required data as a variable       
        $query = "DELETE FROM tasks WHERE id = $id"; //delete value from DB
        $mysql->query($query); //execute the query
        $mysql->close();  // close connection     

    }
    
    public function finish ()
    {               
        $mysql = new mysqli('localhost', 'root', '', 'fullstack');  //connect to DB
        $id = $_POST['id'];  // Establish required data as a variable  
        $query = "UPDATE tasks SET finished = 1 WHERE id = $id"; //update value in DB
        $mysql->query($query); //execute the query
        $mysql->close();  // close connection   
    }

    public function return ()
    {
                   
        $mysql = new mysqli('localhost', 'root', '', 'fullstack');  //connect to DB 
        $id = $_POST['id'];  // Establish required data as a variable
        $query = "UPDATE tasks SET finished = 0 WHERE id = $id"; //update value in DB        
        $mysql->query($query); //create and execute a query 

    }
    

}
