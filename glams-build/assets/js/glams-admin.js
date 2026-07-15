(function($){
  'use strict';
  var nonce = GLAMS_ADMIN.nonce;
  var ajax  = GLAMS_ADMIN.ajax;

  // Activities
  $('#glams-add-act').on('click',function(){ $('#act-id').val(0);$('#act-en,#act-ar').val('');$('#act-status').val('active');$('#act-order').val('99');$('#glams-act-form').slideDown(); });
  $('#glams-cancel-act').on('click',function(){ $('#glams-act-form').slideUp(); });
  $(document).on('click','.glams-edit-act',function(){
    var d=$(this).data();
    $('#act-id').val(d.id);$('#act-en').val(d.en);$('#act-ar').val(d.ar);$('#act-status').val(d.status);$('#act-order').val(d.order);
    $('#glams-act-form').slideDown();$('html,body').animate({scrollTop:$('#glams-act-form').offset().top-60},300);
  });
  $('#glams-save-act').on('click',function(){
    $.post(ajax,{action:'glams_save_activity',nonce:nonce,id:$('#act-id').val(),activity_en:$('#act-en').val(),activity_ar:$('#act-ar').val(),status:$('#act-status').val(),sort_order:$('#act-order').val()},function(r){
      if(r.success){location.reload();}
    });
  });
  $(document).on('click','.glams-del-act',function(){
    if(!confirm('Delete this activity?'))return;
    var id=$(this).data('id');
    $.post(ajax,{action:'glams_delete_activity',nonce:nonce,id:id},function(r){if(r.success)location.reload();});
  });

  // Services
  $('#glams-add-svc').on('click',function(){ $('#svc-id').val(0);$('#svc-en,#svc-ar,#svc-icon,#svc-desc').val('');$('#svc-order').val('99');$('#glams-svc-form').slideDown(); });
  $('#glams-cancel-svc').on('click',function(){ $('#glams-svc-form').slideUp(); });
  $(document).on('click','.glams-edit-svc',function(){
    var d=$(this).data();
    $('#svc-id').val(d.id);$('#svc-en').val(d.en);$('#svc-ar').val(d.ar);$('#svc-icon').val(d.icon);$('#svc-order').val(d.order);$('#svc-desc').val(d.desc);
    $('#glams-svc-form').slideDown();
  });
  $('#glams-save-svc').on('click',function(){
    $.post(ajax,{action:'glams_save_service',nonce:nonce,id:$('#svc-id').val(),title_en:$('#svc-en').val(),title_ar:$('#svc-ar').val(),icon:$('#svc-icon').val(),sort_order:$('#svc-order').val(),description:$('#svc-desc').val()},function(r){
      if(r.success)location.reload();
    });
  });

  // Company
  $('#glams-save-company').on('click',function(){
    var data={action:'glams_save_company',nonce:nonce};
    $('#glams-company-form [name]').each(function(){data[$(this).attr('name')]=$(this).val();});
    $.post(ajax,data,function(r){if(r.success){$('#glams-company-msg').show();setTimeout(function(){$('#glams-company-msg').fadeOut();},2000);}});
  });

  // Settings
  $('#glams-save-all-settings').on('click',function(){
    var calls=[];
    $('.glams-setting').each(function(){
      var k=$(this).data('key'),v=$(this).val();
      calls.push($.post(ajax,{action:'glams_save_setting',nonce:nonce,key:k,val:v}));
    });
    $.when.apply($,calls).done(function(){$('#glams-settings-msg').show();setTimeout(function(){$('#glams-settings-msg').fadeOut();},2000);});
  });

  // Logo uploader
  $(document).on('click','.glams-upload-logo',function(e){
    e.preventDefault();
    var target=$(this).data('target');
    var frame=wp.media({title:'Select Logo',button:{text:'Use This Logo'},multiple:false});
    frame.on('select',function(){
      var a=frame.state().get('selection').first().toJSON();
      $('#'+target+'-preview').html('<img src="'+a.url+'" style="max-height:60px;margin-left:10px;vertical-align:middle;border-radius:4px"/>');
    });
    frame.open();
  });

})(jQuery);
