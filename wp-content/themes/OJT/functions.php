<?php

//header画像投稿の設定のためのファンクション
	$defaults = array(
	'default-image'         => get_template_directory_uri() . '/img/visual_2_pc.png', //デフォルト画像
	'random-default'         => false, //ランダム表示
	'width'                  => '1027', //幅
	'height'                 => '448', //高さ
	'flex-height'            => false, //フレキシブル対応（高さ）
	'flex-width'             => false, //フレキシブル対応（幅）
	'default-text-color'     => '', //デフォルトのテキストの色
	'header-text'            => true, //ヘッダー画像上にテキストを表示する
	'uploads'                => true, //ファイルアップロードを許可する
	'wp-head-callback'       => '', 
	'admin-head-callback'    => '', 
	'admin-preview-callback' => '', 
);


add_theme_support( 'custom-header', $defaults );


//以下カスタム投稿タイプ追加の記述//

function cptui_register_my_cpts_infomation() {

	/**
	 * Post Type: お知らせ.
	 */

	$labels = array(
		"name" => __( "お知らせ", "custom-post-type-ui" ),
		"singular_name" => __( "お知らせ", "custom-post-type-ui" ),
		"menu_name" => __( "お知らせ", "custom-post-type-ui" ),
		"all_items" => __( "お知らせ一覧", "custom-post-type-ui" ),
		"add_new" => __( "新規お知らせの作成", "custom-post-type-ui" ),
		"add_new_item" => __( "お知らせを新規追加", "custom-post-type-ui" ),
		"edit_item" => __( "お知らせの内容", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "お知らせ", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "お知らせ一覧の為の投稿タイプ",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "info_archive",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "info", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "infomation", $args );
}

add_action( 'init', 'cptui_register_my_cpts_infomation' );
function cptui_register_my_taxes_info() {

	/**
	 * Taxonomy: お知らせ.
	 */

	$labels = array(
		"name" => __( "お知らせ", "custom-post-type-ui" ),
		"singular_name" => __( "お知らせ", "custom-post-type-ui" ),
		"menu_name" => __( "お知らせ", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "お知らせ", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'info', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "info",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "info", array( "infomation" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_info' );

//////////////////////////////////////////
//////ウィジェットに追加に関するコード///////
/////////////////////////////////////////



function twp_setup_theme(){
	//サムネイル画像を表示させるPHP
	add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 300, 300, false);
}
add_action( 'after_setup_theme', 'twp_setup_theme' );



//////////////////////////////////////////
//////ウィジェットに追加に関するコード///////
/////////////////////////////////////////










?>
