<div class="stickynav">
	
        <nav>
        <div class="stellarnav">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="Markdown">Markdown</a></li>
                <li><a href="Jac">Jac</a></li>
                <li><a href="">Item 4</a></li>
                <li><a href="">Item 5</a></li>
                <li><a href="">Item 6</a></li>
            </ul>
        </div><!-- .stellarnav -->
        </nav>
        
        <!-- required -->
        <script type='text/javascript' src="plugins/stellarnav-master/js/jquery_3.3.1.js"></script>
        <script type="text/javascript" src="plugins/stellarnav-master/js/stellarnav.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                jQuery('.stellarnav').stellarNav({
                    theme: '', // adds default color to nav. (light, dark)
                    breakpoint: 768, // number in pixels to determine when the nav should turn mobile friendly
                    menuLabel: 'Menu', // label for the mobile nav
                    sticky: false, // makes nav sticky on scroll (desktop only)
                    position: 'static', // 'static', 'top', 'left', 'right' - when set to 'top', this forces the mobile nav to be placed absolutely on the very top of page
                    openingSpeed: 250, // how fast the dropdown should open in milliseconds
                    closingDelay: 250, // controls how long the dropdowns stay open for in milliseconds
                    showArrows: true, // shows dropdown arrows next to the items that have sub menus
                    phoneBtn: '', // adds a click-to-call phone link to the top of menu - i.e.: "18009084500" EMPTY MEANS NO
                    phoneLabel: 'Call Us', // label for the phone button
                    locationBtn: '', // adds a location link to the top of menu - i.e.: "/location/", "http://site.com/contact-us/" EMPTY MEANS NO
                    locationLabel: 'Location', // label for the location button
                    closeBtn: false, // adds a close button to the end of nav
                    closeLabel: 'Close', // label for the close button
                    mobileMode: false,
                    scrollbarFix: false // fixes horizontal scrollbar issue on very long navs
                });
            });
        </script>
        <!-- required -->

        <script src="plugins/stellarnav-master/js/jquery-migrate-3.0.1.js"></script>
        
        

    <div style="clear:both"></div>
</div>

<div class="pagetitlecontainer">
    <div class="pagetitlecontent">
        <div class="folder-tab">
            <div class="menulabel">
                <span class="pagename">
                    <?php 
                        if ($pagename == "home") {
                            echo "Home";
                        } else {
                            echo ucwords($pagetitle);
                        } 
                    ?>
                </span>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>