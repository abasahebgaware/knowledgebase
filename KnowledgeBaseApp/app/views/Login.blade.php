<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Knowlede Base Login</title>
    
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <link href="foundation/css//normalize.css" rel="stylesheet">
    <link href="foundation/css/foundation.min.css" rel="stylesheet">
    
</head>

<body>

    {{ Form::open(array('url' => 'login')) }}
    
    <div class="row">
        <div class="large-6 medium-8 small-12 columns end">
            <h1 class="text-center">{{ $errors->first('msg') }}</h1>
        </div>        
    </div>

    <section class="signin_section">
        <div class="row">
            <div class="large-12 medium-12 small-12  columns">
                <h1 class="text-center">Knowledge Base</h1>
            </div>
        </div>
        <div class="row">            
            
            <div class="signin_form medium-6 small-12 large-offset-3 columns">
                    <div class="small-12 columns text_input">
                        <p>
                            {{ $errors->first('email') }}
                            {{ $errors->first('password') }}
                        </p>
                    </div>
                    <div class="small-12 columns text_input">   
                            <label for="email">Email Address</label>
                            <input required placeholder="Email" name="email" type="email" value="{{ Input::old('email') }}"></input>
                    </div>
                    <div class="small-12 columns text_input">
                            <label for="password">Password</label>
                            <input required placeholder="Password" name="password" type="password" pattern=".{3,}"></input>
                    </div>
                    <div class="large-6 small-6 columns">
                        <button class="positive_button">Sign in</button>
                    </div>
                    <div class="large-6 small-6 columns">
                       <button class="positive_button" type="reset">Reset</button> 
                    </div>
                    
                {{ Form::close() }}
                <hr>
                <div clas="small-12 columns">
                    <p class="text-center">New to Knowledge Base? <a href="{{ URL::route('signup') }}">Sign up</a> to get started</p>                     
                </div>                
            </div>
        </div>    
    </section>

</body>

</html>
