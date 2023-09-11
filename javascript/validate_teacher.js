/*

Teacher's registration data came here for some basic valiation. If all data are valid
then it return true else return false.If return false then i am printing some error 
messege why the data is not valid. 

*/

function validate() {
  let teacher_name = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  let dept = document.getElementById("dept").value;
  let age = document.getElementById("age").value;
  let phone = document.getElementById("phone").value;
  let password = document.getElementById("password").value;
  let checkpassword = document.getElementById("checkpassword").value;


  let res = true;
  //checking entered name is empty or not
  if (teacher_name == "") {
    document.getElementById("nameError").innerHTML = "can't be empty";
    res = false;
  } else {
    document.getElementById("nameError").innerHTML = "";
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


  // checking entered department value is default or not
  if(dept=="default")
  {
    document.getElementById("deptError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("deptError").innerHTML = "";
  }


  //checking entered age is empty or not
  if(age=="")
  {
    document.getElementById("ageError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("ageError").innerHTML = "";
  }

  //checking entered phone no is empty or not
  if(phone=="")
  {
    document.getElementById("phoneError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("phoneError").innerHTML = "";
  }

  // checking entered password is empty or not
  if(password=="")
  {
    document.getElementById("passwordError").innerHTML = "can't be empty";
    res = false;
  }
  else {
    document.getElementById("passwordError").innerHTML = "";
  }

  // checking if retyped password empty or not matched with the password
  if(checkpassword=="")
  {
    document.getElementById("checkpasswordError").innerHTML = "can't be empty";
    res = false;
  }
  else if(password!=checkpassword)
  {
    document.getElementById("checkpasswordError").innerHTML = "password not matched";
    res = false;
  }
  else {
    document.getElementById("checkpasswordError").innerHTML = "";
  }



  return res;
}
