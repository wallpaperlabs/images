<?php
error_reporting(0);
include "curl_gd.php";
include "functions.php";

if(isset($_GET['dt'])){
	$data = base64url_decode($_GET['dt']);
	$data = json_decode($data,true);
	
	$url = $data['url'];
	$thumbnail = $data['thumbnail'];
	
	
	$linkdown = $url;
	if(isset($url) && strpos($url,"//drive.google.com/") !== FALSE){
		$linkdown = Drive($url);
		
		if($thumbnail == ''){
			$thumbnail = generateThumb($url);
		}
	}
	
}


$file = '[{"type": "video/mp4", "label": "HD", "file": "'.$linkdown.'"}]';

?>

<div id="player"></div>
<script type="text/javascript" src="https://assets.nlm.nih.gov/jwplayer/8/jwplayer.js"></script>
<script type="text/javascript">
	jwplayer.key = "eNFaXCjyURVoCCGiHp7HTQ3hDhE/AfL0g8VE1fRbL84=";
	var playerInstance = jwplayer("player");
		playerInstance.setup({
			sources: <?=$file?>,
			image: "<?=$thumbnail?>",
			autostart: false,
			controls: true,
			width: "100%",
			height: "100%",
			aspectratio: "16:9",
			abouttext: "CODENULL",
			aboutlink: "www.storecodenull.xyz",
			

			<?php
			if(isset($data['subtitle']) && !empty($data['subtitle'])){
				?>
				tracks: [{ 
					file: "<?=$data['subtitle']?>", 
					//label: "English",
					kind: "captions",
					"default": true 
				}],
				<?php
			}
			?>
			
			<?php
			if(isset($data['logo']) && !empty($data['logo'])){
				?>
				logo: {
					file: "<?=$data['logo']?>",
					position: 'top-left',
					margin: '10'
				},
				<?php
			}
			?>
    });
	
	playerInstance.addButton("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAASCAYAAABb0P4QAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCRDc2NUM3RDFEMEMxMUUyQjU2QUFCQUEyM0JGREJGRCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCRDc2NUM3RTFEMEMxMUUyQjU2QUFCQUEyM0JGREJGRCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkJENzY1QzdCMUQwQzExRTJCNTZBQUJBQTIzQkZEQkZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkJENzY1QzdDMUQwQzExRTJCNTZBQUJBQTIzQkZEQkZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+czMQdgAAAPdJREFUeNpi+P//PwMOzATEh/9jgp149DAwMeAGjFCMTRwnwGcgLnmKDGSgpoF/yfEyCxqfDYiTgZgZiP8BsTAWPSJAnATEXFBL5wLxL7gslpidiBSj/7DE8l8kdhtUD9wMbFHPAsQ9/wmDFmzJBld64gHi83gM24juMkIGgrAaEN/AYtg1IFbGpQ+fgSBsDMT3kAy7DcR6+PQQMhCEHZEMtCeknhFsKmGQD0oQQDyJYKoHGigEpGOBWAoq9g9NDcig31A2K5aEDcvzoLS4CeTM0v/UA8dBWY+PgXqAC5T1ZgLxdyAWQvIiOQUGKKh2ExspRAOAAAMARqI5WRk9ASEAAAAASUVORK5CYII%3D", "Download Video", function() {
        window.open(playerInstance.getPlaylistItem()['file'] + '&title=');
    }, "download");

 
</script>
<style type="text/css">
body{padding: 0; margin: 0;background: #000}
.jwplayer.jw-flag-aspect-mode, .video-js {width:100% !important; height: 100% !important}
#player{text-align: center;color:#fff;}
</style>
<!--iklan pop up paste disini-->