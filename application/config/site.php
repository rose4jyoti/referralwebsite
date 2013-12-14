<?php defined('SYSPATH') or die('No direct script access.');
	$ip = $_SERVER['REMOTE_ADDR'];
	//$ip = '182.72.62.190';
	/* rupeebot local 110
	'socialmediasettings' => array(
		"base_url" => "http://192.168.1.110:1042/user/callback",
		'Facebook' => array(
			'enabled' => true,
			'keys' => array(
				'id' => '485672134808863',
				'secret' => '939f56f7568f06a8f07612acf6c1b88d'
			),
			'display' => 'popup',
		),
		'Twitter' => array(
			'enabled' => true,
			'keys' => array(
				'key' => 'WeAvOSpvv8jcBf0IRBXw',
				'secret' => 'PjHMzRxRgZ5xicilv5gfTx5jQ9RgOnP6Df4xvUo4'
			)
		),
		"Google" => array ( 
			"enabled" => false,
			"keys"    => array (
				"id" => "",
				"secret" => ""
			), 
		),
	),
	
	// rupeebot testing
	'socialmediasettings' => array(
		"base_url" => "http://192.168.1.200:1042/user/callback",
		'Facebook' => array(
			'enabled' => true,
			'keys' => array(
				'id' => '361074890657639',
				'secret' => 'caa75904b5b84edb3c3dd3f51efd83ea'
			),
			'display' => 'popup',
		),
		'Twitter' => array(
			'enabled' => true,
			'keys' => array(
				'key' => 'WeAvOSpvv8jcBf0IRBXw',
				'secret' => 'PjHMzRxRgZ5xicilv5gfTx5jQ9RgOnP6Df4xvUo4'
			)
		),
		"Google" => array ( 
			"enabled" => false,
			"keys"    => array (
				"id" => "",
				"secret" => ""
			), 
		),
	),
	*/	

	return array(
		'socialmediasettings' => array(
			"base_url" => "http://192.168.1.110:1042/user/callback",
			'Facebook' => array(
				'enabled' => true,
				'keys' => array(
					'id' => '485672134808863',
					'secret' => '939f56f7568f06a8f07612acf6c1b88d'
				),
				'display' => 'popup',
			),
			'Twitter' => array(
				'enabled' => true,
				'keys' => array(
					'key' => 'WeAvOSpvv8jcBf0IRBXw',
					'secret' => 'PjHMzRxRgZ5xicilv5gfTx5jQ9RgOnP6Df4xvUo4'
				)
			),
			"Google" => array ( 
				"enabled" => false,
				"keys"    => array (
					"id" => "",
					"secret" => ""
				), 
			),
		),
		'providers' => array(
			'Facebook',
			'Twitter',
			'Google'
		),
		'email' => array( 
			'from' => 'kanagarajan.k@ndot.in',
			'name' => 'RupeeBot' 
		),
		'imageextensions' => array(
			'image/png' => '.png',
			'image/jpeg' => '.jpeg',
			'image/jpg' => '.jpg',
			//'image/gif' => '.jpg'
		),
		'frequency' => array(
			'Once a week',
			'Twice a week',
			'Once a month',
			'Twice a month'
		),
		'condition' => array(
			'New',
			'Used'
		),
		'jobs' => array(
			'Needed',
			'Offered'
		),
		'jobtype' => array(
			'Full Time',
			'Part time'
		),
		'gifttype' => array(
			'Card',
			'Product'
		),
		'warranty' => array(
			'No Warranty',
			'Less than 3 Months',
			'3-6 Months',
			'6-12 Months',
			'More than an year'
		),
		'tw_offline_share_content' => array(
			'text' => 'At Rupeebot, We Shop, Save and Earn together! Get your invite for a head start with bonus points!'
		),
		'fb_offline_share_content' => array(
			'caption' => 'Shop, Save and Earn together!',
			'description' => 'Rupeebot is a place to share your money saving finds, both local and online deals. Vote on fellow user submissions, comment, participate and earn points that can be redeemed. Click here and register interest, both of us can get a head start with bonus points.',
		),
		'share_text' => 'I would like to share the following link ',
		'post_types' => array( 'deal', 'coupon', 'freebie', 'trade', 'competition', 'services', 'jobs', 'ask', 'sell' ),
		'post_type_controllers' => array(
			'online_deal' => 'deals',
			'offline_deal' => 'deals',
			'coupon' => 'coupons',
			'freebie' => 'freebies',
			'competition' => 'competitions',
			'trade' => 'trades',
			'services' => 'services',
			'jobs' => 'job',
			'Jobs' => 'job',
			'ask' => 'asks',
			'sell' => 'sells'
		),
		'map_types' => array(
			'offline' => 'offline_deal_list',
			'jobs' => 'jobs_list',
			'trade' => 'trade_list',
			'sell' => 'sell_list'
		),
		'map_page_types' => array(
			'offline_deal_list' => 'offline',
			'offline_deal_detail' => 'offline',
			'jobs_list' => 'jobs',
			'jobs_detail' => 'jobs',
			'trade_list' => 'trade',
			'trade_detail' => 'trade',
			'sell_list' => 'sell',
			'sell_detail' => 'sell'
		),
		'rememberme_expiration' => 43200,
		'tinyurl_expiration' => 43200,
		'country' => array( 'IN' => 'India' ),
		'sitemode' => 'online',
		'dateformat' => 'Y-m-d H:i:s',
		'dateformat_short' => 'd/m/Y',
		'notif_interval' => 3,
		'user_point' => array(
			'post' => '5',
			'user_activiation' => '10',
			'comment' => '3',
			'vote' => '4',
			'watch' => '6',
			'user_dealheat' => '3',
			'user_dealcool' => '-2'
		),
		'user_karma' => array(
			'20' => '1',
			'30' => '2',
			'50' => '3',
			'100' => '4'
		),
		'twittershareurl' => 'http://twitter.com/share',
		'tmp' => 'public/uploads/images/tmp/',
		'user' => 'public/uploads/images/user/',
		'shop' => 'public/uploads/shop_logo/',
		'bank' => 'public/uploads/images/bank/',
		'posts' => 'public/uploads/posts/',
		'ads' => 'public/uploads/images/ads/',
		'giftshop' => 'public/uploads/Gift/',
		'badges' => 'public/uploads/images/badges/',
		'default' => 'public/uploads/images/default/',
		'tmpw' => 'image/tmp/:dim/:imgname',
		'userw' => 'image/user/:dim/:imgname',
		'bankw' => 'image/bank/:dim/:imgname',
		'postsw' => 'image/posts/:dim/:imgname',
		'defaultw' => 'image/default/:dim/:imgname',
		'badgesw' => 'image/badges/:dim/:imgname',
		'markitup_config' =>array(		
			'find' => array(	'[b]', '[/b]', '[i]', '[/i]', '[u]', '[/u]', '[quote1]', '[/quote1]', '[/url]' ),
			'replace' => array(	'<strong>', '</strong>', '<i>', '</i>', '<u>', '</u>', '<q>', '</div></div>', '</a>' ),
			'smilys_find' => array( '@=', '8-)', '>-)', '<3', ':$', '-_-', 'O.o', '}:-)', ':-D', '=/', ':(', ':-0' ),
			'smilys_replace' => array(
				'<span class="bbcode_smiley smile_bomb" title="@=">@=</span>',
				'<span class="bbcode_smiley smile_cool" title="8-)">8-)</span>',
				'<span class="bbcode_smiley smile_evil" title=">-)">>-)</span>',
				'<span class="bbcode_smiley smile_heart" title="<3"><3</span>',
				'<span class="bbcode_smiley smile_rupee" title=":$">:$</span>',
				'<span class="bbcode_smiley smile_sleep" title="-_-">-_-</span>',
				'<span class="bbcode_smiley smile_confuse" title="O.o">O.o</span>',
				'<span class="bbcode_smiley smile_devil" title="}:-)">}:-)</span>',
				'<span class="bbcode_smiley smile_happy" title=":-D">:-D</span>',
				'<span class="bbcode_smiley smile_mad" title="=/">=/</span>',
				'<span class="bbcode_smiley smile_sad" title=":(">:(</span>',
				'<span class="bbcode_smiley smile_yell" title=":-0">:-0</span>'
			),
			'preg_find' => array( '#\[url=([^\[\]]*?)\]#iD', '#\[img\]([^\[\]]*?)\[\/img\]#iD', '#\[quote(=[^0-9][a-zA-Z0-9_\-]*)?\]\[\/quote\]#iD', '#\[quote=?([^0-9][a-zA-Z0-9_\-]*)?\]#iD', '#\[\/quote\]#iD' ),
			'preg_replace' => array( 
				'<a href="$1" target="_blank">', 
				'<img src="$1" width="100" height="100" />', 
				'',
				'<div class="quotes_cnt"><p class="quotes_username">$1</p><div class="quotes_description">',
				'</div></div>' 
			),
			'Core.Encoding' => 'UTF-8',
			'HTML.Doctype' => 'XHTML 1.0 Transitional',
			'HTML.Allowed' => 'a[target|href],strong,u,i,q,span[class|title],img[src|width|height],div[class],p[class]'
		),
		'date_diff_str' => array(
			':years' => __('Years'),
			':months' => __('Months'),
			':hours' => __('Hours'),
			':minutes' => __('Minutes'),
			':seconds' => __('Seconds'),
			':days' => __('Days'),
			':year' => __('Year'),
			':month' => __('Month'),
			':hour' => __('Hour'),
			':minute' => __('Minute'),
			':second' => __('Second'),
			':day' => __('Day'),
		),
		'date_diff_str_short' => array(
			':years' => __('Yrs'),
			':months' => __('Months'),
			':hours' => __('Hrs'),
			':minutes' => __('Mins'),
			':seconds' => __('Secs'),
			':days' => __('Days'),
			':year' => __('Yr'),
			':month' => __('Month'),
			':hour' => __('Hr'),
			':minute' => __('Min'),
			':second' => __('Sec'),
			':day' => __('Day'),
		),
		'widgets' => array(
			'find_voucher_by_merchant' =>  __( 'Find Voucher by Merchant' ),
			'hottest_today' =>  __( 'Hottest Today' ),
			'subscription' =>  __( 'Subscription' ),
			'most_discussed' =>  __( 'Most Discussed' ),
			'recently_submitted' =>  __( 'Recently Submitted' ),
			'user_activity' =>  __( 'User Activity' ),
			'featured_deals_and_coupons' =>  __( 'Featured Deals & Coupons' ),
			'featured_store' =>  __( 'Featured Store' ),
			'featured_review' =>  __( 'Featured Review' ),
			'submit_merchant' =>  __( 'Submit a Merchant' ),
			'submit_coupon' =>  __( 'Submit a Coupon' ),
			'submit_review' => __( 'Submit Review' ),
			'facebook_fanpage' =>  __( 'Facebook Fanpage' ),
			'gmap' => __('Gmap'),
			'top_merchant' => __('Top Merchant'),
			'top_users' => __('Top User'),
		),
		'pages' => array(
					'home' , 
					'online_deal_list' , 
					'online_deal_detail' , 
					'offline_deal_list' , 
					'offline_deal_detail' , 
					'coupon_list' , 
					'coupon_detail' , 
					'freebie_list' , 
					'freebie_detail' , 
					'competition_list' , 
					'competition_detail' , 
					'sell_list' , 
					'sell_detail' , 
					'jobs_list' , 
					'jobs_detail' , 
					'ask_list' , 
					'ask_detail' , 
					'merchant_list' , 
					'merchant_detail' , 
					'trade_list' , 
					'trade_detail'
		),
		'announcement_pages' => array(
					'home' , 
					'deal_list' , 
					'deal_detail' , 
					'coupon_list' , 
					'coupon_detail' , 
					'freebie_list' , 
					'freebie_detail' , 
					'competition_list' , 
					'competition_detail' , 
					'sell_list' , 
					'sell_detail' , 
					'jobs_list' , 
					'jobs_detail' , 
					'ask_list' , 
					'ask_detail' , 
					'merchant_list' , 
					'merchant_detail' , 
					'trade_list' , 
					'trade_detail'
		),
		'reviewreason' =>array(
					'Prospective Purchase',
					'Window Shopping',
					'Technical Guidance',
					'Purchase',
					'Returns/Refunds',
					'Warranty Issues'
		),
		'captcha' => array(
			'message' => array(
				'timeinseconds' => 1000,
				'count' => 2
			),
			'comment' => array(
				'timeinseconds' => 1000,
				'count' => 2
			)
		),
		'ipinfodb' => array(
			'statusCode' => 'OK',
			'statusMessage' => '',
			'ipAddress' => '',
			'countryCode' => 'IN',
			'countryName' => 'INDIA',
			'regionName' => 'COIMBATORE',
			'cityName' => 'COIMBATORE',
			'zipCode' => '',
			'latitude' => '11',
			'longitude' => '76.9667',
			'timeZone' => '',
		),
		'activitytype_image' => array(
			'General' => 'public/images/notification_blue_button.png',
			'Positive' => 'public/images/notification_green_button.png',
			'Negative' => 'public/images/notification_red_button.png',
			'default' => 'public/images/notification_blue_button.png'
		),
		'chicklet_iframe_style' => array(
			'horizontal',
			'vertical',
			'compact',
			'professionnel'
		),		
		'alerttimeunit' => array(
			'HOUR' => 'Hours',
			'DAY' => 'Days',
			'MINUTE' => 'Minutes',
			'SECOND' => 'Seconds'
		),
		'admin_post_type' => array(
			'online_deal' => 'onlinedeals',
			'offline_deal' => 'offlinedeals',
			'coupon' => 'coupons',
			'freebie' => 'freebies',
			'competition' => 'competitions',
			'sell' => 'sells',
			'trade' => 'trades',
			'Jobs' => 'jobs'
		),
		'newsletter_groups' => array(
			14 => 'dailydealdigest',
			15 => 'weeklydealdigest',
			16 => 'top10reviews',
			17 => 'howtosavemoney',
			18 => 'rupeebotrecommendations',
			19 => 'dailyperformance',
			20 => 'weeklyperformance',
			21 => 'monthlyperformance'
		),
		'ip_address' => $ip,
		// TODO: have to change this configuration from here to database
	);
