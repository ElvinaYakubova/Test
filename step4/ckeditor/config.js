/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'eng';
	 config.uiColor = '#ffffcc';
	 config.colorButton_colors = '#cc00cc, black';
	 //config.filebrowserUploadUrl = 'upload.php';
	 CKEDITOR.config.basicEntities=false;
	 CKEDITOR.config.entities_additional='gt,lt,amp,apos,quot';
	 config.filebrowserUploadUrl = 'ckupload.php';
};
