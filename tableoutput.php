<?php

class tableOutput {
    
    public $id;
    public $text;
    public $finished; 
    

    public function outputTable () 
    {

        $mysql = new mysqli('localhost', 'root', '', 'fullstack');  //connect to DB
        $query = "SELECT * FROM tasks"; //insert values into DB
        $res = $mysql->query($query); //create a query

        foreach ($res as $row) {            
          echo '<table class="table table-info mt-5">';
          echo '<thead>
                  <tr>
                    <th scope="col" class="">#</th>
                    <th scope="col" class="text-center">Text</th>
                    <th scope="col" class="text-center">Finish</th>
                    <th scope="col" class="text-center">Return</th>
                    <th scope="col" class="text-center">Delete</th>
                  </tr>
                </thead>'; 
                          
                
          echo '<tbody>';
                  //get an associative array for each user
                  //outputs columns from the array {}means we pick a value from inside of the array 
                  
                    $n = 1; 

                    foreach ($res as $row) { 
                      
                      $num = $n++; 
                                                                 
                      if (($row['finished']) == 0) {                        
                        echo "
                       <tr>
                       <td class='w-10'>
                        $num                                          
                       </td>
                       <td class='w-50'>
                        {$row['text']}
                       </td>                                                  
                       <td class='w-10 text-center'>                          
                         <form method='POST' action='is_finished.php'>
                          <input type='hidden' value='{$row['id']}' name='id'>                                                                           
                           <button class='btn btn-success'>+</button>
                         </form>
                       </td>
                       <td class='w-10 text-center'>                          
                         <form method='POST' action='return_task.php'>
                          <input type='hidden' value='{$row['id']}' name='id'>                                                                           
                           <button class='btn btn-info'>-</button>
                         </form>
                       </td>
                       <td class='w-10 text-center'>
                         <form method='POST' action='del_task.php'>
                           <input type='hidden' value='{$row['id']}' name='id'>                            
                           <button class='btn btn-danger'>x</button>
                         </form>
                       </td>
                     </tr>
                       ";                      
                    } else {
                      echo "
                       <tr class='table-primary'>
                       <td>
                       $num
                       </td>
                       <td class='w-50'>
                        {$row['text']}
                       </td>                                                  
                       <td class='w-10 text-center'>                          
                         <form method='POST' action='is_finished.php'>
                          <input type='hidden' value='{$row['id']}' name='id'>                                                                           
                           <button class='btn btn-success'>+</button>
                         </form>
                       </td>
                       <td class='w-10 text-center'>                          
                         <form method='POST' action='return_task.php'>
                          <input type='hidden' value='{$row['id']}' name='id'>                                                                           
                           <button class='btn btn-info'>-</button>
                         </form>
                       </td>
                       <td class='w-10 text-center'>
                         <form method='POST' action='del_task.php'>
                           <input type='hidden' value='{$row['id']}' name='id'>                            
                           <button class='btn btn-danger'>x</button>
                         </form>
                       </td>
                     </tr>
                       ";
                    }                      
                  }
                               
          echo '</tbody>';         
        echo '</table>';
        }
    }

}
