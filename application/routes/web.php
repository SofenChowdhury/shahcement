<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['middleware' => ['auth','admin']], function () {

	/************************* Admin ******************************/
	Route::get('/admin/dashboard','admin\DashboardController@Index')->name('dashboard');
	/************************* User ******************************/
	Route::get('/admin/user','admin\UserController@Index')->name('user');
	Route::post('/saveUser','admin\UserController@saveUser')->name('saveUser');
	Route::post('/updateUser','admin\UserController@updateUser')->name('updateUser');
	Route::get('/user/delete/{id}','admin\UserController@Delete')->name('delete_user');

	/************************* Post ******************************/
	Route::get('/admin/blog/posts','admin\BlogController@Index')->name('posts');
	Route::get('/admin/blog/post/delete/{id}','admin\BlogController@Delete')->name('delete_post');
	Route::get('/approvePost/{id}/{id2}','admin\BlogController@approvePost')->name('approvePost');

	/************************* Forums ******************************/
	Route::get('/admin/blog/forums','admin\ForumController@Index')->name('admin_forums');
	Route::get('/admin/blog/forum/delete/{id}','admin\ForumController@Delete')->name('delete_forums');
	Route::post('/saveForums','admin\ForumController@saveForums')->name('saveForums');
	Route::post('/updateForums','admin\ForumController@updateForums')->name('updateForums');
	Route::get('/actionForums/{id}/{id2}','admin\ForumController@actionForums')->name('actionForums');

	/************************* Forums Members ******************************/
	Route::get('/admin/blog/forums/members','admin\ForumMemberController@Index')->name('forums_members');
	Route::get('/actionForumMember/{id}/{id2}','admin\ForumMemberController@actionForumMember')->name('actionForumMember');
	Route::get('/admin/blog/forum/member/delete/{id}','admin\ForumMemberController@Delete')->name('delete_member');

	/************************* Site Settings ******************************/
	Route::get('/admin/blog/site/setup','admin\SettingController@Index')->name('setup_site');
	Route::post('/updateSettingForums','admin\SettingController@updateSettingForums')->name('updateSettingForums');
	
	/************************* Admin/Ebook ******************************/
	Route::get('/admin/blog/e-library','admin\EbookController@Index')->name('library');
	Route::post('/saveLbrary','admin\EbookController@saveLbrary')->name('saveLbrary');
	Route::post('/updateLibrary','admin\EbookController@updateLibrary')->name('updateLibrary');
	Route::get('/actionLibrary/{id}/{id2}','admin\EbookController@actionLibrary')->name('actionLibrary');
	Route::get('/admin/blog/library/delete/{id}','admin\EbookController@Delete')->name('delete_library');
	
	/************************* Admin/Construction Rule ******************************/
	Route::get('/admin/blog/construction/rule','admin\ConstructionController@Index')->name('con_rule');
	Route::post('/saveConstructionRule','admin\ConstructionController@save')->name('saveConstructionRule');
	Route::post('/updateConstructionRule','admin\ConstructionController@update')->name('updateConstructionRule');
	Route::get('/admin/blog/construction/rule/delete/{id}','admin\ConstructionController@Delete')->name('delete_construction_rule');
	Route::get('/actionConstructionRule/{id}/{id2}','admin\ConstructionController@actionConstructionRule')->name('actionConstructionRule');

	/************************* Admin/Directory ******************************/
	Route::get('/admin/blog/construction/directory','admin\DirectoryController@Index')->name('admin_directory');
	Route::post('/saveDirectory','admin\DirectoryController@saveDirectory')->name('saveDirectory');
	Route::post('/updateDirectory','admin\DirectoryController@updateDirectory')->name('updateDirectory');
	Route::get('/actionDirectoryMember/{id}/{id2}','admin\DirectoryController@actiondirectory')->name('actiondirectory');
	Route::get('/admin/blog/directory/member/delete/{id}','admin\DirectoryController@Delete')->name('delete_directory');

	/************************* Admin/Gallery ******************************/
	Route::get('/admin/blog/gallery','admin\GalleryController@Index')->name('admin_gallery');
	Route::post('/saveGallery','admin\GalleryController@Save')->name('saveGallery');
	Route::get('/admin/blog/gallery/delete/{id}','admin\GalleryController@Delete')->name('delete_gallery');
	Route::get('/actionGallery/{id}/{id2}','admin\GalleryController@actionGallery')->name('actiongallery');

	/************************* Admin/Videos ******************************/
	Route::get('/admin/blog/videos','admin\VideoController@Index')->name('admin:videos');
	Route::post('/saveVideo','admin\VideoController@Save')->name('saveVideo');
	Route::post('/updateVideo','admin\VideoController@Update')->name('updateVideo');
	Route::get('/admin/blog/video/delete/{id}','admin\VideoController@Delete')->name('delete_video');
	Route::get('/actionVideo/{id}/{id2}','admin\VideoController@actionVideo')->name('actionvideo');

	/************************* Information & Advice ******************************/
	Route::get('/admin/blog/messages','admin\MessageController@Index')->name('admin_messages');
	Route::get('/admin/blog/messages/{id}','admin\MessageController@getMessages')->name('getMessages');
	Route::get('/admin/blog/message/replied/{id}','admin\MessageController@replied_messages')->name('replied_messages');
	Route::post('/admin/replay/message','admin\MessageController@Replay')->name('admin_replay');

	/************************* Location & Service ******************************/
	Route::get('/admin/location','admin\LocationController@Index')->name('admin_location');
	Route::post('/saveDivision','admin\LocationController@SaveDivision')->name('saveDivision');
	Route::post('/saveCity','admin\LocationController@SaveCity')->name('saveCity');
	Route::post('/saveService','admin\LocationController@SaveService')->name('saveService');
	Route::get('/admin/location/division/delete/{id}','admin\LocationController@DeleteDivision')->name('delete_division');
	Route::get('/admin/location/city/delete/{id}','admin\LocationController@DeleteCity')->name('delete_city');
	Route::get('/admin/location/city/service/delete/{id}','admin\LocationController@DeleteService')->name('delete_service');
	// Route::get('/actionGallery/{id}/{id2}','admin\LocationController@actionGallery')->name('actiongallery');

});
Route::group(['middleware' => ['auth']], function () {
	/************************* Website ******************************/
	Route::get('/','frontend\NewsfeedController@Index');
	Route::get('news-feed','frontend\NewsfeedController@Index')->name('index');
	Route::get('get_post_data/{id}','frontend\NewsfeedController@get_post_data')->name('get_post_data');

	/************************* Creat Post ******************************/
	Route::post('/savePost','admin\BlogController@savePost')->name('savePost');
	Route::get('/post_comment','frontend\CommentController@post_comment')->name('post_comment');
	Route::get('/react_post','frontend\CommentController@react_post')->name('react_post');
    Route::post('ckeditor/upload','admin\BlogController@upload')->name('ckeditor.upload');
	Route::get('ckeditor/brows/image','admin\BlogController@browsImage')->name('ckeditor.browsImage');
	/************************* Profile ******************************/
	Route::get('profile/about','frontend\ProfileController@About')->name('about');
	Route::get('profile','frontend\ProfileController@Profile')->name('profile');
	Route::get('profile/timeline','frontend\ProfileController@Timeline')->name('timeline');
	Route::get('profile/about','frontend\ProfileController@About')->name('about');
	Route::get('profile/photos','frontend\ProfileController@Photos')->name('photos');
	Route::get('profile/videos','frontend\ProfileController@Videos')->name('videos');
	Route::get('profile/groups','frontend\ProfileController@Groups')->name('groups');
	Route::get('profile/edit','frontend\ProfileController@Edit')->name('edit');
	Route::get('submitUserInfo','frontend\ProfileController@submitUserInfo')->name('submitUserInfo');

	/************************* E-book ******************************/
	Route::get('e-book/list','frontend\EBookController@Index')->name('e_book');
	Route::get('searchEbook','frontend\EBookController@searchEbook')->name('searchEbook');

	/************************* forums ******************************/
	Route::get('forums/list','frontend\ForumController@Index')->name('forums');
	Route::get('/join_group/{id}/{id2}','frontend\ForumController@joinGroup')->name('join_group');
	Route::get('/blog/forum/{id}','frontend\ForumController@BlogForum')->name('blog_forums');
    Route::get('searchForum','frontend\ForumController@searchForum')->name('searchForum');
    Route::get('searchPost','frontend\ForumController@searchPost')->name('searchPost');
	/************************* Gallery ******************************/
	Route::get('gallery/list','frontend\GalleryController@Index')->name('gallery');

	/************************* videos ******************************/
	Route::get('nirmane-ami/videos','frontend\GalleryController@Videos')->name('frontend:videos');

	/************************* Directory ******************************/
	Route::get('directory/list','frontend\DirectoryController@Index')->name('directory');
	Route::get('searchDirectory','frontend\DirectoryController@searchDirectory')->name('searchDirectory');
	Route::get('/admin/city/data/{id}','admin\LocationController@GetCity');
	Route::get('/admin/service/data/{id}','admin\LocationController@GetService');
	Route::get('/director/data/','frontend\DirectoryController@GetDirector');

	/************************* Construction Rules ******************************/
	Route::get('construction/rule','frontend\ConstructionController@Index')->name('construction_rule');
	Route::get('construction/law','frontend\ConstructionController@Law')->name('construction_law');
	Route::get('construction/order','frontend\ConstructionController@Order')->name('construction_order');
    Route::get('searchRule','frontend\ConstructionController@searchRule')->name('searchRule');
	/************************* Information & Advice ******************************/
	Route::get('information&advice','frontend\InformationController@InfoAdvice')->name('info_advice');
	Route::post('submitMessage','frontend\InformationController@submitMessage')->name('submitMessage');
	Route::get('/message/view/{id}','frontend\InformationController@ViewMessage')->name('view_message');
	Route::get('/messages/all','frontend\InformationController@AllMessage')->name('all_message');
	/************************* Change Password ******************************/
	Route::get('profile/change/password','frontend\SecurityController@Password')->name('change_password');
	Route::get('profile/update_password','frontend\SecurityController@updatePassword')->name('update_password');

});