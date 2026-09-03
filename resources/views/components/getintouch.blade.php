<div class="light-wrapper">
    <div class="container inner">
        <div class="thin">
            <h2 class="post-title">Get in Touch</h2>
            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Fusce dapibus, tellus ac cursus commodo, tortor
                mauris condimentum nibh, ut fermentum massa justo sit amet risus. Integer posuere erat a ante
                venenatis dapibus posuere velit aliquet. Maecenas faucibus.</p>
            <div class="divide10"></div>
            <div class="form-container">
                <form action="{{route('contactus.store')}}" method="post" class="vanilla vanilla-form"
                      novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <input type="text" name="name" placeholder="Your name" required="required">
                                    <i class="icon-user"></i></label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <input type="email" name="email" placeholder="Your e-mail" required="required">
                                    <i class="icon-mail-alt"></i></label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <input type="tel" name="phone" placeholder="Phone">
                                    <i class="icon-phone"></i></label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label class="custom-select">
                                    <select name="department" required="required">
                                        <option value="">Тип сотрудничества</option>
                                        <option value="Продажи">Продажи</option>
                                        <option value="Сотрудничество">Сотрудничество</option>
                                        <option value="Маркетинг">Маркетинг</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                    <i class="icon-ok"></i><span><!-- fake select handler --></span> </label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                    <textarea name="message" placeholder="Type your message here..."></textarea>
                    <div class="radio-set">
                        <label>Subject:</label>
                        <label>
                            <input type="radio" name="subject" value="General">
                            <span><!-- fake radio --></span> General</label>
                        <label>
                            <input type="radio" name="subject" value="Hi">
                            <span><!-- fake radio --></span> Say Hi</label>
                        <label>
                            <input type="radio" name="subject" value="Other">
                            <span><!-- fake radio --></span> Other</label>
                    </div>
                    <!--/.radio-set -->
                    <input type="submit" class="btn" value="Send" data-error="Fix errors"
                           data-processing="Sending..." data-success="Thank you!">
                    <footer class="notification-box"></footer>
                </form>
                <!--/.vanilla-form -->
            </div>
            <!--/.form-container -->
        </div>
    </div>
    <!-- /.container -->
</div>

