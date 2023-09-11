/*

Student's registration data came here for some basic valiation. If all data are valid
then it return true else return false.If return false then i am printing some error 
messege why the data is not valid. 

*/

function validate() {
  var student_id = document.getElementById("student_id").value;
  let student_name = document.getElementById("name").value;
  let dob = document.getElementById("dob").value;
  let email =document.getElementById("email").value;
  let dept =document.getElementById("dept").value;
  let phone =document.getElementById("phone").value;
  let address = document.getElementById("address").value;



  let res = true;
  //checking entered id is empty or not
  if (student_id == "") {
    document.getElementById("idError").innerHTML = "can't be empty";
    res = false;
  } else {
    document.getElementById("idError").innerHTML = "";
  }



  //checking entered name is empty or not
  if(student_name=="")
  {
    document.getElementById("nameError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("nameError").innerHTML = "";
  }


  //checking entered date of birth is empty or not
  if(dob=="")
  {
    document.getElementById("dobError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("dobError").innerHTML = "";
  }


  //checking entered email is empty or not
  if(email=="")
  {
    document.getElementById("emailError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("emailError").innerHTML = "";
  }


  //checking entered department value is default or not
  if(dept=="default")
  {
    document.getElementById("deptError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("deptError").innerHTML = "";
  }

  //checking entered phone is empty or not
  if(phone=="")
  {
    document.getElementById("phoneError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("phoneError").innerHTML = "";
  }

  //checking entered address is empty or not
  if(address=="")
  {
    document.getElementById("addressError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("addressError").innerHTML = "";
  }

  

  return res;
}
