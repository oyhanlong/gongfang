(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
var blockPop = require('./blockpopup.js');
var formValidator = require('../../../plugins/socm.form.validate.js');

function supportPanel(productKey) {
    var panel = this;

    this.currentBaseType = null;
    this.submitListeners = [];

    this.getAttachments = function () {
        var uploadedFiles = this.getFileUploadBtn().attr('_val');
        if (typeof uploadedFiles == 'undefined') {
            return "";
        }

        //去掉第一个空格
        return uploadedFiles.substring(1);
    };

    this.switchForm = function () {
        var formId = "form-" + panel.currentBaseType;
        $("#all-forms form").each(function () {
            var $this = $(this);
            $this.toggle($this.attr("id") == formId);
        });
    };

    this.submitSupport = function ($form) {
        var verif = $("#verif:visible").val();
        if (verif == "") {
            alert("请填写验证码.");
            return false;
        }

        var submitData = {"attachments": panel.getAttachments(), "verif": verif, "projectKey": productKey};

        var listener = panel.submitListeners[$form.attr("id")];
        if (listener && listener.beforeSubmit) {
            var hasError = listener.beforeSubmit(submitData);
            if (hasError) {
                return false;
            }
        }

        $form.ajaxSubmit({
            type: 'post',
            cache: false,
            data: submitData,
            success: function (resp) {
                if (resp.error) {
                    alert(resp.msg);
                    panel.loadVerifImage();
                } else {
                    alert("提交成功");

                    if (listener && listener.afterSubmit) {
                        listener.afterSubmit(submitData, resp);
                    }

                    window.location.reload(true);
                }
            },
            error: function () {
                alert("提交失败,请稍后重试.");
            }
        });
    };

    this.getCurrentForm = function () {
        return $("#form-" + this.currentBaseType);
    };

    this.getFileControl = function () {
        return $("#control-file-upload input[type='file']");
    };

    this.appendFile = function (fielPath) {
        var imgIcon = "<div class='fileIcon'>"
            + "<img class='fileIcon' src='" + fielPath + "'/>"
            + "<label class='fileDel redPoint' data-file-path='" + fielPath + "'>×</label>"
            + "</div>";

        var $uploadBtn = panel.getFileUploadBtn();
        $uploadBtn.before(imgIcon);

        /*为什么要将上传的图片链接
         放到按钮上？
         * 在socm.form.validate中实现了对div span等没有val()属性的元素的非空判断*/
        var uploadedFiles = $uploadBtn.attr('_val');
        if (typeof uploadedFiles == 'undefined') {
            uploadedFiles = "";
        }
        uploadedFiles = uploadedFiles + " " + fielPath;
        $uploadBtn.attr('_val', uploadedFiles);
    };

    this.delFile = function () {
        var filePath = $(this).data("file-path");
        var uploadedFiles = panel.getFileUploadBtn().attr('_val');
        uploadedFiles.replace(" " + filePath, "");
        $(this).closest("div.fileIcon").remove();
        panel.getFileControl().val("");
    };

    this.getFileUploadBtn = function () {
        return $("#form-" + this.currentBaseType + " div.uploadFiles .fileAdd");
    };

    this.uploadFile = function () {
        /**先获取上传的token*/
        var ts = new Date().getTime();
        var uploadParams = {
            "_timestamp": ts,
            "productKey": productKey,
            "baseType": panel.currentBaseType,
            "channel": "ce",
            "uid": (Math.random() * 100000000).toString().substring(0, 8)
        };
        $.ajax({
            type: 'get',
            url: _gtag['uploadUrlPrefix'] + "token/get",
            data: uploadParams,
            crossDomain: true,
            success: function (res) {
                if (res.retCode < 0) {
                    alert('上传服务不可用');
                    $.unblockUI({fadeOut: 200});
                } else {
                    uploadParams["access_token"] = res.token;
                    $("#control-file-upload").ajaxSubmit({
                        type: 'post',
                        cache: false,
                        data: uploadParams,
                        crossDomain: true,
                        success: function (res) {
                            if (res.retCode == '0') {
                                panel.appendFile(res.relateUrl, res.fileContentType);
                            } else {
                                alert('上传失败');
                            }
                            $.unblockUI({fadeOut: 200});
                        },
                        error: function () {
                            alert('上传失败');
                            $.unblockUI({fadeOut: 200});
                        }
                    });
                }
            },
            error: function () {
                alert('上传服务不可用');
                $.unblockUI({fadeOut: 200});
            }
        });
    };

    this.loadVerifImage = function () {
        $("#verif-container").show();
        $("#verifImage img").attr("src", _gtag["sysUriPrefix"] + "/support/verif-code/" + productKey + "?t=" + (new Date()).getTime());
    };

    this.init = function () {
        var $fileUploader = this.getFileControl();

        $fileUploader.change(function () {
            blockPop.waiting('上传中...');
            panel.uploadFile();
        });

        $("div.fileAdd").click(function () {
            $fileUploader.click();
        });

        $("select[name='baseType']").change(function () {
            var selectedBaseType = $(this).val();
            panel.currentBaseType = selectedBaseType;
            panel.switchForm();
        }).change();

        $("select[name='contactType']").change(function () {
            var $this = $(this);
            var $contact = $this.closest(".contacts").find("input[name='contact']");
            formValidator.setValidRegex($contact, $this.find("option:selected").data("regex"));
        });

        $("select[name='projectKey']").change(function () {
            var pKey = $(this).val();
            panel.currentProjectKey = pKey;
            productKey = pKey;
        });

        $("div.uploadFiles").delegate("label.fileDel", "click", panel.delFile);

        $("#all-forms form").submit(function(){
            /*禁用表单自动提交*/
            return false;
        });

        $("#all-forms input.submit").click(function () {
            var $form = panel.getCurrentForm();
            if (formValidator.validForm($form)) {
                panel.submitSupport($form);
            }
            return false;
        });

        $("#reloadVerif, #verifImage").click(panel.loadVerifImage);
        panel.loadVerifImage();
    }
}

var support = new supportPanel(_gtag["productKey"]);
support.init();
},{"../../../plugins/socm.form.validate.js":2,"./blockpopup.js":3}],2:[function(require,module,exports){
var tipValidator = {
    "ready": function ($target) {
        if ($target.hasClass("fieldError")) {
            $target.removeClass("fieldError");
            $target.next("span.fieldErrorMsg").remove();
        }
    },
    "show": function ($target, msg) {
        var errorTip = $("<span class='fieldErrorMsg'>" + msg + "</span>");

        if (!$target.hasClass("fieldError")) {
            $target.addClass("fieldError").after(errorTip);
        }
        $target.get(0).scrollIntoView();
        $target.focus();
    }
};

var alertValidator = {
    "ready": function ($target) {
    },
    "show": function ($target, msg) {
        alert(msg);
        $target.get(0).scrollIntoView();
        $target.focus();
    }
};

var setValidRegex = function ($target, regex) {
    $target.data("validRegex", regex);
};

var validField = function ($field, errorHandler) {
    errorHandler.ready($field);

    var val = $field.val();
    if (typeof val == 'undefined' || val == '') {
        //用于判断没有val()方法的dom元素
        val = $field.attr("_val");
    }
    if (typeof val == 'undefined') {
        val = "";
    }

    var data = $field.data();

    var fieldName = data.fieldName;
    var errorMsg = null;
    if (errorMsg == null && data.validRequired && val == "" && (!data.validRequiredRelate || data.validRequiredRelate && $(data.validRequiredRelate).val() == "")) {
        errorMsg = data.validRequiredMsg
        || (fieldName ? (fieldName + "是必填(选)项") : "*必填(选)项");
    }

    if (errorMsg == null && data.validRegex && val != "" && data.validRegex != "") {
        var regex = data.validRegex instanceof RegExp ? data.validRegex : new RegExp(data.validRegex);
        if (!regex.test(val)) {
            errorMsg = data.validRegexMsg
            || (fieldName ? (fieldName + "的输入格式错误") : "*输入格式错误");
        }
    }

    if (errorMsg == null && data.validMaxLen && val != "" && val.length > data.validMaxLen) {
        errorMsg = data.validMaxLenMsg
        || (fieldName ? (fieldName + "的长度过长，最多" + data.validMaxLen + "个字符") : "*输入过长，最多" + data.validMaxLen + "个字符");
    }

    if (errorMsg == null && data.validMinLen && val != "" && val.length < data.validMinLen) {
        errorMsg = data.validMinLenMsg
        || (fieldName ? (fieldName + "的长度过短，至少" + data.validMaxLen + "个字符") : "*输入过短，至少" + data.validMaxLen + "个字符");
    }

    if (errorMsg == null && data.validEquals && val != "" && val != $(data.validEquals).val()) {
        errorMsg = data.validEqualsMsg
        || (fieldName ? (fieldName + "的两次输入不匹配") : "*两次输入不匹配");
    }

    if (errorMsg == null && data.validMaxLines && val != "" && val.split(/[\r\n]+/).length > data.validMaxLines) {
        errorMsg = data.validMaxLinesMsg
        || (fieldName ? (fieldName + "超过了行数限制") : "*超过了行数限制");
    }

    if (errorMsg) {
        errorHandler.show($field, errorMsg);
        return false;
    } else {
        return true;
    }
};

var validForm = function ($form, style) {
    var validator = style == "alert" ? alertValidator : tipValidator;
    var valid = true;
    $form.find("select:visible, input:visible, textarea:visible, .valuable:visible").each(function () {
        if (!(valid = validField($(this), validator))) {
            return false;
        }
    });
    return valid;
};

if (typeof(exports) != 'undefined') {
    exports.setValidRegex = setValidRegex;
    exports.validForm = validForm;
}

window.socmValidator = {};
window.socmValidator.setValidRegex = setValidRegex;
window.socmValidator.validForm = validForm;
},{}],3:[function(require,module,exports){
var blockWait = function (msg) {
    $.blockUI({
        message: msg,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }
    });
};

var popDiv = function (div) {
    $.blockUI({
        message: $(div),
        css: {
            border: 'none',
            backgroundColor: 'none',
            width: '0px'
        }
    });
};

exports.waiting = blockWait;
exports.popDiv = popDiv;
},{}]},{},[1]);
