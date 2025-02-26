(function($) {
    "use strict";
    var HT = {};
    

    HT.getLocation = () => {
        $(document).on('change', '.location', function() {
            let _this = $(this);
            let option = {
                'data' : {
                    'location_id' : _this.val(),
                }, 
                'target' : _this.attr('data-target')
            }
            HT.sendDataTogetLocation(option);
            
        });
        
    };
    HT.sendDataTogetLocation = (option) => {
        $.ajax ({
            url: 'ajax/location/getLocation',
            type: 'GET',
            data: option,
            dataType: 'json',
            success : function (res){   
                
                $('.'+option.target).html(res.html);

                if(district_id != '' && option.target == 'districts') {
                    $('.districts').val(district_id).trigger('change')
                    console.log(district_id);
                }
                
                if(ward_id != '' && option.target == 'wards') {
                    $('.wards').val(ward_id).trigger('change')
                }
            },
            error : function(jqXHR,textStatus, errorThrown) {
                console.log('Lỗi');
                
            }
        })  
    }

    HT.loadCity = () => {
        if(province_id != '') {
            $(".province").val(province_id).trigger('change');
        }
    }

    $(document).ready(function() {
        HT.getLocation();  
        HT.loadCity();
    });

})(jQuery);
