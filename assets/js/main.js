(function ($) {
    "use strict";

        // Testimonials carousel
        $(".testimonial-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            center: true,
            margin: 24,
            dots: true,
            loop: true,
            nav : false,
            responsive: {
                0:{
                    items:1
                },
                768:{
                    items:2
                },
                992:{
                    items:3
                }
            }
        });

        $(".list-group-item").on('click', function() {
              
            // Select all list items 
            var listItems = $(".list-group-item"); 
              
            // Remove 'active' tag for all list items 
            for (let i = 0; i < listItems.length; i++) { 
                listItems[i].classList.remove("active"); 
            } 
              
            // Add 'active' tag for currently selected item 
            this.classList.add("active"); 
        }); 
        
    $(document).ready(function() { 
            $('a').click(function() { 
                $('a.list-group-item.active').removeClass("active"); 
                $(this).addClass("active"); 
            }); 
        }); 
})(jQuery);

