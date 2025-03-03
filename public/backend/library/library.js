(function($) {
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');


    HT.switchery = () => {
        $('.js-switch').each(function() {
            var switchery = new Switchery(this, { color: '#1AB394' });
        })
    }

    HT.select2 = () => {
        if($('.setupSelect2').length) {
            $('.setupSelect2').select2;
        }

    }

    HT.changStatus = () => {
        
        $(document).on('change', '.status', function(e) {
            let _this =$(this)
            
            let option = {
                'value' : _this.val(),
                'modelId' : _this.attr('data-modelId'),
                'model' : _this.attr('data-model'),
                'field': _this.attr('data-field'),
                '_token' : _token
            }
            $.ajax ({
                url: 'ajax/dashboard/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success : function (res){   
                    
                    
                },
                error : function(jqXHR,textStatus, errorThrown) {
                    console.log('Lỗi');
                    
                }
            }) 
            
            e.preventDefault();
        });
        

    }


    HT.checkAll = () => {
        if($('#checkAll').length) {
            $(document).on('click' ,'#checkAll', function() {
                let isChecked = $(this).prop('checked');



                $('.checkBoxItem').prop('checked', isChecked)

                $('.checkBoxItem').each(function () {
                    let _this = $(this)
                    if(_this.prop('checked')) {
                        _this.closest('tr').addClass('active-bg')
                    }else {
                        _this.closest('tr').removeClass('active-bg')

                    }
                })
                
            });


        }
    }


    HT.checkBoxItem = () => {
        if($('.checkBoxItem').length) {
            $(document).on('click', '.checkBoxItem' , function () {
                let _this = $(this)

                HT.changBackground(_this)
                HT.allCheck()
                
            })
        }
    }

    HT.changBackground  = (object) => {
        let isChecked =object.prop('checked');
        if(isChecked) {
           object.closest('tr').addClass('active-bg')


        }else {
           object.closest('tr').removeClass('active-bg')

        }

    }

    HT.allCheck = () => {
        let allCheck = $('.checkBoxItem:checked').length === $('.checkBoxItem').length;
        $('#checkAll').prop('checked', allCheck)
    }
    HT.changStatusAll = () => {
        if($('.changeStatusAll').length) {
            $(document).on('click', '.changeStatusAll', function(e) {
                let _this = $(this)
                let id = []
                $('.checkBoxItem').each(function() {
                    let checkBox = $(this)
                    if (checkBox.prop('checked')) {
                        id.push(checkBox.val())
                    }
                })
                let option = {
                    'value': _this.attr('data-value'),
                    'model': _this.attr('data-model'),
                    'field': _this.attr('data-field'),
                    'id': id,
                    '_token': _token
                }
                $.ajax ({
                    url: 'ajax/dashboard/changeStatusAll',
                    type: 'POST',
                    data: option,
                    dataType: 'json',
                    success: function (res) {   
                        if (res.flag == true) {
                            let cssActive1 = {
                                'background-color': 'rgb(26, 179, 148)',
                                'border-color': 'rgb(26, 179, 148)',
                                'box-shadow': 'rgb(26, 179, 148) 0px 0px 0px 16px inset',
                                'transition': 'border 0.4s, box-shadow 0.4s, background-color 1.2s'
                            };
                    
                            let cssActive2 = {
                                'left': '20px',
                                'background-color': 'rgb(255, 255, 255)',
                                'transition': 'background-color 0.4s, left 0.2s'
                            };
                    
                            let cssUnActive1 = {
                                'box-shadow': 'rgb(223, 223, 223) 0px 0px 0px 0px inset',
                                'border-color': 'rgb(223, 223, 223)',
                                'background-color': 'rgb(255, 255, 255)',
                                'transition': 'border 0.4s, box-shadow 0.4s'
                            };
                            
                            let cssUnActive2 = {
                                'left': '0px',
                                'background-color': 'rgb(255, 255, 255)',
                                'transition': 'background-color 0.4s, left 0.2s'
                            };
                            
                                for (let i = 0; i < id.length; i++) {
                                    let switchElement = $('.js-switch-' + option.id[i]);
                    
                                    
                                    if (option.value == 1) {
                                        switchElement.find('span.switchery').css(cssActive1).find('small').css(cssActive2);
                                    } else if(option.value == 0){
                                        switchElement.find('span.switchery').css(cssUnActive1).find('small').css(cssUnActive2);

                                    }
                                }
                        }
                    },
                    
                    
                    error : function(jqXHR,textStatus, errorThrown) {
                        console.log('Lỗi');
                        
                    }
                }) 
                
                e.preventDefault();
            })
        }
    }
    
    $(document).ready(function(){
        HT.switchery();
        HT.select2();
        HT.changStatus();
        HT.checkAll();
        HT.checkBoxItem();
        HT.changStatusAll();

        
        
    });
})(jQuery);