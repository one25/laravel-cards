$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


var BaseRecord=(function() {

return {

order: 'number',
direction: 'asc',
searchname: '',

errorAjax: '',
swalTitle: '',
confirmButtonText: '',
cancelButtonText: '',

buildParameters: function() {
    return {
        order: this.order,
        direction: this.direction,
        searchname: this.searchname,        
    }
},

spin:function() {
   $('#spinner').html('<span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>');
},

unSpin:function() {
   $('#spinner').empty();
},

ordering: function(url, that, errorAjax) {
    this.order = $(that).data('order');
    this.direction = $(that).data('direction');
    this.load(url, errorAjax);   
},

searching: function(url, that, errorAjax) {
    this.searchname = $(that).val();
    this.load(url, errorAjax);   
},

load: function(url, errorAjax) {
    $.get(url, this.buildParameters())
        .done(function (data) {
           BaseRecord.done(data);
           $('.listbuttonremove').click(function () {
              BaseRecord.destroy($(this), url, BaseRecord.swalTitle, BaseRecord.confirmButtonText, BaseRecord.cancelButtonText, BaseRecord.errorAjax);
              return false;
           });
        })
        .fail(function (data) {
        	//alert(data.responseText);
            BaseRecord.fail(errorAjax);
        }
        );
},

done: function (data) {
    $('#pannel').html(data.table);
    $('#pagination').html(data.pagination);
    this.unSpin();
},

fail: function (errorAjax) {
        this.unSpin();
        swal({
            title: errorAjax,
            type: 'warning'
        })
},

destroy:function(that, url, swalTitle, confirmButtonText, cancelButtonText, errorAjax) {
    swal({
        title: swalTitle,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText
    })
    .then(function () {
        BaseRecord.ajax(that.attr('href'), 'DELETE', url, errorAjax)
    });
},

ajax:function (target, verb, url, errorAjax) {
        this.spin();

        /*
        $.ajax({
            url: target,
            type: verb
        })
        .done(function () {
            BaseRecord.load(url, errorAjax);      
        })
        .fail(function () {
            BaseRecord.fail(errorAjax);
        });
        */


        var ajaxSetting = {
            url: target,
            type: verb,
            success: function(data) {
               BaseRecord.load(url, errorAjax);  
            },
            error: function(data) {
               BaseRecord.fail(errorAjax);
            },
        };        
        $.ajax(ajaxSetting);

},

}

})();