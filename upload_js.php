<link href="upload_file/css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="upload_file/swfupload/swfupload.js"></script>
<script type="text/javascript" src="upload_file/js/swfupload.queue.js"></script>
<script type="text/javascript" src="upload_file/js/fileprogress.js"></script>
<script type="text/javascript" src="upload_file/js/handlers_2.js"></script>
<script type="text/javascript">
                var swfu;

                window.onload = function() {
                        var settings = {
                                flash_url : "http://sustc-genome.org.cn/vp/upload_file/swfupload/swfupload.swf",
                                upload_url: "http://sustc-genome.org.cn/vp/upload_file/upload.php",       
                                post_params: {"PHPSESSID" : "<?php echo session_id(); ?>",
					      "file_code22" : "<?php echo $file_code;?>" },
                                file_size_limit : "200 MB",
                                file_types : "*.*",
                                file_types_description : "All Files",
                                file_upload_limit : 10, 
                                file_queue_limit : 0,
                                custom_settings : {
                                        progressTarget : "fsUploadProgress",
                                        cancelButtonId : "btnCancel"
                                },
                                debug: false,

                                // Button settings
                                button_image_url: "upload_file/images/test312.png",
                                button_width: "80",
                                button_height: "29",
                                button_placeholder_id: "spanButtonPlaceHolder",
                                button_text: '<span class="theFont">Upload</span>',
                                button_text_style: ".theFont { font-size: 14; }",
                                button_text_left_padding: 10,
                                button_text_top_padding: 3,
                                
                                file_queued_handler : fileQueued,
                                file_queue_error_handler : fileQueueError,
                                file_dialog_complete_handler : fileDialogComplete,
                                upload_start_handler : uploadStart,
                                upload_progress_handler : uploadProgress,
                                upload_error_handler : uploadError,
                                upload_success_handler : uploadSuccess,
                                upload_complete_handler : uploadComplete,
                                queue_complete_handler : queueComplete  
                        };

                        swfu = new SWFUpload(settings);
             };
</script>
