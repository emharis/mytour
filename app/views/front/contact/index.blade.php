@extends('front.partials.master')

@section('main-content')
<div id="page-meta">
    <div class="inner group">
        <h3>...Say Hello! :)</h3>
        <h4>Get in touch with {{$comp->web_title}} team</h4>
    </div>
</div>
<!-- END PAGE META -->
<!-- START PRIMARY -->
<div id="primary" class="sidebar-left">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-page" class="content group">
            <div class="hentry group">
                <form id="contact-form-contact-us" class="contact-form" method="post" action="front/contact/send" >
                    <?php  ?>
                    @if(Session::has('sent_message'))
                    <div class="usermessagea">
                        <p class="success">{{Session::get('sent_message')}}</p>
                    </div>
                    @endif

                    <fieldset>
                        <ul>
                            <li class="text-field">
                                <label for="name-contact-us">
                                    <span class="label">Name</span>
                                    <br /><span class="sublabel">This is the name</span><br />
                                </label>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-user"></i></span>
                                    <input required type="text" name="name" id="name-contact-us" class="required" value="" />
                                </div>
                                <div class="msg-error"></div>
                            </li>
                            <li class="text-field">
                                <label for="email-contact-us">
                                    <span class="label">Email</span>
                                    <br />					
                                    <span class="sublabel">This is a field email</span><br />
                                </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                                    <input required type="email" name="email" id="email-contact-us" class="required email-validate" value="" /></div>
                                <div class="msg-error"></div>
                            </li>
                            <li class="textarea-field">
                                <label for="message-contact-us">
                                    <span class="label">Message</span>
                                </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span><textarea required name="message" id="message-contact-us" rows="8" cols="30" class="required"></textarea></div>
                                <div class="msg-error"></div>
                            </li>
                            <li class="submit-button">
                                <input type="text" name="yit_bot" id="yit_bot" />
                                <input type="hidden" name="yit_action" value="sendmail" id="yit_action" />
                                <input type="hidden" name="yit_referer" value="http://yourinspirationtheme.com/demo/pinkrio/corporate/contact/" />
                                <input type="hidden" name="id_form" value="126" />
                                <input type="submit" name="yit_sendmail" value="Send Message" class="sendmail alignright" />			
                            </li>
                        </ul>
                    </fieldset>
                </form>
                <script type="text/javascript">
                    var messages_form_126 = {
                        name: "Please, fill in your name",
                        email: "Please, insert a valid email address",
                        message: "Please, insert your message"
                    };
                </script>
            </div>
            <!-- START COMMENTS -->
            <div id="comments">
            </div>
            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->
        <!-- START SIDEBAR -->
        <div id="sidebar-contact" class="sidebar group">
            <div class="widget-first widget contact-info">
                <h3>Contacts</h3>
                <div class="sidebar-nav">
                    <ul>
                        <li>
                            <i class="icon-map-marker" style="color:#979797;font-size:20pxpx"></i> Location:  {{ preg_replace('/\s+?(\S+)?$/', '', substr($comp->address, 0, 40)); }}
                        </li>
                        <li>
                            <i class="icon-map-marker" style="color:#979797;font-size:20pxpx"></i> {{str_replace(preg_replace('/\s+?(\S+)?$/', '', substr($comp->address, 0, 40)),'',$comp->address)}}
                        </li>
                        <li>
                            <i class="icon-info-sign" style="color:#979797;font-size:20pxpx"></i> Phone: {{$comp->phone}}
                        </li>
                        <li>
                            <i class="icon-print" style="color:#979797;font-size:20pxpx"></i> Fax: {{$comp->fax}}
                        </li>
                        <li>
                            <i class="icon-envelope" style="color:#979797;font-size:20pxpx"></i> Email: {{$comp->email}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="widget-last widget text-image">
                <h3>Customer Support</h3>
                <!--<div class="text-image" style="text-align:left"><img src="frnt/images/callus.gif" alt="Customer Support" /></div>-->

                @if($contactpage->ym_visible == 'Y')
                <div class="text-image" style="text-align:left">
                    <a href="ymsgr:SendIM?{{$contactpage->ym}}">
                        <img border=0 src="http://opi.yahoo.com/online?u={{$contactpage->ym}}&m=g&t=14"></a>
                </div>
                @endif

                <div class="clear"></div>

                <p>{{$contactpage->customer_support_desc}} </p>
            </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>

@stop