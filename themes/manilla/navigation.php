<div class="stickynav">
	
        <nav>
        <div class="stellarnav">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="markdown">Markdown</a></li>
                <li><a href="jac">Jac</a></li>
                <li><a href="archives">Archives</a></li>
                <li><a href="">Item 5</a></li>
                <li><a href="">Item 6</a></li>
            </ul>
        </div><!-- .stellarnav -->
        </nav>


	<div class="pagetitlecontainer">
		<div class="pagetitlecontent">
			<div class="folder-tab">
				<div class="menulabel">
					<span class="pagename">
						<?php 
							if ($pagename == "home") {
								echo "Home";
							} else {
								if (isset ($pagetitle)) {
									echo ucwords($pagetitle); 
								}
							} 
						?>
					</span>
				</div>
			</div>
			<div style="clear:both"></div>
		</div>
		<div style="clear:both"></div>
	</div>
    <div style="clear:both"></div>
</div>