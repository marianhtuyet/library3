jQuery(document).ready(function(){
    jQuery(".thuvien-catalog-product-view .tinhtrang.unavaiable").hover(
        function(){
            var thisId = jQuery(this).attr("id");
            jQuery("#"+thisId+" .thongtinnguoimuon").show();
        },
        function() {
            var thisId = jQuery(this).attr("id");
            jQuery("#"+thisId+" .thongtinnguoimuon").hide();
        }
    );
    if(jQuery(".thuvien-phieusach-index").length){
        jQuery(window).scrollTop(0);
    };
	
	jQuery("#go-to-top").click(function(){
        jQuery('html,body').animate({ scrollTop: 0 }, 'slow');

    });

    jQuery(".thuvien-catalog-product-view .tinhtrang.bookborrow").hover(
        function(){
            var thisId = jQuery(this).attr("id");
            var realId = "#tt_dattruoc_"+thisId;
            jQuery(realId).show();

        },
        function() {
            var thisId = jQuery(this).attr("id");
            jQuery("#tt_dattruoc_"+thisId).hide();
        }

    );

});


