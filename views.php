<?php
 $id=$sel="";
$id=$_GET['value'];
if(isset ( $_POST['select'])){ 
       $conn= new mysqli("localhost","id13683540_root","mFk3Y(b|nRSzy)aZ","id13683540_phd");
    if($conn){
      $sql="UPDATE `userlogin` SET `Status` = 'Selected in 1st level' WHERE `userlogin`.`ApplicationId` = '$id'";
      if(mysqli_query($conn,$sql)){
        $sel="SELECTED";
      }
    }else{
      echo "connection Lost";
    }
  }
  if(isset ( $_POST['reject'])){ 
   
    $conn= new mysqli("localhost","id13683540_root","mFk3Y(b|nRSzy)aZ","id13683540_phd" );
    if($conn){
      $sql5="UPDATE `userlogin` SET `Status` = 'Rejected' WHERE `userlogin`.`ApplicationId` = '$id'";
      
      if(mysqli_query($conn,$sql5)){
       
        $sel="Rejected";
      }else{
        echo "query wrong";
      }
    }else{
      echo "connection Lost";
    }
  }
  


  ?>
<!DOCTYPE html>
<html>
<head>
 <title>PhD Admissions_NIT_AP</title>
 <style type="text/css">
  .error{
    color: red;
  }
 </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" >
</head>
<body class="body">
  <div class="container" style=" padding-top: 20px;">
    <div class="well"> 
      
      
        
 
<?php
if($sel=="SELECTED"){
  echo "<h4 class='text-center text-success'>$sel</h4>";

}
if($sel=="Rejected"){
    echo "<h4 class='text-center text-danger'>$sel</h4>";

}
echo "<div class='text-center' style='text-align: center; padding-top: 10px; color: black'>
        <h2>APPLICATION Id:&nbsp; $id </h2>
      </div>";
      $file="/profilephoto/"."$id".".jpg";
      echo "<div class='text-center'><h4 class='page-header'>ProfilePhoto:</h4>";
                    
                    echo "<img src='$file'></div>";
