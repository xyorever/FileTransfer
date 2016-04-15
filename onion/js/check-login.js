'use strict';

(function ($) {
    var getOrigin = function () {
        return window.location.origin || window.location.protocol + '//' + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
    };

    var checkLogin = function () {
        var realmUrl = 'https://auth.onion.io/realms/onion',
            clientId = 'onion-site',
            iframe = document.createElement('iframe'),
            iframeOrigin = 'https://auth.onion.io',
            iframeInterval = 5,
            iframeSrc = realmUrl + '/protocol/openid-connect/login-status-iframe.html?client_id=' + encodeURIComponent(clientId) + '&origin=' + getOrigin();

        iframe.onload = function () {
            iframe.contentWindow.postMessage('{}', iframeOrigin);
        };

        iframe.setAttribute('src', iframeSrc);
        iframe.style.display = 'none';
        document.body.appendChild(iframe);

        window.addEventListener('message', function (event) {
            if (event.origin !== iframeOrigin) {
                return;
            }
            var data = JSON.parse(event.data);
            
            if (data.loggedIn && $('#login').length) {
                window.location.replace('/login');
            } else if (!data.loggedIn && $('#logout').length) {
                window.location.replace(logout_url);
            }
        }, false);
    };

    $(function () {
        checkLogin();

        $('body').css('padding-bottom', $('footer').outerHeight());

        // Navigation Bar settings
        var setNavbar = function () {
            if (window.pageYOffset > 50) {
                $('.sub-navigation').addClass('fixed');
            } else {
                $('.sub-navigation').removeClass('fixed');
            }
        };

        setNavbar();
        $(document).on('scroll', setNavbar);

        // Preparing small animation while sending message
        var sendingAnimation;

        $.fn.startSendingAnimation = function () {
            var $submitButton = this;

            $submitButton.html('Sending');
            $submitButton.prop('disabled', true);
            sendingAnimation = setInterval(function () {
                if ($submitButton.html().length < 11) {
                    $submitButton.html($submitButton.html() + '.');
                } else {
                    $submitButton.html('Sending');
                }
            }, 500);
        };

        $.fn.stopSendingAnimation = function () {
            var $submitButton = this;

            $submitButton.prop('disabled', false);
            clearInterval(sendingAnimation);
            $submitButton.html('Submit');
        };

        // Email subscription form
        $('#mc-embedded-subscribe-form').submit(function (e) {
            e.preventDefault();
            var $this = $(this);
            var $subMessage = $('#subscribe-message');

            $this.find('button[type=submit]').startSendingAnimation();

            $.ajax({
                method: $this.attr('method'),
                url: $this.attr('action'),
                data: $this.serialize(),
                cache: false,
                dataType: 'json',
                contentType: 'application/json',
                error: function (err) {
                    $subMessage.find('.modal-title').html('Error');
                    $subMessage.find('.modal-message').html('Could not connect to the registration server. Please try again later.');
                    $this.find('button[type=submit]').stopSendingAnimation();
                    $subMessage.modal();
                },
                success: function (data) {
                    $subMessage.find('.modal-title').html(data.result.charAt(0).toUpperCase() + data.result.slice(1));
                    $subMessage.find('.modal-message').html(data.msg);

                    if (data.result === 'success') {
                        $this.find('#mce-EMAIL').val('');
                    }

                    $this.find('button[type=submit]').stopSendingAnimation();
                    $subMessage.modal();
                }
            });
        });
    });
})(jQuery);
