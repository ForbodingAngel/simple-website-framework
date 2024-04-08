<div class="footercontainer">
	<div class="footer">
		<?php include './includes/footercolumns.php'; ?>
		<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
</div>

<?php echo $pluginCalledBelowContent; ?>
<?php include 'navigation-options.php' ?>
</body>
</html>
<?php 
	// Flush the output buffer and send the content to the client
	ob_end_flush();
?>