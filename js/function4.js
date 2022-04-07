function saveInlineEdit4(editableObj,column,id) {
	if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
	return false;
	$.ajax({
		url: "saveInlineEdit4.php",
		cache: false,
		data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id,
		success: function(response) {
			console.log(response);
			$(editableObj).attr('data-old_value',editableObj.innerHTML);		
		}          
   });
}