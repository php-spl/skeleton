<?php

// SSO auth
router()->get('/auth/sso/broker', function() {
    return controller(Api\SSO::class)->broker();
});

router()->post('/auth/sso/idp', function() {
    return controller(Api\SSO::class)->idp();
});