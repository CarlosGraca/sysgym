/*************************
 * jQuery Camera Capture
 * Copyright 2016
 * Kelli Sahver
 * kelli@kellishaver.com
 * Version: 1.0
 *************************/

;( function( $, window, document, undefined ) {

  "use strict";

  var pluginName = "cameraCapture",
    plugin,
    record_button,
    stop_button,
    save_button,
    trash_button,
    video_window = $('<video>'),
    defaults = {
      width: 320,
      height: 240,
      uploadURL: "",
      recordButtonHTML: '<button class="camera-capture-record-button">Record</button>',
      stopButtonHTML: '<button class="camera-capture-stop-button">Stop</button>',
      saveButtonHTML: '<button class="camera-capture-save-button">Save</button>',
      trashButtonHTML: '<button class="camera-capture-trash-button">Trash</button>',
      scaleVideo: true,
      videoScaleFactor: 2.0
    };

  var _handleError = function() {
    $(window).trigger('camera_capture.stream_error', [error]);    
  }

  var _init = function() {
      if(plugin.getBrowser() != ("Chrome" || "Firefox")) {
        console.log("Your browser does not support the MediaRecorder API");
        $(window).trigger('camera_capture.browser_not_supported');
      } else {
        navigator.getUserMedia = navigator.getUserMedia || 
                  navigator.webkitGetUserMedia || 
                  navigator.mozGetUserMedia || 
                  navigator.msGetUserMedia;

        if(plugin.getBrowser() == "Chrome") {
          plugin.constraints = {
            "audio": true,
            "video": {
              "mandatory": {
                "minWidth": plugin.settings.width,
                "maxWidth": plugin.settings.width,
                "minHeight": plugin.settings.height,
                "maxHeight": plugin.settings.height
              },
              "optional": []
            }
          };
        } else if(plugin.getBrowser() == "Firefox") {
          plugin.constraints = {
            "audio":true,
            "video":{
              "width": {
                "min": plugin.settings.width,
                "ideal": plugin.settings.width,
                "max": plugin.settings.width
              },
              "height": { 
                "min": plugin.settings.height,
                "ideal": plugin.settings.height,
                "max": plugin.settings.height
              }
            }
          };
        }

        video_window.prop({"autoplay":true, "controls":false})
                    .addClass('camera-capture-video-player')
                    .attr('id', 'video-box');

        if (plugin.settings.scaleVideo) {
          video_window.css({ 
            width: Math.ceil(plugin.settings.width * plugin.settings.videoScaleFactor) + 'px',
            height: Math.ceil(plugin.settings.height * plugin.settings.videoScaleFactor) + 'px'
          });
        }

        plugin.element.append(video_window)
                      .append(record_button)
                      .append(stop_button)
                      .append(save_button)
                      .append(trash_button);
      }    
  }

  var _recordVideo = function(stream) {
    if(typeof MediaRecorder.isTypeSupported == "function") {
      if(MediaRecorder.isTypeSupported("video/webm;codecs=vp9")) {
        var media_options = { "mimeType": "video/webm;codecs=vp9"};
      } else if (MediaRecorder.isTypeSupported("video/webm;codecs=vp8")) {
        var media_options = {mimeType: "video/webm;codecs=vp8"};
      }
      plugin.media_recorder = new MediaRecorder(stream, media_options);
    } else {
      plugin.media_recorder = new MediaRecorder(stream);
    }
    plugin.media_recorder.start(10);
    var url = window.URL || window.webkitURL;
    var video = video_window.get()[0];
    video.src = url ? url.createObjectURL(stream) : stream;
    video.controls = false;
    video.volume = 0;
    video.play();

    plugin.media_recorder.ondataavailable = function(e) {
      plugin._chunks.push(e.data);
    };

    plugin.media_recorder.onstop = function(e) {
      var video = video_window.get()[0];
      video.src = window.URL.createObjectURL(plugin._blob);
      video.pause();
      video.controls = true;
      video.volume = 1;
      video.currentTime = 0;
    };
    $(window).trigger('camera_capture.start_recording');
  }

  var _uuid = function() {
    function s4() {
      return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
    }
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();        
  }

  function Plugin ( element, options ) {
    plugin                = this;
    plugin.element        = $(element);
    plugin.settings       = $.extend({}, defaults, options );
    plugin.constraints    = null;
    plugin.media_recorder = null;
    plugin._blob          = null;
    plugin._chunks        = [];

    record_button = $(plugin.settings.recordButtonHTML);
    stop_button   = $(plugin.settings.stopButtonHTML);
    save_button   = $(plugin.settings.saveButtonHTML);
    trash_button  = $(plugin.settings.trashButtonHTML);

    record_button.bind('click', function(e) {
      e.preventDefault();
      plugin.startRecording();
    });    
    stop_button.bind('click', function(e) {
      e.preventDefault();
      plugin.stopRecording();
    });
    save_button.bind('click', function(e) {
      e.preventDefault();
      plugin.saveRecording();
    });
    trash_button.bind('click', function(e) {
      e.preventDefault();
      plugin.trashRecording();
    });

    _init();
  }

  $.extend( Plugin.prototype, {
    startRecording: function() {
      navigator.getUserMedia(plugin.constraints, _recordVideo, _handleError);
    },

    stopRecording: function() {
      plugin.media_recorder.stop();
      plugin._blob = new Blob(plugin._chunks, {"type": "video/webm"});
      plugin._chunks = [];
      $(window).trigger('camera_capture.stop_recording');
    },

    saveRecording: function() {
      $(window).trigger('camera_capture.init_save');
      var filename = _uuid() + ".webm";
      var data = new FormData();
      data.append('file_name', filename);
      data.append('file', plugin._blob);
      $.ajax({
        url :  plugin.settings.uploadURL,
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function(data) {
          $(window).trigger('camera_capture.save_success', [filename]);
        },  
        error: function() {
          $(window).trigger('camera_capture.save_failed');
        }
      });        
    },

    trashRecording: function() {
      var video = video_window.get()[0];
      video.controls = false;
      video.volume = 0;
      video.pause();
      video.src = '';
      plugin._chunks = [];
      $(window).trigger('camera_capture.trashed_recording');
    },

    getBrowser: function() {
      var nVersion     = navigator.appVersion;
      var nAgent       = navigator.userAgent;
      var browserName  = navigator.appName;
      var nameOffset,verOffset;
      if((verOffset=nAgent.indexOf("Opera"))!=-1) {
        browserName = "Opera";
      } else if((verOffset=nAgent.indexOf("MSIE"))!=-1) {
        browserName = "Microsoft Internet Explorer";
      } else if((verOffset=nAgent.indexOf("Chrome"))!=-1) {
        browserName = "Chrome";
      } else if((verOffset=nAgent.indexOf("Safari"))!=-1) {
        browserName = "Safari";
      } else if((verOffset=nAgent.indexOf("Firefox"))!=-1) {
        browserName = "Firefox";
      } else if ( (nameOffset=nAgent.lastIndexOf(' ')+1) < (verOffset=nAgt.lastIndexOf('/')) ) {
        browserName = nAgt.substring(nameOffset,verOffset);
      }
      return browserName;        
    }
  });

  $.fn[ pluginName ] = function( options ) {
    return this.each( function() {
      if ( !$.data( this, pluginName ) ) {
        $.data( this, pluginName, new Plugin( this, options ) );
      }
    });
  };
})( jQuery, window, document );