<div class="col-xs-12 col-md-4 sidebar-wrapper">
                                <div class="sidebar sidebar-right">
                                    <aside class="widget widget_apus_contact_form">
                                        <h2 class="widget-title">
                                            <span>Contact Tom Wilson</span>
                                        </h2>
                                        <div class="contact-form-agent">
                                            <form method="post" action="https://demoapus2.com/homeo/agent/tom-wilson/?" class="contact-form-wrapper">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="name"
                                                                placeholder="Name"
                                                                required="required"
                                                            >
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input
                                                                type="email"
                                                                class="form-control"
                                                                name="email"
                                                                placeholder="E-mail"
                                                                required="required"
                                                                value=""
                                                            >
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input
                                                                type="text"
                                                                class="form-control style2"
                                                                name="phone"
                                                                placeholder="Phone"
                                                                required="required"
                                                                value=""
                                                            >
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea
                                                        class="form-control"
                                                        name="message"
                                                        placeholder="Message"
                                                        required="required"
                                                    ></textarea>
                                                </div>
                                                <!-- /.form-group -->
                                                <input type="hidden" name="post_id" value="1446">
                                                <button class="button btn btn-primary btn-block" style='background-color:#007bff;' name="contact-form">Send Message</button>
                                            </form>
                                        </div>
                                    </aside>
                                    <aside class="widget widget_agent_filter_widget">
                                        <h2 class="widget-title">
                                            <span>Find Agents</span>
                                        </h2>
                                        <form action="{{route("vender.search") }}" class="bravo_form_filter">
                                            <div class="form bravo_form" method="get" style='box-shadow: 0 0 0 0;'>
                                                <div class="g-field-search">
                                                    <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:30px; margin-bottom:20px;'>   
                                                        <div class="input-search">
                                                            <input type="text" name="vendor_name" class="form-control"  placeholder="{{__("Enter Vendor Name")}}" value="{{ request()->input("vendor_name") }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:30px; margin-bottom:20px;'>   
                                                        <div class="input-search">
                                                            <input type="text" name="vendor_email" class="form-control"  placeholder="{{__("Vendor Email")}}" value="{{ request()->input("vendor_email") }}">
                                                        </div>
                                                    </div>     
                                                    <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:30px; margin-bottom:20px;'>   
                                                        <div class="input-search">
                                                            <input type="text" name="vendor_location" class="form-control"  placeholder="{{__("Enter Location")}}" value="{{ request()->input("vendor_location") }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-submit d-flex justify-content-center">
                                                <button type ='submit'class="button btn btn-theme btn-search" style='width:100%'><i class="field-icon fa icofont-search"></i>Search Agents</button>
                                            </div>
                                        </form>
                                    </aside>

                                </div>
                            </div>
