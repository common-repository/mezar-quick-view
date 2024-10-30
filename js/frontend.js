jQuery(document).ready( function($) {

   var modal = document.getElementById("mezar_qv_modal");

   jQuery(".mezar-qv-button").click( function(e) {
   
      e.preventDefault(); 
      product_id = jQuery(this).attr("data-product_id")
      item = jQuery(this);
 
      jQuery.ajax({
         type : "post",
         dataType : "json",
         beforeSend: function() {
            item.css("opacity", '.7');
            item.css("cursor", 'none');
            item.find('.mezar-qv-preloader-container').show();
            item.find('i').css("opacity", '0');
            item.find('h1').css("opacity", '0');
         },
         url : mezar_Qv_Pro_Ajax.ajaxurl,
         data : {
            action: "mezar_qv_get_product",
            'product_id' : product_id,
         },
         success: function(response) {
            if(response.success == true) {
               var data = jQuery('.mezar-qv-content').data('animation');
               jQuery('.mezar-qv-content').addClass(data);
               jQuery('.mezar-qv-content').html(response.data);
               jQuery('#mezar_qv_modal').css('display', 'block');
               jQuery('.mezar-qv-content').show();
               item.css("opacity", '1');
               item.css("cursor", 'pointer');
               item.find('.mezar-qv-preloader-container').hide();
               item.find('i').css("opacity", '1');
               item.find('h1').css("opacity", '1'); 
            }
         }
      });  
   });

   jQuery('#mezar_qv_modal').on('click', '#mezar-qv-close', function() {
      var data = jQuery('.mezar-qv-content').data('animation');
      jQuery('.mezar-qv-content').removeClass(data);
      jQuery('.mezar-qv-content').addClass(data+"_out");
      jQuery('.mezar-qv-content').animate({
         opacity: 0,
      }, 300, function () {
         jQuery('#mezar_qv_modal').hide();
         jQuery('.mezar-qv-content').removeClass(data+"_out");
         jQuery('.mezar-qv-content').css('opacity', '1');
      });
   });

   window.onclick = function(event) {
      if (event.target == modal ) {
         var data = jQuery('.mezar-qv-content').data('animation');
         jQuery('.mezar-qv-content').removeClass(data);
         jQuery('.mezar-qv-content').addClass(data+"_out");
         jQuery('.mezar-qv-content').animate({
            opacity: 0,
         }, 300, function () {
            jQuery('#mezar_qv_modal').hide();
            jQuery('.mezar-qv-content').removeClass(data+"_out");
            jQuery('.mezar-qv-content').css('opacity', '1');
         });
         jQuery('body').css('overflow-y', 'auto');
      }
   }

   jQuery('#mezar_qv_modal').on('click', '.mezar_qv_prev_button, .mezar_qv_next_button', mezar_qv_handle_ajax);


   function mezar_qv_handle_ajax (e) {
   
      e.preventDefault(); 
      product_id = jQuery(this).attr("data-product_id")
 
      jQuery.ajax({
         type : "post",
         dataType : "json",
         beforeSend: function() {
            jQuery('#mezar_qv_modal #mezar-qv-preloader').css('visibility', 'visible');
            jQuery('.mezar-qv-content').css('cursor', 'none');
            jQuery('.mezar-qv-overlay').show();
            jQuery('.mezar-qv-product').css('overflow-y', 'hidden');
         },
         url : mezar_Qv_Pro_Ajax.ajaxurl,
         data : {
            action: "mezar_qv_get_product",
            'product_id' : product_id,
         },
         success: function(response) {
            if(response.success == true) {
               var data = jQuery('.mezar-qv-content').data('animation');
               jQuery('.mezar-qv-overlay').hide();
               jQuery('.mezar-qv-content').addClass(data);
               jQuery('.mezar-qv-content').html(response.data);
               jQuery('#mezar_qv_modal').css('display', 'block');
               jQuery('.mezar-qv-content').show(200);
               jQuery('#mezar_qv_modal #mezar-qv-preloader').css('visibility', 'hidden'); 
               jQuery('.mezar-qv-content').css('opacity', '1');
               jQuery('.mezar-qv-overlay').hide();
               jQuery('.mezar-qv-content').css('cursor', 'pointer');
               jQuery('.mezar-qv-product').css('overflow-y', 'auto'); 
            }  
         }
      });  
   }

});