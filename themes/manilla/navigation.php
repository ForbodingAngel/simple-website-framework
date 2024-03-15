<div class="stickynav">
	<div id="navcontainer">
        <script src="plugins/responsive-nav-js/responsive-nav.js"></script>
        <nav class="nav-collapse">
          <ul>
            <li><a class="menulabel" href="">Home</a></li>
            <li><a class="menulabel" href="">About</a></li>
            <li><a class="menulabel" href="">Projects</a></li>
            <li><a class="menulabel" href="">Blog</a></li>
              <li><a class="menulabel" href="">Home</a></li>
            <li><a class="menulabel" href="">About</a></li>
            <li><a class="menulabel" href="">Projects</a></li>
            <li><a class="menulabel" href="">Blog</a></li>
          </ul>
        </nav>

        <script>
          var navigation = responsiveNav(".nav-collapse", {
            animate: true,                    // Boolean: Use CSS3 transitions, true or false
            transition: 284,                  // Integer: Speed of the transition, in milliseconds
            label: "Menu",                    // String: Label for the navigation toggle
            insert: "after",                  // String: Insert the toggle before or after the navigation
            customToggle: "",                 // Selector: Specify the ID of a custom toggle
            closeOnNavClick: false,           // Boolean: Close the navigation when one of the links are clicked
            openPos: "relative",              // String: Position of the opened nav, relative or static
            navClass: "nav-collapse",         // String: Default CSS class. If changed, you need to edit the CSS too!
            navActiveClass: "js-nav-active",  // String: Class that is added to <html> element when nav is active
            jsClass: "js",                    // String: 'JS enabled' class which is added to <html> element
            init: function(){},               // Function: Init callback
            open: function(){},               // Function: Open callback
            close: function(){}               // Function: Close callback
          });
        </script>
        <div style="clear:both"></div>
	</div>
    <div style="clear:both"></div>
</div>