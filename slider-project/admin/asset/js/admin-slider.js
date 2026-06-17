jQuery(document).ready(function(){
	jQuery('.category-delete').click(function(e){
		e.preventDefault();
		category_id = jQuery(this).data('id');
		if(confirm('Delete Category?')){
			$.ajax({
			    url: 'admin-ajax.php', // Target URL
			    type: 'POST',                         // HTTP method (GET, POST, PUT, DELETE)
			    data: { action: 'delete_category', category_id: category_id  },     // Data sent to the server
			    dataType: 'json',                     // Expected response format (json, xml, html, text)
			    success: function(response) {
			        alert("Category deleted successfully"); // Runs on successful response
			        location.reload();
			    },
			    error: function(xhr, status, error) {
			        alert("Error while deleting the category");// Runs if request fails
			    }
			});
		}
	});

	jQuery('.delete-slide').click(function(e){
		e.preventDefault();
		slide_id = jQuery(this).data('id');
		if(confirm('Delete Slide?')){
			$.ajax({
			    url: 'admin-ajax.php', // Target URL
			    type: 'POST',                         // HTTP method (GET, POST, PUT, DELETE)
			    data: { action: 'delete_slide', slide_id: slide_id  },     // Data sent to the server
			    dataType: 'json',                     // Expected response format (json, xml, html, text)
			    success: function(response) {
			        alert("Slide deleted successfully"); // Runs on successful response
			        location.reload();
			    },
			    error: function(xhr, status, error) {
			        alert("Error while deleting the slide");// Runs if request fails
			    }
			});
		}
	});
});