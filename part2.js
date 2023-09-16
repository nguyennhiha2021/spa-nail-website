"use strict";

function saveData (firstname,lastname,email, product, quantity){
    
    if(typeof(Storage) != "undefined")
    {
        localStorage.setItem('firstname', firstname);
        localStorage.setItem('lastname',lastname);
        localStorage.setItem('email', email);
        localStorage.setItem('product', product);
        localStorage.setItem('quantity', quantity);
    }
    else
    {
        alert('Web Storage is not supported by this browser');
    }

}

function loadData() {

    if(typeof(Storage) != "undefined")
    {
        var fullname = document.getElementById("fullname");
        var product_pay = document.getElementById("product1");
        var quantity_pay = document.getElementById("quantity1");
        var product = localStorage.getItem("product");
		    var quantity = localStorage.getItem("quantity");
		    var fname = localStorage.getItem("firstname");
		    var lname = localStorage.getItem("lastname");
        var email_pay = document.getElementById("email");
        var email = localStorage.getItem("email");
		    var totalprice = document.getElementById("totalprice");


		    if (fname && lname) {
            fullname.value = fname + " " + lname;

        }
        if (email) {
            email_pay.value = email;
        }
        if (product) {
            product_pay.value = product;
        }
        if (quantity) {
            quantity_pay.value = quantity;
        }
		  // Price calculate
		    var price = 0;
        if (product == "Manicure") {
            price = 25;
        } else if (product == "Pedicure") {
            price = 35;
        }	

        var total_price = quantity * price;
        if (total_price) {
             totalprice.value = total_price;
        }

    }
    else
    {
        alert('Web Storage is not supported by this browser');
    }
}


function validate()
{
	var errMsg = "";
	
	var firstname = document.getElementById("firstName").value;
	var lastname = document.getElementById("lastName").value;
	var email = document.getElementById("email").value;
  var address = document.getElementById("streetAddress").value;
  var suburb = document.getElementById("suburb").value;
  var phone = document.getElementById("phone").value;
  var product = document.getElementById("product").value;
  var quantity = parseInt(document.getElementById("quantity").value, 10);
  var state = document.getElementById("state").value;
  var postcode = document.getElementById("postcode").value;

	
    if(firstname == "")
        errMsg += "First Name is Required! <br />";
    else if (!firstname.match(/^[a-zA-Z]+$/)) 
        errMag = errMag + "Your first name must only contain alpha characters\n";
	
	 if(lastname == "")
		    errMsg += "Last Name is Required! <br />";
	 else if (!lastname.match(/^[a-zA-Z]+$/)) 
        errMag = errMag + "Your lastname must only contain alpha characters or hyphens\n";

    if (email == "")
    errMsg += "Please enter an email! <br/>";

    if (address == "")
    errMsg += "Please enter an address! <br/>";

	if (phone == "")
        errMsg += "Phone number is required! <br/>";
    else if (phone.length > 10)
        errMsg += "Phone number can't be more than 10 digits! <br/>";
    else if (!phone.match(/^[0-9]/))
        errMsg += "Phone number can only be digits! <br/>";

    if (product == "") 
    errMsg += "Please select a service.<br />";
  

  // Quantity check
    if (isNaN(quantity) || quantity <= 0) 
    errMsg += "Quantity must be a positive integer.<br />";
  // Postcode/State check
	if (!validatePostcodeAndState(postcode, state)) 
    errMsg += "Invalid postcode and state combination.<br />"; 

	
	// Make Decision to:
	
		// SAVE DATA ON WEB STORAGE
		saveData(firstname, lastname,email, product, quantity);
		
		return true; // submit the form
	
	
}

function validatePostcodeAndState(postcode, state) {
  switch (state) {
    case "VIC":
      return /^3|8/.test(postcode);
    case "NSW":
      return /^1|2/.test(postcode);
    case "QLD":
      return /^4|9/.test(postcode);
    case "NT":
      return /^0/.test(postcode);
    case "WA":
      return /^6/.test(postcode);
    case "SA":
      return /^5/.test(postcode);
    case "TAS":
      return /^7/.test(postcode);
    case "ACT":
      return /^0/.test(postcode);
    default:
      return false;
  }
}

// Function to validate the payment form
function validatePaymentForm() {
	var errMsg = ""
  
  // Validate credit card type
  var cardType = document.getElementById("card-type").value.trim();
  if (!cardType) 
    errMsg += "Please select a credit card type. <br/>";


  // Validate name on credit card
  var cardName = document.getElementById("card-name").value.trim();
  if (!/^[A-Za-z ]{1,40}$/.test(cardName)) 
    errMsg += "Name on credit card must be alphabetic characters only and less than 40 characters. <br/>";


  // Validate credit card number based on the selected card type
  var cardNumber = document.getElementById("card-number").value;

  if (!validateCreditCardNumber(cardNumber, cardType)) {
    errMsg += "Invalid credit card number for the selected card type. <br/>";
 
  }

	// Make Decision to:
		
		return true; // submit the form
	
}

function validateCreditCardNumber(cardNumber, cardType) {
  switch (cardType) {
    case "visa":
      return /^4\d{15}$/.test(cardNumber);
    case "mastercard":
      return /^5[1-5]\d{14}$/.test(cardNumber);
    case "american-express":
      return /^3[47]\d{13}$/.test(cardNumber);
    default:
      return false;
  }
}

// Function to clear session storage and return to the home page
function cancelOrder() {
  localStorage.clear();
  window.location.href = "index.php"; // Replace with the URL of your home page
}

function init()
{
	if(document.getElementById("payment") != null )
	{ // display.html page is loaded
		loadData();
		document.getElementById("payment-form").onsubmit = validatePaymentForm;
  
	} 
	else if(document.getElementById("enquire") != null )
	{ // apply.html page is loaded
		//var applyForm = document.getElementById("apply");
		//applyForm.onsubmit = validate;
		document.getElementById("enquire-form").onsubmit = validate;
	}
}

window.onload = init;



