var page = {
    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());

        $.ajax({
            url: '/admin/page/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
              window.location = '/admin/pages/edit/' + result;
            }
        });
    },

   update: function(button) {
        var formData = new FormData();

        formData.append('page_id', $('#formPageId').val());
        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());
        formData.append('status', $('#status').val());
        formData.append('type', $('#type').val());

        $(button).addClass('loading');

        $.ajax({
            url: '/admin/page/update/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

              window.location.reload();
            }
        });
    }, 
    updateSegment: function(pageId, element) {
        var formData = new FormData();

        formData.append('page_id', pageId);
        formData.append('segment', $(element).val());

        var _this = this;
        $.ajax({
            url: '/admin/page/ajaxUpdateSegment/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
              result = JSON.parse(result);
              if (result.success == "false") {
                alert(result.message);
              }
              window.location.reload();
            }
        });
    }, 
};
