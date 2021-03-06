<?php
if ( !defined('CMS2CMS_VERSION') ) {
    die();
}

$dataProvider = new CmsPluginData();
$viewProvider = new CmsPluginView();

$nonce = $_REQUEST['_wpnonce'];
if ( $viewProvider->verifyFormTempKey($nonce, 'cms2cms_logout')
    && $_POST['cms2cms_logout'] == 1
) {
    $dataProvider->clearOptions();
}

$cms2cms_access_key = $dataProvider->getOption('cms2cms-key');
$cms2cms_is_activated =  $dataProvider->isActivated();

$cms2cms_target_url = $dataProvider->getSiteUrl();
$cms2cms_bridge_url = $dataProvider->getBridgeUrl();

$cms2cms_authentication = $dataProvider->getAuthData();
$cms2cms_download_bridge = $viewProvider->getDownLoadBridgeUrl($cms2cms_authentication);

$cms2cms_ajax_nonce = $viewProvider->getFormTempKey('cms2cms-ajax-security-check');

$currentPluginUrl = plugin_dir_url( __FILE__ );

?>

<div class="wrap cms2cms-wrapper">

    <div class="cms2cms-plugin">

        <div id="icon-plugins" class="icon32"><br></div>
        <h2><?php echo $viewProvider->getPluginNameLong() ?></h2>

        <?php if ($cms2cms_is_activated) { ?>
            <div class="cms2cms-message">
                <span>
                    <?php echo  sprintf(
                        $viewProvider->__('You are logged in CMS2CMS as %s', 'cms2cms-migration'),
                        $dataProvider->getOption('cms2cms-login')
                    ); ?>
                </span>
                <div class="cms2cms-logout">
                    <form action="" method="post">
                        <input type="hidden" name="cms2cms_logout" value="1"/>
                        <input type="hidden" name="_wpnonce" value="<?php echo $viewProvider->getFormTempKey('cms2cms_logout') ?>"/>
                        <button class="button"
                                data-log-this="Logout" >
                            &times;
                            <?php $viewProvider->_e('Logout', 'cms2cms-migration');?>
                        </button>
                    </form>
                </div>
            </div>
        <?php } ?>

        <ol id="cms2cms_accordeon">
            <?php

            $cms2cms_step_counter = 1;

            if ( !$cms2cms_is_activated ) { ?>
                <li id="cms2cms_accordeon_item_id_<?php echo $cms2cms_step_counter++;?>" class="cms2cms_accordeon_item cms2cms_accordeon_item_register">
                    <h3>
                        <?php $viewProvider->_e('Sign In', 'cms2cms-migration'); ?>
                        <span class="spinner"></span>
                    </h3>
                    <form action="<?php echo $viewProvider->getRegisterUrl() ?>"
                          callback="callback_auth"
                          validate="auth_check_password"
                          class="step_form"
                          id="cms2cms_form_register">

                        <h3 class="nav-tab-wrapper">
                            <a href="<?php echo $viewProvider->getRegisterUrl() ?>" class="nav-tab nav-tab-active" change_li_to=''>
                                <?php $viewProvider->_e('Register CMS2CMS Account', 'cms2cms-migration'); ?>
                            </a>
                            <a href="<?php echo $viewProvider->getLoginUrl() ?>" class="nav-tab">
                                <?php $viewProvider->_e('Login', 'cms2cms-migration'); ?>
                            </a>
                            <a
                                data-log-this="Forgot Password Link clicked"
                                href="<?php echo $viewProvider->getForgotPasswordUrl() ?>" class="nav-tab cms2cms-real-link">
                                <?php $viewProvider->_e('Forgot password?', 'cms2cms-migration'); ?>
                            </a>
                        </h3>

                        <table class="form-table">
                            <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="cms2cms-user-email"><?php $viewProvider->_e('Email:', 'cms2cms-migration');?></label>
                                </th>
                                <td>
                                    <input type="text" id="cms2cms-user-email" name="email" value="<?php echo $dataProvider->getUserEmail() ?>" class="regular-text"/>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="cms2cms-user-password"><?php $viewProvider->_e('Password:', 'cms2cms-migration'); ?></label>
                                </th>
                                <td>
                                    <input type="password" id="cms2cms-user-password" name="password" value="" class="regular-text"/>
                                    <p class="description for__cms2cms_accordeon_item_register">
                                        <?php $viewProvider->_e('Minimum 6 characters', 'cms2cms-migration'); ?>
                                    </p>
                                    <input type="hidden" id="cms2cms-user-plugin" name="plugin" value="<?php echo $viewProvider->getPluginReferrerId();?>" class="regular-text"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div>
                            <input type="hidden" id="cms2cms-site-url" name="siteUrl" value="<?php echo $cms2cms_target_url; ?>"/>
                            <input type="hidden" id="cms2cms-bridge-url" name="targetBridgePath" value="<?php echo $cms2cms_bridge_url; ?>"/>
                            <input type="hidden" id="cms2cms-access-key" name="accessKey" value="<?php echo $cms2cms_access_key; ?>"/>
                            <input type="hidden" name="termsOfService" value="1">
                            <input type="hidden" name="jklsdfl" value="">
                            <div class="error_message"></div>

                            <button
                                data-log-this="Authorization..."
                                type="submit" class="button button-primary button-large">
                                <?php $viewProvider->_e('Continue', 'cms2cms-migration'); ?>
                            </button>
                        </div>
                    </form>
                </li>

            <?php } /* cms2cms_is_activated */ ?>

            <li id="cms2cms_accordeon_item_id_<?php echo $cms2cms_step_counter++;?>" class="cms2cms_accordeon_item">
                <h3>
                    <?php echo sprintf(
                        $viewProvider->__('Connect %s', 'cms2cms-migration'),
                        $viewProvider->getPluginSourceName()
                    ); ?>
                    <span class="spinner"></span>
                </h3>
                <form action="<?php echo $viewProvider->getWizardUrl(); ?>"
                      class="cms2cms_step_migration_run step_form"
                      method="post"
                      id="cms2cms_form_run">
                    <ol>
                        <li>
                            <?php echo sprintf(
                                $viewProvider->__('Specify %s website URL', 'cms2cms-migration'),
                                $viewProvider->getPluginSourceName()
                            ); ?>
                            <br/>
                            <input type="text" name="sourceUrl" value="" class="regular-text" placeholder="<?php
                            echo sprintf(
                                $viewProvider->__('http://your_%s_website.com/', 'cms2cms-migration'),
                                strtolower($viewProvider->getPluginSourceType())
                            );
                            ?>"/>
                            <input type="hidden" name="sourceType" value="<?php echo $viewProvider->getPluginSourceType(); ?>" />
                            <input type="hidden" name="targetUrl" value="<?php echo $cms2cms_target_url;?>" />
                            <input type="hidden" name="targetType" value="<?php echo $viewProvider->getPluginTargetType(); ?>" />
                            <input type="hidden" name="targetBridgePath" value="<?php echo $cms2cms_bridge_url;?>" />
                        </li>
                    </ol>

                    <?php $viewProvider->_e("You'll be redirected to CMS2CMS application website in order to select your migration preferences and complete your migration.", 'cms2cms-migration'); ?>
                    <div class="error_message"></div>
                    <button
                        data-log-this="Start Migration Button pressed"
                        type="submit" class="button button-primary button-large">
                        <?php $viewProvider->_e('Continue', 'cms2cms-migration'); ?>
                    </button>
                </form>
            </li>


        </ol>

    </div> <!-- /plugin -->

    <div id="cms2cms-description">
        <p>
            <?php
            echo sprintf( $viewProvider->__(
                    'CMS2CMS.com is the one-of-its kind tool for fast, accurate and trouble-free website migration from %s to %s. Just a few mouse clicks - and your %s articles, categories, images, users, comments, internal links etc are safely delivered to the new WordPress website.',
                    'cms2cms-migration'
                ),
                $viewProvider->getPluginSourceName(),
                $viewProvider->getPluginTargetName(),
                $viewProvider->getPluginSourceName()
            );
            ?>
        </p>
        <p>
            <a
                data-log-this="Go to How It Works Page"
                href="http://www.cms2cms.com/how-it-works/" class="button" target="_blank">
                <?php $viewProvider->_e('See How it Works', 'cms2cms-migration'); ?>
            </a>
        </p>
        <p>
            <?php
            $viewProvider->_e('Take a quick demo tour to get the idea about how your migration will be handled.', 'cms2cms-migration');
            ?>
        </p>
        <p class="cms2cms-improve">
            <?php
            $viewProvider->_e('Help improve our service by sending anonymous usage statistics to CMS2CMS.
            This data (e.g. witch errors you got, and how do you use our plugin) is completely anonymous, does not contain any personal information,
            collected for use only by CMS2CMS and will never be transmitted to any third party.', 'cms2cms-migration');
            ?>
            <span id="cms2cms-allowed-events">
                <?php $viewProvider->_e('If you do not agree click <a href="#" class="stop-events">Cancel</a>.', 'cms2cms-migration'); ?>
            </span>

            <span id="cms2cms-disabled-events" style="display:none">
                <?php $viewProvider->_e('If you agree click <a href="#" class="allow-events">Agree</a>.', 'cms2cms-migration'); ?>
            </span>
        </p>


        <p></p>

        <p>
            <a target="_blank"
               data-log-this="Go to Assisted Page"
               href="http://www.cms2cms.com/assisted-migration-service/?utm_source=wpplugin&utm_medium=banner&utm_campaign=assisted">
                <img title="Free assitance" src="<?php echo $currentPluginUrl;?>/img/assisted.png" alt="We are here to help you tune the migration! Free!"/>
            </a>
        </p>

        <p>
            <a target="_blank"
               data-log-this="Go to Package Page"
               href="http://www.cms2cms.com/support-service-plans/?utm_source=wpplugin&utm_medium=banner&utm_campaign=supportpackages">
                <img title="Free assitance" src="<?php echo $currentPluginUrl;?>/img/package.png" alt="We can handle the website migration for you. Choose our Support Packages."/>
            </a>
        </p>

    </div>

    <!-- start Mixpanel -->
    <script type="text/javascript">
        (function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==
            typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);
            b._i.push([a,e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);

        mixpanel.init("f48baf7f57bdb924fc68a786600d844e");

        mixpanel.identify("<?php echo md5($dataProvider->getUserEmail()); ?>");

    </script>
    <!-- end Mixpanel -->

</div> <!-- /wrap -->
