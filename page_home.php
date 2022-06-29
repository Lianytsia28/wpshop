    <?php get_header() ?>
    <?php
        /* Template Name: home */ 
    ?>
            <?php
                require_once ("template/sliderHome.php");
                require_once ("template/advertising.php");
                require_once ("template/slickHome.php");
                require_once ("template/recommendedPproducts.php");
            ?>
            
	<script type="text/javascript" src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
    <script type="text/javascript">jssor_1_slider_init();</script>
        <script type="text/javascript">
            const labels = document.querySelectorAll(".accordion-item__label");
            const tabs = document.querySelectorAll(".accordion-tab");
                function toggleShow() {
	                const target = this;
	                const item = target.classList.contains("accordion-tab")
		            ? target
		            : target.parentElement;
	                const group = item.dataset.actabGroup;
	                const id = item.dataset.actabId;

	                tabs.forEach(function(tab) {
		                if (tab.dataset.actabGroup === group) {
			            if (tab.dataset.actabId === id) {
				        tab.classList.add("accordion-active");
			            } else {
				    tab.classList.remove("accordion-active");
			        }
		                }
	                });

	                labels.forEach(function(label) {
		            const tabItem = label.parentElement;

		                if (tabItem.dataset.actabGroup === group) {
			            if (tabItem.dataset.actabId === id) {
				        tabItem.classList.add("accordion-active");
			        } else {
				    tabItem.classList.remove("accordion-active");
			                }
		                }
	                }); 
                }

                labels.forEach(function(label) {
	            label.addEventListener("click", toggleShow);
                    });

                tabs.forEach(function(tab) {
	            tab.addEventListener("click", toggleShow);
                    });
        </script>

    <?php get_footer() ?>
    