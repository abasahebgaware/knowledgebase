<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Sign Up</title>
    
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <link rel="stylesheet" href="/foundation/css/foundation.css">
    <script src="/foundation/js/foundation.min.js"></script>
    <script src="/foundation/js/vendor/jquery.min.js"></script>

    <link href="foundation/css/normalize.css" rel="stylesheet">
    <link href="foundation/css/foundation.min.css" rel="stylesheet">

    
</head>

<body>

    {{ Form::open(array('url' => 'signup')) }}

    <section class="signin_section">
        <div class="row">
            <div class="medium-12 small-12 columns">
                <h1 class="text-center">Knowledge Base</h1>
            </div>
        </div>
        <div class="row">            
            
            <div class="signin_form medium-6 small-12 large-offset-3 columns">
                
                    <div class="small-12 columns text_input">
                       <p>{{ $errors->first('msg') }}</p>
                    </div>
                    <div class="small-12 columns text_input">
                        <label>Name</label>
                        <input required type="text" pattern="[a-zA-Z_ ]+" name="name" placeholder="Name" value="{{ Input::old('name') }}">
                        <p>{{ $errors->first('name') }}</p>
                    </div>
                    <div class="small-12 columns text_input">
                        <label>Email</label>
                        <input type="email" required name="email" placeholder="Email" value="{{ Input::old('email') }}">
                        <p>{{ $errors->first('email') }}</p> 
                    </div>
                    <div class="small-12 columns text_input">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="Password" required pattern=".{3,}">
                        <p>{{ $errors->first('password') }}</p>  
                    </div>
                    <div class="small-12 columns text_input">
                        <label>Confirm Password</label>
                        <input name="confirm_password" type="password" placeholder="Confirm Password" required pattern=".{3,}">
                        <p>{{ $errors->first('confirm_password') }}</p> 
                    </div>
                    
                    <div class="small-12 columns">
                        <button class="positive_button">Sign up</button>
                    </div>
                {{ Form::close() }}
                <hr>
                <div clas="small-12 columns">
                    <p class="text-center">Already have signed up? Proceed to <a href=" {{ URL::route('/') }} ">Sign in</a></p>                     
                </div>                
            </div>
        </div>    
    </section>

    

</body>

</html>