jQuery(document).ready(function($){
      $('.dndicon').sortable({
        stop:function(event,ui){
          var new_order='';
          $('.dndicon > table').each(function(e,i){
            new_order += $(i).attr('id')+',';
          });
          new_order = new_order.slice(0,new_order.length-1);
          var ajax_data={'action':'wss_update_icon_order','new_order':new_order};
          $.post(ajaxurl,ajax_data,function(response){});
        } 
      });
    });

