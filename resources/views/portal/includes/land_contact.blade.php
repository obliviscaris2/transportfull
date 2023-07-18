{{-- For Form Section --}}
<section class="contact_form wid_mar">
    <div class="container">
        <h1 class="sec_title">
            {{ __('Contact') }}
        </h1>
        <div class="row">
            <div class="col-md-6 cform_left">
                <iframe src="{{ $sitesetting->google_map }}" width="600" height="450" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-md-6 cform_right">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="quick_contact" class="form-horizontal" method="POST" role="form" action="{{ route('admin.contactus.store') }}">
                    @csrf
                    <div class="form-group">

                        <input type="text" class="form-control" id="name" placeholder="NAME" name="name"
                            value="" required>

                    </div>

                    <div class="form-group">

                        <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email"
                            value="" required>

                    </div>

                    <div class="form-group">


                        <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone No."
                            required>


                    </div>

                    <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>





                    {{-- <div class="g-recaptcha" data-sitekey="{{ getenv('RECAPTCHA_SITE_KEY') }}"></div> --}}



                 
                        <button class="btn send-button g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" 
                        data-callback='onSubmit' 
                        data-action='submit'>
                            <div class="alt-send-button">
                                <i class="fa fa-paper-plane"></i><span class="send-text">Let's Connect</span>
                            </div>

                        </button> 

                    {{-- {!! htmlFormSnippet() !!} --}}

                    {{-- <div class="g-recaptcha" data-sitekey="6LcPq34lAAAAAB70zMY0BDXNmHHL5YR7OPbkq61c"></div>
                    <button class="btn send-button" id="submit" type="submit" value="SEND">
                        <div class="alt-send-button">
                            <i class="fa fa-paper-plane"></i>
                            <span class="send-text">Let's Connect</span>
                        </div>

                    </button> --}}

                    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}


                </form>
                
                <script>
                    function onSubmit(token) {
                        document.getElementById("quick_contact").submit();
                    }

                </script>
            </div>
        </div>
    </div>
</section>
