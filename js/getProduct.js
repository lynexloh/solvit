$(".use-name").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var $name = $row.find(".name").text(); // Find the text
    var $id = document.getElementById("id").value; // Find the text
	window.location.href = "exchangeItem.php?name=" + $name + "&id=" + $id;
});