<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function import()
    {
        if(!empty($_FILES["csv_file"]["name"]))  
        {  
             $connect = mysqli_connect("localhost", "it58660129", "figddw67", "it5866129");  
             $output = '';  
             $allowed_ext = array("csv");  
             $extension = end(explode(".", $_FILES["csv_file"]["name"]));  
             if(in_array($extension, $allowed_ext))  
             {  
                  $file_data = fopen($_FILES["csv_file"]["tmp_name"], 'r');  
                  fgetcsv($file_data);  
                  while($row = fgetcsv($file_data))  
                  {  
                       $testname = mysqli_real_escape_string($connect, $row[0]);  
                       $testpic = mysqli_real_escape_string($connect, $row[1]);  
                       $query = "  
                       INSERT INTO testone  
                            (testname, testpic)  
                            VALUES ('$testname', '$testpic')  
                       ";  
                       mysqli_query($connect, $query);  
                  }  
                  $select = "SELECT * FROM testone ORDER BY id DESC";  
                  $result = mysqli_query($connect, $select);  
                  $output .= '  
                       <table class="table table-bordered">  
                            <tr>  
                                 <th width="5%">ID</th>  
                                 <th width="25%">testname</th>  
                                 <th width="35%">testpic</th>  
                            </tr>  
                  ';  
                  while($row = mysqli_fetch_array($result))  
                  {  
                       $output .= '  
                            <tr>  
                                 <td>'.$row["id"].'</td>  
                                 <td>'.$row["testname"].'</td>  
                                 <td>'.$row["testpic"].'</td>   
                            </tr>  
                       ';  
                  }  
                  $output .= '</table>';  
                  echo $output;  
             }  
             else  
             {  
                  echo 'Error1';  
             }  
        }  
        else  
        {  
             echo "Error2";  
        }  
    }


    function get()
    {
        $this->load->view('test_view');
    }
}
