
</form>
<br />
<!-- Easy comment uploads for Wordpress by Tom Wright: http://wordpress.org/extend/plugins/easy-comment-uploads/ -->
<p>File Uploading Like Gmail. You can upload multiple files without submitting the whole page. You can upload file like ajax. This is using iframe for file upload</p>

<form target="hiddenframe" enctype="multipart/form-data" action="<?php echo /*$plugin_dir*/ get_option('siteurl') . '/wp-content/plugins/easy-comment-uploads/' ?>upload.php" method="POST" name="uploadform" id="uploadform">
<p>
  Attach File:
  <input type="file" name="file" id="fileField"   onchange="uploadSubmit()" />
  </label>
</p>
<p id="uploadedfile" >
  <label></label>
</p>
<iframe name="hiddenframe" style="display:none" >Loading...</iframe>
<!--</form>-->

<script type="text/javascript">
	function uploadSubmit(){
		//alert("test!");
		//var uform = document.getElementsByName("uploadform");
		//alert(uform.length + " elements!");
		document.uploadform.submit();
		//uform.submit();
	}
</script>
