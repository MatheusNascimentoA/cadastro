<!-- jquery -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- bootstrap -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- chamada da função -->
<?php 
if(isset($_SESSION['mensagem'])) { ?>
	<script type="text/javascript">
		$(window).load(function() {
			$('#exampleModal').modal('show');
		});
	</script>
<?php  } 
session_unset();
?>
<script>
	$(document).ready(function() {       
		$(".LinkChamar").click(function() {
			$.ajax({
				url: $(this).attr("href"),
				success: function(data){
					$("#edt").html(data);
				}
			});     
		});
	});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
</body>
</html>