$conn= new mysqli("localhost","id13683540_root","mFk3Y(b|nRSzy)aZ","id13683540_phd" );
                   if($conn){
                       $sql="select ApplicationId,Name,Aadhaar,DOb,Gender,Category,Nationality,State,MaritalStatus,Disability as PWD,MobileNo from personaldetails where ApplicationId='$id'";
                        $result=mysqli_query($conn,$sql);
                      echo "<h4 class='page-header'>PersonalDetails:</h4>";
                       echo "<table class='table table-hover'> <thead><tr>";

                        while($fieldinfo=mysqli_fetch_field($result)){
                             echo "<th> $fieldinfo->name </th>";
                        }
                        echo "</tr></thead>";
                        while($row=mysqli_fetch_row($result)){
                         echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td></tr>";
                        }
                        echo "</table>";


                        $sql1="select ApplicationId,Degree as NameOfDegree,Branch,cgpa as CGPA,class,College,YearOfPassing from ug where ApplicationId='$id'     ";
                         $result=mysqli_query($conn,$sql1);
                        echo "<h4 class='page-header'>UnderGraduationDetails:</h4>";
                       echo "<table class='table table-hover'> <thead><tr>";

                        while($fieldinfo=mysqli_fetch_field($result)){
                             echo "<th> $fieldinfo->name </th>";
                        }
                        echo "</tr></thead>";
                        while($row=mysqli_fetch_row($result)){
                         echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
                        }
                        echo "</table>";


                        $sql2="select ApplicationId,Degree as NameOfDegree,Branch,cgpa as CGPA,class,College,YearOfPassing from pg where ApplicationId='$id'     ";
                         $result=mysqli_query($conn,$sql2);
                    echo "<h4 class='page-header'>PostGraduationDetails:</h4>";
                       echo "<table class='table table-hover'> <thead><tr>";

                        while($fieldinfo=mysqli_fetch_field($result)){
                             echo "<th> $fieldinfo->name </th>";
                        }
                        echo "</tr></thead>";
                        while($row=mysqli_fetch_row($result)){
                         echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
                        }
                        echo "</table>";


                        $sql3="select ApplicationId,Exam as NameOfExam,Score,Rank from otherdetails where ApplicationId='$id'";
                         $result=mysqli_query($conn,$sql3);
                        echo "<h4 class='page-header'>OtherDetails:</h4>";
                       echo "<table class='table table-hover'> <thead><tr>";

                        while($fieldinfo=mysqli_fetch_field($result)){
                             echo "<th> $fieldinfo->name </th>";
                        }
                        echo "</tr></thead>";
                        while($row=mysqli_fetch_row($result)){
                         echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                        }
                        echo "</table>";


                        $sql4="select ApplicationId,Institute,Position,StartDate,EndDate from workexperience where ApplicationId='$id'";
                        $result=mysqli_query($conn,$sql4);
                        echo "<h4 class='page-header'>Work Experience:</h4>";
                       echo "<table class='table table-hover'> <thead><tr>";

                        while($fieldinfo=mysqli_fetch_field($result)){
                             echo "<th> $fieldinfo->name </th>";
                        }
                        echo "</tr></thead>";
                        while($row=mysqli_fetch_row($result)){
                         echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
                        }
                        echo "</table>";

                        mysqli_close($conn);
                        
                   }
                   
                     $file="/Caste/"."$id".".jpg";
      echo "<h4 class='page-header'>CasteCertificate:</h4>";
                  echo" <a href=$file>CategoryProof</a>"; 
                   
                     $file="/Income/"."$id".".jpg";
      echo "<h4 class='page-header'>IncomeProof:</h4>";
                    echo" <a href=$file>IncomeProof</a>";
                    
                     $file="/Research/"."$id".".jpg";
      echo "<h4 class='page-header'>ResearchProposal:</h4>";
                     echo" <a href=$file>Research Proposal</a>";
 
                     $file="/PWD/"."$id".".jpg";
                      if (file_exists($file)) {
      echo "<h4 class='page-header'>PWD Certificate:</h4>";
                    echo" <a href=$file>PWD Certificate</a>";
                      }
                       $file="/Study/"."$id".".jpg";
      echo "<h4 class='page-header'>Study Certificate:</h4>";
                     echo" <a href=$file>StudyCertificate</a>";
                     
                      $file="/Tenth/"."$id".".jpg";
      echo "<h4 class='page-header'>10th class Certificate:</h4>";
                     echo" <a href=$file>10th class Certificate</a>";
                     
                      $file="/Inter/"."$id".".jpg";
      echo "<h4 class='page-header'>Inter Certificate:</h4>";
                     echo" <a href=$file>Inter Certificate</a>";
                     
                      $file="/Ug/"."$id".".jpg";
      echo "<h4 class='page-header'>UnderGraduation Certificate:</h4>";
                     echo" <a href=$file>UnderGraduation Certificate</a>";
                     
                     $file="/Pg/"."$id".".jpg";
      echo "<h4 class='page-header'>PostGraduation Certificate:</h4>";
                    echo" <a href=$file>PostGraduation Certificate</a>";
                    
                    $file="/Test/"."$id".".jpg";
      echo "<h4 class='page-header'>Gate Certificate:</h4>";
                    echo" <a href=$file>Gate Certificate</a>";

echo "<form method='post' action='views.php?value=$id'>
       <div class='form-group'>
    <div class='col-xs-offset-4 col-xs-3'>
      <button type='submit' name='select' class='btn btn-success btn-lg'>Select</button>
    </div>
    <div class='col-xs-3'>
      <button type='submit' name='reject' class='btn btn-danger btn-lg'>Reject</button>
    </div>
    <div class='col-xs-offset-2'></div>
  </div>
</form>";
?>


  
<br><br>
</div>
</div>
</body>
</html>