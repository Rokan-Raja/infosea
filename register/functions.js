function saveInlineEdit(editableObj, column, id) {
	if ($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
	$.ajax({
		url: "saveInlineEdit.php",
		cache: false,
		data: 'column=' + column + '&value=' + editableObj.innerHTML + '&id=' + id,
		success: function (data) {
			if (data == "saved") {
				swal("Information", "Participant Name Changed Successfully", "success");
			}
			else {
				swal("Information", "Participant Name Changing Failed", "error");
			}
		}
	});
}