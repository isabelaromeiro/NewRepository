var errorsElements = [];

function checkFree(){
	var isChecked = document.getElementById("is_free").checked;
	document.getElementById("price").disabled = isChecked;
}

function cleanAllErrors(){

	$( ".text-danger" ).remove();
}

 /**
 * Checks if a node [field.id]-err already exists. If not, then create a new element
 * 
 * @param   {node} field -- The field to be inserted a message bellow it
 * @param   {String} error -- Error message
 * @param   {String} tag  -- HTML tag to wrap the text (p, div, span)
 */
function reportError(field, error, tag="p"){
	var parent = document.getElementById(field.id).parentNode;
	var el = document.getElementById(field.id + "-err");

	if(el==null){
		el = document.createElement(tag);
		el.className = "text-danger";
		el.id = field.id + "-err";
		el.innerHTML = error;
		parent.appendChild(el);
	}else{
		el.innerHTML += "<br /> " + error;
	}

	errorsElements.push(el);
}

/**
 * Validates all fields
 * 
 * @return  {Boolean} 
 */
 function validateAll(){

 	// document.getElementById("product_form").formBtn.disabled = true;

 	cleanAllErrors();

 	var titleValid = true;
 	var categoryValid = true;
 	var conditionValid = true;
 	var priceValid = true;
 	var descriptionValid = true;
 	var imageValid = true;

 	var title = document.getElementById("title");
 	var category = document.getElementById("category");
 	var condition = document.getElementById("condition");
 	var price = document.getElementById("price");
 	var description = document.getElementById("description");
 	var image = document.getElementById("productImage");

 	if(title.value.length == 0){
 		titleValid = false;
		reportError(title, "Title is required.");
	}

	if(category.options[category.selectedIndex].value.length == 0){
		categoryValid = false;
		reportError(category, "Category is required.");
	}

	if(condition.options[condition.selectedIndex].value.length == 0){
		conditionValid = false;
		reportError(condition, "Condition is required.");
	}

	var is_free = document.getElementById("is_free").checked;


 	if(!is_free && !/\d+/.test(price.value)){
		reportError(price, "Price must be a number.");
		priceValid = false;
	}

	if(!is_free && price.value.length == 0){
		reportError(price, "If it is not free, please give it a price.");
		priceValid = false;
	}

	// console.log(description.value.length);

	if(description.value.length == 0){
 		descriptionValid = false;
		reportError(description, "Description is required.");
	}

	if(!$('#productImage').val()) {
	   	imageValid = false;
		reportError(image, "Image is required.");
	}

 	// document.getElementById("product_form").formBtn.disabled = false;

 	if(titleValid && categoryValid && conditionValid && priceValid && conditionValid && descriptionValid){
 		return true;
 	}else{
 		return false;
 	}

 }