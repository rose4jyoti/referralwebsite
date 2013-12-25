if(typeof console == 'undefined') {
    var console = {
        'log': function() {
        
        }
    };
}

(function($) {
    sharebars = [];
    
    $(document).ready(function() {
        $('div.supersocialshare').each(function() {
            sharebars.push(ShareBar(this));
        });
    });
    
    ShareBar = function(element) {
        var self = this;
        var me = element;
        var networks = [];
        var url = document.URL;
        var style = 'bubble';
        var orientation = 'arc';
        var angle = 0;
        var radius = 80;
        var gap = 50;
        var share_title = '';
        var open = 'false';
        
        if($(me).attr('data-url'))
            url = $(me).attr('data-url')
        
        if($(me).attr('data-networks'))
            networks = $(me).attr('data-networks').split(',');
        
        if($(me).attr('data-style'))
            style = $(me).attr('data-style');
        
        if($(me).attr('data-orientation'))
            orientation = $(me).attr('data-orientation');
        
        if($(me).attr('data-angle'))
            angle = parseInt($(me).attr('data-angle'));
        
        if($(me).attr('data-radius'))
            radius = parseInt($(me).attr('data-radius'));
        
        if($(me).attr('data-gap'))
            gap = parseInt($(me).attr('data-gap'));
        
        if($(me).attr('data-title'))
            share_title = $(me).attr('data-title');
        
        if($(me).attr('data-open'))
            open = $(me).attr('data-open').toLowerCase();
        
        open = open != 'false';
        
        init = function() {
            if(!style_templates[style]) {
                console.log('ShareBar | INFO:Invalid style supplied. Exiting.');
                return;
            }
            
            $(me).addClass(style);
            
            template = style_templates[style];
            
            $(me).html(template['holder']);
            
            var $network_holder = $(me).find('.sb_network_holder');
            
            for(var networkIdx = 0; networkIdx < networks.length; networkIdx++) {
                var network = networks[networkIdx];
                if(!supported_networks[network]) {
                    console.log('Unsupported Network specified. Skipping.');
                    continue;
                }
                
                var network_settings = supported_networks[network];
                var share_url = network_settings['url'].replace(/\[URL\]/gi,encodeURIComponent(url)).replace(/\[SHARETITLE\]/gi,encodeURIComponent(share_title));
                
                var button_html = template['network_button']
                                        .replace(/\[SHARE_URL\]/gi,share_url)
                                        .replace(/\[NAME\]/gi,network_settings['name'])
                                        .replace(/\[NETWORK\]/gi,network);
                var $button = $(button_html);
                
                $button.click(function(e){
                    var network_settings = supported_networks[$(this).attr('data-network')];
                    if(network_settings['window'] && $(this).attr('href') && $(this).attr('target') == '_blank') {
                        e.preventDefault()
                        window.open($(this).attr('href'),network_settings['name'],network_settings['window']);
                    }
                });
                
                $network_holder.append($button);
            }
            
            if(style_functionality[style])
                style_functionality[style](template);
            
            if(open)
                $(me).find('.sb_main').click();
        };
        
		
		
		
		
		
		

        var style_templates = {
            'bubble': {
                'holder':
                    '<a style="display:none;" class="sb_main" title="Share" alt="Share">Share</a>' +
                    '<div class="sb_network_holder"></div>',
                'network_button':
                    '<a class="sb_network_button [NETWORK]" target="_blank" href="[SHARE_URL]" data-network="[NETWORK]">[NAME]</a>',
                
				'orientations': {
                    'arc':function() {
                        if($(this).hasClass('disabled'))
                            return;
                        var move_speed = 250;
                        var step = 250;
                        
                        var num_points = $(me).find('.sb_network_button').length;
                        
                        var total_time = move_speed + (num_points - 1)*step;
                        var index = 0;
                        
                        var core_button_width = $(this).width();
                        var core_button_height = $(this).height();
                        
                        var network_button_width = $(me).find('.sb_network_button:eq(0)').width();
                        var network_button_height = $(me).find('.sb_network_button:eq(0)').height();
                        
                        var middle_x = (core_button_width - network_button_width) / 2;
                        var middle_y = (core_button_height - network_button_height) / 2;
                        
                        if(!$(this).hasClass('active')) {
                            $(this).addClass('disabled').delay(total_time).queue(function(next){
                                $(this).removeClass('disabled').addClass('active');
                                next();
                            });
                            
                            var angle_start = angle;
                            var arc_length = 180;
                            
                            var increment = arc_length / num_points;
                            var current_point = angle_start + (increment / 2);
                            
                            $(me).find('.sb_network_button').each(function() {
                                var current_point_radians = (current_point / 180) * Math.PI;
                                var outwards_x = middle_x + radius * Math.cos(current_point_radians);
                                var outwards_y = middle_y + radius * Math.sin(current_point_radians);
                                $(this).css({'display':'block','left':middle_x+'px','top':middle_y+'px'}).stop().delay(step*index).animate({'left':outwards_x+'px','top':outwards_y+'px'}, move_speed);
                                
                                current_point += increment;
                                index++;
                            });
                        } else {
                            index = num_points - 1;
                            $(this).addClass('disabled').delay(total_time).queue(function(next){
                                $(this).removeClass('disabled').removeClass('active');
                                next();
                            });
                            
                            $(me).find('.sb_network_button').each(function() {
                                $(this).stop().delay(step*index).animate({'left':middle_x,'top':middle_y},move_speed);
                                index--;
                            });
                        }
                    },
					
					
                    'line':function() {
                        if($(this).hasClass('disabled'))
                            return;
                        var move_speed = 500;
                        var step = 250;
                        
                        var num_points = $(me).find('.sb_network_button').length;
                        var point_distance = gap;
                        var total_time = move_speed + (num_points - 1)*step;
                        var index = 1;
                        
                        var core_button_width = $(this).width();
                        var core_button_height = $(this).height();
                        
                        var network_button_width = $(me).find('.sb_network_button:eq(0)').width();
                        var network_button_height = $(me).find('.sb_network_button:eq(0)').height();
                        
                        var middle_x = (core_button_width - network_button_width) / 2;
                        var middle_y = (core_button_height - network_button_height) / 2;
                        
                        var current_point_radians = (angle / 180) * Math.PI;
                        
                        if(!$(this).hasClass('active')) {
                            $(this).addClass('disabled').delay(total_time).queue(function(next){
                                $(this).removeClass('disabled').addClass('active');
                                next();
                            });
                            
                            $(me).find('.sb_network_button').each(function() {
                                var outwards_x = middle_x + (middle_x + point_distance * index) * Math.cos(current_point_radians);
                                var outwards_y = middle_y + (middle_y + point_distance * index) * Math.sin(current_point_radians);
                                $(this).css({'display':'block','left':middle_x+'px','top':middle_y+'px'}).stop().delay(step*index).animate({'left':outwards_x+'px','top':outwards_y+'px'}, move_speed);
                                
                                index++;
                            });
                        } else {
                            index = num_points;
                            $(this).addClass('disabled').delay(total_time).queue(function(next){
                                $(this).removeClass('disabled').removeClass('active');
                                next();
                            });
                            $(me).find('.sb_network_button').each(function() {
                                $(this).stop().delay(step*index).animate({'left':middle_x,'top':middle_y},move_speed);
                                
                                index--;
                            });
                        }
                    }
                }
            }
        };
        
		
		
		
		
		
		
		
		
		
		
		
        var style_functionality = {
            'bubble':function(template) {
                var click_function = template['orientations']['arc'];
                if(template['orientations'][orientation])
                    click_function = template['orientations'][orientation];
                
                $(me).find('.sb_main').click(click_function);
            }
        };
        
        var supported_networks = {
            'facebook':{
                'url':'http://www.facebook.com/sharer.php?u=[URL]',
                'name':'Facebook',
                'window':'width=500,height=311,scrollbars=no'
            },
            'google':{
                'url':'https://plus.google.com/share?url=[URL]',
                'name':'Google Plus',
                'window':'width=600,height=330,scrollbars=no'
            },
            'twitter':{
                'url':'https://twitter.com/intent/tweet?url=[URL]',
                'name':'Twitter',
                'window':'width=560,height=257,scrollbars=no'
            },
            'pinterest':{
                'url':'javascript:void((function(d)%7Bvar%20e%3Dd.createElement(%27script%27)%3Be.setAttribute(%27type%27,%27text/javascript%27)%3Be.setAttribute(%27charset%27,%27UTF-8%27)%3Be.setAttribute(%27src%27,%27//assets.pinterest.com/js/pinmarklet.js%3Fr%3D%27%2BMath.random()*99999999)%3Bd.body.appendChild(e)%7D)(document))%3B',
                'name':'Pinterest'
            },
            'linkedin':{
                'url':'http://www.linkedin.com/shareArticle?mini=true&url=[URL]',
                'name':'LinkedIn',
                'window':'width=520,height=570,scrollbars=no'
            },
            'email':{
                'url':'mailto:?Subject=[SHARETITLE]&Body=[URL]',
                'name':'E-Mail'
            }
        };
        
        self.url = url;
        self.me = element;
        self.networks = networks;
        
        init();
    };
})(jQuery);